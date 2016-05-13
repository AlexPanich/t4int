<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 013 13.05.16
 * Time: 9:34
 */

namespace App\Models;

use T4\Core\Config;
use T4\Http\E404Exception;

class News extends Config
{
    public function findAll()
    {
        $news = [];

        foreach($this->data as $item) {
            $news[] = new Article($item->getData());
        }

        return $news;
    }

    public function findOne($id)
    {
        $array = [];

        foreach($this->data as $item) {
            if ($item->getData()['id'] == $id) {
                $array = $item->getData();
            }
        }

        if (count($array) == 0) {
            throw new E404Exception();
        }

        return new Article($array);
    }
}
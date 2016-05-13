<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 013 13.05.16
 * Time: 9:33
 */

namespace App\Models;

use T4\Core\Std;

class Article extends Std
{
    public static function all()
    {
        $db = new News(__DIR__ .'/../db_array.php');

        return $db->findAll();

    }

    public static function find($id)
    {
        $db = new News(__DIR__ .'/../db_array.php');

        return $db->findOne($id);
    }
}
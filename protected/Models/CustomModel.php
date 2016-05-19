<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 019 19.05.16
 * Time: 22:38
 */

namespace App\Models;


use T4\Orm\Model;

abstract class CustomModel extends Model
{
    public static function create($attributes)
    {
        (new static)->fill($attributes)->save();
    }

    public function update($attributes)
    {
        $this->fill($attributes)->save();
    }

}
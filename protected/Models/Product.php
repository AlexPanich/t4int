<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 019 19.05.16
 * Time: 18:56
 */

namespace App\Models;



class Product extends CustomModel
{
    protected static $schema = [
        'columns' => [
            'name' => ['type' => 'string'],
            'description' => ['type' => 'text'],
            'price' => ['type' => 'integer'],
            'count' => ['type' => 'integer'],
            '__category_id' => ['type' => 'link']
        ],
        'relations' => [
            'category' => ['type' => self::BELONGS_TO, 'model' => Category::class]
        ]
    ];

}
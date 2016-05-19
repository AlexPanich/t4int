<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 019 19.05.16
 * Time: 15:19
 */

namespace App\Models;


use T4\Orm\Model;

class Category extends Model
{
    static protected $schema = [
        'table' => 'categories',
        'columns' => [
            'name' => ['type' => 'string'],
        ],
        'relations' => [
            'products' => ['type' => self::HAS_MANY, 'model' => Product::class]
        ]
    ];

    static protected $extensions = ['tree'];

    public static function create($attributes)
    {
        (new static)->fill($attributes)->save();
    }

    public function moveUp()
    {
        $sibling = $this->getPrevSibling();

        if (!empty($sibling)) {
            $this->insertBefore($sibling);
        }
    }

    public function moveDown()
    {
        $sibling = $this->getNextSibling();

        if (!empty($sibling)) {
            $this->insertAfter($sibling);
        }
    }
}
<?php

namespace App\Models;



use T4\Core\Exception;

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

    public function validateName($val)
    {
        if (mb_strlen($val) < 3) {
            throw new Exception('Слишком короткое название продукта');
        }

        return true;
    }

    public function sanitizeName($val)
    {
        return mb_strtoupper(mb_substr($val, 0, 1)) . mb_strtolower(mb_substr($val, 1));
    }

    public function  validateDescription($val)
    {
        if (mb_strlen($val) < 10) {
            throw new Exception('Слишком короткое описание продукта');
        }
        return true;
    }

    public function validatePrice($val)
    {
        if (strlen($val) <=0) {
            throw new Exception('Поле цена должно быть заполненно');
        }

        if (!preg_match('/^\d+/', $val)) {
            throw new Exception('Цена должна начинаться с цифры');
        }

        return true;
    }

    public function sanitizePrice($val)
    {
        return (int)$val;
    }

    public function validateCount($val)
    {
        if (strlen($val) <=0) {
            throw new Exception('Поле колличество должно быть заполненно');
        }

        if (!preg_match('/^\d+/', $val)) {
            throw new Exception('Колличество должно начинаться с цифры');
        }

        return true;
    }

    public function sanitizeCount($val)
    {
        return (int)$val;
    }

}
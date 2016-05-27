<?php

namespace App\Models;



use T4\Core\Exception;

class Category extends CustomModel
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

    public function getAllProducts()
    {
        $products = $this->products;
        if (count($this->children) > 0) {
            foreach($this->children as $child) {
                $products->merge($child->getAllProducts());
            }
        }
        return $products;
    }

    public function validateName($val)
    {
        if (mb_strlen($val) < 3) {
            throw new Exception('Слишком короткое имя');
        }
    }

    public function sanitizeName($val)
    {
        return mb_strtoupper(mb_substr($val, 0, 1)) . mb_strtolower(mb_substr($val, 1));
    }

    protected function afterDelete()
    {
        foreach ($this->products as $product) {
            $product->delete();
        }
    }
}
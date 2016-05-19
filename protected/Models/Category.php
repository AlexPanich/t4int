<?php

namespace App\Models;



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
}
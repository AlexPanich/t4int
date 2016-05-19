<?php

namespace App\Models;


class Article extends CustomModel
{
    const PK = 'id';

    protected static $schema = [
        'columns' => [
            'id' => ['type' => 'pk'],
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'published_at' => ['type' => 'datetime']
        ]
    ];

    public static function create($attributes)
    {
        $attributes['published_at'] = date('Y-m-d');
        parent::create($attributes);
    }

    public function getPreview()
    {
        return mb_substr($this->text, 0, 10) . '...';
    }

    public function getRepresentation()
    {
        return nl2br($this->text);
    }
}
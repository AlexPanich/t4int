<?php

namespace App\Models;

use T4\Orm\Model;

class Article extends Model
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
        (new static)->fill($attributes)->save();
    }

    public function update($attributes)
    {
        $this->fill($attributes)->save();
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
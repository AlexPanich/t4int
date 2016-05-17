<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1463476650_Article
    extends Migration
{

    public function up()
    {
        $this->createTable('articles', [
            'id' => ['type' => 'pk'],
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'published_at' => ['type' => 'datetime']
        ]);
    }

    public function down()
    {
        $this->dropTable('articles');
    }
    
}
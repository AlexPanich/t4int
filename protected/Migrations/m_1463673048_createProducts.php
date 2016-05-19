<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1463673048_createProducts
    extends Migration
{

    public function up()
    {
        $this->createTable('products', [
            'name' => ['type' => 'string'],
            'description' => ['type' => 'text'],
            'price' => ['type' => 'integer'],
            'count' => ['type' => 'integer'],
            '__category_id' => ['type' => 'link']
        ]);
    }

    public function down()
    {
        $this->dropTable('products');
    }
    
}
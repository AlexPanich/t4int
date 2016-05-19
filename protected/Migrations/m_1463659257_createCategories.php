<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1463659257_createCategories
    extends Migration
{

    public function up()
    {
        $this->createTable('categories', [
            'name' => ['type' => 'string'],
        ],[],[
            'tree'
        ]);
    }

    public function down()
    {
        $this->dropTable('categories');
    }
    
}
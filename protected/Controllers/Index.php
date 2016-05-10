<?php

namespace App\Controllers;

use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $this->data['description'] = $this->app->config['description'];
    }

    public function actionAbout()
    {
        $this->date['title'] = 'Обо мне';
        $this->data['description'] = 'Я программист на PHP';
    }

}
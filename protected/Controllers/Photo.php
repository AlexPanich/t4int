<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 010 10.05.16
 * Time: 9:08
 */

namespace App\Controllers;


use T4\Mvc\Controller;

class Photo extends Controller
{
    public function actionDefault()
    {
        $this->data->description = 'ФотоКонтроллер - ДефолтЭкшен';
    }

    public function actionLast()
    {
        $this->data->description = 'ФотоКонтроллер - ЛастЭкшен';
    }
}
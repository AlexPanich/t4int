<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 019 19.05.16
 * Time: 22:08
 */

namespace App\Controllers;


use App\Models\Category;
use App\Models\Product as ProductModel;
use T4\Mvc\Controller;

class Product extends Controller
{
    public function actionDefault()
    {
        $this->data->products = ProductModel::findAll();
    }

    public function actionShow($id)
    {
        $this->data->product = ProductModel::findByPK($id);
    }

}
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
    public function actionDefault($id)
    {
        $this->data->product = ProductModel::findByPK($id);
    }

    public function actionCreate()
    {
        $this->data->categories = Category::findAllTree();
    }

    public function actionStore()
    {
        if ($this->app->request->method != 'post') {
            $this->redirect('/product/index');
        }

        ProductModel::create($this->app->request->post);

        $this->redirect('/product/index');
    }

    public function actionIndex()
    {
        $this->data->products = ProductModel::findAll();
    }


}
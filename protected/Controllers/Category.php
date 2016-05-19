<?php

namespace App\Controllers;

use App\Models\Category as CategoryModel;
use T4\Mvc\Controller;

class Category extends Controller
{
    public function actionDefault()
    {
    }

    public function actionIndex()
    {
        $this->data->items = CategoryModel::findAllTree();
    }

    public function actionCreate()
    {
        $this->data->items = CategoryModel::findAllTree();
    }

    public function actionStore()
    {
        if ($this->app->request->method != 'post') {
            $this->redirect('/article');
        }
        CategoryModel::create($this->app->request->post);

        $this->redirect('/category');
    }

    public function actionDelete($id)
    {
        $category = CategoryModel::findByPK($id);

        if (empty($category)) {
            $this->redirect('/category/index');
        }

        $category->delete();

        $this->redirect('/category/index');
    }

    public function actionUp($id)
    {
        $category = CategoryModel::findByPK($id);

        if (empty($category)) {
            $this->redirect('/category/index');
        }

        $category->moveUp();

        $this->redirect('/category/index');

    }

    public function actionDown($id)
    {
        $category = CategoryModel::findByPK($id);

        if (empty($category))
            $this->redirect('/category/index');

        $category->moveDown();

        $this->redirect('/category/index');
    }

    public function actionProducts($id)
    {
       $this->data->category = CategoryModel::findByPK($id);
    }

    public function actionProductsall($id)
    {
        $category = CategoryModel::findByPK($id);

        $this->data->products = $category->getAllProducts();
    }

}
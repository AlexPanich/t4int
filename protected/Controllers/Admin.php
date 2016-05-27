<?php

namespace App\Controllers;


use App\Models\Product;
use T4\Core\MultiException;
use T4\Mvc\Controller;
use App\Models\Category as Category;

class Admin extends Controller
{
    public function actionIndexCategory()
    {
        $this->data->items = Category::findAllTree();
    }

    public function actionShowCategory($id)
    {
        $category = Category::findByPK($id);

        $this->data->products = $category->getAllProducts();
    }

    public function actionCreateCategory()
    {
        if (isset($this->app->flash->errors)) {
            $this->data->errors = $this->app->flash->errors;
            $this->data->fields = $this->app->flash->fields;
        }

        $this->data->items = Category::findAllTree();
    }

    public function actionStoreCategory()
    {
        if ($this->app->request->method != 'post') {
            $this->redirect('/');
        }
        try {
            Category::create($this->app->request->post);
        } catch(MultiException $e) {

            $this->app->flash->errors = $e;

            $this->app->flash->fields = $this->app->request->post;

            $this->redirect('/admin/category/create');
        }


        $this->redirect('/admin/category');
    }

    public function actionDeleteCategory($id)
    {
        $category = Category::findByPK($id);

        if (empty($category)) {
            $this->redirect('/admin/category');
        }

        $category->delete();

        $this->redirect('/admin/category');
    }

    public function actionUpCategory($id)
    {
        $category = Category::findByPK($id);

        if (empty($category)) {
            $this->redirect('/admin/category');
        }

        $category->moveUp();

        $this->redirect('/admin/category');

    }

    public function actionDownCategory($id)
    {
        $category = Category::findByPK($id);

        if (empty($category))
            $this->redirect('/admin/category');

        $category->moveDown();

        $this->redirect('/admin/category');
    }

    public function actionIndexProduct()
    {
        $this->data->products = Product::findAll();
    }

    public function actionShowProduct($id)
    {
        $this->data->product = Product::findByPK($id);
    }

    public function actionCreateProduct()
    {
        if (isset($this->app->flash->errors)) {
            $this->data->errors = $this->app->flash->errors;
            $this->data->fields = $this->app->flash->fields;
        }

        $this->data->categories = Category::findAllTree();
    }

    public function actionStoreProduct()
    {
        if ($this->app->request->method != 'post') {
            $this->redirect('/admin/product');
        }

        try {
            Product::create($this->app->request->post);
        } catch (MultiException $e) {
            $this->app->flash->errors = $e;

            $this->app->flash->fields = $this->app->request->post;

            $this->redirect('/admin/product/create');
        }

        $this->redirect('/admin/product');
    }

    public function actionIndex()
    {
        $this->data->products = Product::findAll();
    }

}
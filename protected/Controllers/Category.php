<?php

namespace App\Controllers;

use App\Models\Category as CategoryModel;
use T4\Mvc\Controller;

class Category extends Controller
{
    public function actionDefault()
    {
        $this->data->categories = CategoryModel::findAllTree();
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
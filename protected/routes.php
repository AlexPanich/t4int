<?php

return [
    '/article' => '//News/Index',
    '/article/create' => '//News/Create',
    '/article/store' => '//News/Store',
    '/article/edit/<1>' => '//News/Edit(id=<1>)',
    '/article/update/<1>' => '//News/Update(id=<1>)',
    '/article/delete/<1>' => '//News/Delete(id=<1>)',
    '/article/<1>' => '//News/Show(id=<1>)',

    //Админ панель
    //Раздел категории
    '/admin/category' => '//Admin/IndexCategory',
    '/admin/category/show' => '//Admin/ShowCategory',
    '/admin/category/create' => '//Admin/CreateCategory',
    '/admin/category/store' => '//Admin/StoreCategory',
    '/admin/category/delete' => '//Admin/DeleteCategory',
    '/admin/category/up' => '//Admin/UpCategory',
    '/admin/category/down' => '//Admin/DownCategory',

    //Раздел продукты
    '/admin/product' => '//Admin/IndexProduct',
    '/admin/product/show' => '//Admin/ShowProduct',
    '/admin/product/create' => '//Admin/CreateProduct',
    '/admin/product/store' => '//Admin/StoreProduct',
    '/admin/product/delete' => '//Admin/DeleteProduct',
    '/admin/product/edit' => '//Admin/EditProduct',
    '/admin/product/update' => '//Admin/UpdateProduct'


];
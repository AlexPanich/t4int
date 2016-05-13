<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class News extends Controller
{
    public function actionDefault()
    {
        $this->data->news = Article::all();
    }

    public function actionArticle($id)
    {
        try {
            $this->data->article = Article::find($id);
        } catch(E404Exception $e) {
            echo 'вывод страницы 404 - новость не найдена'; //TODO тут допилить
        }
    }
}
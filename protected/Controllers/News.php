<?php

namespace App\Controllers;

use App\Models\Article;

use T4\Mvc\Controller;

class News extends Controller
{
    public function actionDefault()
    {
    }

    public function actionIndex()
    {
        $this->data->news = Article::findAll();
    }

    public function actionShow($id)
    {
        $a = $this->data->article = Article::findByPK($id);
    }

    public function actionCreate()
    {

    }

    public function actionStore()
    {
        if ($this->app->request->method != 'post') {
            $this->redirect('/article');
        }
        Article::create($this->app->request->post);

        $this->redirect('/article');
    }

    public function actionEdit($id)
    {
        $this->data->article = Article::findByPK($id);
    }

    public function actionUpdate($id)
    {
        if ($this->app->request->method != 'post') {
            $this->redirect('/article');
        }

        $article = Article::findByPK($id);

        $article->update($this->app->request->post);

        $this->redirect('/article');
    }

    public function actionDelete($id)
    {
        $article = Article::findByPK($id);

        $article->delete();

        $this->redirect('/article');
    }
}
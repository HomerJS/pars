<?php

namespace frontend\controllers;

use frontend\models\SearchForm;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionSearch()
    {
         $model= new SearchForm;
         if($model->load(\Yii::$app->request->post()) && $model->validate())
         {
             die('456');
         }
        return $this->render('search',['model'=>$model]);
    }
}

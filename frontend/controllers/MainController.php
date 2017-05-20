<?php

namespace frontend\controllers;

use frontend\models\SearchForm;
use frontend\models\ProductForm;
use frontend\models\ValuteForm;

class MainController extends \yii\web\Controller {

    public function actionIndex() {
        $model=new ProductForm;
        $valute=new ValuteForm;
        $a=$valute->getCode();
        var_dump($a);
        die;
        return $this->render('index',['model' => $model]);
    }

    public function actionSearch() {
        $model = new SearchForm;

        if (\Yii::$app->request->post('save') == 'save') {
            $product = new ProductForm();
            $product->setInfo(\Yii::$app->request->post());
            \Yii::$app->session->setFlash('save','Value was saved');
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->getSite();
            $percent = new \backend\models\ConfigForm();
            return $this->render('search', ['model' => $model, 'percent' => $percent]);
        }

        return $this->render('search', ['model' => $model]);
    }

}

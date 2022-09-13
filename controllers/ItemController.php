<?php

namespace app\controllers;


use app\models\EntryForm;
use yii\web\Controller;

class ItemController extends Controller
{
    public function actions()
    {
        return [
            'show'=>'app\components\ToExcelAction',
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionShow($group)
    {
        echo 'nonono! this is action show!!';
    }
}
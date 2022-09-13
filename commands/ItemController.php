<?php

namespace app\commands;

use yii\console\Controller;

class ItemController extends Controller
{
    public function actions()
    {
        return [
            'show'=>'app\components\ToExcelAction',
        ];
    }
    public function actionShow($group)
    {
        echo 'nonono!!!';
    }
}
<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $group;

    public function rules()
    {
        return [
            ['group','required']
        ];
    }
}
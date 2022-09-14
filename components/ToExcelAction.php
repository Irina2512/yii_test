<?php
namespace app\components;

use app\models\Group;
use app\models\Item;
use yii\base\Action;
use yii\base\ErrorException;
use yii\data\ArrayDataProvider;
use yii2tech\spreadsheet\Spreadsheet;

class ToExcelAction extends Action
{
    public function run($group)
    {
        if(empty(Group::find()->where(['id' => $group])->all())) {
            throw new ErrorException("Категории с ID=$group не существует");
        }
        $items = Item::find()->where(['group_id'=>$group])->orderBy('rating,name')->all();

        $allModels = [];
        foreach($items as $item) {
            $allModels[] = [
                'name' => $item->name,
                'rating' => $item->rating
            ];
        }
        $columns = [];
        if(! empty($allModels)) {
            $columns = [
                [
                    'attribute' => 'name',
                ],
                [
                    'attribute' => 'rating',
                ],
            ];
        }
        $exporter = new Spreadsheet([
            'dataProvider' => new ArrayDataProvider(
                [
                    'allModels' => $allModels,
                ]
            ),
            'columns' => $columns
        ]);
        $exporter->save(__DIR__.'/../data/itemincatalog_'.$group.'.xls');
    }
}
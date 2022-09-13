<?php
namespace app\components;

use app\models\Item;
use yii\base\Action;
use yii\data\ArrayDataProvider;
use yii2tech\spreadsheet\Spreadsheet;

class ToExcelAction extends Action
{
    public function run($group)
    {
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
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Товары по категории</h1>
<?$form = ActiveForm::begin(['action'=>'index.php?r=item%2Fshow','method'=>'get'])?>
<label>Введите ID категории</label>
<br>
<input type="text" value="" name="group">
<div class="form-group">
    <?= Html::submitButton('Получить товары', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>

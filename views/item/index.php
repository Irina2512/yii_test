<?php
use yii\helpers\Html;
?>
<h1>Товары по категории</h1>
<label>Введите ID категории</label>
<br>
<?= Html::input('text','group',null,['id'=>'group'])?>
<div class="form-group">
    <?= Html::button('Получить товары',['class' => 'btn btn-primary','id' => 'to-excel-button']) ?>
</div>
<?php
$js = <<<JS
    $('#to-excel-button').click(function() {
        $.ajax({
            url: 'index.php?r=item%2Fshow',
            data: {group: $('#group').val()},
            type: 'GET',
            success: function() {
                alert('Товары сохранены в каталоге data');
            },
            error: function(err) {
                alert('Ошибка: '+err.responseText);
            }
        }); 
    });
JS;
$this->registerJS($js);



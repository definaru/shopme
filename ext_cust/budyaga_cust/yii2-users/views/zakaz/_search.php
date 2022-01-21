<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model budyaga_cust\users\models\ZakazSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zakaz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<?= $form->field($model, 'fio')->textInput() ?>
<?= $form->field($model, 'header')->textInput() ?>
<?= $form->field($model, 'tz')->textInput() ?>
<?= $form->field($model, 'price')->textInput() ?>
<?= $form->field($model, 'pay')->textInput() ?>
<?= $form->field($model, 'place')->textInput() ?>
<?= $form->field($model, 'service')->textInput() ?>
<?= $form->field($model, 'analitics')->textInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

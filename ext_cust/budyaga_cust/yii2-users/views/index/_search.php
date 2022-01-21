<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndexSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'apple_touth') ?>

    <?= $form->field($model, 'charset') ?>

    <?= $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'favicon') ?>

    <?php // echo $form->field($model, 'robots') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'slogan') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'phone2') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'adress2') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'map') ?>

    <?php // echo $form->field($model, 'google_analitiks') ?>

    <?php // echo $form->field($model, 'yandex_direct') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

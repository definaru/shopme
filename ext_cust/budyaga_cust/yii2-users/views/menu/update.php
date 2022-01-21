<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Редактируем: ' . $model->name;
$this->header = 'Обновление';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>

<?= $this->render('_form', ['model' => $model,]) ?>
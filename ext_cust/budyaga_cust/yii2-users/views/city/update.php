<?php

use yii\helpers\Html;

$this->header = 'Обновление';
$this->title = $model->c_header;
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', ['model' => $model,]) ?>
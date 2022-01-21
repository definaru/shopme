<?php

use yii\helpers\Html;

$this->title = 'Добавляем город';
$this->header = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', ['model' => $model,]) ?> 
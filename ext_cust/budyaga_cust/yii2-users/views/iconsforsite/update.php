<?php

use yii\helpers\Html;
$this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
$this->header = 'Редактор иконки';
$this->title = 'Icon';
$this->params['breadcrumbs'][] = ['label' => 'Иконки', 'url' => ['/user/iconsforsite']];
//$this->params['breadcrumbs'][] = ['label' => $model->icons, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->header;
?>

<div class="row">
    <?= $this->render('_form', ['model' => $model,]) ?> 
</div>
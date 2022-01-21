<?php

use yii\helpers\Html;
$this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);

$this->header = 'Добавление новой иконки';
$this->title = 'Создаём иконку';
$this->params['breadcrumbs'][] = ['label' => 'Иконки', 'url' => ['/user/iconsforsite']];
$this->params['breadcrumbs'][] = $this->header;
?>
<div class="row">

        <?= $this->render('_form', ['model' => $model,]) ?>        

</div>

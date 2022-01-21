<?php

use yii\helpers\Html;

    $this->header = 'Редакция';
    $this->title = 'Обновление записи';
    $this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->show_header, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->header;
?>

<?= $this->render('_form', ['model' => $model, 'list' => $list]) ?> 
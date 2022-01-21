<?php
    //use yii\helpers\Html;

    $this->header = 'Новая запись';
    $this->title = 'Добавить статью';
    $this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', ['model' => $model, 'list' => $list]) ?>
<?php
    $this->header = 'Редактируем:';
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->header;
?>
<?= $this->render('_form', ['model' => $model,]) ?>
<?php
    $this->header = 'Редактируем:';
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Редактирование';
?>
<?= $this->render('_form', ['model' => $model,]) ?>
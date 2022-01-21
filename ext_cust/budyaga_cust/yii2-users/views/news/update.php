<?php
    $this->header = 'Редакция';
    $this->title = 'Обновление: ' . $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->header;
?>
<?= $this->render('_form', ['model' => $model, 'glif' => $glif]);?>
<?php
$this->title = 'Обновить';
$this->header = $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Преимущества', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', ['model' => $model, 'glif' => $glif]) ?>
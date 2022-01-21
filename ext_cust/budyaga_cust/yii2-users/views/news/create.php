<?php
    $this->header = 'Новая запись';
    $this->title = 'Добавление';
    $this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', ['model' => $model, 'glif' => $glif]) ?>
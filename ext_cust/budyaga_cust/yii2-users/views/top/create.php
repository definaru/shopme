<?php
    $this->header = 'Новая запись';
    $this->title = 'Добавление преимуществ';
    $this->params['breadcrumbs'][] = ['label' => 'Преимущества', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
    
<?= $this->render('_form', ['model' => $model, 'glif' => $glif]) ?>
<?php
    $this->header = 'Создаём:';
    $this->title = 'Добавление объекта';
    $this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('_form', ['model' => $model,]);?>
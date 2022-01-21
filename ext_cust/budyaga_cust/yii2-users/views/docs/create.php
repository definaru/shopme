<?php
    use yii\helpers\Html;
    $this->title = 'Создать документ';
    $this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model]) ?>
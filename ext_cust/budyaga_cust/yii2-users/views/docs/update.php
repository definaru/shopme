<?php
    use yii\helpers\Html;
    $this->title = 'Редактировать документ';
    $this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model,]) ?>

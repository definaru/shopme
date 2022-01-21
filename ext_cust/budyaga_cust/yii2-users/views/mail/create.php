<?php
    use yii\helpers\Html;
    $this->title = 'Create Mail';
    $this->params['breadcrumbs'][] = ['label' => 'Mails', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model]) ?>
<?php
    use yii\helpers\Html;
    $this->title = 'Сообщение от: ' . $model->name;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Mails'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Корректировка сообщения';
?>

<?= $this->render('_form', ['model' => $model,]) ?>
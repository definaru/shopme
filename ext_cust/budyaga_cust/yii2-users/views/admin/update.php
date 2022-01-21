<?php
    use yii\helpers\Html;
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);

    $this->title = 'Управление данными пользователя';
    $this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'USERS'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->nickname, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Редактирование';
?>

<?= $this->render('_form', ['model' => $model,]) ?>
<?php
    use yii\helpers\Html;
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);

    $this->header = 'Создать пункт меню';
    $this->title = 'Новый пункт';
    $this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['/user/menu']];
    $this->params['breadcrumbs'][] = $this->header;
?>

<?= $this->render('_form', ['model' => $model,]) ?>
<?php

// use yii\helpers\Html;
$this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
$this->header = 'Новая запись';
$this->title = Yii::t('users', 'CREATE_MODEL', ['type' => $this->context->getModelTypeTitle($type)]);
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->header;
?>
<div class="auth-rule-create">

<!--    <h1><?php // Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form' . $this->context->getModelName($type), [
        'model' => $model,
        'type' => $type
    ]) ?>

</div>

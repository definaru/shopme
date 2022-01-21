<?php

//use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model budyaga_cust\users\models\AuthRule */
$this->header ='Редактирование';
$this->title = Yii::t('users', 'UPDATE_MODEL', ['type' => Yii::t('users', $this->context->getModelTypeTitle($type)), 'name' => $model->name]);
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/user/rbac/index']];
$this->params['breadcrumbs'][] = $this->header;
?>
<div class="auth-rule-update">

<!--    <h1><?php // Html::encode($this->title) ?></h1>-->

    <?= $this->render('_formAuthItem', [
        'model' => $model,
        'type' => $type
    ]) ?>

</div>

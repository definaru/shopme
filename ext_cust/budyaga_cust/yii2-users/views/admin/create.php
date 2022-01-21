<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model budyaga_cust\users\models\User */

$this->title = Yii::t('users', 'CREATE_USER');
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'USERS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

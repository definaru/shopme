<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menudefina */

$this->title = 'Редактируем: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Menudefinas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <h1 style="margin: 0;"><i class="ionicons ion-ios-compose-outline"></i> <?=$this->title;?></h1>
        </div>
        <div class="col-lg-2 right"> 
            <a href="javascript:history.back(1)"> 
                <button class="btn btn-default"><i class="ionicons ion-reply"></i> назад</button>
            </a>
        </div>
        <div class="col-lg-12"><hr></div>
        <div class="col-lg-12"><?= $this->render('_form', ['model' => $model,]) ?></div>  
    </div>
</div>

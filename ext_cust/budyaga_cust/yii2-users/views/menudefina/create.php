<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Menudefina */

$this->title = 'Создаём пункт меню';
//$this->params['breadcrumbs'][] = ['label' => 'Menudefinas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_form', ['model' => $model,]) ?>        
    </div>
</div>

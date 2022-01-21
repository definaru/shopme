<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xm-12 col-lg-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=Html::encode($this->title);?></h3>
            <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <div class="btn-group">
          <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
              <?=Yii::t('users', 'SET')?>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><?=Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id]);?></li>
            <li class="divider"></li>
            <li><?=Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], ['data' => ['confirm' => Yii::t('yii', 'Вы уверены, что хотите удалить данного пользователя?'), 'method' => 'post']]);?></li>
            <li class="divider"></li>
            <li><?= Html::a('Update', ['update', 'id' => $model->id]); ?></li>
          </ul>
        </div>
      </div>
        </div>
        <div class="box-body table_td_50">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'sort',
                    'href',
                ],
            ]) ?>
        </div>
        <div class="box-footer with-border">
            <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        </div>
    </div>
</div>

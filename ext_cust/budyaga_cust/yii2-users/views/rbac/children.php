<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
// use yii\helpers\Html;
use budyaga_cust\users\components\PermissionsTreeWidget;
use budyaga_cust\users\UsersAsset;
$this->header = 'Изменить';
$this->title = Yii::t('users', 'CHILDREN_FOR', ['modelName' => $modelForm->model->name]);
$this->params['breadcrumbs'][] = ['label' => 'RBAC', 'url' => ['/user/rbac/index']];
$this->params['breadcrumbs'][] = ['label' => $modelForm->model->name, 'url' => ['/user/rbac/update', 'id' => $modelForm->model->name, 'type' => $modelForm->model->type]];
$this->params['breadcrumbs'][] = $this->header;

UsersAsset::register($this);
?>
<!--<h1><?php // Html::encode($this->title) ?></h1>-->

<div class="row permission-children-editor">
  <div class="col-md-12 col-lg-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?=$this->header;?></h3>

        <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--          <div class="btn-group">
            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-wrench"></i></button>
            <ul class="dropdown-menu" role="menu">
                <li></li>
            </ul>
          </div>-->
<!--          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-5 children-list">
        <div class="form-group">
            <input type="text" class="form-control listFilter" placeholder="<?= Yii::t('users', 'FILTER_PLACEHOLDER')?>">
        </div>
        <?= $form->field($modelForm, 'assigned')->dropDownList(
            ArrayHelper::map(
                $modelForm->model->children,
                function ($data) {
                    return serialize([$data->name, $data->type]);
                },
                'description'
            ), ['multiple' => 'multiple', 'size' => '20', 'class' => 'col-xs-12'])
        ?>
    </div>
    <div class="col-xs-2 text-center">
        <button class="btn btn-success" type="submit" name="AssignmentForm[action]" value="assign"><span class="glyphicon glyphicon-arrow-left"></span></button>
        <button class="btn btn-success" type="submit" name="AssignmentForm[action]" value="revoke"><span class="glyphicon glyphicon-arrow-right"></span></button>
    </div>
    <div class="col-xs-5 children-list">
        <div class="form-group">
            <input type="text" class="form-control listFilter" placeholder="<?= Yii::t('users', 'FILTER_PLACEHOLDER')?>">
        </div>
        <?= $form->field($modelForm, 'unassigned')->dropDownList(
            ArrayHelper::map($modelForm->model->notChildren,
                function ($data) {
                    return serialize([$data->name, $data->type]);
                },
                'description'
            ), ['multiple' => 'multiple', 'size' => '20', 'class' => 'col-xs-12'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
<!--<div class="box-footer">
    <div class="row">
        <div class="col-sm-12">

        </div>
    </div>
</div>-->
    </div>
  </div>
    
    
  <div class="col-md-12 col-lg-4">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Дерево разрешений</h3>

        <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--          <div class="btn-group">
            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-wrench"></i></button>
            <ul class="dropdown-menu" role="menu">
				<li></li>
            </ul>
          </div>-->
<!--          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
			<h3></h3>
            <?= PermissionsTreeWidget::widget(['item' => $modelForm->model])?>
          </div>
        </div>
      </div>
<!--        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">

                </div>
            </div>
        </div>-->
    </div>
  </div>    
</div>
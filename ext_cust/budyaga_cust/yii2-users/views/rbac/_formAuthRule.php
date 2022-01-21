<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="row">

  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?=Html::encode($this->header) ?></h3>

        <div class="box-tools pull-right">
		<!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
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
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'app\rbac\MyRule']) ?>

          </div>
        </div>
      </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('users', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="javascript:history.back(1)" class="btn btn-default">отмена</a>
        <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>

</div>
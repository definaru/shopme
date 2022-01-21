<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use budyaga_cust\users\models\AuthRule;
    use yii\helpers\ArrayHelper;
//    use yii\helpers\Url;
//    use yii\rbac\Item;
?>

<div class="row">

  <div class="col-md-12">
    <div class="box box-primary">
        <?php $form = ActiveForm::begin(); ?>
      <div class="box-header with-border">
        <h3 class="box-title"><?=Html::encode($this->header) ?></h3>


      </div>
      <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">                            
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'rule_name')->dropDownList(ArrayHelper::map(AuthRule::find()->all(), 'name', 'name'), ['prompt' => Yii::t('users', 'SELECT...')]) ?>
                    <?= Html::hiddenInput('AuthItem[type]', $type) ?>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('users', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <a href="javascript:history.back(1)" class="btn btn-default">отмена</a>
                </div>
            </div>
        </div>
      <?php ActiveForm::end(); ?>
    </div>
</div>

</div>

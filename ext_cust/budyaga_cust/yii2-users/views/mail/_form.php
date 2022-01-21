<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"style="color:#d13a7a;"><i class="fa fa-comment"></i> <small><?=$this->title;?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> 
    </div>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6"><?=$form->field($model, 'img')->textInput();?></div>
            <div class="col-md-6"><?=$form->field($model, 'date')->textInput();?></div>
            <div class="col-md-4">
                <?=$form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?=$form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?=$form->field($model, 'city')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <?=$form->field($model, 'body')->textarea(['rows' => 6]) ?>
        <?=$form->field($model, 'ip')->hiddenInput()->label(false);?>
        <?=$form->field($model, 'date')->hiddenInput()->label(false);?>
    </div>
    <div class="box-footer">
        <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>        
        <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div> 
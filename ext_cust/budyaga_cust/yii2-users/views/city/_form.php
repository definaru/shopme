<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-android-pin"></i> <small><?=$this->header;?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div> 
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'c_header')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'c_obl')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer clearfix">
        <?=Html::a('<i class="ionicons ion-reply"></i> назад', 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']);?>       
        <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
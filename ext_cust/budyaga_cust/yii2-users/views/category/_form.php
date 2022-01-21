<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model budyaga_cust\users\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-edit"></i> <?=$this->header;?> <small><?= Html::encode($this->title);?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
        <?=$form->field($model, 'link')->textInput(['data-toggle' => 'tooltip', 'title' => Yii::t('users', 'LINK')]) ?>
        <?php//= $form->field($model, 'time')->textInput() ?>
    </div>
    <div class="box-footer clearfix">
        <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('users', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
        <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left'])?>        
    </div>
    <?php ActiveForm::end(); ?>
</div>
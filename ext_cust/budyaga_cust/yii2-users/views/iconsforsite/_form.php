<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="col-xm-12 col-lg-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=Html::encode($this->header);?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <div class="btn-group"></div>
            </div>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body table_td_50">

<?= $form->field($model, 'icons')->textInput(['placeholder' => 'введите код'])->label('<i class="ionicons ion-code-working"></i> Код иконки'); ?>



        </div>
        <div class="box-footer with-border">
            <a href="javascript:history.back(1)"> 
                <button class="btn btn-sm btn-default btn-flat pull-left"><i class="ionicons ion-reply"></i> назад</button>
            </a>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Save'), 
                ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
          
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>






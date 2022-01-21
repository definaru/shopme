<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use mihaildev\ckeditor\CKEditor; // настройки basic, standard, full
    use budyaga_cust\users\models\Scripts;
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-edit" style="color:#d13a7a;"></i> <?= Html::tag('small', $this->header);?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> 
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="box-body">
            <?= $form->field($model, 'header')->textInput()->label('Здесь пишем вопрос');?>
            <?= $form->field($model, 'text')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'standard', 'inline' => false,]])->label('Здесь пишем ответ');?>
            <?= $form->field($model, 'icon')->textInput()->label('Глиф или картинка');?>
            <?= $form->field($model, 'lands')->dropDownList(Scripts::listLang()); ?>
        </div>
        <div class="box-footer">
            <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
            <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use pendalf89\filemanager\widgets\FileInput;
    use budyaga_cust\users\models\Scripts;
    use mihaildev\ckeditor\CKEditor; // настройки basic, standard, full
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"style="color:#d13a7a;"><i class="fa fa-pencil"></i> <small><?=$this->title;?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> 
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <?=$form->field($model, 'img')->widget(FileInput::className(), [
                    'buttonTag' => 'button',
                    'buttonName' => 'выбрать файл',
                    'buttonOptions' => ['class' => 'btn btn-info btn-flat'],
                    'options' => ['class' => 'form-control'],
                    'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                    'thumb' => 'original',
                    'imageContainer' => '.img',
                    'pasteData' => FileInput::DATA_URL,
                    'callbackBeforeInsert' => 'function(e, data) {
                        console.log( data );
                    }',
                ]);?> 
                <?=($model->img == '') ? '' : Html::img($model->img, ['style' => 'width:100%;']);?>
                <?= $form->field($model, 'header')->textInput(['maxlength' => true])->label('Название');?>
                <?= $form->field($model, 'text')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'full', 'inline' => false]]) ?>  
                <?= $form->field($model, 'land')->dropDownList(Scripts::listLang()); ?>
                <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>        
        <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div> 
<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use mihaildev\ckeditor\CKEditor;
    use yii\helpers\ArrayHelper;
    use pendalf89\filemanager\widgets\FileInput;
    use budyaga_cust\users\models\Scripts;
    $this->registerCss('
        .thumbnail{width:100%;}
    ');    
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-images" style="color:#d13a7a;"></i> <small><?=Html::encode($this->header);?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> 
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
<div class="box box-widget collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title text-muted cp" data-widget="collapse"><small>SEO-оптимизация <sup class="text-warning">new</sup></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>		
        </div>
    </div>
    <div class="box-body">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>
</div>
        <div class="row">
                <div class="col-lg-4">
                    <div class="brblock">
<?=($model->show_photo == '') ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.str_replace('.', '-medium.', $model->show_photo).'" id="viewer"  class="thumbnail" style="width:100%;"/>';?>
                    </div>                    
                </div>
                <div class="col-lg-8">
                    <div class="brblock">
                        <?=$form->field($model, 'show_photo')->widget(FileInput::className(), [
                            'buttonTag' => 'button',
                            'buttonName' => 'выбрать файл',
                            'buttonOptions' => ['class' => 'btn btn-info btn-flat'],
                            'options' => ['class' => 'form-control', 'id' => 'perfect'],
                            'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                            'thumb' => 'original',
                            'imageContainer' => '.img',
                            'pasteData' => FileInput::DATA_URL,
                            'callbackBeforeInsert' => 'function(e, data) {
                                console.log( data );
                                var img = $("#perfect").val();
                                if(img.length === ""){

                                }else {
                                    $( "#viewer").keydown().attr("src", data.url);
                                }
                            }',
                        ]);?>                              
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'show_icon')->textInput(['value' => $model->show_icon]) ?>
                <?= $form->field($model, 'show_header')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'show_text')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'show_texter')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'full', 'inline' => false,],]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'show_news')->dropDownList(ArrayHelper::map($list,'header','header'),['prompt' => 'Выберите раздел...']);?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'lang')->dropDownList(Scripts::listLang()); ?>
            </div>
            <div class="col-lg-12">
                <?= $form->field($model, 'link')->textInput(['data-toggle' => 'tooltip', 'title' => Yii::t('users', 'LINK')])->label('Ссылка') ?> 
            </div>
        </div>
    </div>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>  
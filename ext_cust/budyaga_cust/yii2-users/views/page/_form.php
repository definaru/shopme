<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use pendalf89\filemanager\widgets\FileInput;
    use budyaga_cust\users\models\Scripts;
    use mihaildev\ckeditor\CKEditor; // настройки basic, standard, full
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-edit" style="color:#d13a7a;"></i> <small><?= Html::encode($this->header);?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> 
    </div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="box-body">
            <div class="box box-widget no-margin">
                <div class="box-header with-border">
                    <h3 class="box-title text-muted cp" data-toggle="collapse" data-target="#seo">
                        <small>SEO-оптимизация <sup class="text-warning">new</sup></small>
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#seo"><i class="ionicons ion-arrow-down-b"></i></button>		
                    </div>
                </div>
                <div id="seo" class="box-body collapse">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            <div class="row">
                <hr/>
                <div class="col-lg-4">
                    <div class="brblock">
<?=($model->slider == '') ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.str_replace('.', '-medium.', $model->slider).'" id="viewer" class="thumbnail" style="width:100%;"/>';?>
                    </div>                    
                </div>
                <div class="col-lg-8">
                    <div class="brblock">
                        <?=$form->field($model, 'slider')->widget(FileInput::className(), [
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
                <div class="brblock"><hr/></div>
            </div>
            <?= $form->field($model, 'header')->textInput(['style' => 'color:blue; font-size:30px;font-weight:bold;']) ?>
            <?= $form->field($model, 'text')->textarea(['rows' => 3]) ?>
            <?= $form->field($model, 'fulltext')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'full', 'inline' => false,],]) ?>  
            <?= $form->field($model, 'land')->dropDownList(Scripts::listLang()); ?>
            <?= $form->field($model, 'href')->textInput() ?>
        </div>
    <div class="box-footer">
        <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
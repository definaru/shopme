<?php
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\imagine\Image;
    use pendalf89\filemanager\widgets\FileInput;
    use budyaga_cust\users\models\Scripts;
    use yii\helpers\ArrayHelper;
    use mihaildev\ckeditor\CKEditor; // настройки basic, standard, full
    $this->registerCss('
        .thumbnail{width:100%;}
    ');
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$this->header;?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div> 
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
            <div class="row">
                <hr/>
                <div class="col-lg-4">
                    <div class="brblock">
<?=($model->images == '' and !file_exists($model->images)) ? Yii::t('users', 'NOPHOTOFORM') : '<img src="'.str_replace('.', '-medium.', $model->images).'" class="thumbnail" style="width:100%;"/>';?>
                    </div>                    
                </div>
                <div class="col-lg-8">
                    <div class="brblock">
                        <?=$form->field($model, 'images')->widget(FileInput::className(), [
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
                        <?php if($model->images == '' and !file_exists($model->images)) : echo '<code>Файл не существует</code>'; else : ?>
                        <div>
                            <label>Путь к файлу</label> <a href="<?=$model->images;?>" target="_blank"><?=$model->images;?></a><br/>
                            <?php
                            $size = Scripts::get_filesize (Yii::getAlias('@webroot', $model->images)); 
                            $fp = image_type_to_mime_type(exif_imagetype (Yii::getAlias(Scripts::site($result).''.$model->images)));
                            $type = exif_imagetype (Yii::getAlias(Scripts::site($result).''.$model->images));
                          
                            echo '<label>Размер файла:</label> '.$size.'<br/>'; // выводим результат с размером
                            echo '<label>Тип файла:</label> '.$fp.'<br/>'; // выводим результат с размером
                            $f = Scripts::site($result).''.$model->images;
                            switch ($type)
                              {case 1:   //   gif -> jpg
                                 $src = imagecreatefromgif($f);
                                 break;
                               case 2:   //   jpeg -> jpg
                                 $src = imagecreatefromjpeg($f); 
                                 break;
                               case 3:  //   png -> jpg
                                 $src = imagecreatefrompng($f);
                                 break;
                              }  
                            $w_src = imagesx($src); 
                            $h_src = imagesy($src);
                            echo '<label>Разрешение файла:</label> '.$w_src.'x'.$h_src.' px';
                            ?>                            
                        </div> 
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="brblock"><hr/></div>
            </div>
        
        <div class="form-group">
            <label class="control-label">Глиф</label>
            <div class="input-group">
                <span class="input-group-addon bg-navy" style="border-color: #001f3f;"><?=$model->img;?></span>
                <?= Html::input('text', '', $model->img, ['class' => 'form-control']);?>
                <span class="input-group-btn">
                    <button class="btn bg-black" data-toggle="modal" data-target="#myModal" type="button">Выберите глиф</button>
                </span>
            </div>
        </div>
        
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Выберите иконку</h4>
      </div>
        <div class="modal-body">
            <div class="row">
<?=$form->field($model, 'img',
        ['template'=>'<div class="col-md-12 col-xs-12">{input}</div><div class="col-md-12 col-xs-12">{hint}</div>'])->radioList(ArrayHelper::map($glif, 'icons', 'icons'),
        ['item' => function($index, $label, $name, $checked, $value) {
                return '<label class="btn btn-white btn-default glifeformat col-xs-2">'.Html::radio($name, $checked, ['value'  => $value, 'autocomplete'=>'off']) . $label . '</label>';
            }
        ], ['tag' => 'div', 'class' => 'btn-group', 'data-toggle' => 'buttons',])->label(false);?>            
            </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">выбрать</button>
        </div>
    </div>
  </div>
</div>
        
        
        <?=$form->field($model, 'img_mini')->textInput(['value' => Yii::$app->user->identity->nickname]);?>
        <?=$form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?=$form->field($model, 'intro_text')->textarea(['rows' => 6]) ?>
        <?=$form->field($model, 'full_text')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'standard', 'inline' => false,],]) ?>
        <?=$form->field($model, 'video')->textarea(['rows' => 6]) ?>
        <?=$form->field($model, 'new_post')->dropDownList(['0' => 'нет','1' => 'да'],['prompt' => 'Выберите...']) ?>      
        <?=$form->field($model, 'link')->textInput(['data-toggle' => 'tooltip', 'title' => Yii::t('users', 'LINK')]) ?>
    </div>
    <div class="box-footer">
        <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : 
            Yii::t('yii', 'Update'), 
            ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) 
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>  
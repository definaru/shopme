<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    // use budyaga_cust\users\models\Scripts;
    use pendalf89\filemanager\widgets\FileInput;
$info = 'при выборе этой функции, содержимое сайта нельзя будет выделять и копировать, смотреть исходный код и скачивать картинки';
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$this->header;?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
	<div class="box-body">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title text-muted cp" data-toggle="collapse" data-target="#seo">
                        <small>SEO-оптимизация <sup class="text-warning">new</sup></small>
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#seo"><i class="ionicons ion-arrow-down-b"></i></button>		
                    </div>
                </div>
                <div id="seo" class="box-body collapse">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model, 'title')->textInput(['placeholder' => 'введите заголовок вкладки']); ?>
                        </div>
                        
                        
                        <div class="col-lg-4">
                            <?=$form->field($model, 'apple_touth')->widget(FileInput::className(), [
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
                        </div>
                        <div class="col-lg-4">
                            <?=$form->field($model, 'logo')->widget(FileInput::className(), [
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
                        </div>
                        <div class="col-lg-4">
                            <?=$form->field($model, 'favicon')->widget(FileInput::className(), [
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
                        </div>
                        
                        
                        
                        <div class="col-lg-12">
<?= $form->field($model, 'charset')->dropDownList(['utf-8' => 'Юникод (UTF-8)', 'windows-1251' => 'Кириллица(Windows-1251)', 'koi8-r'=>'Кириллица (KOI8-R)', 'koi8-u'=>'Кириллица (KOI8-U)'],['prompt' => 'Выберите кодировку...']); ?>
<?= $form->field($model, 'lang')->dropDownList(['ru' => 'Русский', 'en' => 'Английский', 'ua'=>'Украинский', 'fr'=>'Французкий'],['prompt' => 'Выберите язык...']); ?>                 
<?= $form->field($model, 'robots')->dropDownList(['index, follow' => 'индексировать, сопровождать', 'noindex, nofollow' => 'неиндексировать, несопровождать', 'noindex, follow'=>'неиндексировать, сопровождать', 'index, nofollow'=>'индексировать, несопровождать'],['prompt' => 'Выберите индексацию поисковыми роботами...']); ?>

                            <?= $form->field($model, 'keywords')->textarea(['rows' => 3]) ?>
                            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                        </div>
                    </div>         
                </div>     
            </div>	
		<?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'slogan')->textInput(['maxlength' => true]) ?>
            
		<?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'adress2')->textInput(['maxlength' => true]) ?>
		
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6"><?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6"><?= $form->field($model, 'email2')->textInput(['maxlength' => true]) ?></div>
            </div>
		

            <div class="row">
                <div class="col-md-4"><?= $form->field($model, 'inn')->textInput();?></div>
                <div class="col-md-4"><?= $form->field($model, 'kpp')->textInput();?></div>
                <div class="col-md-4"><?= $form->field($model, 'ogrn')->textInput();?></div>
            </div>
  
            
		<?= $form->field($model, 'meta')->textarea(['rows' => 6]) ?>
		<?= $form->field($model, 'map')->textarea(['rows' => 6]) ?>
		<?= $form->field($model, 'google_analitiks')->textarea(['rows' => 6]) ?>
		<?= $form->field($model, 'yandex_direct')->textarea(['rows' => 6]) ?>
               
		<?= $form->field($model, 'block')->dropDownList(['0' => 'не защищать','1' => 'защитить'],['prompt' => 'Выберите...', 'data-toggle' => 'tooltip', 'title' => $info]); ?> 	

    </div>
    <div class="box-footer clearfix">
        <?=Html::a('<i class="ionicons ion-reply"></i> назад', 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']);?>       
        <?= Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>	
    <?php ActiveForm::end(); ?>
</div>
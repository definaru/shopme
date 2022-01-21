<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use pendalf89\filemanager\widgets\FileInput;
    use budyaga_cust\users\models\Scripts;
    use yii\bootstrap\Tabs;
    use mihaildev\ckeditor\CKEditor; // настройки basic, standard, full
    use budyaga_cust\users\models\Category;
    use kartik\file\FileInput as DefinaFileInput;
    $cat = Category::find()->all();
    $dollar = ['template' => '{label}<div class="input-group">{input}<span class="input-group-addon">$</span></div>{error}'];
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-edit"></i> <?=$this->header;?> <small><?= Html::encode($this->title);?></small></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
                <?= $form->field($model, 'keywords')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
            </div>
        </div> 
            <div class="row">
                <hr/>
                <div class="col-lg-4">
                    <div class="brblock">
                        <?=($model->img == '' and !file_exists($model->img)) ? 
                            Yii::t('users', 'NOPHOTOFORM') : 
                            '<img src="'.str_replace('.', '-medium.', $model->img).'" id="viewer" class="thumbnail" style="width:100%;"/>'
                        ;?>
                    </div>                    
                </div>
                <div class="col-lg-8">
                    <div class="brblock">
                        <?=$form->field($model, 'img')->widget(FileInput::className(), [
                            'buttonTag' => 'button',
                            'buttonName' => 'выбрать файл',
                            'buttonOptions' => ['class' => 'btn bg-maroon btn-flat'],
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
                        
                        <?php /* =$form->field($model, 'fullimg')->widget(FileInput::className(), [
                            'buttonTag' => 'button',
                            'buttonName' => 'выбрать файл',
                            'buttonOptions' => ['class' => 'btn bg-maroon btn-flat'],
                            'options' => ['class' => 'form-control'],
                            'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                            'thumb' => 'original',
                            'imageContainer' => '.img',
                            'pasteData' => FileInput::DATA_URL,
                            'callbackBeforeInsert' => 'function(e, data) {
                                console.log( data );
                            }',
                        ]); */ ?>
                        
                        
                        <?=$form->field($model, 'pdf')->widget(FileInput::className(), [
                            'buttonTag' => 'button',
                            'buttonName' => 'выбрать файл',
                            'buttonOptions' => ['class' => 'btn bg-maroon btn-flat'],
                            'options' => ['class' => 'form-control'],
                            'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                            'thumb' => 'original',
                            'imageContainer' => '.img',
                            'pasteData' => FileInput::DATA_URL,
                            'callbackBeforeInsert' => 'function(e, data) {
                                console.log( data );
                            }',
                        ]);?>


                        <hr/>
                        <?= $form->field($model, 'filter')->dropDownList(
                            [
                                'Сайт-Визитка' => 'Сайт-Визитка', 
                                'Корпораивный сайт' => 'Корпоративный сайт',
                                'Интернет-Магазин' => 'Интернет-Магазин',
                                'Landing Page' => 'Landing Page'
                            ], 
                            ['prompt' => 'Выберите тип портфолио...']
                        );?>
                    </div>
                </div>
            </div>      

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>
        
            <?=Tabs::widget([
                'items' => [
                    [
                        'label' => 'RU',
                        'content' => $form->field($model, 'text')->textarea(['rows' => 6]).
                        $form->field($model, 'descs')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'full', 'inline' => false]]),
                        'active' => true
                    ],
                    [
                        'label' => 'EN',
                        'content' => $form->field($model, 'en_text')->textarea(['rows' => 6])->label('Краткое описание').
                        $form->field($model, 'en_descs')->widget(CKEditor::className(),['editorOptions' => ['preset' => 'full', 'inline' => false]])->label('Описание'),
                    ],
                ]
            ]);?>    
            
            <div class="row">
                <div class="col-md-4"><?= $form->field($model, 'sort')->textInput();?></div>        
                <div class="col-md-4"><?= $form->field($model, 'price', $dollar)->textInput() ?></div>
                <div class="col-md-4">
                    <?= $form->field($model, 'reception')->dropDownList(['yes' => 'да', 'no' => 'нет'], ['prompt' => 'Отобразить на главной странице?...'])->label('Отобразить на главной странице?');?>
                </div>
            </div>

        <div style="display: none">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'head')->textInput(['value' => '0']);?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map($cat,'header','header'),['prompt' => 'Выберите...']);?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'shelf_life')->dropDownList(['фунты' => 'фунты', 'метры' => 'метры'], ['prompt' => 'Выберите...']) ?>
                </div>
            </div>
            <?= $form->field($model, 'doza')->textInput(['type' => 'hidden'])->label(false);?>        
            <?= $form->field($model, 'nalog')->textInput(['type' => 'hidden'])->label(false);?> 
            <?= $form->field($model, 'manufacture')->textInput(['type' => 'hidden'])->label(false);?>  
        
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'mon_profitability', $dollar)->textInput();?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'tsj', $dollar)->textInput();?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'time', $dollar)->textInput();?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><?= $form->field($model, 'alhogole', $dollar)->textInput() ?></div>
            </div>     
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'map')->textInput(['placeholder' => 'Введите адрес объекта']);?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'baths')->textInput(['placeholder' => 'Введите количество ванных комнат']);?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'beds')->textInput(['placeholder' => 'Введите количество спальных комнат']);?>
                </div>
            </div>            
        </div>


        
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="box-footer clearfix">
            <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('users', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
            <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left'])?>        
        </div>
    <?php ActiveForm::end(); ?>
</div>
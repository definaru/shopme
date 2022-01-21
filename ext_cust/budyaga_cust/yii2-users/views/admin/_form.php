<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use budyaga_cust\users\models\User;
    use budyaga_cust\users\models\Scripts;
    $get = Yii::$app->request->get();
    ($get['photo'] == 'error') ? $x = ' ahtung' : $x = '';
    $this->registerCss('
        .thumbnail{width:100% !important;}
        .ahtung{
            border: 2px solid red;
        }
    ');
?>
<div class="box box-primary box-price-background-lite-grey">

    <?php $form = ActiveForm::begin(); ?>
	
	
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <h3 class="box-title">Фотография</h3>
                        <div class="box-tools pull-right">
<?=($model->photo == '') ? '' : 
    Html::a('<i class="fa fa-times"></i>', ['del', 'id' => $model->id], 
    [
        'data-toggle' => 'tooltip', 
        'title' => 'удалить фотографию?', 
        'class' => 'btn btn-box-tool', 
        'data' => ['data-method' => 'post', 'confirm' => 'Вы действительно хотите удалить свою фотографию ?']
    ]);?>                             
                        </div>
                       
                    </div>
                    <div class="box-body text-center<?=$x?>">
                        <?=($model->photo == '' || $model->photo == NULL) ? Yii::t('users', 'NOPHOTOFORM') : 
                            '<img src="/'.$model->photo.'" style="width: 100%;" class="thumbnail"/>';
                        ?>
                        <?=($get['photo'] == 'error') ? Html::tag('code', 'Отсутствует фотография').'<br/><br/>' : '';?>

<?=($model->photo == '' || $model->photo == NULL) ? 
    $form->field($model, 'photo')->fileInput(['value' => $model->photo])->label(false) : 
    $form->field($model, 'photo')->textInput(['value' => $model->photo, 'type' => 'hidden'])->label(false)
;?>            
                        
                    </div>                        
                </div>  
            </div>
            <div class="col-lg-8">
                <div class="box box-widget">
                    <div class="box-header with-border">
                      <h3 class="box-title"><?= Yii::t('users', 'PERSONAL_INFO')?></h3>
                    </div>
                    <div class="box-body">
                        <?= $form->field($model, 'nickname')->textInput(['maxlength' => 255]) ?>
                        <?= $form->field($model, 'contact_tel')->textInput(['maxlength' => 255]) ?>
                        <?= $form->field($model, 'contact_skype')->textInput(['maxlength' => 255]) ?>
                        <?= $form->field($model, 'contact_icq')->textInput(['maxlength' => 255]) ?>                                
                    </div>
                </div>                         
            </div>            
        </div>


		<?//= $form->field($model, 'sex')->dropDownList(User::getSexArray()); ?>
		<div class="row">
                    <div class="col-lg-6">
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?= Yii::t('users', 'SYS_DATA')?></h3>
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Параметры доступа"><i class="fa fa-question-circle-o"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <?= $form->field($model, 'email')->textInput(['class' => Scripts::getErrorMailMessage()])->label(Scripts::ErrorMail());?>
                                <?= $form->field($model, 'password_hash')->textInput(['class' => Scripts::getErrorMailMessage(), 'placeholder' => 'Если изменять не нужно, оставьте пустым', 'value' => ''])->label((Scripts::getErrorMail() == false) ? '<span class="text-danger">Cмените ваш пароль</span>' : 'Пароль');?>
				<input type="hidden" name="User[password_hash_old]" value="<?=$model->password_hash?>">
                                <?= $form->field($model, 'status')->dropDownList(User::getStatusArray()); ?>
                                <?php // echo $form->field($model, 'status_pay')->dropDownList(User::getStatusPayArray()); ?>
                                <?= $form->field($model, 'status_pay')->textInput(['type' => 'hidden'])->label(false); ?>
                            </div>
                        </div>                        
                    </div>                    
                   
                    <div class="col-lg-6">
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?= Yii::t('users', 'PAY_INFO')?></h3>
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Информация для приёма платежей"><i class="fa fa-question-circle-o"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <?= $form->field($model, 'pay_wm')->textInput(['maxlength' => 255]) ?>
                                <?= $form->field($model, 'pay_yad')->textInput(['maxlength' => 255]) ?>
                                <?= $form->field($model, 'pay_qiwi')->textInput(['maxlength' => 255]) ?>
                                <?= $form->field($model, 'pay_other')->textInput(['maxlength' => 255]) ?>                             
                            </div>
                        </div>                        
                    </div>                    
                </div>                    
        </div>
        <div class="box-footer">
            <?=Html::submitButton($model->isNewRecord ? Yii::t('yii', 'CREATE') : Yii::t('users', 'UPDATE'), 
                    ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-left' : 'btn btn-primary btn-flat pull-left']) ?>
            <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-right'])?>
        </div>    
    </div>



    <?php ActiveForm::end(); ?>



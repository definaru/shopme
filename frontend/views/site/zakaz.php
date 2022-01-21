<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\widgets\MaskedInput;
    use budyaga_cust\users\models\Scripts;
    use yii\helpers\ArrayHelper;
    $this->title = 'Стол заказов';
    $ticket = Yii::$app->request->post()['Zakaz']['date'];
    $this->registerCss('
        .help-block.help-block-error {
            margin: 0;
            font-size: 12px;
            color: red;
        }
    ');
?>
        <div id="rev_slider_35_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider9"
                     data-source="gallery"
                     style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center" style="margin-top:150px;">
                        <?=Html::tag('h2', $this->title);?>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?> 
                            <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>    
                                <strong style="font-weight: bold;">Success!</strong> 
                                Ваш билет <a href="/ticket/<?=$ticket;?>">№<?=$ticket;?></a>. 
                                <br/>Ваша заявка принята. Пожалуйста, запишите номер вашего заказа, он вам ещё пригодится.
                            </div>
                        <?php else: ?> 
                            <?php $form = ActiveForm::begin(['options' => ['id' => 'zakaz', 'data-pjax' => true, 'enctype' => 'multipart/form-data']]) ?>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <?= $form->field($model, 'fio')->textInput(['placeholder' => 'Ваше Ф.И.О.'])->label(false);?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <?= $form->field($model, 'phone')->widget(
                                            MaskedInput::className(), 
                                            ['mask' => '+7(999) 999-99-99']
                                        )->textInput(['placeholder' => 'Телефон мобильный'])->label(false);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <?= $form->field($model, 'email')->widget(
                                            MaskedInput::className(), 
                                            ['clientOptions' => ['alias' => 'email']]
                                        )->textInput(['placeholder' => 'Ваш Email'])->label(false);?>                                        
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($model, 'analitics')->textArea(['id' => 'full', 'style' => 'display:none;'])->label(false);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($model, 'date')->hiddenInput()->label(false);?>
                                    </div>        
                                </div>
                                    
                                <?= $form->field($model, 'header')->dropDownList(ArrayHelper::map($models, 'header', 'header'), ['prompt' => 'Выберите вид услуги'])->label('Выберите вид услуги');?>
                        
                                <?= Html::submitButton(Yii::t('yii', 'Send', ['icon' => '<i class="fa fa-paper-plane-o"></i>']), ['class' => 'btn btn-danger btn-block btn-lg', 'name' => 'contact-button']) ?>
                            <?php ActiveForm::end(); ?> 
                        <?php endif; ?> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>


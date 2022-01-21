<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $params = Yii::$app->user->identity;
    $this->title = 'Check out our public offer';
    $act = 'swal({     
        title: "'.Yii::t('yii', 'Congratulations').'", 
        text: "Thank you {$params->nickname} for choosing our company. Data sent successfully for verification. You will find out about the results by e-mail or SMS", 
        type: "success"
    });';
    (Yii::$app->session->hasFlash('YES_AGREE')) ? $this->registerJs($act) : '';
?>
<div class="content-wrapper">
    <div class="content-body">
        <section id="dashboard-analytics">
            <?php if (Yii::$app->session->hasFlash('YES_AGREE')) : else: ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card bg-analytics text-white">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="/panel/images/elements/decore-left.png" class="img-left" alt="card-img-left">
                                <img src="/panel/images/elements/decore-right.png" class="img-right" alt="card-img-right">
                                <div class="avatar avatar-xl bg-primary shadow mt-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-award white font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <?=Html::tag('h1', $params->nickname.', congratulations on your successful registration.', ['class' => 'mb-2 text-white']);?>
                                    <?=Html::tag('p', $this->title, ['class' => 'm-auto w-75']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </section>
        
        <div class="card">
            <div class="card-header"></div>
            <div class="card-content">
                <?php if (Yii::$app->session->hasFlash('YES_AGREE')) : ?>
<div class="alert alert-success fade in alert-dismissible show text-center m-5" style="margin-top:18px;">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>    <strong>Success!</strong> Thank you <?=$params->nickname;?> for choosing our company. Data sent successfully for verification. You will find out about the results by e-mail or SMS
</div>
                <?php else: ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="mt-3 mb-3 text-center"><?=$model->header;?></h2>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="card-text">
                        <div class="row panel-body">
                            <div class="col-md-6 offset-md-3 text-justify pb-4">
                                <?=$model->text;?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white text-center">
                        <div class="d-flex justify-content-center">
                            <div class="p-1">
                                <?php $form = ActiveForm::begin(); ?>
                                    <div class="d-none">
                                    <?= $form->field($send, 'name' )->textInput()->label(false) // hiddenInput ?>     
                                    <?= $form->field($send, 'email')->textInput()->label(false) ?> 
                                    </div>
                                    <?= Html::submitButton('<i class="feather icon-check-square"></i> Accept', ['class' => 'btn btn-success waves-effect waves-light']) ?>
                                <?php ActiveForm::end(); ?>                                
                            </div>
                            <div class="p-1">
                                <a class="btn btn-danger waves-effect waves-light" href="/logout" data-method="post"><i class="feather icon-x-square"></i> Decline</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
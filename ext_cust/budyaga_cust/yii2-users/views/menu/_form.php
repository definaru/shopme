<?php    use yii\helpers\Html;    use yii\widgets\ActiveForm;?>    <div class="box">        <div class="box-header with-border">            <h3 class="box-title"><?=Html::encode($this->header);?></h3>            <div class="box-tools pull-right">                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                <div class="btn-group"></div>            </div>        </div>    <?php $form = ActiveForm::begin(); ?>            <div class="box-body table_td_50">            <div class="row">                <div class="col-md-5">                    <?= $form->field($model, 'name')->textInput() ?>                </div>                <div class="col-md-5">                    <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>                </div>                <div class="col-md-2">                    <?= $form->field($model, 'sort')->textInput(['type' => 'number', 'min' => 1]) ?>                </div>            </div>        </div>        <div class="box-footer with-border">            <?=Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']);?>            <?=Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('users', 'UPDATE'),                 ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']);?>        </div>        <?php ActiveForm::end(); ?>    </div>
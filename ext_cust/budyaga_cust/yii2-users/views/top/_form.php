<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use budyaga_cust\users\models\Scripts;
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
        <div class="form-group">
            <label class="control-label">Глиф</label>
            <div class="input-group">
                <span class="input-group-addon bg-navy" style="border-color: #001f3f;"><?=$model->icon;?></span>
                <?= Html::input('text', '', $model->icon, ['class' => 'form-control']);?>
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
                <?=$form->field($model, 'icon',
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
    
   
        <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'land')->dropDownList(Scripts::listLang()); ?>
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
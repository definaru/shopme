<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use budyaga_cust\users\models\Iconsforsite;
	use yii\helpers\ArrayHelper; // 
	$glif = Iconsforsite::find()->filterWhere(['like', 'icons', 'soc'])->all();
?>
<div class="box box-default">
	<div class="box-header with-border">
            <h3 class="box-title"><?=$this->header;?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
	</div>
    <?php $form = ActiveForm::begin(); ?>    
    <div class="box-body">
        <div class="row">
            <div class="col-md-2">
<div class="form-group field-folliw-icon required">
    <?=Html::tag('label', 'Иконка', ['class' => 'control-label', 'for' => 'folliw-icon']);?><br/>
    <a class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#myModal">
        Выберите иконку
    </a>
    <div class="help-block"></div>            
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
        [
            'item' => function($index, $label, $name, $checked, $value) {
                return '<label class="btn btn-white btn-default glifeformat col-xs-2">' . Html::radio($name, $checked, ['value'  => $value, 'autocomplete'=>'off']) . $label . '</label>';
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
                

            </div>
            <div class="col-md-1"><?=(!$model->icon) ? '' : Html::tag('div', $model->icon, ['class' => 'btn bg-navy btn-block', 'style' => 'margin-top: 25px;']);?></div>
            <div class="col-md-9">
                <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'target')->dropDownList(['' => 'открывать ссылку в текущем окне', '_blank' => 'Открывать ссылку в новом окне'],['prompt' => 'Выберите...']) ?>               
            </div>
        </div>

    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('users', 'CREATE') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat pull-right' : 'btn btn-primary btn-flat pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $this->header = 'Загрузка файлов';
    $this->title = 'SEO - оптимизация';
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->header;    
?>
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cloud-upload" style="color: #d13a7a;"></i> Загрузка файлов</h3>
    </div>
    <div class="box-body">
        
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <?= $form->field($model, 'image', ['template' => '{label}<div class="input-group">{input}<span class="input-group-btn">'.Html::submitButton('<i class="fa fa-download"></i> загрузить', ['class' => 'btn btn-primary btn-flat btn-block']).'</span></div>{error}'])->fileInput(['class' => 'btn btn-default btn-flat btn-block'])->label('Выберите файл *');?>
        <?php ActiveForm::end() ?>
        <div class="brblock"></div>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Информация</h4>
            Для загрузки, разрешены файлы, только в формате <code>.txt</code> и <code>.xml</code>
        </div>
    </div>
</div>



<?php
use dosamigos\fileupload\FileUploadUI;
use pendalf89\filemanager\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel pendalf89\filemanager\models\Mediafile */

?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 text-left">
            <header id="header"><i class="ionicons ion-ios-cloud-upload"></i> <?= Module::t('main', 'Upload manager') ?></header>
        </div>
        <div class="col-md-6 text-right">
            <?= Html::a('← ' . Module::t('main', 'Back to file manager'), ['file/filemanager'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>


    <div id="uploadmanager">
        <div class="row">
            <div class="col-md-12">
            <p class="text-muted">Выберите картинку:</p>
                <?= FileUploadUI::widget([
                    'model' => $model,
                    'attribute' => 'file',
                    'clientOptions' => [
                        'autoUpload'=> Yii::$app->getModule('filemanager')->autoUpload,
                    ],
                    'clientEvents' => [
                        'fileuploadsubmit' => "function (e, data) { data.formData = [{name: 'tagIds', value: $('#filemanager-tagIds').val()}]; }",
                    ],
                    'url' => ['upload'],
                    'gallery' => false,
                    'formView' => '/file/_upload_form',
                ]) ?>            
            </div>

        </div>
    </div>    
</div>



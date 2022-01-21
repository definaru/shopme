<?php
use yii\helpers\Html;
use pendalf89\filemanager\Module;
use pendalf89\filemanager\assets\FilemanagerAsset;


$this->title = Yii::t('yii', 'File manager');
$this->params['breadcrumbs'][] = $this->title;

$assetPath = FilemanagerAsset::register($this)->baseUrl;
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="ionicons ion-images"></i> <?=Yii::t('yii', 'File manager module'); ?></h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div id="defina" class="text-center">
                    <h2>
                        <?= Html::a('<i class="ionicons ion-android-folder-open"></i><div class="brblock"></div><h1 class="text-info">'.Yii::t('yii', 'Files').'</h1>', 
                            ['file/index'], ['class' => 'btn btn-primary btn-flat']);
                        ?>
                    </h2>
                </div>
            </div>
            <div class="col-md-4">
                <div id="defina" class="text-center">
                    <h2>
                        <?=Html::a('<i class="ionicons ion-settings"></i><div class="brblock"></div><h1>'.Yii::t('yii', 'Settings').'</h1>', 
                           ['default/settings'], ['class' => 'btn btn-primary btn-flat']);
                        ?>
                    </h2>
                </div>
            </div>
            <div class="col-md-4">
                <div id="defina" class="text-center">
                    <h2>
                        <?=Html::a('<i class="fa fa-code"></i><div class="brblock"></div><h1>'.Yii::t('yii', 'Repository').'</h1>', 
                           ['default/repository'], ['class' => 'btn btn-primary btn-flat']);
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
    use pendalf89\filemanager\Module;
    use pendalf89\filemanager\assets\ModalAsset;
    use yii\helpers\Url;

    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);

    $this->title = Yii::t('yii', 'Files');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'File manager'), 'url' => ['default/index']];
    $this->params['breadcrumbs'][] = $this->title;

    ModalAsset::register($this);
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><span style="color:#d13a7a;">
            <i class="ionicons ion-images"></i></span> <small><?=Yii::t('yii', 'File manager') ?></small>
        </h3>
    </div>
    <div class="box-body">
        <iframe src="<?= Url::to(['file/filemanager']) ?>" id="post-original_thumbnail-frame" frameborder="0" role="filemanager-frame"></iframe>
    </div>   
</div>

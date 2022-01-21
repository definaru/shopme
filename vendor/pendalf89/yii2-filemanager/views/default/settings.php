<?php
    use pendalf89\filemanager\Module;
    use kartik\alert\Alert;
    use yii\helpers\Html;
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);

    $this->title = Yii::t('yii', 'Settings');
    $this->params['breadcrumbs'][] = ['label' => Module::t('main', 'File manager'), 'url' => ['default/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Module::t('main', 'Thumbnails settings') ?></h3>
    </div>
    <div class="box-body">      
            <?php if (Yii::$app->session->getFlash('successResize')) : ?>
                <?= Alert::widget([
                    'type' => Alert::TYPE_SUCCESS,
                    'title' => Module::t('main', 'Thumbnails sizes has been resized successfully!'),
                    'icon' => 'glyphicon glyphicon-ok-sign',
                    'body' => Module::t('main', 'Do not forget every time you change thumbnails presets to make them resize.'),
                    'showSeparator' => true,
                ]); ?>
            <?php endif; ?>
            <p><?= Module::t('main', 'Now using next thumbnails presets') ?>:</p>
            <ul>
                <?php foreach ($this->context->module->thumbs as $preset) : ?>
                    <li><strong><?= $preset['name'] ?>:</strong> <?= $preset['size'][0] .' x ' . $preset['size'][1] ?></li>
                <?php endforeach; ?>
            </ul>
            <p><?= Module::t('main', 'If you change the thumbnails sizes, it is strongly recommended to make resize all thumbnails.') ?></p>
    </div>
    <div class="box-footer">
        <?= Html::a(Module::t('main', 'Do resize thumbnails'), ['file/resize'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>
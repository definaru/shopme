<?php
    use pendalf89\filemanager\Module;
    use kartik\alert\Alert;
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);

    $this->title = Yii::t('yii', 'Repository');
    $this->params['breadcrumbs'][] = ['label' => Module::t('main', 'File manager'), 'url' => ['default/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Список папок и файлов</h3>
    </div>
    <div class="box-body">
        <?php 
            if( $handle = opendir(Yii::$app->basePath . '/web/')) {
              while(false !== ( $file = readdir($handle) ))
              { 
                if ($file!="." && $file!="..")
                    if (is_file($file)){
                        $info = new SplFileInfo($file);
                        echo 
                        '<button class="btn btn-default btn-block" style="text-align: left;"> 
                            '.Scripts::typeFile($info->getExtension()).' '.iconv('Windows-1251', 'UTF-8', $file).'
                        </button>';
                    } else {
                        echo '<button class="btn btn-warning btn-block" style="text-align: left;">
                                <i class="ionicons ion-folder" style="color: #000;"></i> '.iconv('Windows-1251', 'UTF-8', $file).'
                            </button>';
                    }
              }
              closedir($handle);  
            }        
        ?>
        
    </div>
    <div class="box-footer">
        
    </div>
</div>    
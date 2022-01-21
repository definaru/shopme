<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppFrontAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://glyphsearch.com/bower_components/font-awesome/css/all.min.css',
        'https://glyphsearch.com/bower_components/ionicons/css/ionicons.css',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css',
        '/task/css/plugin.min.css',
        '/task/css/defina.min.css',
        '/task/css/swiper.min.css',
        '/task/style.css',
        '/task/distortion-effect/css/base.css',
    ];
    public $js = [             
        //'/task/js/script.min.js',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js',
        '/task/js/swiper.min.js',
        '/task/js/defina.min.js',
        '/task/js/define.browse.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    
    
    public function init()
    {
        if (\Yii::$app->controller->action->id == 'index') {
            $this->js[] = '/task/js/plugins.min.js';
            $this->js[] = '/task/js/script.min.js';
            $this->js[] = '/task/distortion-effect/js/three.min.js';
            $this->js[] = '/task/distortion-effect/js/imagesloaded.pkgd.min.js';
            $this->js[] = '/task/distortion-effect/js/hover.js';
        }
        if (\Yii::$app->controller->action->id !== 'index') {
            $this->js[] = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js';
            $this->js[] = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js';
        }
    }
    
}
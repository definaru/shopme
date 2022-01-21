<?php
namespace dmstr_cust\web;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminLteAsset extends BaseAdminLteAsset
{
    public $basePath = '@webroot';
    //public $sourcePath = '@vendor/../ext_cust/almasaeed2010_cust/adminlte/dist';
    public $baseUrl = '@web';  
    
    public $css = [
        'css3/css/sweetalert.css',
        'css3/css/bootstrap.css',
        'css3/css/AdminLTE.min.css',
        //'css3/iCheck/all.css',
        'css3/css/style.css',
        'css3/css/skins/_all-skins.min.css',
        //'css3/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'css3/prism.css',
        'css3/main.css',
    ];      
    
    public $js = [
        'css3/js/plugins/sweetalert/sweetalert.min.js',
        'css3/js/yii_overrides.js',
        '/light/js/bootstrap.bundle.min.js', 
        'css3/js/bootstrap.js',
        'css3/js/app.min.js',
        //'css3/iCheck/icheck.min.js',
        //'css3/js/script.js',
    ];
    public $depends = [
        //'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = '_all-skins';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Append skin color file if specified
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            //$this->css[] = sprintf('css/skins/%s.min.css', $this->skin);
        }

        parent::init();
    }
}

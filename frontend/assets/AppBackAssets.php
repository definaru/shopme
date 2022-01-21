<?php

namespace frontend\assets;


class AppBackAssets extends \yii\web\AssetBundle
{
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600',
        '/panel/vendors/css/vendors.min.css',
        '/panel/vendors/css/file-uploaders/dropzone.min.css',
        '/panel/vendors/css/tables/datatable/datatables.min.css',
        '/panel/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css',
        
        '/panel/vendors/css/extensions/tether-theme-arrows.css',
        '/panel/vendors/css/extensions/tether.min.css',
        '/panel/vendors/css/extensions/shepherd-theme-default.css',
        '/panel/vendors/css/ui/prism.min.css',
        '/panel/vendors/css/ui/prism-treeview.css',
        '/panel/css/bootstrap.min.css',
        '/panel/css/bootstrap-extended.min.css',
        '/panel/css/colors.min.css',
        '/panel/css/components.min.css',
        '/panel/css/themes/dark-layout.min.css',
        '/panel/css/themes/semi-dark-layout.min.css',
        '/panel/css/core/menu/menu-types/vertical-menu.min.css',
        '/panel/css/core/colors/palette-gradient.min.css',
        '/panel/css/pages/dashboard-analytics.min.css',
        '/panel/css/pages/dashboard-ecommerce.min.css',
        '/panel/css/pages/users.min.css',
        '/panel/css/pages/card-analytics.min.css',
        '/panel/css/pages/data-list-view.min.css',
        '/panel/css/plugins/tour/tour.min.css',
        '/panel/css/style.css',
    ];
    
    public $js = [
        '/panel/vendors/js/vendors.min.js',
        '/panel/vendors/js/extensions/tether.min.js',
        '/panel/vendors/js/extensions/shepherd.min.js',
        '/panel/vendors/js/ui/prism.min.js',
        '/panel/vendors/js/ui/prism-treeview.js',
        '/panel/js/core/app-menu.min.js',
        '/panel/js/core/app.min.js',
        '/panel/js/scripts/components.min.js',
        '/panel/js/scripts/customizer.min.js',
        '/panel/js/scripts/footer.min.js',
        '/panel/js/scripts/pages/dashboard-analytics.min.js',
        '/panel/js/scripts/pages/dashboard-ecommerce.min.js',
        '/rm/assets/js/jquery.cookie.js'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    
    

    
    
    public function init()
    {
        if (\Yii::$app->controller->action->id == 'index') {
            $this->css[] = '/panel/vendors/css/charts/apexcharts.css';  
            $this->js[]  = '/panel/vendors/js/charts/apexcharts.min.js';  
        }      
        if (\Yii::$app->controller->action->id == 'faq') {
            $this->css[] = '/panel/css/pages/faq.min.css'; 
            // <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/faq.min.css">
        }      
    }
    
}

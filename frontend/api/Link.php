<?php

namespace frontend\api;

/**
 * api module definition class
 */
class Link extends \yii\base\Module
{

    
    public $controllerNamespace = 'frontend\api\controllers';
    public $layout = '/api';

    
    
    public function init()
    {
        parent::init();
    }
}

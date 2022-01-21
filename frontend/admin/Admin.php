<?php

namespace frontend\admin;

class Admin extends \yii\base\Module
{
    
    public $controllerNamespace = 'frontend\admin\controllers';
    public $layout = '/admin';
    
    public function init()
    {
        parent::init();
    }
    
}

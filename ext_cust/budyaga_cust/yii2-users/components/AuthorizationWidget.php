<?php

namespace budyaga_cust\users\components;

use budyaga_cust\users\models\forms\LoginForm;
use budyaga_cust\users\Module;
use yii\base\Widget;

class AuthorizationWidget extends Widget
{
    public function run()
    {
        $model = new LoginForm;
        Module::registerTranslations();
        return $this->render('authorizationWidget', ['model' => $model]);
    }
}
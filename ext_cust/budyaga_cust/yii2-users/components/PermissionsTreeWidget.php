<?php

namespace budyaga_cust\users\components;

use budyaga_cust\users\models\AuthItem;
use yii\base\Widget;
use Yii;

class PermissionsTreeWidget extends Widget
{
    public $user = false;

    public $item = false;

    public function run()
    {
        if ($this->user) {
            $assignedPermissions = $this->user->assignedRules;
            $defaultPermissions = AuthItem::find()->where(['in', 'name', Yii::$app->authManager->defaultRoles])->all();
            $permissions = array_merge($assignedPermissions, $defaultPermissions);
        } else {
            $permissions = $this->item->children;
        }

        return $this->render('permissionsTreeWidget', ['permissions' => $permissions]);
    }
}
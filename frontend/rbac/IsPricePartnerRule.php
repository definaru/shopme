<?php
namespace frontend\rbac;
use yii\rbac\Rule;
use Yii;
class IsPricePartnerRule extends Rule
{
    public $name = 'IsPricePartnerRule';
    public function execute($user, $item, $params)
    {
        if (!isset($params['pricepartner'])) {
            return false;
        }
        return ($params['pricepartner']->partner_id == $user);
    }
}
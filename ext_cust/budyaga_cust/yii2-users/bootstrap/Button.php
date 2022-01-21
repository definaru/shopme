<?php

namespace budyaga_cust\users\bootstrap;

use yii\helpers\Html;
/**
 * Description of Progress
 * @author Inc. Defina
 */

class Button 
{
    
    public function render($tag = 'a', $label = '', $options = [])
    {
        return Html::tag($tag, $label, $options);
    }
    
}

<?php

namespace budyaga_cust\users\bootstrap;

use yii\helpers\Html;
/**
 * Description of Progress
 * @author Inc. Defina
 */

class Alert 
{
    
    public function render($label = '', $options = '')
    {
//  <div class="alert alert-info alert-dismissible">
//    <button type="button" class="close" data-dismiss="alert">&times;</button>
//    <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
//  </div>  
        $button = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $content = $button.PHP_EOL.$label;
        return Html::tag('div', $content, ['class' => 'alert alert-dismissible '.$options]);
    }
    
}

<?php

namespace budyaga_cust\users\bootstrap;

use yii\helpers\Html;
/**
 * Description of Progress
 * @author Inc. Defina
 */
class Progress 
{
    
    public function render($num, $x = 1, $p = '%', $color = '')
    {
        $list = $num.$p;
        $c = ($color == '') ? '' : ' '.$color;
        $proc = ($x == 1) ? '' : $list;
        $progress = Html::tag('div', $proc, 
                [
                    'class' => 'progress-bar progress-bar-striped progress-bar-animated'.$c,
                    'style' => 'width:'.$list
                ]);
        return Html::tag('div', $progress, ['class' => 'progress']);

//    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width:40%">40%</div>

    }
    
}

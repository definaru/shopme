<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $s = Scripts::getViewHeader();
    $img = Html::img($s->logo,['style' => 'width: 50%;', 'alt' => Yii::$app->params['name']]);
    $logo = (!$s->logo) ? Html::tag('h2', Yii::$app->params['name'], ['style' => 'margin:0;']) : $img;
?>
    
<div class="brblock text-center">
    <?=Html::a($logo, '/');?>
</div>
<div class="brblock"></div>
<?php 
    use yii\helpers\Html;
    use budyaga_cust\users\models\Defina;
    use budyaga_cust\users\models\Scripts;
    $suffix = Yii::$app->user->identity;
?>
<?=Html::tag('h2', 'Hello, '.$user->name.' !', ['style' => 'color:#222;']);?>
<p>You received this email because you were invited <?=Scripts::translate($suffix->nickname).' '.Scripts::translate($suffix->lastname);?></p>
<br/>
<p style="text-align: left;">We will be glad to see you on our platform <?=Defina::my;?>. <br/>
Join us right now to invest together! <br/>
Discover the first crowdfunding platform <br/>
on co-investing in American residential and commercial real estate. </p>
<br/>
<p style="text-align: left;">To register on our platform, you need to specify:</p>
<br/>
<div style="width:100%;display: block; text-align: left;">
    <ul style="font-weight: bold">
        <li> Your real name (you can specify a surname later) </ li>
        <li> Email Address </ li>
        <li> Password (you can always change the password) </ li>
    </ul>
</div>
<br/>
<p>(After confirming your email address, you will receive access to our exclusive offers.)</p>
<br/><br/>
<p>To create a personal account, click on the button:</p>
<br/>
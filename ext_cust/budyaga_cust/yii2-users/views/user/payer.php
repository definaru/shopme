<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Url;
    use budyaga_cust\users\models\forms\StripeCatalog;
    use budyaga_cust\users\models\Defina;
    use budyaga_cust\users\models\Scripts;
    use ruskid\stripe\StripeCheckoutCustom;
    $params = Yii::$app->user->identity;
    $model = StripeCatalog::createTokenStripe('4893 4702 2961 0107', 11, 21, 444);
    $paypal = (Yii::$app->language == 'ru') ? 'Оплата Paypal' : 'Paypal payment';
    $stripe = (Yii::$app->language == 'ru') ? 'Оплата Stripe' : 'Stripe payment';
    if($get['pay'] == 'paypal') {
        $this->title = $paypal;
    } elseif($get['pay'] == 'stripe'){
        $this->title = $stripe;
    } else {
        $this->title = 'Error Payment';
    }
?>
<div class="login-box">
    <?=$this->render('_logo');?>
    <div class="register-box-body">
        <div class="brblock text-center">
            <i class="fa fa-cc-<?=$get['pay'];?> text-info" style="font-size: 50px;"></i>
        </div>
        <?php // var_dump(StripeCatalog::chargeList());?>
        <?php //var_dump(StripeCatalog::createTokenStripe('4893 4702 2961 0107', 11, 21, 444));?>
       <form action="" method="POST" id="payment-form">
          <span class="payment-errors"></span>

          <div class="form-row">
            <label>
              <span>Card Number</span>
              <input type="text" size="16" data-stripe="number">
            </label>
          </div>

          <div class="form-row">
            <label>
              <span>Expiration (MM/YY)</span>
              <input type="text" size="2" data-stripe="exp_month">
            </label>
            <span> / </span>
            <input type="text" size="4" data-stripe="exp_year">
          </div>

          <div class="form-row">
            <label>
              <span>CVC</span>
              <input type="text" size="3" data-stripe="cvc">
            </label>
          </div>

          <div class="form-row">
            <label>
              <span>Billing Zip</span>
              <input type="text" size="5" data-stripe="address_zip">
            </label>
          </div>

          <input type="submit" class="submit" value="Submit Payment">
        </form>
        <hr>
            <?=StripeCatalog::cartalystStripes();?>
        <hr/>
        <?=Html::tag('p', $this->title, ['class' => 'login-box-msg text-white']);?>
        <?=Html::submitButton(Yii::t('yii', 'Invest'), ['class' => 'btn btn-danger btn-block btn-flat', 'name' => $get['pay'].'-button']) ?>
    </div>
</div>




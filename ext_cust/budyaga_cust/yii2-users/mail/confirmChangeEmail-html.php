<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['user/user/confirm-email', 'token' => $token->old_email_token]);
?>
<div class="password-reset">
    <p>Здравствуйте, <?=$user->nickname;?></p>

    <p>Чтобы изменить E-mail, нужно перейти по ссылке:</p>
    <p><?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>
</div>

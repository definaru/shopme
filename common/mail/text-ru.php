<?php 
    use yii\helpers\Html;
    use budyaga_cust\users\models\Defina;
    use budyaga_cust\users\models\Scripts;
    $params = Yii::$app->user->identity;
    $pass = (Scripts::getDefaultPhoto($params->nickname) == 'male') ? 'пригласил' : 'пригласила';
?>
<?=Html::tag('h2', 'Здравствуйте, '.$user->name.' !', ['style' => 'color:#222;']);?>
<p>Вы получили данное письмо, так как Вас <?=$pass;?> <?=$user->user;?></p>
<br/>
<p style="text-align: left;">Мы будем рады видеть Вас на нашей платформе <?=Defina::my;?>. <br/>
Присоединяйтесь к нам прямо сейчас, чтобы инвестировать вместе! <br/>
Откройте для себя первую краудфандинговую платформу <br/>
по соинвестированию в американскую жилую и коммерческую недвижимость.</p>
<br/>
<p style="text-align: left;">Для регистрации на нашей платформе Вам необходимо указать:</p>
<br/>
<div style="width:100%;display: block; text-align: left;">
    <ul style="font-weight: bold">
        <li>Ваше реальное имя (Фамилию можно указать потом)</li>
        <li>Адрес электронной почты</li>
        <li>Пароль (Вы всегда можете изменить пароль)</li>
    </ul>
</div>
<br/>
<p>После подтверждения адреса Вашей электронной почты, вы получите доступ к нашим эксклюзивным предложениям.</p>
<br/><br/>
<p>Для создания личного кабинета, нажмите на кнопку:</p>
<br/>
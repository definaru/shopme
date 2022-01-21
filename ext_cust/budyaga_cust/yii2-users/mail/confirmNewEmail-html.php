<?php
use yii\helpers\Html;
use budyaga_cust\users\models\Scripts;
use budyaga_cust\users\models\Defina;
$index = Scripts::getViewHeader();

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['user/user/confirm-email', 'token' => $token->new_email_token]);
?>
<div class="password-reset">
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tbody>
            <tr>
                <td style="background-color:#999999">
                <p>&nbsp;</p>
                <p>&nbsp;</p>

                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:80%; background-color:#ffffff">
                        <tbody>
                            <tr>
                                <td style="width:10%;">&nbsp;</td>
                                <td style="width:80%;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <?=Html::img(Scripts::site().$index->logo, ['style' => 'width: 180px;']);?>
                                                </td>
                                            </tr>
                                            <tr><td><hr/></td></tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <?=Html::tag('h2', 'Здравствуйте, '.$user->nickname, ['style' => 'color:#222;']);?>
                                                    <h4>Добро пожаловать в Vera.Fund</h4>
                                                    <p>Уникальная частная платформа для инвестирования в рынок американской недвижимости.</p>
                                                    <p style="text-align: left;"><?=$user->nickname;?>, благодарим Вас за регистрацию! 
                                                    <br/>Мы рады, что вы присоединились к нам!
                                                    <br/>
                                                    Откройте для себя первую платформу по со-инвестированию в американскую коммерческую и жилую недвижимость.
                                                     <br/><br/>
                                                    Объединив инновационные технологии с многолетним опытом работы в области финансов, маркетинга и недвижимости, 
                                                    была создана компания Vera.Fund. Наша краудфандинговая платформа предоставляет возможность всем желающим 
                                                    получать долларовую доходность и приумножать капитал, инвестируя в недвижимость США.
                                                     <br/><br/>
                                                    Для завершения регистрации подтвердите ваш адрес электронной почты.<br/>
                                                    (После подтверждения вашего адреса электронной почты, вы получите доступ к нашим эксклюзивным предложениям.)<br/>
                                                    <br/><br/>
                                                    Если у вас есть вопросы, пожалуйста, свяжитесь с нами ( <?=$index->email;?> ), <br/>
                                                    Команда Vera.Fund всегда на связи!
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                    <p>Для активации личного кабинета, нажмите на кнопку:</p>

                                                    <p><?= Html::a(Html::img(Scripts::site().'/css3/img/button.png', ['alt' => 'Активировать аккаунт']), $confirmLink) ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <hr/>
                                                    <br>
                                                    <p style="color:#999;">Компания <?=Defina::my;?> | <?=Scripts::site();?></p>
                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="width:10%;">&nbsp;</td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                
                            </tr>
                        </tbody>
                    </table>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>

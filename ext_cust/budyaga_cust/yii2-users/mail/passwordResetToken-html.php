<?php
use yii\helpers\Html;
use budyaga_cust\users\models\Scripts;
use budyaga_cust\users\models\Defina;
$index = Scripts::getViewHeader();

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/user/reset-password', 'token' => $token->token]);
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
                                                    <h4>Вы получили данное письмо, потому что решили сменить пароль</h4>
                                                    
                                                    <br/><br/>
                                                    
                                                    <p style="color:red;">Если это были не Вы, ничего не предпринимайте!<br/> 
                                                    Позвоните по номеру <?=Scripts::phone($index->phone);?> , и сообщите о нарушении.</p>
                                                    
                                                    <br/><br/>
                                                    
                                                    <p style="text-align: left;">Если у вас есть вопросы, пожалуйста, свяжитесь с нами ( <?=$index->email;?> ), </p>
                                                    <p style="text-align: left;">Нажмите на кнопку ниже и создайте новый пароль.</p>
                                                    <p><?= Html::a(Html::img(Scripts::site().'/css3/img/button2.png', ['alt' => 'Восстановить пароль']), $resetLink) ?></p>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <hr/>
                                                    <br>
                                                    <p style="color:#999;"><b>Команда <?=Defina::my;?> всегда на связи!</b> | <?=Scripts::site();?></p>
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

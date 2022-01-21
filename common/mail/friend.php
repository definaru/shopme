<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\models\Defina;
    $page = (Yii::$app->language == 'ru') ? 'text-ru' : 'text-en';
    $buttonclick = (Yii::$app->language == 'ru') ? 'Создать аккаунт' : 'Create an account';
    $signup = (Yii::$app->language == 'ru') ? 'Компания' : 'Company';
    $index = Scripts::getViewHeader();
    $confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['user/user/signup', 'token' => $user->token]);
?>
<div class="password-reset">
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tbody>
            <tr>
                <td style="background-color:#999999">
                <p></p>
                <p></p>

                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:80%; background-color:#ffffff">
                        <tbody>
                            <tr>
                                <td style="width:10%;"></td>
                                <td style="width:80%;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <center>
                                                        <?=Html::img(Scripts::site().$index->logo, ['style' => 'width: 180px;']);?>
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr><td><hr/></td></tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <?=$this->render($page, ['user' => $user]);?>
                                                    <p><?= Html::a($buttonclick, $confirmLink, ['class' => 'button', 'style' => 'color:#fff;']) ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">
                                                    <br/><br/><hr/><br/>
                                                    <?=Html::tag('p', $signup.' '.Defina::my.' | '.Scripts::site(), ['style' => 'color:#999;']);?>
                                                    <br/><br/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="width:10%;"></td>
                                <p></p>
                                <p></p>
                                
                            </tr>
                        </tbody>
                    </table>

                <p></p>
                <p></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
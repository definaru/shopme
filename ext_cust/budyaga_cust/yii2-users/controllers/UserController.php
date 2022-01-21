<?php

    namespace budyaga_cust\users\controllers;

    use budyaga_cust\users\models\forms\ChangeEmailForm;
    use budyaga_cust\users\models\forms\ChangePasswordForm;
    use budyaga_cust\users\models\forms\RetryConfirmEmailForm;
    use budyaga_cust\users\models\UserEmailConfirmToken;
    use budyaga_cust\users\models\forms\LoginForm;
    use budyaga_cust\users\models\forms\PasswordResetRequestForm;
    use budyaga_cust\users\models\forms\ResetPasswordForm;
    use budyaga_cust\users\models\forms\SignupForm;
    use budyaga_cust\users\models\forms\StripeForm;
    use budyaga_cust\users\models\forms\StripeCatalog;
    use budyaga_cust\users\models\Google;
    use Yii;
    use yii\helpers\Url;
    use yii\base\InvalidParamException;
    use yii\web\BadRequestHttpException;

class UserController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'uploadPhoto' => [
                'class' => 'budyaga_cust\cropper\actions\UploadAction',
                'url' => Yii::$app->controller->module->userPhotoUrl,
                'path' => Yii::$app->controller->module->userPhotoPath,
            ]
        ];
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack(); // /account
            //return $this->redirect('/dashboard');
        } else {
            return $this->render($this->module->getCustomView('login'), [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSignup()
    {
        $post = Yii::$app->request->post();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($user = $model->signup()) {
                if ($user->createEmailConfirmToken() && $user->sendEmailConfirmationMail(Yii::$app->controller->module->getCustomMailView('confirmNewEmail'), 'new_email')) {
                    Yii::$app->getSession()->setFlash('CHECK_YOUR_EMAIL');
                    $transaction->commit();
                    $user->role_default($user->id);
                    $user->price_default($user->id);
                    return $this->redirect(Url::toRoute('/user/user/login'));
                } else {
                    Yii::$app->getSession()->setFlash('CAN_NOT_SEND');
                    $transaction->rollBack();
                };
            }
            else {
                Yii::$app->getSession()->setFlash('CAN_NOT_CREATE');
                $transaction->rollBack();
            }
        }

        return $this->render($this->module->getCustomView('signup'), [
            'model' => $model,
        ]);
    }

    public function actionRetryConfirmEmail()
    {
        $model = new RetryConfirmEmailForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->user->sendEmailConfirmationMail(Yii::$app->module->getCustomMailView('confirmNewEmail'), 'new_email')) {
                Yii::$app->getSession()->setFlash('success', Yii::t('users', 'CHECK_YOUR_EMAIL_FOR_FURTHER_INSTRUCTION'));
                return $this->redirect(Url::toRoute('/user/user/retry-confirm-email'));
            }
        }

        return $this->render($this->module->getCustomView('retryConfirmEmail'), [
            'model' => $model
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('OKREZET');
                return $this->redirect(Url::toRoute('/user/user/login'));
            } else {
                Yii::$app->getSession()->setFlash('ErrorREZET');
            }
        }

        return $this->render($this->module->getCustomView('requestPasswordResetToken'), [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('users', 'NEW_PASSWORD_WAS_SAVED'));
            return $this->redirect(Url::toRoute('/user/user/login'));
        }

        return $this->render($this->module->getCustomView('resetPassword'), [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        $model = Yii::$app->user->identity;
        $changePasswordForm = new ChangePasswordForm;
        $changeEmailForm = new ChangeEmailForm;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('users', 'CHANGES_WERE_SAVED'));
            return $this->redirect(Url::toRoute('/user/user/profile'));
        }

        if ($model->password_hash != '') {
            $changePasswordForm->scenario = 'requiredOldPassword';
        }

        if ($changePasswordForm->load(Yii::$app->request->post()) && $changePasswordForm->validate()) {
            $model->setPassword($changePasswordForm->new_password);
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('users', 'NEW_PASSWORD_WAS_SAVED'));
                return $this->redirect(Url::toRoute('/user/user/profile'));
            }
        }

        if ($changeEmailForm->load(Yii::$app->request->post()) && $changeEmailForm->validate() && $model->setEmail($changeEmailForm->new_email)) {
            Yii::$app->getSession()->setFlash('success', Yii::t('users', 'TO_YOURS_EMAILS_WERE_SEND_MESSAGES_WITH_CONFIRMATIONS'));
            return $this->redirect(Url::toRoute('/user/user/profile'));
        }

        return $this->render($this->module->getCustomView('profile'), [
            'model' => $model,
            'changePasswordForm' => $changePasswordForm,
            'changeEmailForm' => $changeEmailForm
        ]);
    }

    public function actionConfirmEmail($token)
    {
        $tokenModel = UserEmailConfirmToken::findToken($token);

        if ($tokenModel) {
            Yii::$app->getSession()->setFlash('success', $tokenModel->confirm($token));
        } else {
            Yii::$app->getSession()->setFlash('error', Yii::t('users', 'CONFIRMATION_LINK_IS_WRONG'));
        }

        return $this->redirect(Url::toRoute('/user/user/login'));
    }
    
    public function actionPayer($pay = '')
    {
        $get = Yii::$app->request->get();
//        $model = new StripeForm();
//        
//        if ($model->load(Yii::$app->request->post())) {
//            $card = StripeCatalog::createTokenStripe();
//            if($card) {
//                Yii::$app->session->setFlash('successPay');
//                return $this->redirect(['/account']);            
//            }
//            else {
//                Yii::$app->session->setFlash('errorPay');
//                return $this->redirect(['/pay']);            
//            }            
//        }
        // return $this->render('text', ['card' => $card, 'model' => $model]);
        return $this->render($this->module->getCustomView('payer'), ['model' => $model, 'pay' => $pay, 'get' => $get]);
    }
    
    // регистрация партнёров на Affise !!!
    public function actionRegister()
    {
        $link = Google::getClientGoogle(); $post = Yii::$app->request->post(); $get = Yii::$app->request->get();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail(Scripts::funcMail())) { // 
            $transaction = Yii::$app->db->beginTransaction();
            if ( $user = $model->signup($post['SignupForm']['photo']) ) {
                if ($user->createEmailConfirmToken() && $user->sendEmailConfirmationMail(Yii::$app->controller->module->getCustomMailView('confirmNewEmail'), 'new_email')) {
                    Affise::getPartnersAdd($post['SignupForm']['email'], $post['SignupForm']['password'], $post['SignupForm']['nickname']);
                    Yii::$app->session->setFlash('email', $post['SignupForm']['email']);
                    Yii::$app->session->setFlash('OkResult');
                    $transaction->commit();
                    $user->role_default($user->id);
                    $user->price_default($user->id);
                    return $this->redirect(Url::toRoute('/user/user/login'));
                } else {
                    Yii::$app->getSession()->setFlash('CAN_NOT_SEND'); $transaction->rollBack();
                };
            }
            else {
                Yii::$app->getSession()->setFlash('CAN_NOT_CREATE'); $transaction->rollBack();
            }
        }
        return $this->render($this->module->getCustomView('register'), [
            'link' => $link, 'model' => $model, 'post' => $post, 'get' => $get
        ]);  
    }
    
    
    
}
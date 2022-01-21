<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <style type="text/css">
        .heading {
            background: #999999;
            width: 100%;
        }
        .list {
            
        }
        .button {
            color: #fff;
            border-color: #ff7800;
            text-shadow: none;
            background: orangered;
            padding: 15px 40px;
            border-radius: 5px;
        }
        .button a {
            color: #fff;
        }
        a .button:hover {text-decoration: none;}
        a {
            text-decoration: none;
            color: #222;
        }
        a:hover {
            text-decoration: underline;
            color: #111;
        }
        .footer {
            background: #888;
            color:#fff;
            padding: 50px 10px;
            width: 100%;
            text-align: center;
        }
    </style>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="heading"><?= $content ?></div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

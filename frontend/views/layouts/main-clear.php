<?php
    use yii\helpers\Html;
    use dmstr_cust\widgets\Alert;
    use yii\widgets\Pjax;
    dmstr_cust\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="image/x-icon" href="/favicon/hexagon.png" rel="shortcut icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="/defina_bg/css/defina.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>  
    
    <?php $this->head() ?>
    
    <style>
        <!--
            .login-box-body, .register-box-body {
                background: rgb(255, 255, 255) !important;
            }
            label {
                color: #000;
            }
            a {
                color: orangered !important;
            }
            .btn-danger {
                background-color: orangered !important;
                border-color: orangered !important;
            }
        -->
    </style>
</head>
<body class="login-page">
    <?php /* fon
    <video autoplay loop muted class="bgvideo" id="bgvideo">
        <source src="/defina_bg/Galaxy.mp4" type="video/mp4"></source>
    </video>
*/ ?>
<?php //Pjax::begin(); ?>
    <?php $this->beginBody() ?>

        <div class="container">
            <div class="pm-alert-user">
                <?= Alert::widget() ?>
            </div>
        </div>

        <div><?=$content ?></div>
        
    <?php $this->endBody() ?>
<?php //Pjax::end(); ?>
        
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

      
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();  
        $('input[name="PasswordResetRequestForm[email]"]').val(localStorage.getItem('MAIL'));
    });
    $(document).on('change', 'input[name="LoginForm[email]"]', function () 
    {
        var st = $('input[name="LoginForm[email]"]').val();
        localStorage.setItem('MAIL', st);
    });

    if (localStorage.getItem('MAIL') !== null) 
    {
        var set = localStorage.getItem('MAIL');
        var email = $('input[name="LoginForm[email]"]').val(set);

        $('.field-loginform-email').attr('style', 'display:none;');
        $('#csrf').before('<div id="def_panel"><img src="/img/img_avatar3.png"/></div><h3>'+ set +'</h3>');
    }
    $('#customcheck').click(function(){
        localStorage.removeItem("MAIL");
        //location.href="/login";
    });
    
    var valid = true; 
    $('#googleverifid').each(function() { 
        if ($(this).text() === '') { 
           valid = false; 
           return false; 
        }
    });
    if (valid) $('form#multipass').submit();
    $('input#signupform-nickname').val(localStorage.getItem('fio'));
    $('input#signupform-email').val(localStorage.getItem('email')); 
</script>

</body>
</html>
<?php $this->endPage() ?>
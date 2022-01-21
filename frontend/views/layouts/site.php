<?php
use yii\helpers\Html;
//Yii::$app->user->can('deliveryManager')
if (
	(Yii::$app->controller->action->id === 'error') ||
	(Yii::$app->controller->action->id === 'login') ||
	(Yii::$app->controller->action->id === 'signup') ||
	(Yii::$app->controller->action->id === 'payer') ||
	(Yii::$app->controller->action->id === 'reset-password') ||
	(Yii::$app->controller->action->id === 'register') ||
	(Yii::$app->controller->action->id === 'request-password-reset')
    ) {
    echo $this->render('main-clear', ['content' => $content]);
} 

else { dmstr_cust\web\AdminLteAsset::register($this);
    $cookies = Yii::$app->request->cookies;
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/../ext_cust/almasaeed2010_cust/adminlte/dist');
    ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>  
<link rel="stylesheet" href="/accountx/d/assets/plugins/swiper/swiper.min.css"/>  
<?php $this->head() ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini <?=($_COOKIE['sidebar-collapse'] == 1) ? 'sidebar-collapse' : '';?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?=$this->render('header.php', ['directoryAsset' => $directoryAsset])?>
        <?=$this->render('left.php', ['directoryAsset' => $directoryAsset])?>
        <?=$this->render('content.php', ['content' => $content, 'directoryAsset' => $directoryAsset])?>
    </div> 
    <?php $this->endBody() ?> 
    <script src="/css3/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/css3/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/css3/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/css3/js/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="/accountx/d/assets/plugins/swiper/swiper.min.js"></script>
    <script src="/css3/js/defina.min.js"></script>
    
    <?php /* <script src="/css3/js/pages/dashboard2.js"></script> */ ?>    
    
    <script>
        $(document).on('change', 'input[type=checkbox]', function () {
          var $this = $(this), $chks = $(document.getElementsByName(this.name)), $all = $chks.filter(".select-on-check-all");

          if ($this.hasClass('select-on-check-all')) {
            $chks.prop('checked', $this.prop('checked'));
          } else switch ($chks.filter(":checked").length) {
            case +$all.prop('checked'):
              $all.prop('checked', false).prop('indeterminate', false);
              break;
            case $chks.length - !!$this.prop('checked'):
              $all.prop('checked', true).prop('indeterminate', false);
              break;
            default:
              $all.prop('indeterminate', true);
          }
        }); 
        $('input').on('ifChecked', function (event){
            $(this).closest("input").attr('checked', true);          
        });
        $('input').on('ifUnchecked', function (event) {
            $(this).closest("input").attr('checked', false);
        });    

        function sidebar_switch() {
            var sidebar_collapse = $('#new_sidebar_collapse').attr('sidebar-collapse');
            if (sidebar_collapse === '1') {
                $('#new_sidebar_collapse').attr('sidebar-collapse', '0');
                var date = new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000);
                document.cookie = "sidebar-collapse=0; path=/; expires=" + date.toUTCString();
            } else {
                $('#new_sidebar_collapse').attr('sidebar-collapse', '1');
                var date = new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000);
                document.cookie = "sidebar-collapse=1; path=/; expires=" + date.toUTCString();
            }
        };

        var swiper = new Swiper('#sales-charts', {
            direction: 'vertical',
            slidesPerView: 'auto',
            freeMode: true,
            scrollbar: {
              el: '.swiper-scrollbar'
            },
            mousewheel: true
        });
        
        function CopyToClipboard(containerid) {
            if (document.selection) { 
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy"); 

            } else if (window.getSelection) {
                var range = document.createRange();
                 range.selectNode(document.getElementById(containerid));
                 window.getSelection().addRange(range);
                 document.execCommand("Copy"); 
            }
        }

        $('#copy-link').click(function(){
            swal("Успешно", "Гиперссылка скопирована в буфер обмена", "success");
        });
        
    </script>
    
    </body>
</html>
    
    <?php $this->endPage() ?>
<?php } ?>
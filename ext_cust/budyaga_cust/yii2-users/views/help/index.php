<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $this->title = 'Помощь Клиентам';
    $param = Yii::$app->user->identity;
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="ionicons ion-help-buoy"></i> <?=Yii::$app->site->name;?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"><?=Yii::$app->site->version;?></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body no-padding text-center">
                <?=Html::img('//defina.ru/img/defina_company_rii.png',['alt' => 'Inc. Defina', 'style' => 'width:100%;'])?>  
                <div class="row">
                    <div class="col-md-4">
                        <a href="javascript:history.back(1)" class="btn btn-sm btn-default btn-flat pull-left"><i class="ionicons ion-skip-backward"></i> вернуться назад</a>
                    </div>
                    <div class="col-md-4">
                        <h3 class="text-info">
                            <script>
                                var h=(new Date()).getHours();
                                if (h > 3 && h <  12) document.writeln("Доброе утро, <?=$param->nickname;?>"); 
                                if (h > 11 && h <  19) document.writeln("Добрый день, <?=$param->nickname;?>"); 
                                if (h > 18 && h <  24) document. writeln("Добрый вечер, <?=$param->nickname;?>"); 
                                if (h > 23 || h <  4 ) document. writeln("Доброй ночи, <?=$param->nickname;?>"); 
                            </script>                    
                        </h3>
                        <p>Лента событий: <?=Html::a('#it_development ', '//vk.com/feed?q=%23it_development&section=search', ['target' => '_blank'])?></p> 
                        <div class="brblock"></div>
                    </div>
                    <div class="col-md-4">
                        <a href="//defina.ru/contact" target="_blank" class="btn btn-sm btn-info btn-flat pull-right"><i class="fa fa-paper-plane"></i> Задать вопрос</a>
                    </div>
                </div>

                
                
            </div>
        </div>        
    </div>
<?php $site = 'https://defina.ru/help'; if(file_exists($site) && $site = 'https://defina.ru/404') : ?>    
<div class="col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        <div class="info-box-content">
            <span class="info-box-number">Сообщение</span>
            <span class="info-box-text">Справочная информация временно не доступна. Загляните пожалуйста позже. Спасибо.</span>
        </div>
    </div>        
</div>   
<?php else : ?>
    <?=file_get_contents($site);?>
<?php endif; ?>       
</div>
<script src="/css3/js/prism.js"></script>
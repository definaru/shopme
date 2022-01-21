<?php
    use yii\helpers\Html;
    //use hrupin\file\File;
    use budyaga_cust\users\models\Scripts;
    $this->header = 'sitemap.xml';
    $this->title = 'SEO - оптимизация';
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->header;
    $this->registerCss('
        #sitemap::selection {
            background:#000;
            padding:2px 10px;
            color:#fff;
        }        
    ');
?>   

<div class="row">
    <div class="col-md-12">
        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title">Редактируем <small><?=$this->header;?></small></h3>
                <div class="box-tools">
                    <button class="btn btn-box-tool" id="copy-link" onclick="CopyToClipboard('sitemap')"><i class="fa fa-link" data-toggle="tooltip" title="Копировать ссылку"></i></button>
                    <button class="btn btn-box-tool" data-toggle="collapse" data-target="#help"><i class="ionicons ion-ios-help-outline" data-toggle="tooltip" title="Справка"></i></button>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <input type="text" id="sitemap" class="form-control" value="<?=Scripts::site().'/'.$this->header;?>">
            <?= Html::beginForm(['sitemap'], 'post', ['enctype' => 'multipart/form-data']) ?> 
                <div class="box-body">
                    <div id="help" class="collapse">
                        <div class="alert alert-info fade in">
                            <strong>Defina:</strong><hr/> Не волнуйтесь, вам всего лишь надо скачать отсутствующий файл <a href="/user/seo/upload">сюда</a>, 
                            или написать код в ручную. Однако есть и альтернатива, 
                            воспользуйтесь <a target="_blank" href="https://www.mysitemapgenerator.com/start/free.html">генератором карты сайта</a>, 
                            и скачайте файл на ваш компьютер. Потом можно загрузить в нашей <a href="/user/seo/upload">файловой системе</a>. 
                            Или перейти в раздел <a href="/user/help">помощь</a>.
                        </div>
                    </div>
                    <div class="form-group"> 
                        <?= Html::label('Содержимое файла '.Html::a('посмотреть', Scripts::site().'/'.$this->header, ['target' => '_blank']), 'username', []) ?>
                        <textarea class="edit form-control" <?=(!file_exists($this->header)) ? 'placeholder="Файл '.$this->header.' не существует"' : '';?> name="robot" rows="20"><?=(file_exists($this->header)) ? file_get_contents($this->header) : '';?></textarea>   
                    </div>	
                </div>
                <div class="box-footer">
                    <?= Html::submitButton('изменить', ['name' => 'send', 'class' => 'btn btn-primary btn-flat']) ?>
                    <?= Html::a('Открыть', Scripts::site().'/'.$this->header, ['class' => 'btn btn-danger pull-right btn-flat', 'target' => '_blank']) ?>
                </div>
            <?= Html::endForm() ?>
        </div>
    </div>   
</div>
 
<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $this->header = 'robots.txt';
    $this->title = 'SEO - оптимизация';
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->header;
    $this->registerCss('
        #robots::selection {
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
                    <button class="btn btn-box-tool" id="copy-link" onclick="CopyToClipboard('robots')"><i class="fa fa-link" data-toggle="tooltip" title="Копировать ссылку"></i></button>
                    <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#help"><i class="ionicons ion-ios-help-outline" data-toggle="tooltip" title="Справка"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <input type="text" id="robots" class="form-control" value="<?=Scripts::site().'/'.$this->header;?>">
            <?= Html::beginForm(['edit'], 'post', ['enctype' => 'multipart/form-data']) ?> 
            <div class="box-body">
                <div id="help" class="collapse">
                    <div class="alert alert-info fade in">
                        <strong>Defina:</strong><hr/> Если у вас есть готовый файл "<?=$this->header;?>", загрузите его <a href="/user/seo/upload">сюда</a>, 
                        или напишите код в ручную. Воспользуйтесь <a target="_blank" href="https://yandex.ru/support/webmaster/controlling-robot/robots-txt.xml">подсказками</a>, 
                        чтобы правильно составить команды. Или перейти в раздел <a href="/user/help">помощь</a>.
                    </div>
                </div>
                <div class="form-group"> 
                    <?= Html::label('Содержимое файла '.Html::a('посмотреть', Yii::$app->getRequest()->getHostInfo().'/'.$this->header, ['target' => '_blank']), 'username', []) ?>
                    <textarea class="edit form-control" name="robot" rows="6">
<?=file_get_contents('robots.txt');?>
                    </textarea>   
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
 
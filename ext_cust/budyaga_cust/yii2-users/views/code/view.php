<?php
    use yii\helpers\Html;
    //Yii::$app->getRequest()->getHostInfo()
    $this->header = 'Параметры почты';
    
    $this->title = 'Настройки сайта';
    $this->params['breadcrumbs'][] = ['label' => 'Редактор кода', 'url' => ['/code']];
    $this->params['breadcrumbs'][] = $this->header;
    // Yii::t('users', 'NOTADD');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-envelope-o" style="color: #d13a7a;"></i> Редактируем <small><?=$this->header;?></small></h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#info"><i class="fa fa-question-circle-o" data-toggle="tooltip" title="Информация"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>                
            </div>
<?= Html::beginForm(['view'], 'post', ['enctype' => 'multipart/form-data']) ?> 
            <div class="box-body">
                
                <div class="form-group"> 
                    <?= Html::label('Настройка почты', 'username', []) ?>
<textarea class="edit form-control" name="robot" rows="6">
<?= file_get_contents($sigma);?>
</textarea> 

<div id="info" class="collapse">
    <div class="brblock"></div>      
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Информация</h4>
            <hr/>
            <ul class="list-inline">
                <li><u><?=Yii::$app->params['adminEmail'];?></u></li>
                <li>- Административный E-mail</li>
            </ul>
            <ul class="list-inline">
                <li><u><?=Yii::$app->params['supportEmail'];?></u></li>
                <li>- Служебный E-mail ( техническая поддержка )</li>
            </ul>
            <ul class="list-inline">
                <li><u><?=Yii::$app->params['infoEmail'];?></u></li>
                <li>- Информативный E-mail ( рассылка )</li>
            </ul>
        </div> 
</div>                    
                   
                </div>	
            </div>
            <div class="box-footer">
                <?= Html::submitButton('изменить', ['name' => 'send', 'class' => 'btn btn-primary btn-flat']) ?>
            </div>
<?= Html::endForm() ?>

        </div>
    </div>   
</div>





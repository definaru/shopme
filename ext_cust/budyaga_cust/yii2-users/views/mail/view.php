<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;
    $x = ($model->file == '' || $model->file == 1) ? '' : Html::tag('span', '<i class="fa fa-paperclip"></i>', ['class' => 'label label-primary']);
    $this->header = 'Сообщение';
    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-widget direct-chat direct-chat-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$this->header.' '.$x;?></h3>
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#more"><i class="fa fa-eye"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
                <ul class="dropdown-menu" role="menu">
                    <li><?=Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id]);?></li>
                    <li class="divider"></li>
                    <li><?=Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], ['data' => ['confirm' => 'Вы действительно хотите удалить это сообщение?','method' => 'post',],]);?></li> 
                    <li class="divider"></li>
                    <li><a href="javascript:history.back(1)"><i class="ionicons ion-reply"></i> назад</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="direct-chat-messages">
    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'template' => '<div{captionOptions}>{value}</div>',
        'attributes' => [
            //'id',
            [
                'attribute' => 'name',
                'attribute' => 'email',
                'attribute' => 'body',
                'attribute' => 'ip',
                'attribute' => 'date',
                'format' => 'raw',
                'value' => '
<div class="direct-chat-msg">
    <div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left">'.$model->name.'</span>
        <span class="direct-chat-timestamp pull-right">'.Scripts::getTimeChat($model->date).'</span>
    </div>
    <img class="direct-chat-img" src="/img/'.Scripts::getDefaultPhoto($model->name).'.png" alt="Message User Image">
    <div class="direct-chat-text">'.Scripts::Slugs($model->slug).$model->body.'</div>
</div>  
                ',
            ],
        ],
    ]) ?>
        </div>
    </div>
    <div id="more" class="collapse">
        <?php if($model->city == '(пусто)') : else : ?> 
            <div class="box-footer">
                <i class="ionicons ion-android-pin"></i> <?=Html::a($model->city, 'https://www.google.ru/search?q='.$model->city, ['target' => '_blank'])?>
            </div>
        <?php endif ;?>

        <?php if(!$model->phone) : else : ?> 
            <div class="box-footer">
                <i class="fa fa-phone-square"></i> <?=Scripts::phone($model->phone)?>
            </div>
        <?php endif ;?>

        <?php if($model->file == '' || $model->file == 1) : else : ?>  
            <div class="box-footer">
                <b>Прикреплён файл:</b> &#160;
                <?php
                    $info = new SplFileInfo($model->file);
                    echo Scripts::typeFile($info->getExtension()).' '.Html::a(str_replace('/documentation/', '', $model->file), $model->file, ['target' => '_blank']);
                ?>
            </div>  
        <?php endif ;?>
        <div class="box-footer">
            <b>IP-адрес:</b> <a href="http://ru.smart-ip.net/geoip/<?=$model->ip;?>/auto" target="_blank"><?=$model->ip;?></a> 
            <?=Html::tag('span', Scripts::getStat($model->pub), ['class' => Scripts::getStatColor($model->pub)]);?>
        </div>         
    </div>

    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?> 
        <form action="#" method="post">
            <div class="input-group">
                <input type="hidden" name="email" value="<?=$model->email;?>">
                <input type="text" name="message" placeholder="Введите сообщение ..." class="form-control">
                  <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> ОТПРАВИТЬ</button>
                  </span>
            </div>
        </form>
    </div> 
</div>
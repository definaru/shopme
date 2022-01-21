<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    $this->registerCss('
        @media screen and (max-width:767px) {
            th{width:10%;display:none;}
        }
        @media screen and (min-width:768px) and (max-width:991px) {
            th{width:10%;display:table-cell;}   
        }
        @media screen and (min-width:992px) and (max-width:1199px) {
            th{width:15%;display:table-cell;}    
        }
        @media screen and (min-width: 1200px) {
            th{width:20%;display:table-cell;}    
        }        
    ');
    $this->header = 'Просмотр страницы';
    $this->title = $model->icon;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Faqs'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = 'Вопрос №'.$model->id;
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-eye"></i> <?=Html::tag('small', $this->header);?></h3>
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
                <ul class="dropdown-menu" role="menu">
                    <li><?=Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id]);?></li>
                    <li class="divider"></li>
                    <li><?=Html::a(Yii::t('users', 'CREATE'), ['create']);?></li>
                    <li class="divider"></li>
                    <li><?=Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], ['data' => ['confirm' => 'Вы действительно хотите удалить эту страницу?','method' => 'post',],]);?></li> 
                    <li class="divider"></li>
                    <li><a href="javascript:history.back(1)"><i class="ionicons ion-reply"></i> назад</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box-body no-padding">
        <?= DetailView::widget([
            'model' => $model,  
            'template' => '<tr><td{contentOptions}>{value}</td></tr>',
            'attributes' => [
                //'id',
                [
                    'attribute' => 'header',
                    'format' => 'raw',  
                    'value' => ($model->header == '') ? '( Вопрос не указан )' : Html::tag('h3', $model->header, ['class' => 'text-primary no-margin']),
                    'visible' => !empty($model->header),
                ],
                [
                    'attribute' => 'text',
                    'format' => 'raw',
                    'visible' => !empty($model->text),
                ],
                [
                    'attribute' => 'icon',
                    'visible' => !empty($model->icon),
                ],
            ],
        ]) ?>
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>
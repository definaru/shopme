<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;
    $this->title = 'Просмотр услуг';
    $this->header = $model->header;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Services'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-eye" style="color: #d13a7a;"></i> 
            <?=Html::tag('small', $this->header);?>
        </h3>
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
        'attributes' => [
            //'id',
            'title',
            'keywords',
            'description:ntext',
            [
                'attribute' => 'background',
                'format' => 'raw',
                'value' => ($model->background === '') ? '' : Html::img($model->background, ['style' => 'width:100%;']),
                'visible' => !empty($model->background),
            ],  
            [
                'attribute' => 'header', 
                'format' => 'raw',
                'value' => Html::tag('h2', $model->header, ['class' => 'text-primary no-margin']),
            ],
            'text:html',
            'fulltexts:html',
            'land',
            [
                'attribute' => 'link', 
                'format' => 'raw',
                'value' => Html::a('Перейти на страницу', '/service/'.$model->link, ['class' => 'btn btn-default']),
            ],
        ],
    ]) ?>
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>
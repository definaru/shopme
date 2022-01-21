<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    $this->header = 'Просмотр документа';
    $this->title = $model->header;
    $this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-eye text-danger"></i> <?=Html::tag('small', $this->header);?></h3>
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
//                'img:image',
//                [
//                    'attribute' => 'header',
//                    'label' => 'Название',
//                    'value' => Html::tag('h2', $model->header, ['class' => 'text-primary no-margin']),
//                    'format' => 'raw'
//                ],
                [
                    'attribute' => 'text',
                    'label' => 'Название',
                    'value' => Html::decode($model->text),
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'href',
                    'value' => '<a href="/doc/'.$model->href.'">'.$model->href.'</a>',
                    'format' => 'raw'
                ],
            ],
        ]) ?>
    </div>
    <div class="box-footer with-border">
        <?= Html::a(Yii::t('users', 'BACK'), 'javascript:history.back(1)', ['class' => 'btn btn-default btn-flat pull-left']) ?>
        <?= Html::a(Yii::t('users', 'CREATE'), ['create'], ['class' => 'btn btn-success btn-flat pull-right']) ?>
    </div> 
</div>
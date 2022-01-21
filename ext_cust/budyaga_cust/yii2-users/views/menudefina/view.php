<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;

    $this->title = $model->name;
    //$this->params['breadcrumbs'][] = ['label' => 'Menudefinas', 'url' => ['index']];
    //$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        
            <div class="col-lg-8"><h1 style="margin: 0;"><i class="ionicons ion-compose"></i> <?= Html::encode($this->title) ?></h1></div>    
            <div class="col-lg-4 right">
        <?= Html::a('<i class="fa fa-plus"></i> Добавить пункт', ['create'], ['class' => 'btn btn-success']) ?>        
        <?= Html::a('<i class="fa fa-refresh"></i> Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-trash"></i> Удалить', ['delete', 'id' => $model->id], [
                   'class' => 'btn btn-danger',
                   'data' => [
                       'confirm' => 'Вы действительно хотите удалить выбранную книгу?',
                       'method' => 'post',
                   ],
               ]) ?>               
            </div>


            <div class="col-lg-12"> <hr/> </div>
    <div class="col-lg-12">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
	                
                [
                    'attribute'=>'icon',
                    'value' => '<div style="font-size:100px;">'.$model->icon.'</div>',
                    'format' => 'raw'
                ], 
                'name',
                 [
                    'attribute'=>'href',
                    'value' => '<a href="'.$model->href.'" target="_blank">'.$model->href.'</a>',
                    'format' => 'raw'
                ],               
                [
                    'attribute'=>'access',
                    'value' => Scripts::getAccess($model->access),
                    'format' => 'raw'
                ],            
                
            ],
        ]) ?>
        <a href="/user/menudefina"><button class="btn btn-default"><i class="ionicons ion-android-arrow-back"></i> назад к списку</button></a>
    </div>
</div>

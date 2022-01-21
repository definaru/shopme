<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\models\Scripts;
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
    $this->header = 'Менеджер по сайту';
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Настройки сайта', 'url' => ['/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-globe" style="color:#d13a7a;"></i> <small><?=$this->header;?></small></h3>
        <div class="box-tools pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <div class="btn-group">
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                        <?=Yii::t('users', 'SET')?>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?=Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id]);?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => ($model->title == '') ? '<p class="text-muted">(не задано)<p>' : '<p class="text-muted">'.$model->title.'<p>',
            ],             
            [
                'attribute' => 'apple_touth',
                'format' => 'raw',
                'value' => ($model->apple_touth == '') ? 
                '<p class="text-muted">Внимание! У вас нет Apple Touth Icon <a href="">подробнее</a><p>' : 
                '<img src="'.$model->apple_touth.'" style="width:150px;"/>',
            ],             
            'charset',
            'lang',
            [
                'attribute' => 'favicon',
                'format' => 'raw',
                'value' => ($model->favicon == '') ? '<p class="text-muted">(не указано)<p>' : '<img src="'.$model->favicon.'" style="width:30px;"/>',
            ],            
            [
                'attribute' => 'robots',
                'format' => 'raw',
                'value' => '<pre class="nobrborder"><code class="language-html">'.htmlspecialchars($model->robots).'</code></pre>',
            ],            
            [
                'attribute' => 'meta',
                'format' => 'raw',
                'value' => '<pre class="nobrborder"><code class="language-html">'.htmlspecialchars($model->meta).'</code></pre>',
            ],            
            [
                'attribute' => 'keywords',
                'format' => 'raw',
                'value' => '<pre class="nobrborder"><code class="language-html">'.htmlspecialchars($model->keywords).'</code></pre>',
            ],            
            [
                'attribute' => 'description',
                'format' => 'raw',
                'value' => '<pre class="nobrborder"><code class="language-html">'.htmlspecialchars($model->description).'</code></pre>',
            ],            
            [
                'attribute' => 'logo',
                'format' => 'raw',
                'value' => (!$model->logo) ? '<p class="text-muted">(отсутствует)<p>' :'<img src="'.$model->logo.'" style="height:100px;"/>',
            ],             
            [
                'attribute' => 'company',
                'format' => 'raw',
                'value' => (!$model->company) ? '<p class="text-muted">(не указан)<p>' :'<h1 class="text-warning" style="margin:0;">'.$model->company.'</h1>',
            ], 
            'slogan',
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'value' => (!$model->phone) ? '<p class="text-muted">(не указан)<p>' : Html::a($model->phone, 'tel:'.$model->phone),
            ],           
            [
                'attribute' => 'phone2',
                'format' => 'raw',
                'value' => (!$model->phone2) ? '<p class="text-muted">(не указан)<p>' : Html::a($model->phone2, 'tel:'.$model->phone2),
            ],   
            [
                'attribute' => 'adress',
                'format' => 'raw',
                'value' => (!$model->adress) ? '<p class="text-muted">(не указан)<p>' : '<i><abbr title="Адрес фактический">'.$model->adress.'</abbr></i>',
            ],   
            [
                'attribute' => 'adress2',
                'format' => 'raw',
                'value' => (!$model->adress2) ? '<p class="text-muted">(не указан)<p>' : '<i><abbr title="Адрес юридический">'.$model->adress2.'</abbr></i>',
            ],   

            'email:email',
            'email2:email',
            'inn',
            'kpp',
            'ogrn',
            [
                'attribute'=>'map',
                'format' => 'raw',
                'value' => (!$model->map) ? 
                '<p class="text-muted">Внимание! интерактивная карта не указана <a href="https://yandex.ru/map-constructor/" target="_blank">подробнее</a><p>' : 
                '<div>'.$model->map.'</div>',
            ], 
            [
                'attribute' => 'google_analitiks',
                'format' => 'raw',
                'value' => (!$model->google_analitiks) ? '<p class="text-muted">(не задан)<p>' : '<pre class="nobrborder"><code class="language-html">'.htmlspecialchars($model->google_analitiks).'</code></pre>',
            ],            
            [
                'attribute' => 'yandex_direct',
                'format' => 'raw',
                'value' => (!$model->yandex_direct) ? '<p class="text-muted">(не задан)<p>' : '<pre class="nobrborder"><code class="language-html">'.htmlspecialchars($model->yandex_direct).'</code></pre>',
            ],      
            [
                'attribute' => 'block',
                'format' => 'raw',
                'label' => 'Статус защиты контента',
                'value' => Scripts::getAccess($model->block).'',
            ],             
            
        ],
    ]) ?>            
    </div>
    <div class="box-footer clearfix">
        <?= Html::a('<i class="fa fa-refresh"></i> обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat pull-right']) ?>
        <a href="/defina" class="btn btn-default btn-flat pull-left"><i class="ionicons ion-android-arrow-back"></i> назад к списку</a>  
    </div> 
</div>
<script src="/css3/js/prism.js"></script>
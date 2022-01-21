<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    // use budyaga_cust\users\models\Scripts;
    $this->header = 'Виджеты';
    $this->title = 'Результат поиска';
    $this->params['breadcrumbs'][] = $this->header;
    $this->registerCss('
            .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
                    padding: 0;
                    border-top: 0 !important;
            }
        ');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-widget">
            <div class="box-header with-border">
                <h3 class="box-title"><?=$this->header;?></h3>
                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'layout' => '{summary}',
                                'summary' => 'Найдено: {count} | {page} из {pageCount}'
                            ]);?>
                        </button>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-12">
                    <?php // =$this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'showHeader' => false,
                        //'filterModel' => $searchModel,
                        'layout' => '{items}<div class="col-md-4 col-md-offset-4 center">{pager}</div>',
                        'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
                        'emptyText' => 'По вашему запросу ничего не найдено',                
                        //'filterModel' => $searchModel,
                        'pager' => [       
                            'maxButtonCount' => 5,
                        ],   
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],
                            //'id',           
                            [
                                'attribute'=>'href',
                                'attribute'=>'icon',
                                'format' => 'raw',
                                'content'=>function($data){
                                    return Html::a($data->icon.' '.$data->name, $data->href, ['class' => 'btn btn-default btn-lg btn-block btn-flat']);
                                }
                            ],            
                            //'name',
                            // 'access',                      
                        ],
                    ]); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
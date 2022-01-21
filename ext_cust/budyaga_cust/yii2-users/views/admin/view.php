<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use budyaga_cust\users\UsersAsset;
    use budyaga_cust\users\models\Scripts;
    use budyaga_cust\users\components\PermissionsTreeWidget;
    $this->title = Yii::t('users', 'MIGRATION_USER_VIEW');
    $this->header = $model->nickname;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'USERS'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->header;
    $assets = UsersAsset::register($this);
?>

    <div class="row">
        <div class="col-xm-12 col-lg-12">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><?=Yii::t('users', 'USER_INFO_VIEW');?></h3>
                    <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                      <?=Yii::t('users', 'SET')?>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><?= Yii::$app->user->can('userUpdate', ['user' => $model]) ? Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id]) : '' ?></li>
                    <li class="divider"></li>
                    <li><?= Yii::$app->user->can('userDelete') ? Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], 
                            ['data' => ['confirm' => Yii::t('yii', 'Вы уверены, что хотите удалить данного пользователя?'), 
                            'method' => 'post']]) : ''?></li>
                  </ul>
                </div>
              </div>
                </div>
                <div class="box-body table_td_50">
                    <p class="text-primary"><b><?=Yii::t('users', 'PERSONAL_INFO')?></b></p>
                        <div class="row">
                            <div class="col-lg-3">
                                <?=($model->photo == '') ? Scripts::genderPhoto() : Html::img('/'.$model->photo, ['alt' => $this->header, 'style' => 'width:100%;']); ?> 
                            </div>
                            <div class="col-lg-9">
                                <?= DetailView::widget([
                                    'model' => $model,
        //                            'options' => [
        //                                'class' => 'table table-bordered table-hover dataTable'
        //                            ],
                                    'attributes' => [
                                        'nickname',
                                        'email:email',
            [
                'attribute' => 'contact_tel',
                'format' => 'raw',
                'value' => (!$model->contact_tel) ? '<small class="text-muted">(не указано)</small>' : '<a href="tel:'.$model->contact_tel.'">'.$model->contact_tel.'</a>',
            ],                                        
            [
                'attribute' => 'contact_skype',
                'format' => 'raw',
                'value' => (!$model->contact_skype) ? '<small class="text-muted">(не указано)</small>' : '<a href="skype:'.$model->contact_skype.'?call">'.$model->contact_skype.'</a>',
            ],                                        
            [
                'attribute' => 'contact_icq',
                'format' => 'raw',
                'value' => (!$model->contact_icq) ? '<small class="text-muted">(не указано)</small>' : '<a href="tg://resolve?domain='.$model->contact_icq.'">@'.$model->contact_icq.'</a>',
            ],                                        

                                    ],
                                ]) ?>
                            </div>
                        </div>

                        <br>
                    <p class="text-primary"><b><?=Yii::t('users', 'PAY_INFO')?></b></p>
                    <?= DetailView::widget([
                        'model' => $model,
//                        'options' => [
//                            'class' => 'table table-bordered table-hover dataTable'
//                        ],
                        'attributes' => [
                            [
                                'attribute' => 'pay_wm',
                                'format' => 'raw',
                                'value' => (!$model->pay_wm) ? '<small class="text-muted">(не задано)</small>' : '<a href="https://www.webmoney.ru/" target="_blank">'.$model->pay_wm.'</a>',
                            ],                             
                            [
                                'attribute' => 'pay_yad',
                                'format' => 'raw',
                                'value' => (!$model->pay_yad) ? '<small class="text-muted">(не задано)</small>' : '<a href="https://money.yandex.ru/actions" target="_blank">'.$model->pay_yad.'</a>',
                            ],                             
                            [
                                'attribute' => 'pay_qiwi',
                                'format' => 'raw',
                                'value' => (!$model->pay_qiwi) ? '<small class="text-muted">(не задано)</small>' : '<a href="https://qiwi.com/" target="_blank">'.$model->pay_qiwi.'</a>',
                            ],                             
                            [
                                'attribute' => 'pay_other',
                                'format' => 'raw',
                                'value' => (!$model->pay_other) ? '<small class="text-muted">(не задано)</small>' : '<a href="https://online.sberbank.ru/CSAFront/index.do" target="_blank">'.$model->pay_other.'</a>',
                            ],                             
                        ],
                    ]) ?>
                    <br/>

                </div>
                <div class="box-footer with-border">
                    <?= Yii::$app->user->can('userUpdate', 
                        ['user' => $model]) ? Html::a(Yii::t('yii', 'Update'), 
                            ['update', 'id' => $model->id], 
                            ['class' => 'btn btn-primary btn-flat pull-left']) : '' 
                    ?>
                    <?= Yii::$app->user->can('userDelete') ? Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], 
                            ['class' => 'btn btn-danger btn-flat pull-right', 'data' => ['confirm' => Yii::t('yii', 'Вы уверены, что хотите удалить данного пользователя?'), 
                            'method' => 'post']]) : ''?>                    

                </div>
            </div>
        </div>

        <div class="col-xm-12 col-lg-12">
            <div class="box box-widget collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('users', 'USER_PERMISSIONS')?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?= PermissionsTreeWidget::widget(['user' => $model])?>
                </div>
                <div class="box-footer with-border">
                    <?= Yii::$app->user->can('userPermissions', 
                            ['user' => $model]) ? Html::a(Yii::t('yii', 'Update'), 
                            ['permissions', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat pull-left']) : '' ?>
                </div>
            </div>
        </div>
    </div>
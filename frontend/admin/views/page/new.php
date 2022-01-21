<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Affise;
    use budyaga_cust\users\models\Scripts;
    $one_new = Affise::getNewsID($get['id'], $api);
    $this->title = $one_new['news']['title'];
?>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">News</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><?=Yii::$app->params['name'];?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Pages</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/news">News</a>
                            </li>
                            <li class="breadcrumb-item active">
                                #<?=$get['id'];?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="auto-layout-columns" class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?=Html::tag('h1', $this->title, ['class' => 'display-3 text-primary']);?>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <?php /*
                            <pre>
                                <?php print_r($one_new);?>
                            </pre>
*/ ?>
                            <hr/>
                            <?=$one_new['news']['small_desc'];?>
                            <?=$one_new['news']['desc'];?>
                            <hr/>
                            <?=Html::tag('small', '<i class="feather icon-clock"></i> '.Scripts::formTimeChat($one_new['news']['created_at']['sec']), ['class' => 'text-muted']);?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

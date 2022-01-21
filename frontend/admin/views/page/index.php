<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $this->title = 'Dashboard';
?>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-credit-card text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">92.6k</h2>
                            <p class="mb-0">Hosts <br/><small>Today</small></p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">97.5k</h2>
                            <p class="mb-0">Conversions <br/><small>Today</small></p>
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-dollar-sign text-danger font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><?=$result->partner->balance->USD->balance;?> USD</h2>
                            <div class="d-flex justify-content-start">
                                <div class="pr-2">
                                    <p class="mb-0">
                                        Balance 
                                        <br/>
                                        <small><?=$result->partner->balance->USD->balance;?> USD</small>
                                    </p>
                                </div>
                                <div class="pr-2">
                                    <p class="mb-0">
                                        Hold 
                                        <br/>
                                        <small><?=$result->partner->balance->USD->hold;?> USD</small>
                                    </p>
                                </div>
                                <div class="pr-2">
                                    <p class="mb-0">
                                        Available 
                                        <br/>
                                        <small><?=$result->partner->balance->USD->available;?> USD</small>
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-content">
                            <div id="line-area-chart-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="card-title">Revenue</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-start">
                                    <div class="mr-2">
                                        <p class="mb-50 text-bold-600">This Month</p>
                                        <h2 class="text-bold-400">
                                            <sup class="font-medium-1">$</sup>
                                            <span class="text-success">86,589</span>
                                        </h2>
                                    </div>
                                    <div>
                                        <p class="mb-50 text-bold-600">Last Month</p>
                                        <h2 class="text-bold-400">
                                            <sup class="font-medium-1">$</sup>
                                            <span>73,683</span>
                                        </h2>
                                    </div>
                                </div>
                                <div id="revenue-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-end">
                            <h4 class="mb-0">Goal Overview</h4>
                            <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body px-0 pb-0">
                                <div id="goal-overview-chart" class="mt-75"></div>
                                <div class="row text-center mx-0">
                                    <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">Completed</p>
                                        <p class="font-large-1 text-bold-700">786,617</p>
                                    </div>
                                    <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                        <p class="mb-50">In Progress</p>
                                        <p class="font-large-1 text-bold-700">13,561</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Browser Statistics</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Google Chrome</p>
                                        <h4>73%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>800 <i class="feather icon-arrow-up text-success"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:73%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Opera</p>
                                        <h4>8%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100"
                                        style="width:8%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Firefox</p>
                                        <h4>19%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>100 <i class="feather icon-arrow-up text-success"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="19" aria-valuemin="19" aria-valuemax="100"
                                        style="width:19%"></div>
                                </div>
                                <div class="d-flex justify-content-between mb-25">
                                    <div class="browser-info">
                                        <p class="mb-25">Internet Explorer</p>
                                        <h4>27%</h4>
                                    </div>
                                    <div class="stastics-info text-right">
                                        <span>-450 <i class="feather icon-arrow-down text-danger"></i></span>
                                        <span class="text-muted d-block">13:16</span>
                                    </div>
                                </div>
                                <div class="progress progress-bar-primary mb-50">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="27" aria-valuemin="27" aria-valuemax="100"
                                        style="width:27%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Client Retention</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="client-retention-chart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">TOP offers</h4>
                </div>
            </div>   
            <div class="row">
                <?php 
                $col= Scripts::getPostCount($allPartner['pagination']['total_count']);
                foreach ( $allPartner['offers'] as &$part ) { ?>
                <?php if($part['privacy'] == 'private') : else : ?>
                <div class="col-lg-<?=$col;?> col-md-6 col-sm-12">
                    <div class="card text-white bg-gradient-primary text-left">
                        <div class="card-content d-flex">
                            <div class="card-body"> 
                                <?=($part['logo'] == '') ? 
                    Html::img('/img/nofoto.png', ['alt' => 'placeholder',  'width' => '150', 'class' => 'float-left pr-3']) : 
                    Html::img(Yii::$app->affise->offers.$part['logo'], ['alt' => 'placeholder',  'width' => '150', 'class' => 'float-left pr-3']);?>
                                <h4 class="card-title text-white mt-2 cp" onclick="getStartLink('/offer/hub<?=$part['id'];?>.aspx')">#<?=$part['id'];?> <?=$part['title'];?></h4>
                                <p class="card-text">
                                <?=$part['payments'][0]['revenue'];?> <?=($part['payments'][0]['type'] == 'percent') ? '%' : $part['payments'][0]['currency'];?></p>
                                <button class="btn btn-info waves-effect waves-light" onclick="getStartLink('/offer/hub<?=$part['id'];?>.aspx')">Get the link</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php } ?>
            </div>
        </section>
    </div>
</div>
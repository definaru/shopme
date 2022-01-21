<?php
    use yii\helpers\Html;
    $linkpartner = Yii::$app->affise->tracking.'click?pid='.Yii::$app->affise->USERID.'&offer_id='.$get['id'];
    $lang = Yii::$app->language;
    $this->title = $result['offer']['title'];
    $image = ($result['offer']['logo'] == '/images/cpa/logos///') ? '/img/nofoto.png' : Yii::$app->affise->offers.$result['offer']['logo'];
?>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Offer</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><?=Yii::$app->params['name'];?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/dashboard">Pages</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/offers">Offers</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Offer #<?=$get['id'];?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Chat</a>
                        <a class="dropdown-item" href="#">Calendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="description-list-alignment">
            <div class="row">
                <div class="col-md-12 mt-1">
                    <div class="group-area">
                        <?=Html::tag('h1', $this->title);?>
                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-sm-12 col-md-4">
                    <div class="card" style="height: 392px;">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <div class="d-flex flex-column">
                                        <div class="p-2">
                                            <?=Html::img($image, ['alt' => $this->title, 'class' => 'mt-3', 'style' => 'width:60%;']);?>
                                        </div>
                                        <div class="p-2">
                                            <h5><?=$adv->advertiser->title;?></h5>
                                            <?php // =Html::a($result->offer->external_offer_id, $result->offer->external_offer_id, ['target' => '_blank']);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card" style="height: 392px;">
                        <div class="card-header">
                            <h4 class="card-title">Description <small class="text-muted">Offer</small></h4>
                            <span class="badge badge badge-pill badge-success float-right"><?=$result['offer']['status'];?></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend" id="btn-copy">
                                            <span class="input-group-text">
                                                <i class="feather icon-copy"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username" value="<?=$linkpartner;?>" id="copy-to-clipboard-input">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" onclick="getStartLink('<?=$linkpartner;?>')">view</button>
                                        </div>
                                    </div>

                                    
                                    <dl class="row">
                                        <dt class="col-sm-3">Description kpi:</dt>
                                        <dd class="col-sm-9" id="kpistrong"><?=$result['offer']['kpi'][$lang];?></dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Click Session Lifespan:</dt>
                                        <dd class="col-sm-9">
                                            <?=$result['offer']['click_session'];?>  <b>Min\s.:</b>
                                            <?=$result['offer']['minimal_click_session'];?>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Start at:</dt>
                                        <dd class="col-sm-9"><?=$result['offer']['start_at'];?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card" style="background: transparent;box-shadow: none;">
                        <div class="card-header bg-white shadow rounded" style="padding-bottom: 1.5rem;">
                            <a data-action="collapse" class=""><h4 class="card-title">Creatives </h4></a>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse" class=""><i class="feather icon-chevron-down"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse" style="">
                            <div class="card-body mt-2 p-0">
                                <div class="row match-height">
                                    <?php foreach ( $result['offer']['creatives'] as $key => $item ) { ?>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <div class="card shadow">
                                            <?php if($item['type'] == 'image/jpeg') : ?>
                                            <div class="card-header" style="height: 400px">
                                                <?=Html::img($item['file_name'], ['class' => 'card-img img-fluid mb-1', 'alt' => 'Card image cap'])?>
                                                <div id="view<?=$key;?>" class="collapse" style="width:100%;">
                                                    <div class="form-group" style="position: absolute;width: 92%;top: 0;margin-top: 27px;">
                                                        <pre class="language-HTML" style="height: 370px;">
                                                            <code class="language-HTML">
<?php
$width = ($item['width'] > 1000) ? $item['width']/100*50 : $item['width'];
$height = ($item['height'] > 600) ? $item['height']/100*50 : $item['height'];
$html = '<a href="'.$linkpartner.'" target="_top">
            <img border="0" src="'.$item['file_name'].'" alt="'.Yii::$app->params['name'].'" width="'.$width.'" height="'.$height.'">
        </a>';
echo htmlspecialchars($html);?>

                                                            </code>
                                                        </pre>                                      
                                                        
                                                        
<!--                                                        <textarea  class="form-control" style="position: absolute;width: 93%;height: 389px;top: 0;margin-top: 21px;">


                                                        </textarea>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else : endif;?>
                                            <div class="card-body">
                                                <h4><?=($item['type'] == 'url') ? '<i class="feather icon-link"></i> Url Link' : 'Banner';?> </h4>
                                                <p class="card-text mb-0">
                                                    <?php if($item['type'] == 'url') : ?>
                                                        <b>Url:</b> <?=Html::a($item['url'], $item['url'], ['target' => '_blank']);?>
                                                    <?php else: ?>
                                                        <b>Type:</b> <?=$item['type'];?><br/>
                                                        <b>Format:</b> <?=$item['width'].'x'.$item['height'];?><br/>
                                                        <b>Size:</b> <?=$item['size'];?>
                                                    <?php endif;?>
                                                </p>
                                            </div>                                            
                                            <div class="card-footer pt-0 bg-white">
                                                <div class="card-btns d-flex justify-content-between mt-2">
                                                    <a href="https://jsfiddle.net" class="btn gradient-light-primary text-white waves-effect waves-light">Download</a>
                                                    <?php if($item['type'] == 'url') : ?>
                                                        <a href="<?=$item['url'];?>" target="_blank" class="btn btn-outline-primary waves-effect waves-light">View</a>
                                                    <?php else: ?>
                                                    <button data-toggle="collapse" data-target="#view<?=$key;?>" class="btn btn-outline-primary waves-effect waves-light">View</button>
                                                    <?php endif;?>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Null</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-text">
                                    <dl class="row">
                                        <dt class="col-sm-3 text-right">Description lists</dt>
                                        <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3 text-right">Euismod</dt>
                                        <dd class="col-sm-9">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt></dt>
                                        <dd class="col-sm-9 ml-auto">Donec id elit non mi porta gravida at eget metus.</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3 text-right">Malesuada porta</dt>
                                        <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3 text-right text-truncate">Truncated term is truncated</dt>
                                        <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3 text-right">Nesting</dt>
                                        <dd class="col-sm-9">
                                            <dl class="row">
                                                <dt class="col-sm-4">Nested definition list</dt>
                                                <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                                            </dl>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
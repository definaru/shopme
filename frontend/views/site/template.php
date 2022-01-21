<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $color = $page->slider ? '#fff' : '#000';
    $this->title = (!$page->title) ? Yii::t('yii', 'Template') : $page->title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
    $this->registerCss('
        h1 span {color:#E9204F}
        h1 {
            font-family: "Poppins", sans-serif;
            font-weight: 900;
        }
        p {font-family: "Poppins", sans-serif;}
        .navbar-dark .navbar-nav .nav-link {
            color: '.$color.';
        }
        .back {background: #000000bd;padding: 20px 0;}
        .text_two {
            font-family: "Poppins", sans-serif;
            font-weight: 300;
        }
        .icon_contact {
            font-size: 70px;
            margin-top: 0;
            margin-right: 15px;
            color: #e9204f;
        }
        .pr__secondary {
            width: 40px;
            border-top: 2px solid #E9204F !important;
            position: relative;
            top: -12px;      
        }
    ');
?>
<section style="<?=$page->slider ? 'padding: 0;background: url('.$page->slider.') no-repeat;background-size: cover;background-position: center center' : 'padding:100px 0;';?>">
    <div<?=$page->slider ? ' class="back"' : '';?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="padding-top:100px;">
                   
                    <h1 class="<?=$page->slider ? ' text-white' : ' text-dark'?>"><?=$page->header;?></h1>
                    <div class="d-flex justify-content-center">
                        <div class="pr__secondary"></div>
                    </div> 
                    
                    <?=Html::tag('h5', $page->text, ['class' => $page->slider ? 'text-light text_two' : 'text-muted text_two']);?>
                    <?=Scripts::Edit('page', $page->id)?>
                    <br/>
                    <br/>
                    <?=Html::a('<i class="fa fa-angle-down"></i>', '#send', ['class' => $page->slider ? 'hex text-white' : 'hex text-dark', 'style' => 'font-size:55px;']);?>                 
                </div>
            </div>
        </div>
    </div>    
</section>



<section id="send" style="padding:100px 0;">
    <div class="container">
        <div class="row">
        <?php $flag = 1; foreach (Scripts::getTemplate() as $value) { $x = $flag++;?>
            <div class="col-md-8 offset-md-2">
                <hr class="pr__hr__secondary">
                <h3 style="font-family: 'Poppins', sans-serif;font-weight: 900;"><?=$value->name;?></h3>
                <p class="text-justify"><?=$value->description;?></p>
                <a href="<?=$value->image;?>" data-fancybox="gallery" data-caption="Work #<?=$x?>">
                    <img src="<?=$value->image;?>" alt="Work #<?=$x?>" style="width:100%;" class="img-fluid img-thumbnail mb-3" alt="1" />
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <a data-fancybox="site" data-type="iframe" data-src="<?=$value->demo;?>" href="javascript:;" class="btn btn-outline-dark btn-block">Demo</a>
                    </div>
                    <div class="col-md-6">
                        <a data-fancybox="reviews" class="btn btn-success btn-block" data-animation-duration="700" data-src="#animatedModal<?=$x?>" href="javascript:;">
                            <?=Yii::t('yii', 'Order this site')?>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 pt-4 pb-4"><hr/></div>
                </div>
            </div>
            
                    <div style="display: none;" id="animatedModal<?=$x?>" class="animated-modal">
                        <div class="media">
                            <img src="<?=$value->image;?>" alt="<?=$value->name;?>" class="border mr-4 mt-0 rounded-0" style="width:250px;">
                            <div class="media-body vera-href">
                                <h4 class="m-0">
                                    <?=$value->name;?> 
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" style="padding: 0px 12px;">
                                        <i class="fa fa-question"></i>
                                    </button>
                                </h4>
                                
                                <small class="text-muted"><?=Yii::t('yii', 'User rating')?></small>
                                <p>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </p>                                
                                <form action="/action_page.php">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" placeholder="Ваше Ф.И.О.">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Ваш E-mail">
                                            </div>                                             
                                        </div>
                                        <div class="col-md-6">                                            
                                            <div class="form-group">
                                                <input type="phone" class="form-control" placeholder="Ваш номер телефона">
                                            </div> 
                                        </div>
                                    </div>
                                    
   
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" name="love" type="checkbox"> Нравиться
                                                </label>
                                            </div>              
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" name="love" type="checkbox"> Хочу доработать дизайн
                                                </label>
                                            </div>            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-dark sea mt-3"><?=Yii::t('yii', 'Send', ['icon' => '<i class="fa fa-paper-plane"></i>'])?></button>
                                        
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
        <?php } ?>   
        </div>
    </div>
</section>



        </div>
    </div>    
</section>


  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
            <h5 class="modal-title">Для чего эта форма?</h5>
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            <p>Мы заботимся о качестве нашего сервиса, поэтому нам важно, 
                чтобы вам было комфортно пользоваться им. Если вы вдруг 
                потеряете ваш заказ, или не сможете вспомнить, что у нас 
                уже заказывали, то мы сможем найти это для вас.</p>
        </div>
      </div>
    </div>
  </div>
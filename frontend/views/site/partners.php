<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    
    $color = $model->show_photo ? '#fff' : '#000';
    $this->title = (!$page->title) ? Yii::t('yii', 'For Partners') : $page->title;;
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
        .back {background: #000000ab;padding: 150px 0;}
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
    ');
?>
<section style="<?=$model->show_photo ? 'padding: 0;background: url('.$model->show_photo.') no-repeat;background-size: cover;background-position: center center' : 'padding:100px 0;';?>">
    <div<?=$model->show_photo ? ' class="back"' : '';?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left" style="padding-top:100px;">
                    
                    <h1 class="line<?=$model->show_photo ? ' text-white' : ' text-dark'?>">
                        <?=$model->show_header;?><?=Scripts::Edit('slider', $model->id)?>
                    </h1>
                    
                    <?=Html::tag('h5', $model->show_text, ['class' => $model->show_header ? 'text-light text_two' : 'text-muted text_two']);?>
                    <br/>
                    <br/>
                    <div class="d-flex justify-content-center">
                        <?=Html::a('<i class="ionicons ion-android-arrow-down"></i>', '#send', ['class' => 'hex', 'style' => 'color:'.$color.';font-size: 35px;']);?> 
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>

<section id="send" style="padding:100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?=(!$model->show_texter) ? '...' : Html::tag('p', $model->show_texter, ['class' => 'no-padding xs-justify sm-justify md-left lg-left']);?>
            </div>
            <div class="col-md-8 offset-md-2 text-center">
                <a id="brony" href="/register" class="btn btn-outline-danger rounded-0 sea"><?=Yii::t('yii', 'Become a partner')?></a>
            </div>
        </div>
    </div>
</section>
            

        </div>
    </div>    
</section>
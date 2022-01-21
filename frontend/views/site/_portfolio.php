<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $img = ($size == 1) ? str_replace('.', '-large.', $imstep->img) : $imstep->img;
?>
<div class="outer text-center">
    <a data-fancybox="reviews" data-animation-duration="700" data-src="#animatedModal<?=$imstep->sort;?>" href="javascript:;">
        <span>
            <h2><?=$imstep->name;?></h2>
            <small><?=$imstep->filter;?></small>
        </span>
        <img src="<?=$img;?>" class="img-fluid img-thumbnail p-0 border border-secondary rounded-0" alt="Work #1"/>
    </a>
    <div style="display: none;" id="animatedModal<?=$imstep->sort;?>" class="animated-modal">
        <div class="row">
            <div class="col-md-5">
                <div style="width:100%;height: auto;overflow: hidden;box-shadow: 0 8px 18px #0000002e;">
                    <a href="<?=$imstep->pdf;?>" data-fancybox="gallery" data-caption="<?=$imstep->title;?>">
                        <img src="<?=str_replace('.', '-large.', $imstep->img);?>" class="img-fluid img-thumbnail" style="width: 100%;" alt="<?=$imstep->name;?>"/>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <br/>
                <br/>

                <h2><hr class="pr__hr__secondary"/><?=$imstep->title.Scripts::Edit('catalog', $imstep->id);?></h2>
                <p>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                </p>  
                <p><?=$imstep->filter;?></p>
                <br/>
                <?=Html::a(
                    Html::tag('u', Scripts::noProtocol($imstep->header)), 
                    $imstep->header, 
                    ['class' => 'text-muted btn-block', 'target' => '_blank', 'rel' => 'nofollow']);
                ?>
                <br/>
                <button type="button" class="btn btn-outline-danger sea" onclick="getStartLink('/portfolio/<?=$imstep->link;?>.html')">Хочу такой же сайт</button>
            </div>
        </div>   
    </div>
</div>

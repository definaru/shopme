<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Slider;
    $model = Slider::find()->where(['lang' => Yii::$app->language])->orderBy(['id' => SORT_ASC])->all();
?>

<section id="data-service-column" class="clients-logo-area">
    <div class="container">
        <div class="row">
            <?php foreach ( $model as $serv ) { ?>
            <div class="col-md-4 pt-4">
                <div id="orders" class="card shadow rounded-0" onclick="getStartLink('/<?=$serv->link;?>')">
                    <div class="card-body"><?=$serv->show_icon;?></div>
                    <div class="card-body">
                        <h3 class="title uk-h4"><?=$serv->show_header;?></h3>
                        <span></span>
                    </div> 
                    <div class="card-body">
                        <p class="description"><?=$serv->show_text;?></p>
                    </div>
                    <div class="card-footer border-0">
                        <u>
                            <?=Yii::t('yii', 'More details')?>
                        </u>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div> 
    </div>
</section>
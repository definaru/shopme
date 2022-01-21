<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $color = $page->slider ? '#fff' : '#000';
    $this->title = Yii::t('yii', 'FAQ');
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
        .back {background: #000000bd;padding: 120px 0;}
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
        .breadcrumb-item.active {
            color: #dfdfdf;
        }
        .breadcrumb li a {
            color: #e9204f;
            font-weight: 500;
            text-transform: uppercase;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            color: #eae9e9;
        }
    ');
?>
<section style="<?=$page->slider ? 'padding: 0;background: url('.$page->slider.') no-repeat;background-size: cover;background-position: center center' : 'padding:100px 0;';?>">
    <div class="back">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left mt-4">
                    <hr class="pr__hr__secondary">
                    <?=Html::tag('h2', $page->header, ['class' => $page->slider ? 'title text-white' : 'title text-dark'])?>
                    <?=Html::tag('h5', $page->text, ['class' => $page->slider ? 'text-light text_two' : 'text-muted text_two']);?>
                    <?=Scripts::Edit('page', $page->id)?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">F.A.Q.</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>



<section style="padding:100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="accordion">
                    <?php Scripts::getAllFAQ();?>
                </div>  
                <?=Scripts::Edit('faq')?>
            </div>
        </div>
    </div>
</section>

        </div>
    </div>
</section>
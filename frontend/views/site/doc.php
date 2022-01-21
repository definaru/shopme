<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $page = Scripts::getPage();
    $x = ($get) ? 'docs' : 'page';
    $y = ($get) ? $get->id : $page->id;
    $this->title = (!$get) ? 'Legal Documents' : $get->header;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
    $this->registerCss('
        #documentFix a {
            font-weight: normal;
            color: #222;
        }
        #documentFix a:hover {
            color: #413aa4;
            border-bottom: 1px dotted #413aa4;
        }
    ');
?> 
        <div 
            id="rev_slider_35_1_wrapper" 
            class="rev_slider_wrapper fullwidthbanner-container" 
            data-alias="slider9"
            data-source="gallery"
            style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center" style="margin-top:100px;">
                        
                        <?=Html::tag('h2', Scripts::tagFirstWord($this->title).Scripts::Edit($x, $y));?>
                        <?php if($get) : else : ?>
                        <h1><?=$page->header.Scripts::Edit('page', $page->id)?></h1>
                        <h4><?=$page->text;?></h4>
                        <?=(!$page->fulltext) ? '' : Html::tag('p', $page->fulltext, ['class' => 'no-padding xs-justify sm-justify md-left lg-left']);?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
                    
                    



<section class="section">
    <div class="container">
        <div class="row">
            <div class="text-center col-md-8 offset-md-2 pb-5">
                <div class="brblock text-justify">
                    <?=Html::tag('p', ($get) ? $get->text : $page->text);?>
                    <?=($get) ? '' : $page->fulltext;?>
                </div>   
            </div>
        </div>
    </div>
</section>



<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div id="documentFix" class="text-center col-md-6 offset-md-3 pt-5 pb-5 mt-4">
                <?php foreach (Scripts::getDocument() as $mark) { ?>
                    <?=Html::tag('h5', Html::a($mark->header, '/doc/'.$mark->href, ['class' => '']).Scripts::Edit('docs', $mark->id));?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
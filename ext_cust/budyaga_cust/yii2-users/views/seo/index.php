<?php

use yii\helpers\Html;
use budyaga_cust\users\models\Defina; 
//use yii\grid\GridView;

$this->registerLinkTag(['rel' => 'shortcut icon','type' => 'image/x-icon','href' => '/favicon/favicon.png',]);
$this->header = 'SEO - оптимизация';
$this->title = 'Функционал раскрутки сайта';
$this->params['breadcrumbs'][] = $this->header;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="ionicons ion-ios-settings-strong"></i> Настройки <small class="text-primary">SEO-оптимизация</small>
                  <?=((Defina::compatible == '') || (Defina::viewport === '') || ($seo->description == '') || ($seo->keywords == '')) ? 
                    '<i class="ionicons ion-android-warning text-danger"></i>' : 
                    '<i class="ionicons ion-android-done text-success"></i>';?>
                </h3>
                <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <div class="btn-group">
                          <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
                          <ul class="dropdown-menu" role="menu">
                              <li><?= Html::a(Yii::t('yii', 'Update'), ['create']) ?></li>
                          </ul>
                      </div>
                </div>
            </div>
          <form action="" role="form">
            <div class="box-body">
              <div class="row">
                    <div class="col-md-12">
                        <?php if((Defina::compatible == '') || (Defina::viewport === '') || ($seo->description == '') || ($seo->keywords == '')) : ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong><?=Yii::t('yii', 'Error');?></strong> ваш сайт не оптимизирован
                            </div>                    
                        <?php else : ?>
                        <span class="label label-success"><i class="ionicons ion-android-done"></i> Всё отлично!</span>
                        <div class="brblock"><br/></div>

                            <div class="form-group">
                              <label for="X-UA-Compatible">X-UA-Compatible</label>
                              <button type="button" class="btn bg-navy btn-flat mmd"><?=Defina::compatible;?></button>
                              <pre class="nobrborder"><code class="language-html">&lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;<?=Defina::compatible;?>&quot; /&gt;</code></pre>
                            </div>
                            <div class="form-group">
                              <label for="viewport">Вьюпорт</label>
                              <button type="button" class="btn bg-navy btn-flat mmd"><?=Defina::viewport;?></button>
                              <pre class="nobrborder"><code class="language-html">&lt;meta name=&quot;viewport&quot; content=&quot;<?=Defina::viewport;?>&quot; /&gt;</code></pre>
                            </div>
                            <div class="form-group">
                              <label for="keywords">Ключевые слова</label>
                              <button type="button" class="btn bg-navy btn-flat mmd"><?=$seo->keywords;?></button>
                              <pre class="nobrborder"><code class="language-html">&lt;meta name=&quot;keywords&quot; content=&quot;<?=$seo->keywords;?>&quot; /&gt;</code></pre>
                            </div>
                            <div class="form-group">
                              <label for="description">Описание сайта</label>
                              <button type="button" class="btn bg-navy btn-flat mmd"><?=$seo->description;?></button>
                              <pre class="nobrborder"><code class="language-html">&lt;meta name=&quot;description&quot; content=&quot;<?=$seo->description;?>&quot; /&gt;</code></pre>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?=Html::a(Yii::t('users', 'BACK'), '/wekrate', ['class' => 'btn btn-default btn-flat pull-left']);?>
                <?=Html::a(Yii::t('yii', 'Update'), '#', ['class' => 'btn btn-primary btn-flat pull-right']);?>
            </div>
          </form>
      </div>
    </div>

    <div class="col-md-12">
        <div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">
                  <i class="ionicons ion-ios-settings-strong"></i> Настройки 
                  <small class="text-primary">sitemap.xml</small>
                  <?php $sitemap = 'sitemap.xml'; echo (!file_exists($sitemap)) ? 
                    '<i class="ionicons ion-android-warning text-danger"></i>' : 
                    '<i class="ionicons ion-android-done text-success"></i>';?> 
              </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= Html::a(Yii::t('yii', 'Update'), ['sitemap']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?php $sitemap = 'sitemap.xml'; if(!file_exists($sitemap)) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?=Yii::t('yii', 'Error');?></strong> У вас нет карты сайта!
                    </div>
                <?php else : ?>
                <span class="label label-success"><i class="ionicons ion-android-done"></i> Всё отлично!</span>
                <br/>
                <label>Содержимое файла <code>sitemap.xml</code> <small class="text-muted">Размер файла - <?=filesize($sitemap)?>Kb</small></label>                
                
                <pre><code class="language-html"><textarea class="form-control" rows="30"><?=file_get_contents(htmlspecialchars($sitemap))?></textarea></code></pre>
                <?php endif; ?>
            </div>
            <div class="box-footer">
                <?=Html::a(Yii::t('users', 'BACK'), '/wekrate', ['class' => 'btn btn-default btn-flat pull-left']);?>
                <?=Html::a(Yii::t('yii', 'Update'), ['sitemap'], ['class' => 'btn btn-primary btn-flat pull-right']);?>
            </div>
        </div>        
    </div>      
    
    

    

    <div class="col-md-12">    
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="ionicons ion-ios-settings-strong"></i> Настройки <small class="text-primary">robots.txt</small>
                  <?php $robots = 'robots.txt'; echo (!file_exists($robots)) ? 
                    '<i class="ionicons ion-android-warning text-danger"></i>' : 
                    '<i class="ionicons ion-android-done text-success"></i>';?>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><?=Yii::t('users', 'SET');?></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= Html::a(Yii::t('yii', 'Update'), ['edit']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="brblock"></div>              

                <?php $robots = 'robots.txt'; if(!file_exists($robots)) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?=Yii::t('yii', 'Error');?></strong> У вас нет файла robots.txt!
                    </div>                
                <?php else : ?> 
                    <span class="label label-success"><i class="ionicons ion-android-done"></i> Всё отлично!</span>
                        <br/>
                        <label>Содержимое файла <code>robots.txt</code> <small class="text-muted">Размер файла - <?=filesize($robots)?>Kb</small></label>

                        <pre><code class="language-css"><?=file_get_contents($robots)?></code></pre>
                    <div class="brblock"></div> 

                <?php endif; ?>

            </div>
            <div class="box-footer">
                <?=Html::a(Yii::t('users', 'BACK'), '/wekrate', ['class' => 'btn btn-default btn-flat pull-left']);?>
                <?=Html::a(Yii::t('yii', 'Update'), ['edit'], ['class' => 'btn btn-primary btn-flat pull-right']);?>
            </div>
        </div>	    
    </div>
    <div class="col-md-12">
        <div class="callout callout-info">
            <h4>Вы можете загрузить файлы</h4>
            <p>У вас есть возможность загрузить файлы в формате <code>.txt</code> и <code>.xml</code></p>
            <?=Html::a('Загрузить файлы', ['upload'],['class' => 'btn btn-primary btn-flat']);?>
        </div>        
    </div>    
</div>

<script src="/css3/js/prism.js"></script>
<?php
    use yii\helpers\Html;
    use budyaga_cust\users\models\Scripts;
    $this->title = ($date) ? 'Заказ №'.$model->date : 'Список заказчиков';
?>
        <div id="rev_slider_35_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider9"
                     data-source="gallery"
                     style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-top:200px;">
                        <div class="d-none d-print-block mb-5 pb-5"><img class="logo" src="/task/img/logo.svg" alt="logo"></div>
                        <?=Html::tag('h2', $this->title, ['class' => 'line']);?>
                        <?php if(!Yii::$app->user->can('administrator')) : else : ?>

                        <?php if($date) : else : ?>
                        
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>#ticket</th>
                                        <th>Ф.И.О.</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                    </tr>
                                    <?php foreach ($list as $item) { ?>
                                    <tr>
                                        <td>№<?=$item->date;?></td>
                                        <td><?=$item->fio;?></td>
                                        <td><?=Scripts::mail($item->email);?></td>
                                        <td><?=Scripts::phone($item->phone);?></td>
                                        <td><?=Scripts::getTimeChat($item->date);?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php endif;?>
                    </div>
                    <?php endif;?>
                    
                    
                    
                    
                    <?php if(!$date) : else : ?>
                    <div class="col-md-12">
                        
                        <p>Ф.И.О.: <?=$model->fio;?></p>
                        <hr/>
                        <p>Дата оформления: <?=Scripts::getTimeChat($model->date);?></p>
                        <div class="d-print-none">
                            <a href="/register" class="btn btn-danger">Быстрая регистрация</a>
                            <button class="btn btn-outline-danger" onclick='window.print()'><i class="ionicons ion-android-print"></i> Распечатать</button>                            
                        </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>

    </div>
</div>
</section>

    <section class="subscribe-seven d-print-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="subscribe-contents text-center">
                        <h2>Get Started Instantly! <br> <span>Request a Call Back Now</span></h2>
                        <form action="#" class="subscribe-form-two p-left-50 p-right-50">
                            <div>
                                <input type="text" class="form-control" placeholder="Enter your email address" aria-label="Username">
                                <button class="btn btn-primary">Request Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    use yii\helpers\Html;
    $this->title = 'Отдел программирования';
    $this->header = 'Редактор кода';
    $this->params['breadcrumbs'][] = $this->header;
?>
<div class="box box-default">
    <div class="box-header with-border">
        <i class="ionicons ion-fork-repo" style="color: #d13a7a;"></i>
        <h3 class="box-title"><?= Html::encode($this->header) ?></h3>
    </div>
    <div class="box-header with-border">
<?=(Yii::$app->user->can(administrator)) ? Html::tag('p', 'Вы являетесь администратором сайта',['class' => 'text-muted']) : '<div class="callout callout-danger"><h4><i class="icon fa fa-warning"></i> Доступ запрещён</h4></div>';?>
    </div>
    <div class="box-body">
<?php if(Yii::$app->user->can(administrator)) : ?>

    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong style="font-size: 25px;"><i class="ionicons ion-android-warning"></i> Внимание</strong> 
        <hr/>
        Данный раздел CMS системы расчитан на профессиональных программистов, 
        разбирающихся в ООП и владеющими такими языками программирования как:
        <b>php, javascript, ajax, sql</b>
    </div>
<div class="brblock"></div>
<?=Html::a('<i class="ionicons ion-code-working"></i> Начать редакцию', [view], ['class' => 'btn btn-success btn-lg btn-flat']);?>
<?php else : ?>
<code>Вам не разрешено пользоваться редактором кода</code>
<?php endif; ?>        
    </div>
</div>



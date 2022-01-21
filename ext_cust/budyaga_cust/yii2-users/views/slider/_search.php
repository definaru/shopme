<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get',]); ?>
<div id="searth" class="collapse">
    <table class="table">
        <tr>
            <td style="width: 20px;"><?=Html::a('<i class="fa fa-refresh"></i>', ['index'], ['class' => 'btn btn-default'])?></td>
            <td><?= $form->field($model, 'show_header')->textInput(['placeholder' => 'поиск по названию'])->label(false);?></td>
            <td style="width: 100px;"><?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary btn-block']);?></td>        
        </tr>
    </table>    
</div>
<?php ActiveForm::end(); ?>

    <?php // echo $form->field($model, 'id') ?>
    <?php // echo $form->field($model, 'show_photo') ?>
    <?php // echo $form->field($model, 'show_icon') ?>
    <?php // echo $form->field($model, 'show_time') ?>
    <?php // echo $form->field($model, 'show_header') ?>
    <?php // echo $form->field($model, 'show_text') ?>
    <?php // echo $form->field($model, 'show_texter') ?>
    <?php // echo $form->field($model, 'show_news') ?>
    <?php // echo $form->field($model, 'show_post') ?>
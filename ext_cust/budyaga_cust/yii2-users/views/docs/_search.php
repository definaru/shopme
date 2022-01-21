<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get',]); ?>
<div id="searth" class="collapse">
    <table class="table">
        <tr>
            <td style="width: 20px;"><?=Html::a('<i class="fa fa-refresh"></i>', ['index'], ['class' => 'btn btn-default'])?></td>
            <td><?= $form->field($model, 'header')->textInput(['placeholder' => 'поиск по названию'])->label(false);?></td>
            <td style="width: 100px;"><?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary btn-block']);?></td>        
        </tr>
    </table>    
</div>
<?php ActiveForm::end(); ?>
    <?php // $form->field($model, 'id') ?>
    <?php // $form->field($model, 'img') ?>
    <?php // $form->field($model, 'text') ?>
    <?php // $form->field($model, 'href') ?>
<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>
<div id="searth" class="collapse">
    <table class="table">
        <tr>
            <td style="width: 20px;"><?=Html::a('<i class="fa fa-refresh"></i>', ['index'], ['class' => 'btn btn-default'])?></td>
            <td><?=$form->field($model, 'header')->textInput(['placeholder' => 'поиск по заголовку'])->label(false);?></td>
            <td><?= $form->field($model, 'land')->dropDownList(['ru' => 'русский', 'en' => 'английский', 'it' => 'итальянский'], ['prompt' => 'поиск по языку страницы'])->label(false);?></td>
            <td style="width: 100px;"><?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary btn-block']);?></td>        
        </tr>
    </table>    
</div>

    <?php // echo $form->field($model, 'id') ?>
    <?php // echo $form->field($model, 'title') ?>
    <?php // echo $form->field($model, 'keywords') ?>
    <?php // echo $form->field($model, 'description') ?>
    <?php // echo $form->field($model, 'background') ?>
    <?php // echo $form->field($model, 'header') ?>
    <?php // echo $form->field($model, 'text') ?>
    <?php // echo $form->field($model, 'fulltexts') ?>
    <?php // echo $form->field($model, 'land') ?>
    <?php // echo $form->field($model, 'link') ?>

<?php ActiveForm::end(); ?>






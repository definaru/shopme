<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'href')->textInput(['placeholder' => 'введите ссылку']) ?>
        <div class="row">
            <div class="col-lg-10">
                <?= $form->field($model, 'icon')->textInput(['placeholder' => 'выберите иконку'])->label('') ?> 
            </div>
            <div class="col-lg-2 right">
                <br/><a href="/defina/iconsforsite" target="_blank" style="width: 100%;" class="btn btn-info">выбрать иконку</a>
            </div>
        </div>
        <?= $form->field($model, 'name')->textInput(['placeholder' => 'введите название']) ?>
        <?= $form->field($model, 'access')->dropDownList([
                '0' => 'Показать',
                '1' => 'Скрыть'
            ]);
        ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>



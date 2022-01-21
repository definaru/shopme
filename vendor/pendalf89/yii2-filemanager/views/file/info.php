<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use pendalf89\filemanager\assets\FilemanagerAsset;
use pendalf89\filemanager\Module;
use pendalf89\filemanager\models\Tag;
$this->registerCss('
    .dashboard {
        width: 30%;
        float: left;
        padding-left: 10px;
    }    
');
function moontag($value)
{
    $value = strtr($value, array(
        "January" => "Января", 
        "February" => "Февраля", 
        "March" => "Марта", 
        "April" => "Апреля", 
        "May" => "Мая", 
        "June" => "Июня", 
        "July" => "Июля", 
        "August" => "Августа", 
        "September" => "Сентября", 
        "October" => "Октября", 
        "November" => "Ноября", 
        "December" => "Декабря"));
    return $value;
} 

$bundle = FilemanagerAsset::register($this);
?>

<?= Html::img($model->getDefaultThumbUrl($bundle->baseUrl)) ?>

<ul class="detail">
    <li>Тип: <?= $model->type ?></li>
    <li class="text-muted"><i class="ionicons ion-ios-calendar-outline"></i> <?=moontag(Yii::$app->formatter->asDatetime($model->getLastChanges(), Yii::$app->params['dateFormat'])); ?></li>
    <?php if ($model->isImage()) : ?>
    <li>Формат: <?= $model->getOriginalImageSize($this->context->module->routes) ?></li>
    <?php endif; ?>
    <li>Размер: <?= $model->getFileSize() ?></li>
    <li><?= Html::a(Yii::t('yii', 'Delete'), ['file/delete/', 'id' => $model->id],
            [
                'class' => 'text-danger',
                'data-message' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'data-id' => $model->id,
                'role' => 'delete',
            ]
        ) ?></li>
</ul>
<div class="filename"><br/><hr/><?//= $model->filename ?></div>

<?php $form = ActiveForm::begin([
    'action' => ['file/update', 'id' => $model->id],
    'enableClientValidation' => false,
    'options' => ['id' => 'control-form'],
]); ?>

    <?= $form->field($model, 'tagIds')->widget(\kartik\select2\Select2::className(), [
        'id' => 'update-image-tag',
        'maintainOrder' => true,
        'data' => ArrayHelper::map(Tag::find()->all(), 'id', 'name'),
        'options' => ['multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10,
            // нельзя создавать теги с числовым именем
            'createTag' => new \yii\web\JsExpression("function (params) {
                if (/^\d+$/.test(params.term)) {
                    return null;
                }
                return {id: params.term, text: params.term};
            }"),
        ],
    ]) ?>

    <?php if ($model->isImage()) : ?>
        <?= $form->field($model, 'alt')->textInput(['class' => 'form-control input-sm']); ?>
    <?php endif; ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5, 'class' => 'form-control input-sm']); ?>

    <?php if ($model->isImage()) : ?>
        <div class="form-group<?= $strictThumb ? ' hidden' : '' ?>">
            <?= Html::label(Yii::t('yii', 'Select image size'), 'image', ['class' => 'control-label']) ?>

            <?= Html::dropDownList('url', $model->getThumbUrl($strictThumb), $model->getImagesList($this->context->module), [
                'class' => 'form-control input-sm'
            ]) ?>
            <div class="help-block"></div>
        </div>
    <?php else : ?>
        <?= Html::hiddenInput('url', $model->url) ?>
    <?php endif; ?>

    <?= Html::hiddenInput('id', $model->id) ?>

    <?= Html::button(Yii::t('yii', 'Insert'), ['id' => 'insert-btn', 'class' => 'btn btn-primary btn-sm']) ?>

    <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success btn-sm']) ?>

    <?php if ($message = Yii::$app->session->getFlash('mediafileUpdateResult')) : ?>
        <div class="text-success"><?= $message ?></div>
    <?php endif; ?>
<?php ActiveForm::end(); ?>

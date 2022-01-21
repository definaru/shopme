<?php

use yii\helpers\Html;
$this->header = 'Добавляем кнопку';

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Folliws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model,]) ?>

<?php

use yii\helpers\Html;
$this->header = 'Обновление данных';
$this->title = 'Просмотр';
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Folliws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<?= $this->render('_form', ['model' => $model,]);?>
<?php
    $this->header = 'Новая Услуга';
    $this->title = Yii::t('yii', 'Create Service');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Services'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model, 'data' => $data]) ?>
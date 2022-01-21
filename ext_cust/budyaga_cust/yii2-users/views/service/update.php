<?php
    $this->title = 'Редактируем услугу';
    $this->header = $model->header;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Services'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<?= $this->render('_form', ['model' => $model, 'data' => $data]) ?>
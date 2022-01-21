<?php
    $this->title = 'Обновить страницу';
    $this->header = $model->header;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Faqs'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => 'Вопрос №'.$model->id, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model,]) ?>

<?php
    $this->header = 'Новая страница';
    $this->title = 'Создаём';
    $this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Faqs'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model,]) ?>
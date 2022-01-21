<?php

    namespace budyaga_cust\users\models;
    
    use Yii;
    /**
     * Description of Alert
     * @author Inc Defina
     */
    
class SweetAlert
{
    public function getMessege($param, $type = '', $text = '') 
    {
        if($type == 'success') {
            $header = Yii::t('yii', 'Congratulations');
            $type = "success";
        } elseif ($type == 'warning') {
            $header = Yii::t('yii', 'Attention');
            $type = "warning";
        } elseif ($type == 'error') {
            $header = Yii::t('yii', 'Error');
            $type = "error";
        } elseif ($type == 'info') {
            $header = Yii::t('yii', 'Information');
            $type = "info";
        } elseif ($type == '') {
            $header = Yii::t('yii', 'Information');
            $type = "info";
        } else {
            $header = Yii::t('yii', 'Information');
            $type = "info";
        } // SweetAlert::getMessege($param, $type = '', $text = '')
        return (Yii::$app->session->hasFlash($param)) ? $this->registerJs('swal(" '.$header.' " , " '.$text.' ", "'.$type.'")') : '';
    }

 
}

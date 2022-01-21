<?php
namespace pendalf89\filemanager\widgets;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use pendalf89\filemanager\assets\FileInputAsset;
use yii\helpers\Url;

/**
 * Class FileInput
 *
 * Basic example of usage:
 *
 *  <?= FileInput::widget([
 *      'name' => 'mediafile',
 *      'buttonTag' => 'button',
 *      'buttonName' => 'Browse',
 *      'buttonOptions' => ['class' => 'btn btn-default'],
 *      'options' => ['class' => 'form-control'],
 *      // Widget template
 *      'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
 *      // Optional, if set, only this image can be selected by user
 *      'thumb' => 'original',
 *      // Optional, if set, in container will be inserted selected image
 *      'imageContainer' => '.img',
 *      // Default to FileInput::DATA_URL. This data will be inserted in input field
 *      'pasteData' => FileInput::DATA_URL,
 *      // JavaScript function, which will be called before insert file data to input.
 *      // Argument data contains file data.
 *      // data example: [alt: "Witch with cat", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
 *      'callbackBeforeInsert' => 'function(e, data) {
 *      console.log( data );
 *      }',
 *  ]) ?>
 *
 * This class provides filemanager usage. You can optional select all media file info to your input field.
 * More samples of usage see on github: https://github.com/PendalF89/yii2-filemanager
 *
 * @package pendalf89\filemanager\widgets
 * @author Zabolotskikh Boris <zabolotskich@bk.ru>
 */
class FileInput extends InputWidget
{
    public $template = '<div class="input-group">{input}<span class="input-group-btn">{button}{reset-button}</span></div>';
    public $buttonTag = 'button';
    public $buttonName = 'Browse';
    public $buttonOptions = ['class' => 'btn btn-default'];
    public $resetButtonTag = 'button';
    public $resetButtonName = '<span class="text-danger glyphicon glyphicon-remove"></span>';
    public $resetButtonOptions = ['class' => 'btn btn-default'];
    public $thumb = '';
    public $imageContainer = '';
    public $callbackBeforeInsert = '';
    public $pasteData = self::DATA_URL;
    public $options = ['class' => 'form-control'];
    public $frameSrc  = ['/filemanager/file/filemanager'];

    const DATA_ID = 'id';
    const DATA_URL = 'url';
    const DATA_ALT = 'alt';
    const DATA_DESCRIPTION = 'description';


    public function init()
    {
        parent::init();

        if (empty($this->buttonOptions['id'])) {
            $this->buttonOptions['id'] = $this->options['id'] . '-btn';
        }

        $this->buttonOptions['role'] = 'filemanager-launch';
        $this->resetButtonOptions['role'] = 'clear-input';
        $this->resetButtonOptions['data-clear-element-id'] = $this->options['id'];
        $this->resetButtonOptions['data-image-container'] = $this->imageContainer;
    }


    public function run()
    {
        if ($this->hasModel()) {
            $replace['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $replace['{input}'] = Html::textInput($this->name, $this->value, $this->options);
        }
        $replace['{button}'] = Html::tag($this->buttonTag, $this->buttonName, $this->buttonOptions);
        $replace['{reset-button}'] = Html::tag($this->resetButtonTag, $this->resetButtonName, $this->resetButtonOptions);
        FileInputAsset::register($this->view);
        if (!empty($this->callbackBeforeInsert)) {
            $this->view->registerJs('
                $("#' . $this->options['id'] . '").on("fileInsert", ' . $this->callbackBeforeInsert . ');'
            );
        }

        $modal = $this->renderFile('@vendor/pendalf89/yii2-filemanager/views/file/modal.php', [
            'inputId' => $this->options['id'],
            'btnId' => $this->buttonOptions['id'],
            'frameId' => $this->options['id'] . '-frame',
            'frameSrc' => Url::to($this->frameSrc), 
            'thumb' => $this->thumb,
            'imageContainer' => $this->imageContainer,
            'pasteData' => $this->pasteData,
        ]);

        return strtr($this->template, $replace) . $modal;
    }
}
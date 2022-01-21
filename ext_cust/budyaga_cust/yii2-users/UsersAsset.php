<?php

namespace budyaga_cust\users;

use yii\web\AssetBundle;

/**
 * Widget asset bundle
 */
class UsersAsset extends AssetBundle
{
	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@budyaga_cust/users/assets';

    public $js = [
        'js/users.js'
    ];

	/**
	 * @inheritdoc
	 */
	public $depends = [
		'yii\web\JqueryAsset'
	];
}

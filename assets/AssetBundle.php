<?php

namespace hectordelrio\zerone\assets;

/**
 * Created by PhpStorm.
 * User: hector
 * Date: 20/01/17
 * Time: 13:21
 */
class AssetBundle extends \yii\web\AssetBundle
{
    public $sourcePath = __DIR__;

    public $js = [
        'js/main.js'
    ];

    public $css = [
        'css/main.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
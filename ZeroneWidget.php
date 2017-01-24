<?php

namespace hectordelrio\zerone;

use yii\base\Exception;

/**
 * Created by PhpStorm.
 * User: hector
 * Date: 20/01/17
 * Time: 13:09
 */
class ZeroneWidget extends \yii\base\Widget
{

    public $ratio = '16:9';
    public $url = null;
    public $size = '100%';
    public $zoom = true;

    private $_paddingTop = null;
    private $_width = null;
    private $_widthUnit = null;

    public function init()
    {

        parent::init();

        // validate given properties

        if (empty($this->size)) {

            throw new Exception("Property 'size' cannot be empty.");

        }

        if (!preg_match('/^\d+:\d+$/', $this->ratio)) {

            throw new Exception("Property 'ratio' must be a string like this: '16:9'.");

        }

        // calculate percentual height from given ratio
        list($A, $B) = explode(':', $this->ratio);

        $this->_paddingTop = $B / ($A / 100) . '%';

        $this->_width = (float)filter_var($this->size, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $this->_widthUnit = substr($this->size, strlen($this->_width));

        if (empty($this->_widthUnit)) {

            $this->_widthUnit = 'px';

        }

        if ($A < $B) {
            $this->_width = ($A / $B) * $this->_width;
        }

    }

    public function run()
    {
        $id = $this->getId();
        $url = $this->url;
        $width = $this->_width . $this->_widthUnit;
        $paddingTop = $this->_paddingTop;

        if (!empty($url) and $this->zoom === true) {

            \Yii::$app->view->registerCss(<<<CSS
#$id > .zerone-image-preview:hover {
    cursor: zoom-in;
    opacity: 0.5;
}
CSS
            );

            \Yii::$app->view->registerJs(<<<JS
(function ($) {
    $(document).on('click', '#$id', $.fn.zoomImage);
})(window.jQuery);
JS
            );

        }

        return $this->render('main', compact('id', 'url', 'width', 'paddingTop'));

    }
}
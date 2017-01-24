<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 20/01/17
 * Time: 13:17
 *
 * @var string $id
 * @var \yii\web\View $this
 * @var string $url
 * @var string $width
 * @var string $paddingTop
 */

hectordelrio\zerone\assets\AssetBundle::register($this);

?>

<div id="<?= $id ?>"
     style="width: <?= $width ?>"
     class="image-container <?= (empty($url) ? ' empty' : '') ?>"
>
    <div class="image-preview" <?= (empty($url) ? '' : "style=\"background-image: url($url);\"") ?>></div>
    <div class="ratio-keeper" style="padding-top: <?= $paddingTop ?>"></div>
</div>

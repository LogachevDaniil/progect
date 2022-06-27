<?php

/** @var yii\web\View $this */

use yii\helpers\Html;


$this->registerCssFile ( '$web/css/location.css');

$this->title = 'Где нас найти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-location">
    <h1>Где нас найти</h1>
    <p>
        8(900)123-45-67, г. Санкт-Петербург, ул. Малая морская, д. 98 лит К, printer@lucshe.net
    </p>
    <?= Html::img('@web/photo/123.PNG', ['alt' => 'Наш логотип']) ?>
    
</div>

<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-about">
    <h1>О нас</h1>
    <p>
    Компания «Copy Star» занимается обслуживанием физических и юридических лиц и дает возможность приобретать любой товар в любом количестве из всего огромного ассортимента, представленного на сайте компании. Индивидуальный подход к каждому клиенту и выделение персонального менеджера по продажам позволяет подобрать наиболее эффективное решение и обеспечить достойный сервис, отвечающий всем пожеланиям.
    </p>
    <h1>Девиз: </h1>

    <p>
      Пока принтер печатает — вы отдыхаете!
    </p>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
  </ol>
  
  <div class="carousel-inner mx-auto text-center">
  <?php foreach($val as $key => $row):?>
    <?php $active = !$key ? 'active': '' ?>
    <div class="carousel-item <?= $active ?>">
    <?= Html::img("@web/img/{$row['photo']}", ['alt' => 'Карта', 'class' => 'center']) ?>
      <div class="carousel-caption d-none d-md-block">
        <h5 class="bg-light text-dark"><?= $row['title']?></h5>
      </div>
    </div>
    <?php endforeach?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Предыдущий</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Следующий</span>
  </a>
</div>
</div>

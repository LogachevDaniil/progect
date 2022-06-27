<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tovar */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tovars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tovar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
       
        
    </p>
    <div>
        <?= !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ? 
            Html::a('В корзину', ['/cart/add', 'id'=>$model->id], ['class' => 'btn btn-success'])
            : ''
             ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'price',
            'photo',
            'country',
            'model',
            'year',
            'count',
            'id_category',
        ],
    ]) ?>
<button type="button" href="/catalog" class="btn btn-dark">каталог</button>
</div>
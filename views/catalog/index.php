<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TovarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tovar';
$this->params['breadcrumbs'][] = $this->title;
$this -> registerCssFile('@web/css/catalog.css');
?>
<div class="tovar-index" id="blok-pjax">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(["enablePushState" => false, "timeout" => 5000,"id"=> "pijax-cataloge"]); ?>
    <?php echo $this->render('_search', ['model' => $searchModel,'dataProvider' => $dataProvider,
            'catalvib'=> $catalvib]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{pager}<div class="row">{items}</div>{pager}',
        'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            $kartochka = '<div class="card" style="width: 18rem;">'
            . Html::a(Html::img("@web/img/{$model->photo}",['alt'=>'карта','class'=>'img_cards']), ['/catalog/view', 'id'=>$model->id])
            . '<div class="card-body">'
            . '<h5 class="card-title">' .$model -> title . '</h5>'
            . '<p class="card-text">' .$model -> price . '</p>'
            . '<a href="/catalog/view?id=' . $model -> id . '" class="btn btn-primary">Go somewhere</a>'
            . '</div>'
            . ( !Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ? 
            Html::a('В корзину', ['/cart/add', 'id'=>$model->id], ['class' => 'btn btn-success'])
            : ''
            ) 
            . '</div>';
            return $kartochka;//Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TovarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tovar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    
<div class = "row">
<div class = "col-md-6">
    <div>Сортировать по :</div>
    <div class="row sort">
        <?= $dataProvider->sort->link('title',["class" => "btn btn-outline-primary"])?>
        <?= $dataProvider->sort->link('price',["class" => "btn btn-outline-primary"])?>
        <?= $dataProvider->sort->link('year',["class" => "btn btn-outline-primary"]) ?>
    </div>
</div>
<div class="col-md-6">
    <div class = "product-search">
    <?php 
        $params = [
            'prompt' => 'все категории'
        ];
        echo $form->field($model,'id_category')->dropDownList($catalvib,$params)->label('Выбереете категорию');
    ?>
    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'id_category') ?>

    <div class="form-group">
        <?= Html::resetButton('сброс', ['class' => 'btn btn-outline-secondary']) ?>
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>

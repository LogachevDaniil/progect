<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'email',['enableAjaxValidation' => true]) ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>            

                    <?= $form->field($model, 'surname') ?>

                    <?= $form->field($model, 'patronymic') ?>
                    
                    <?= $form->field($model, 'login',['enableAjaxValidation' => true]) ?>
                    
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    
                    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

                    <?= $form->field($model, 'rules')->checkbox() ?>
                  
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

</div>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div style="min-height:75vh; padding-top: 200px; color: #e2e2e2;" class="text-center mild-bg">

<div class="site-signup">

    <div class="container">
    <div class="row">
        <div class="col-md-6" style="float: right">
            <?php $form = ActiveForm::begin(); ?>

            <?=$form->field($model, 'name')->textInput(['autofocus' => true,'placeholder'=>'نام'])->label('نام')?>

            <?=$form->field($model, 'lastname')->textInput(['placeholder'=>'نام خانوادگی'])->label('نام خانوادگی')?>

            <?= $form->field($model, 'username')->textInput(['placeholder'=>'نام کاربری'])->label('نام کاربری') ?>

            
            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'رمز عبور'])->label('پسورد') ?>
            

        </div>

        <div class="col-md-6" style="float: right">
            <?= $form->field($model, 'tel')->textInput(['placeholder'=>'تلفن']) ?>
            <?=$form->field($model, 'address')->textarea(['placeholder'=>'آدرس'])->label('آدرس')?>

            <div class="text-right">

                <div class="form-group">
                    <?= Html::submitButton('ثبت نام', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
</div>
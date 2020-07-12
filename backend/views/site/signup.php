<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-signup" style="height: 100vh;text-align: center">

    <div class="row">
        <div class="col-md-3 col-lg-3 "></div>
        <div class="col-md-6 col-lg-6 ">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?=$form->field($model, 'name')->textInput(['autofocus' => true])->label('نام')?>

            <?=$form->field($model, 'lastname')->textInput(['autofocus' => true])->label('نام خانوادگی')?>
            
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('پسورد') ?>

            <?= $form->field($model, 'tel')->textInput()->label('تلغن') ?>

            <?=$form->field($model, 'address')->textarea(['autofocus' => true])->label('آدرس')?>

            <?= $form->field($model, 'roles')->dropDownList($roles, ['prompt' => 'نقش کاربر را مشخص کنید'])->label('') ?>

            <?= $form->field($model, 'credit')->textInput()->label('مقدار اعتبار') ?>


            <div class="control-group" style="margin-bottom: 2%">
                <div class="controls">
                    <label>تاریخ شروع اعتبار</label>
                    <br>
                    <input type="text" name="time" id="datepicker4" />
                </div>
            </div>






            <div class="text-right">
                
</div>
            <div class="form-group">
                <?= Html::submitButton('ثبت نام', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3 col-lg-3 "></div>
    </div>

</div>


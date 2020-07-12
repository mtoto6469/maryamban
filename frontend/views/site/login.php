<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ورود';

$url=Yii::$app->urlManager;

?>
<div style="min-height:75vh; padding-top: 200px;color: #e2e2e2;" class="text-center mild-bg">





    <div class='login'>
        <h2>ورود</h2>



        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'نام کاربری'])->label('نام کاربری') ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'رمز عبور'])->label('پسورد') ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            اگر پسورد خود را فراموش کردیده ای  <?= Html::a('reset it', ['site/request-password-reset']) ?>.
        </div>

        <div class="form-group">
            <?= Html::submitButton('ورود', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <a href="<?=$url->createAbsoluteUrl(['site/signup'])?>" class="btn btn-success"> ثبت نام</a>
        </div>





        <?php ActiveForm::end(); ?>




        <a class='forgot' href='#'>Already have an account?</a>
    </div>



</div>
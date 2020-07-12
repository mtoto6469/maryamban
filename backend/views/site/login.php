<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ورود';
?>
<div class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => "نام کاربری"])->label('نام کاربری') ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => "رمز ورود"])->label('رمزورود') ?>
                    <?= $form->field($model, 'rememberMe')->checkbox()->label('مرا به یاد داشته باش') ?>
                    <div class="form-group">
                        <?= Html::submitButton('ورود', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </section>
            </div>
        </div>
    </div>
</div>

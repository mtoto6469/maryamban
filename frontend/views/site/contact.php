<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';

?>


<div class="container">
<div class="row" >
    <div class="col-sm-8" style="text-align: right!important;">

            <h2 class="title text-center">تماس با ما</h2>

        <?php $form = ActiveForm::begin(); ?>
            <div class="status alert alert-success" style="display: none"></div>

                <div class="form-group col-md-6">
                    <?= $form->field($message, 'title')->textInput(['placeholder'=>'موضوع']) ?>
                </div>
                <div class="form-group col-md-6">
                    <?= $form->field($message, 'tell')->textInput(['placeholder'=>'تلفن']) ?>
                </div>
                <div class="form-group col-md-12">
                    <?= $form->field($message, 'email')->textInput(['placeholder'=>'ایمیل']) ?>
                </div>
                <div class="form-group col-md-12">
                    <?= $form->field($message, 'text')->textarea(['placeholder'=>'پیام']) ?>

                </div>
                <div class="form-group col-md-12" >
                    <?= \yii\helpers\Html::submitButton('ارسال پیام', ['class' => 'btn btn-primary']) ?>

                </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="col-sm-4">
    <div class="contact-info" style="text-align: right!important;">
            <h2 class="title text-center">آدرس ما</h2>
            <address>
                <p>مریم بانو</p>
                <p>آدرس</p>
                <p>تلفن: +2346 17 38 93</p>
                <p>فاکس: 1-714-252-0026</p>
                <p>ایمیل: </p>
            </address>
            <div class="social-networks">
                <h2 class="title text-center">پیوندها</h2>
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
</div>


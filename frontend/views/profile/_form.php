<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblprofile-form" >

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>


    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'tel')->textInput() ?>
    </div>

</div>




    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php
    $check=\frontend\models\Tblprofile::find()->where(['user_id'=>Yii::$app->user->getId()])->one();

    if($check->role == 'costumer'){
       echo $form->field($model, 'mande')->textInput(['disabled' => 'disabled']);
        echo $form->field($model, 'date_credit')->textInput(['disabled' => 'disabled']);

    }

    ?>

    <div class="form-group">
        <?= Html::submitButton( Yii::t('app', 'ویرایش'), ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSodorFactor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sodor-factor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ref')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'data_ir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resive')->textInput() ?>

    <?= $form->field($model, 'visibel')->textInput() ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_city')->textInput() ?>

    <?= $form->field($model, 'code_off')->textInput() ?>

    <?= $form->field($model, 'off')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

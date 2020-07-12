<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSodorFactorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sodor-factor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_ref') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'data_ir') ?>

    <?php // echo $form->field($model, 'resive') ?>

    <?php // echo $form->field($model, 'visibel') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'id_city') ?>

    <?php // echo $form->field($model, 'code_off') ?>

    <?php // echo $form->field($model, 'off') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

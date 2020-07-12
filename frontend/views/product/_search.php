<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblproductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblproduct-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'id_type') ?>

    <?= $form->field($model, 'id_brand') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'enabel') ?>

    <?php // echo $form->field($model, 'enabel_view') ?>

    <?php // echo $form->field($model, 'price_namayande') ?>

    <?php // echo $form->field($model, 'time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

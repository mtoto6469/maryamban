<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblbagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblbag-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_pro') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'date_ir') ?>

    <?php // echo $form->field($model, 'id_fac') ?>

    <?php // echo $form->field($model, 'enabel') ?>

    <?php // echo $form->field($model, 'enable_view') ?>

    <?php // echo $form->field($model, 'down_buy') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'pak') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

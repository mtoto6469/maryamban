<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblbagReplaceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblbag-replace-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_pro') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'id_fac') ?>

    <?php // echo $form->field($model, 'enabel') ?>

    <?php // echo $form->field($model, 'enabel_view') ?>

    <?php // echo $form->field($model, 'down_buy') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'id_all_post') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'id_replace') ?>

    <?php // echo $form->field($model, 'id_bag') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

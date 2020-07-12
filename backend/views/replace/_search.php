<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblreplaceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblreplace-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_pro') ?>

    <?= $form->field($model, 'id_fac') ?>

    <?= $form->field($model, 'text_user') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'confirm') ?>

    <?php // echo $form->field($model, 'text_admin') ?>

    <?php // echo $form->field($model, 'post_price') ?>

    <?php // echo $form->field($model, 'enabel_view') ?>

    <?php // echo $form->field($model, 'id_bag') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblcategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcategory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'title_category') ?>

    <?= $form->field($model, 'description_category') ?>

    <?= $form->field($model, 'enable_category') ?>

    <?= $form->field($model, 'enable_view_category') ?>

    <?php // echo $form->field($model, 'id_parent') ?>

    <?php // echo $form->field($model, 'group_category') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblpostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblpost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_group') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'text_web') ?>

    <?= $form->field($model, 'id_img_mob') ?>

    <?php // echo $form->field($model, 'id_img_web') ?>

    <?php // echo $form->field($model, 'id_category_post') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enable_view') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'time_ir') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'id_position') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-9 col-lg-9">
<div class="tblpost-form" >
    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_web')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_img_web')->dropDownList($img,['prompt'=>'لطفا انتخاب کنید'])->label('عکس') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'خیر',1=>'بله'])?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true])->hint('به کدام صفحه لینک شود',['style'=>'color:#169F85']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ایجاد') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
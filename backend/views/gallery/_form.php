<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-9 col-md-9">
<div class="tblgallery-form" style="height: 100vh">

    <?php $form = ActiveForm::begin(); ?>
    <?php if($model->isNewRecord) {
    echo $form->field($modelup, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);
}?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'and_web')->dropDownList([1=>'موبایل',2=>'سایت']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enable')->radioList([1=>'بله',2=>'خیر']) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
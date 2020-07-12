<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategory */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-9 col-lg-9">
<div class="tblcategory-form" style="height: 100vh">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_category')->textInput(['maxlength' => true]) ?>
    <?php
        $model->group_category='1';
        $model->enabel_view_category='1';
    ?>

    <?= $form->field($model, 'description_category')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable_category')->radioList([0=>'خیر' ,1=>'بله'])->label('قابل نمایش') ?>

    <?= $form->field($model, 'id_parent')->dropDownList($itemcat,['prompt'=>'انتخاب کنید',])->label('دسته مورد نظر را انتخاب کنید') ?>
    
    <?= $form->field($model, 'menu_foter')->radioList([0=>'منو' ,1=>'فوتر'])?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'بروز رسانی'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblmenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblmenu-form">

    <?php $form = ActiveForm::begin(); ?>

<?php if($item==null)
{
    echo $form->field($model, 'id_category')->dropDownList($item,['prompt'=>'دسته یا برگه ای وجود ندارد']) ;
}

 else{
    echo $form->field($model, 'id_category')->dropDownList($item);
}
?>
    0
    <?= $form->field($model, 'position')->textInput()->label('الویت را مشخص کنید دقت شود که عدد تکراری وارد نکنید') ?>
    <?= $form->field($model, 'enable')->radioList([1=>'بله', 0=>'خیر']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ایجاد منو') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

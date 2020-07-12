<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblreplace */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">


<div class="tblreplace-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'text_admin')->textarea(['rows' => 6]) ?>

    <?php
    if($flag==1){
        echo  $form->field($model, 'post_price')->radioList([0=>'هزینه رفت و برگشت بر عهده مشتری',1=>'هزینه رفت و برگشت بر عهده کارخانه']) ;
    }

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
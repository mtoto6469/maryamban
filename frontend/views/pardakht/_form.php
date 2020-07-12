<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblpardakht */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

<div class="tblpardakht-form" style="padding: 3%">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($modelp, 'end_number')->textInput() ?>

    <?= $form->field($modelp, 'price')->textInput() ?>
    
    <?= $form->field($modelp, 'peygiri')->textInput() ?>
    
    <div class="form-group">
        <label class="sr-only" for="exampleInput1">تاریخ و زمان</label>
        <div class="input-group">
            <div class="input-group-addon" data-mddatetimepicker="true" data-targetselector="#exampleInput1" data-trigger="click" data-enabletimepicker="true">
                <span class="glyphicon glyphicon-calendar"></span>
            </div>
            <input name="date" type="text" class="form-control" id="exampleInput1" placeholder="تاریخ به همراه زمان" />
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($modelp->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $modelp->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
    <div class="col-md-3"></div>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">


<div class="tblproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_category')->dropDownList($name,['prompt'=>'انتخاب کنید'])->hint('دسته ی مورد نظر را وارد کنید',['style'=>'color:#169F85']) ?>

    <?= $form->field($model, 'id_type')->dropDownList($type,['prompt'=>'انتخاب کنید'])->hint('جنس محصول را انتخاب کنید',['style'=>'color:#169F85'])?>

    <?= $form->field($model, 'id_brand')->dropDownList($brand,['prompt'=>'انتخاب کنید'])->hint('برند مورد نظر را وارد کنید',['style'=>'color:#169F85']) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true])->hint('سایز های مربوط به این محصول را وارد کنید و هر کدام را با , از هم جدا کنید',['style'=>'color:#169F85']) ?>
    
    <?= $form->field($model, 'price')->textInput()->hint('قیمتی را که برای کاربر عادی می باشد را وارد کنید',['style'=>'color:#169F85']) ?>

     <?= $form->field($model, 'price_namayande')->textInput()->hint('قیمتی را که برای نمایندکان می باشد را وارد کنید',['style'=>'color:#169F85']) ?>

    <?= $form->field($model, 'pak')->textInput()->hint('    قیمتی که از پک کامل کم شود لطفا به ریال وارد شود',['style'=>'color:#169F85'])->label('پک') ?>

    <?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>



    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width: 200px">

  <?php  }else{
         echo '<img id="blah" src="#" alt="your image" style="width: 200px">';
    }

    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->hint('توضیحات مربوط به کاربر',['style'=>'color:#169F85']) ?>


    <?php

    if(!$model->isNewRecord){?>

        <div class="control-group" style="margin-bottom: 2%">
            <div class="controls">
                <label>تاریخ تولید</label>
                <br>
                <input type="text" name="time" id="datepicker4" value="<?=$model->time_ir?>" />
            </div>
        </div>

   <?php }else{?>


        <div class="control-group" style="margin-bottom: 2%">
            <div class="controls">
                <label>زمان ارسال</label>
                <input type="text" name="time" id="datepicker4" />
            </div>
        </div>

    <?php }

    ?>






    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

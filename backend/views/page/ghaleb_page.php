<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
$item=[1 => 'قالب اول', 2 => 'قالب دوم', 3=> 'قالب سوم',4=> 'قالب چهارم ',5=> 'قالب پنجم',6 => 'قالب ششم'];
?>
    <div class="row n" style="height: 100vh">
    <h2>قالب ها</h2>
    <p class="text-center">دقت کنید که برای رفتن به مرحله ی بعد انتخاب قالب الزامی می باشد</p>
    <div class="row " style="padding:0 6% ">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'id_group')->dropDownList($item ,['style'=>'width:80%'])->label('');?>

    </div>
    <div class="row">
        <div class="top-margin-hs71">
            <div class=" col-sm-2 col-md-2 col-lg-2 "></div>
            <div class=" col-sm-8 col-md-8 col-lg-8" >
                <div class="col-sm-4 col-md-4 col-lg-4  text-center"><img src="<?=Yii::$app->request->hostInfo?>/upload/macbook-pro.png" style="width: 150px"><span>قالب اول</span></div>
                <div class="col-sm-4 col-md-4 col-lg-4 text-center"><img src="<?=Yii::$app->request->hostInfo?>/upload/macbook-pro.png"style="width: 150px" ><span>قالب دوم</span></div>
                <div class=" col-sm-4 col-md-4 col-lg-4 text-center"><img src="<?=Yii::$app->request->hostInfo?>/upload/macbook-pro.png"style="width: 150px"><span>قالب سوم</span></div>
            </div
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </div>

    <div class="row">
        <div class="top-margin-hs71">
            <div class=" col-sm-2 col-md-2 col-lg-2 "></div>
            <div class="col-sm-8 col-md-8 col-lg-8" >
                <div class="col-sm-4 col-md-4 col-lg-4 text-center"><img src="<?=Yii::$app->request->hostInfo?>/upload/macbook-pro.png" style="width: 150px"><span>قالب چهارم</span></div>
                <div class="col-sm-4 col-md-4 col-lg-4 text-center"><img src="<?=Yii::$app->request->hostInfo?>/upload/macbook-pro.png" style="width: 150px"><span>قالب پنجم</span></div>
                <div class="col-sm-4 col-md-4 col-lg-4 text-center"><img src="<?=Yii::$app->request->hostInfo?>/upload/macbook-pro.png" style="width: 150px"><span>قالب ششم</span></div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </div>
    <div class="row top-margin-hs71">
        <div class="form-group text-left">
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-sm-8 col-md-8 col-lg-8 " >  <?= Html::submitButton( Yii::t('app', 'ادامه ') , ['class' =>  'btn btn-success' , 'style'=>'width:150px']) ?></div>
            <div class="col-sm-2 col-md-2 col-lg-2"></div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
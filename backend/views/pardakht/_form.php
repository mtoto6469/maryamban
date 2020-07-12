<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpardakht */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">



<div class="tblpardakht-form" style="height: 100vh">

    <?php $form = ActiveForm::begin(); ?>
<?php
if($fac!=0){?>
    <p>.  ارسال خطا ی پرداخت برای کاربر    <span style="color:darkred"> <?=$user->username?> </span>قیمت فاکتور    <span style="color:darkred"><?=$fac->price?></span> </p>

<?php
}else{
      echo 'افزایش اعتبار برای کاربر'.$user->username;
}


?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"><ul>
                <li>شماره پیگیری</li>
                <li>4رقم آخر کارت</li>
                <li>قیمت پرداختی</li>
                <li>تاریخ پرداخت</li>
            </ul></div>
        <div class="col-md-3"><ul>
                <li><?=$model->peygiri?></li>
                <li><?=$model->end_number?></li>
                <li><?=$model->price?></li>
                <li><?=$model->date?></li>
            </ul></div>
        <div class="col-md-3"></div>

    </div>


    <?= $form->field($model,'admin_description')->textarea()->label('علت عدم تایید') ?>

    <div class="form-group">
        <?= Html::submitButton( Yii::t('app', 'ارسال') , ['class' =>  'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
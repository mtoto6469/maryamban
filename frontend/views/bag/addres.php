<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url=Yii::$app->urlManager;
$form = ActiveForm::begin(); ?>

<div class="shopper-informations">
    <div class="container">
    <div class="row">

        <div class="col-sm-12 " style="text-align: right!important;">
            <div class="row" >
                <?php foreach ($sub as $s){
                    $pro=\frontend\models\Tblproduct::find()->where(['id'=>$s->id_pro])->one();
                    ?>
                <div class="col-md-6" >
                <div class="form-one">
                    <div class="" style="width: 100%;border:1px solid  silver;box-shadow:2px 2px 5px silver;">
                       <div style="float: right">
                        <p >  <span style="padding: 2px"><?=$pro->name?></span>  محصول</p>
                        <p >  <span style="padding: 2px"><?=$s->color?></span> رنگ </p>
                        <p >  <span style="padding: 2px"><?=$s->size?></span>سایز   </p>
                        <p >  <span style="padding: 2px"><?=$s->count?></span>تعداد   </p>

                       </div>
                            <div class="checkout-options" style="float: left">
                                <ul class="nav">
                                    <li>
                                        <a href="<?=$url->createAbsoluteUrl(['bag/delete_sub','id'=>$s->id])?>"><i class="fa fa-times"></i>حذف</a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
                </div>
            <?php }?>


            </div>
        </div>
    </div>
        <div class="row">
        <div class="col-sm-12">
            <div class="order-message">
                <div class="row">

                    <?php


                    $check=\frontend\models\TblSodorFactor::find()->where(['id_user'=>Yii::$app->user->getId()])
                        ->andWhere(['date_deliver'=>null])->all();
                    foreach ($check as $ch){

                        $addres=\frontend\models\Tblallpost::find()->where(['id_fac'=>$ch->id])->all();

                        foreach ($addres as $ad){?>

                            <select name="adres">ادرس
                                <option value="">آدرس</option>
                                <option value="<?=$ad->id?>"><?=$ad->address?></option>
                            </select>


                            <?php
                        }
                    }

                    ?>




                </div>
              

                <div class="form-group">
                    <?= Html::submitButton( Yii::t('app', 'ادامه'), ['class' =>  'btn btn-default pull-right','style'=>'float:left!important']) ?>
                </div>


            </div>
        </div>
    </div>
</div>
    </div>
<?php ActiveForm::end(); ?>

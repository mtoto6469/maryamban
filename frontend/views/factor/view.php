

<?php
use frontend\models\NameProduct;
use frontend\models\TblbagDesign;
use frontend\models\Tblgroup;
use frontend\models\Tblpostproduct;
use frontend\models\Tblproduct;
use frontend\models\TypeProduct;
use frontend\models\Tblbag;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url=Yii::$app->urlManager;
?>
<div class="container content">


    <?php

    if($model->confirm==3){
        $pardakht=\frontend\models\Tblpardakht::find()->where(['id_fac'=>$model->id])->one();

        ?>


        <div class="alert alert-danger" style="margin: 2%">
            <strong>عدم تایید!</strong> <?=$pardakht->admin_description?>
            <a href="<?=$url->createAbsoluteUrl(['pardakht/view2','id'=>$pardakht->id])?>">بررسی پرداخت</a>
        </div>



    <?php }elseif($model->confirm==0){?>

        <div class="alert alert-warning" style="margin: 2%">
            <strong>در دست بررسی!</strong>
        </div>


    <?php 
        
    }
   ?>

    <?php $user= \common\models\User::find()->where(['id'=>Yii::$app->user->getId()])->one()?>
    <div class="row" style="padding: 2%;">
        <!-- Pricing -->

        <div class="pricing hover-effect">
            <div class="pricing-head">

                <h4>
                    <i>
                        قیمت فاکتور:<?=$model->price?>تومان</i>

                </h4>
            </div>




            <?php

            foreach ($allpost as $al1){
                $bag=Tblbag::find()->where(['id_all_post'=>$al1->id])->all();



                ?>

                <div class="row">



                    <h4 style="padding-right: 5%">محصول </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pricing-content list-unstyled right-ul">
                                <li>
                                    نام
                                </li>
                                <li>
                                    جنس
                                </li>
                                <li>
                                    برند
                                </li>
                                <li>
                                    سایز
                                </li>
                                <li>
                                    رنگ
                                </li>
                                <li>
                                    تعداد
                                </li>

                                <li>
                                    قیمت محصول
                                </li>

                                <li>
                                    عکس محصول
                                </li>


                            </ul>
                        </div>
                        <?php

                        foreach ($bag as $b){

                        $product=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                        $cat=\frontend\models\TblcategoryProduct::find()->where(['id'=>$product->id_category])->one();
                        $type=\backend\models\TbltypeProduct::find()->where(['id'=>$product->id_type])->one();
                        $brand=\backend\models\Tblbrand::find()->where(['id'=>$product->id_brand])->one();
                        if($b->size==0){
                            $size='پک کامل';
                        }else{
                            $size=$b->size;
                        }

                        ?>
                        <div class="col-md-12">
                            <ul class="pricing-content list-unstyled right-ul">
                                <li>
                                    <?=$product->name?>
                                </li>
                                <li>
                                    <?php
                                    if($type!=null){
                                        if($type->type==null){
                                            echo '--';

                                        }else{
                                            echo $type->type;
                                        }
                                    }else{
                                        echo '--';
                                    }


                                    ?>

                                </li>
                                <li>
                                    <?php

                                    if($brand!=null){
                                        if($brand->brand==null){
                                            echo '--';

                                        }else{
                                            echo $brand->brand;
                                        }

                                    }else{
                                        echo '--';
                                    }


                                    ?>

                                </li>
                                <li>
                                    <?=$size?>
                                </li>
                                <li>
                                    <?=$b->color?>
                                </li>

                                <li>
                                    <?=$b->count?>
                                </li>

                                <li>
                                    <?=$b->price?>
                                </li>

                                <li>


                                    <img style="width:50px " src="<?=Yii::$app->request->hostInfo?>/upload/<?=$product->img?>">;

                                </li>
                            </ul>
                        </div>

                    </div>
                    <br>
                    <br>

                    <?php

                    }

                    ?>
                    <div class="text-right">
                        <p>آدرس ارسال: <?=$al1->address?></p>
                        <p>هزینه ارسال: <?=$al1->price_post?></p>
                        <p>هزینه نهایی: <?=$al1->price?></p>
                        <hr>
                    </div>

                </div>

            <?php }?>



        </div>

    </div> <!--//end row -->





</div>




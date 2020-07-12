<?php use backend\models\NameProduct;
use backend\models\TblbagDesign;
use backend\models\Tblgroup;
use backend\models\Tblpostproduct;
use backend\models\Tblproduct;
use backend\models\TypeProduct;
use common\components\jdf;
use frontend\models\Tblbag;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container content">

<?php $user= \common\models\User::find()->where(['id'=>$model->id_user])->one()?>
    <div class="row" style="padding: 2%;">
        <!-- Pricing -->

            <div class="pricing hover-effect">
                <div class="pricing-head">
                    <h3>نام کاربر  :
					<?=$user->username?>
                        <span>تاریخ سفارش<?=$model->data_ir?></span>
                    </h3>
                    <h4>
                        <i>
					قیمت فاکتور:<?=$model->price?>تومان</i>

                    </h4>
                    <?php

                    $date= new jdf();
                    if($model->date_deliver!=null){
                        $time=explode("-",$model->date_deliver);
                        $y=$time[0];
                        $m=$time[1];
                        $d=$time[2];

                        $date_ir=$date->gregorianToJalali($y,$m,$d,'-');
                        $time2=explode("-",$date_ir);
                        $y2=$time2[0];
                        $m2=$time2[1];
                        $d2=$time2[2];
                        $time_ir=$y2.'/'.$m2.'/'.$d2;
                        echo ' <h5>تاریخ ارسال:'.$time_ir.'</h5>';
                    }

                    ?>

                </div>

                // <?php

                foreach ($allpost as $al1){
                    $bag=Tblbag::find()->where(['id_fac'=>$model->id])->all();



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
    <div class="text-center">
    <p>آدرس ارسال: <?=$al1->address?></p>
    <p>هزینه ارسال: <?=$al1->price_post?></p>
    <p>هزینه نهایی: <?=$al1->price?></p>
        <hr>
    </div>

</div>

      <?php }?>


                <div class="pricing-footer">

                        <?php
                        if($model->confirm==0){
                            echo Html::a(Yii::t('app', 'تایید'), ['update','id'=>$model->id,'resive'=>0,'visibel'=>0 ,'print'=>0], ['class' => 'btn btn-success'])  ;
                            echo Html::a(Yii::t('app', 'عدم تایید'), ['update','id'=>$model->id,'resive'=>0,'visibel'=>0 ,'print'=>0], ['class' => 'btn btn-danger'])  ;

                        }else{
                            if($model->visibel==0 && $model->resive==0){

                                echo Html::a(Yii::t('app', 'بررسی شد'), ['update','id'=>$model->id,'resive'=>0,'visibel'=>0 ,'print'=>0], ['class' => 'btn btn-success'])  ;
                            }elseif($model->visibel==1 && $model->resive==0 && $model->print==1){
                                echo Html::a(Yii::t('app', 'تحویل داده شد'), ['update','id'=>$model->id, 'resive'=>0,'visibel'=>1 ,'print'=>1], ['class' => 'btn btn-success']) ;

                            }elseif($model->visibel==1 && $model->resive==1){
                                echo Html::a(Yii::t('app', 'حدف شود'), ['delete', 'id' => $model->id], ['class' => 'btn btn-success']) ;
                                echo Html::a(Yii::t('app', 'بازبینی'), ['back_resive', 'id' => $model->id], ['class' => 'btn btn-success']) ;

                            }elseif($model->visibel==1 && $model->resive==0 && $model->print==0){
                                echo Html::a(Yii::t('app', 'بسته بندی شد'), ['update','id'=>$model->id, 'resive'=>0,'visibel'=>1 ,'print'=>0], ['class' => 'btn btn-success']) ;

                            }
                            
                        }

                        ?>

                    </p>
                </div>
            </div>

    </div> <!--//end row -->





</div>


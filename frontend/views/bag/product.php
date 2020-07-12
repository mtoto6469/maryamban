
<?php
use frontend\models\TblcategoryProduct;
use frontend\models\Tblcolor;
use frontend\models\Tblproduct;
use frontend\models\Tblsize;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url=Yii::$app->urlManager;
if (!Yii::$app->user->isGuest) {
    $find = \frontend\models\Tblprofile::find()->where(['user_id' => Yii::$app->user->getId()])->one();
    $role=$find->role;

}else{
    $role='user';
}
?>

<?php $form = ActiveForm::begin(); ?>
<section id="cart_items">
    <div class="container">
        <div class="alert alert-info" style="text-align: center">

            <p >کاربر گرامی افزودن کالا به سبد خرید به معنی رزرو کالا برای شما نیست. در صورت اتمام موجودی کالا پیش از نهایی کردن خرید، کالا از سبد خرید شما حذف خواهد شد.</p>

        </div>

        <div class="breadcrumbs">

        <div class="review-payment">
            <h2><a  href="<?=$url->createAbsoluteUrl(['bag/update_addres'])?>">چک کردن آدرس</a></h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">

                <thead>
                <tr class="cart_menu">
                    <td class="image">محصول</td>
                    <td class="description"></td>
                    <td class="price">قیمت</td>
                    <td class="quantity">تعداد</td>
                    <td class="quantity">درصد تخفیف</td>
                    <td class="total">جمع قیمت</td>
                    <td></td>
                    <td></td>
                    <?php
                    if ($role == 'user') {?>

                        <td>  <input  name="all" type="text"  value="0" hidden="hidden"></td>


                  <?php  } else {?>
                        <td> همه <input id="all" name="all" type="checkbox" onchange="myfun()" value="1"></td>

                    <?php }?>
                </tr>
                </thead>
                <tbody>

<?php

foreach ($bag as $b){
    $product=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$b->id_pro])->one();
    $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$product->id_category])->one();
    $brand=\frontend\models\Tblbrand::find()->where(['id'=>$product->id_brand])->one();
    $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$product->id_type])->one();
     $color_img=\frontend\models\Tblcolor::find()->where(['id_pro'=>$product->id])->andWhere(['color'=>$b->color])->one()


    ?>

                <tr>
                    <td class="cart_product">
                        <a href=""><img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$color_img->img?>" alt="" style="width: 150px"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?=$cat_pro->name?></a></h4>
                        <?php
                        if($type!=null){?>
                            <p><?=$type->type?></p>
                            <?php
                        }
                        ?>
                        <?php
                        if($brand!=null){?>
                            <p><?=$brand->brand?></p>
                            <?php
                        }
                        ?>
                        <?php
                        if($b->size==0){
                            $size='تمام سایزها';
                           $countsize=Tblsize::find()->where(['id_pro'=>$b->id_pro])->andWhere(['enabel_view'=>1])->count();
                         if($product->pak!=null){
                            $price=($product->price_namayande * $countsize)-$product->pak;

                        }else{
                            $price=$product->price_namayande * $countsize;
                        }
                                       
                        }else{

                            $size=$b->size;
                                        if ($role == 'user') {
                                            $price=$product->price;

                                        } else {
                                            $price=$product->price_namayande;
                                        }

                        }
                        ?>
                        <p><?=$size.'رنگ '.$b->color?></p>
                    </td>
                    <td class="cart_price">
                        <p><?=$price?></p>
                    </td>

                    <td class="cart_price">
                        <p><?=$b->count?></p>
                    </td>
<!--                    <td class="cart_quantity">-->
<!--                        <div class="cart_quantity_button">-->
<!--                            <a class="cart_quantity_up" href=""> + </a>-->
<!--                            <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">-->
<!--                            <a class="cart_quantity_down" href=""> - </a>-->
<!--                        </div>-->
<!--                    </td>-->
                    <?php

                    $discount=\frontend\models\Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->one();
                    if($discount!=null){

                        echo ' <td class="cart_price">
                        <p>'.$discount->price.'%</p>
                    </td>';

                        $new=$b->price-$b->price*$discount->price/100;
                        echo '<td class="cart_total">
                        <p class="cart_total_price">'.$new.'</p></td>';

                    }else{
                        $d=\backend\models\TbldisPro::find()->where(['id_cat_pro'=>$product->id])->andWhere(['enabel_view'=>1])->one();
                        if($d!=null) {
                            $dis = \backend\models\Tbldiscount::find()->where(['id' => $d->id_dis])->one();
                            echo '<td>'.$dis->price.'</td>';
                            $n=$b->price-($b->price*$dis->price/100);
                            echo '<td class="cart_total">
                        <p class="cart_total_price">'.$n.'</p></td>';
                        }else{
                            echo '<td>ندارد</td>';
                            echo '<td class="cart_total">
                        <p class="cart_total_price">'.$b->price.'</p>
                    </td>';
                        }
                    }


                    ?>


                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="<?=$url->createAbsoluteUrl(['bag/delete','id'=>$b->id])?>"><i class="fa fa-times"></i></a>
                    </td>
                    <td></td>

                    <?php if ($role == 'user') {?>
                        <td> </td>

                  <?php  } else {?>
                        <td>
                            <input name="sub[<?=$b->id?>]" value="0" class="check" type="checkbox" checked disabled style="display: none">

                            <input name="sub[<?=$b->id?>]" value="0" id="<?=$b->id?>" type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)">
                        </td>
                    <?php }?>


                </tr>
<?php }?>

                </tbody>
            </table>




        </div>

    </div>
</section> <!--/#cart_items-->


<section>
    <div class="container">


      <div style="float: right">  <?=$form->field($allpost,'price_post')->radioList($deliver)->label('')?></div>


        <div class="col-sm-12 padding-right" style="margin-bottom: 5%;text-align: right!important;">



<div  >
    <div class="tab-pane fade active in " id="reviews" >
        <div class="col-sm-12">
            <div class="row">



                <?php

                if(isset($_SESSION['error_adres'])){
                    if($_SESSION['error_adres']!=null){?>

                        <div class="alert alert-danger"><?= $_SESSION['error_adres']?></div>

                    <?php

                    $_SESSION['error_adres']=null;

                    }
                }


                ?>


                <?php


                $check=\frontend\models\TblSodorFactor::find()->where(['id_user'=>Yii::$app->user->getId()])
                ->andWhere(['print'=>0])->all();
                ?>
                        <div style="padding: 2%">
                        <select name="adres" >ادرس

                            <option value="">آدرس</option>
                            <?php  foreach ($check as $ch){

                   $addres=\frontend\models\Tblallpost::find()->where(['id_fac'=>$ch->id])->all();


                    foreach ($addres as $ad){?>
                            <option value="<?=$ad->id?>"><?=$ad->address?></option>
                        <?php
                    }
                }

                ?>
                        </select>
                            <p>می توانید یکی از آدرس های بالا را که د رفاکتور های شما وجود دارد را انتخاب کنید </p>
                    </div>





                <div class="col-md-6">
                    <?=$form->field($allpost,'costomer')->textInput(['placeholder'=>'نام گیرنده را وارد کنید'])->label('')?>

                </div>
                <div class="col-md-6">
                    <?=$form->field($allpost,'tel')->textInput(['placeholder'=>'تلفن گیرنده را وارد کنید'],['style'=>'text-align:right'])->label('')?>

                </div>

            </div>

            <?=$form->field($allpost,'address')->textarea(['placeholder'=>'آدرس گیرنده را وارد کنید'],['style'=>'text-align:right'])->label('')?>


            <div class="form-group">
                <?= Html::submitButton( Yii::t('app', 'ثبت'), ['class' =>  'btn btn-default pull-right','style'=>'float:left!important']) ?>
            </div>


        </div>

    </div>

</div>



    </div><!--/category-tab-->


</div>
    </div>
</section>
<?php ActiveForm::end(); ?>



<script>
    function myfun() {
       var all= $('#all').val();
        if(all==1){
            $('#all').val(0);


         <?php $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->all();
         foreach ($bag as $b){?>
         var b="<?='#'.$b->id?>";

             $(b).css('display','none');

         <?php }

         ?>


        }else{
            $('#all').val(1);



   <?php $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->all();
               foreach ($bag as $b){?>
               var b="<?='#'.$b->id?>";

               $(b).css('display','block');

           <?php }


               ?>



    }
    }
</script>



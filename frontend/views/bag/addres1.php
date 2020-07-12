<?php
use frontend\models\Tblbag;
use frontend\models\TblcategoryProduct;
use frontend\models\Tblproduct;
use frontend\models\Tblsize;
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

<section id="cart_items">
    <div class="container">


        <?php
        foreach ($allpost as $all){
            $bag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])
                ->andwhere(['id_all_post'=>$all->id])->all();
            if($bag!=null){

                ?>

                <div class="table-responsive cart_info" >
            <table class="table table-condensed">
                <thead>
                <div style="text-align: center">
                    <ul style="list-style: none">
                        <li style="display: inline-block;"><h3 style="color:darkblue;"><?=$all->category?>دسته </h3></li>

                    </ul>

                </div>
                </div>
                <tr class="cart_menu" style="background-color:#bce8f1!important;">
                    <td class="image">عکس</td>
                    <td class="description">مشخصات</td>
                    <td class="price">تعداد</td>
                    <td class="quantity">درصد تخفیف</td>
                    <td class="price">قیمت کل</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
               <?php foreach ($bag as $b){
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


                           }else {
                              $size=$b->size;
                               if ($role == 'user') {
                                   $price2 = $product->price;

                               } else {

                                   $price2 = $product->price_namayande;
                               }


                           }
                           ?>
                           <p><?=$size.'رنگ '.$b->color?></p>
                       </td>
                       </td>

                       <td class="cart_price">
                           <p><?=$b->count?></p>
                       </td>
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
                           <a class="cart_quantity_delete" href="<?=$url->createAbsoluteUrl(['bag/delete_addres','id'=>$b->id])?>"><i class="fa fa-times"></i></a>
                       </td>
                   </tr>


               <?php }?>

               <tr>
                   <td colspan="4">&nbsp;</td>
                   <td colspan="2">
                       <table class="table table-condensed total-result">
                           <tbody><tr>
                               <td><?=$all->costomer?></td>
                               <td>گیرنده</td>
                           </tr>
                           <tr>
                               <td><?=$all->tel?></td>
                               <td>تلفن</td>
                           </tr>
                           <tr class="shipping-cost">
                               <td><?=$all->address?></td>
                               <td>ادرس</td>
                           </tr>
                           <tr>
                               <?php if($all->id_fader==null){
                                   echo '<td>'.$all->price_post.'</td>';
                               }else{
                                   echo '<td>ندارد</td>';
                               }?>

                               <td>هزینه ارسال</td>
                           </tr>
                           <tr>
                               <td><span><?=$all->price?></span></td>
                               <td>جمع قیمت</td>
                           </tr>
                           </tbody></table>
                   </td>
               </tr>
                </tbody>
            </table>
                </div>

          <?php  }


        }


        ?>
    
    
    
    
    
    
    
    <?php $form = ActiveForm::begin(); ?>

        <div style="text-align: center;margin-bottom: 2%">

            <input type="submit" name="don"  class="btn btn-success" value="پرداخت آنلاین">

            <input type="submit" name="don" class="btn btn-success" value="پرداخت نقدی">


            <?php


            $profile=\frontend\models\Tblprofile::find()->where(['user_id'=>Yii::$app->user->getId()])->one();

            $date=date('Y/m/d');



            if( strtotime($profile->date_credit. ' + 10 days') >= strtotime($date)){


                if($profile->mande >= 0){?>
                    <input type="submit" name="don" class="btn btn-success" value="پرداخت اعتباری ">
             <?php   }

            }

            ?>




        </div>

    <?php ActiveForm::end(); ?>

    </div>
</section>




<script>
    function myfun() {
        var all= $('#all').val();
        if(all==1){
            $('#all').val(0);
            $('#addres').css('display','block');
            $('#addres2').css('display','none');

            <?php $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->all();
            foreach ($bag as $b){?>
            var b="<?='#'.$b->id?>";
            $(b).val(1);
            $(b).css('display','none');

            <?php }

            ?>
            $('.check').css('display','block');



        }else{
            $('#all').val(1);
            $('#addres').css('display','none');
            $('#addres2').css('display','block');

            <?php $bag=\frontend\models\Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->all();
            foreach ($bag as $b){?>
            var b="<?='#'.$b->id?>";
            $(b).val(0);
            $(b).css('display','block');

            <?php }


            ?>
            $('.check').css('display','none');


        }
    }


</script>
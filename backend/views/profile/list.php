<?php 
use backend\models\Tblproduct;
use backend\models\Tblallpost;
use frontend\models\Tblbag;
if($bag!=null){?>
    <span style="color:red">محصولات نهایی نشده</span>

    <div style="height:500px ;overflow-y:scroll  ;">
    <div class="container">

             
  <table class="table">
    <thead>
      <tr>
        <th style="text-align:right">نام محصول</th>
        <th style="text-align:right">رنگ</th>
         <th style="text-align:right">سایز</th>
        <th style="text-align:right">تعداد</th>
        <th style="text-align:right">قیمت</th>
        <th style="text-align:right"></th>
      </tr>
    </thead>
    <tbody>
        <?php
      foreach ($bag as $b){
         $product=Tblproduct::find()->where(['id'=>$b->id_pro])->one();?>
           <tr>
        <td><?=$product->name?></td>
        <td><?=$b->color?></td>
        <td><?=$b->size?></td>
        <td><?=$b->count?></td>
        <td><?=$b->price?></td>
        <th style="text-align:right;color:red">خرید نهایی نشده است</th>
      </tr>
         
       <?php
      
      }
        
        ?>
    
     
    </tbody>
  </table>
</div>
    
</div>
    <?php
    
}

?>


<?php 

if($bag2!=null){?>
    <span style="color:green">محصولات نهایی شده</span>

    <div style="height:500px ;overflow-y:scroll;">
    <div class="container">

             <?php
             foreach ($bag2 as $b2){
                 $allpost=Tblallpost::find()->where(['id_fac'=>$b2->id])->all();
                 if($allpost!=null){
                 foreach ($allpost as $al){
                     $bag=Tblbag::find()->where(['id_fac'=>$b2->id])->andwhere(['id_all_post'=>$al->id])->all();
                 ?>
                     <div>
                      <table class="table">
    <thead>
      <tr>
        <th style="text-align:right">نام محصول</th>
        <th style="text-align:right">رنگ</th>
         <th style="text-align:right">سایز</th>
        <th style="text-align:right">تعداد</th>
        <th style="text-align:right">قیمت</th>
        <th style="text-align:right"></th>
      </tr>
    </thead>
    <tbody>
        <?php
      foreach ($bag as $b1){
         $product=Tblproduct::find()->where(['id'=>$b1->id_pro])->one();?>
           <tr>
        <td><?=$product->name?></td>
        <td><?=$b1->color?></td>
        <td><?=$b1->size?></td>
        <td><?=$b1->count?></td>
        <td><?=$b1->price?></td>
    
      </tr>
     
         
       <?php
      
      }
        
        ?>
    
     
    </tbody>
  </table>
                         <p>آدرس ارسال:<span>
                             <?=$al->address?>
                         </span></p>
                          <p>هزینه ارسال<span>
                             <?=$al->price_post?>
                         </span></p>
                     </div>
                     
                     
               <?php
                 }
               }?>
               
               <p style="color:darkred">هزینه نهایی
               <span><?=$b2->price?></span>
               </p>
                <p style="color:darkred">تاریخ فاکتور
               <span><?=$b2->data_ir?></span>
               </p>
               

             <?php    
             }
             ?>

</div>
    
</div>
    <?php
    
}
?>

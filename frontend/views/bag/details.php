<?php
$url=Yii::$app->urlManager;
if (!Yii::$app->user->isGuest) {
    $find = \frontend\models\Tblprofile::find()->where(['user_id' => Yii::$app->user->getId()])->one();
    $role=$find->role;

}else{
    $role='user';
}
?>


<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>دسته بندی</h2>

                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    <?php
                    use yii\helpers\Html;
                    use yii\widgets\ActiveForm;

                    $ob=new sub3();
                    foreach ($cat_pro as $cp){
                        $ob->add($cp);
                    }

                    ?>

                </div><!--/category-products-->


                <div class="brands_products"><!--brands_products-->
                    <h2>جنس</h2>
                    <div class="brands-name">
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php
                            $ob=new sub4();
                            foreach ($type as $t){

                                $ob->add($t);
                            }

                            ?>

                        </div><!--/category-products-->
                    </div>
                </div><!--/brands_products-->


                <div class="brands_products"><!--brands_products-->
                    <h2>برند</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <?php foreach ($brand as $b){?>

                                <li><a href="#"><?=$b->brand?></a></li>

                            <?php  }?>
                        </ul>
                    </div>
                </div><!--/brands_products-->



            </div>
        </div>
        <?php $cat=\frontend\models\TblcategoryProduct::find()->where(['id'=>$product->id_category])->one();?>
        <?php $ty=\frontend\models\TbltypeProduct::find()->where(['id'=>$product->id_type])->one();?>
        <?php $br=\frontend\models\Tblbrand::find()->where(['id'=>$product->id_brand])->one();?>
        <?php $color_img=\frontend\models\Tblcolor::find()->where(['id_pro'=>$product->id])->andWhere(['color'=>$_GET['color']])->one()?>

        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
							<div class="view-product">
								        <a href="">
            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$color_img->img?>"  alt="">
        </a>
								
							</div>


						</div>

                <?php

                if(isset($_SESSION['message_size'])){
                    if($_SESSION['message_size']!=null){
                        echo '<span style="color:red;float: right">'.$_SESSION['message_size'].'</span>';
                        $_SESSION['message_size']=null;
                    }
                }
                ?>

                <?php

                if(isset($_SESSION['message'])){
                    if($_SESSION['message']!=null){
                        echo '<span style="color:green;float: right">'.$_SESSION['message'].'</span>';
                        $_SESSION['message']=null;
                    }
                }
                ?>
                
                
                <div class="col-sm-7">
                    <div class="product-information" style="text-align: right!important;"><!--/product-information-->
<!--                        <img src="images/product-details/new.jpg" class="newarrival" alt="">-->
                        <h2><?=$product->description?></h2>
                        <input id="date" value="<?=$product->time_ir?>" hidden>
                        <p id="exist"></p>
                        <img src="images/product-details/rating.png" alt="">
								<span>


                                         <?php
                                         if ($role == 'user') {
                                             ?>
                                             <span> قیمت <?=$product->price?>
                                             تومان
                                             </span><br>
                                         <?php } else {
                                             ?>
                                             <span> قیمت <?=$product->price_namayande?>
                                            تومان
                                             </span><br>
                                         <?php }
                                         ?>

                                    <p ><?=$product->name?></p>
                                                       <p id="name" value="<?=$product->id?>" hidden><?=$product->id?></p>
                                    <?php
                                    if($ty!=null){?>
                                        <h4><?=$ty->type?></h4>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($br!=null){?>
                                        <h4><?=$br->brand?></h4>
                                        <?php
                                    }
                                    ?>

                                    <p >:رنگ
                                        <?php
                                        echo '<b id="color">'.$_GET['color'].'</b>';
                                        ?>
                                     </p>

                                    <?php $form = ActiveForm::begin(); ?>

                                 <?= $form->field($model, 'size')->dropDownList($size,['prompt'=>'انتخاب کنید','onclick'=>'myFunction()'])->label('سایز') ?>
                                        <label style="float: right ;margin-left:5px;margin-top: 5px">   تعداد  </label>
                                        <input value="1" type="number" min="1" name="model_count" id="model_count" style="width: 70px" onchange="fun2()"><br><br>


								</span>

                        <button type="submit"  name="btn" value="bag" class ="btn btn-default update"><span style="font-weight: bold;font-size: 16px;color:white" ><i class="fa fa_plus" style="color:white"></i> سبد خرید</span></button>


                        
                        
                    </div><!--/product-information-->
                </div>
            </div>

        </div>



      


    </div>
</div>

<?php ActiveForm::end(); ?>

<?php

class sub3{

    function add($cp){

        $url=Yii::$app->urlManager;
        $category=\frontend\models\TblcategoryProduct::find()->where(['id_parent'=>$cp->id])->andWhere(['enabel_view'=>1])->all();

        if($category!=null){?>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#<?='c'.$cp->id?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            <a href="<?=$url->createAbsoluteUrl(['product/category','id'=>$cp->id])?>"><?=$cp->name?></a>
                        </a>
                    </h4>
                </div>
                <div id="<?='c'.$cp->id?>" class="panel-collapse collapse">

                    <div class="panel-body">
                        <ul style="padding: 0!important;">
                            <?php foreach ($category as $c){?>
                                <li style="padding: 0!important;">
                                    <?=$this->add($c)?>

                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>


        <?php }else{?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?=$url->createAbsoluteUrl(['product/category','id'=>$cp->id])?>"><?=$cp->name?></a></h4>
                </div>
            </div>
        <?php }




    }
}

?>



<?php

class sub4{

    function add($t){
        $url=Yii::$app->urlManager;

        $category=\frontend\models\TbltypeProduct::find()->where(['id_parent'=>$t->id])->andWhere(['enabel_view'=>1])->all();

        if($category!=null){?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#<?='t'.$t->id?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            <a href="<?=$url->createAbsoluteUrl(['product/type','id'=>$t->id])?>"><?=$t->type?></a>
                        </a>
                    </h4>
                </div>
                <div id="<?='t'.$t->id?>" class="panel-collapse collapse">

                    <div class="panel-body">
                        <ul style="padding: 0!important;">
                            <?php foreach ($category as $c){?>
                                <li style="padding: 0!important;">
                                    <?=$this->add($c)?>

                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>


        <?php }else{?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="<?=$url->createAbsoluteUrl(['product/type','id'=>$t->id])?>"><?=$t->type?></a></h4>
                </div>
            </div>
        <?php }


    }
}

?>




<script type="text/javascript">
    function myFunction() {

        var size= $('#tblbag-size').val();
        var name=$('#name').text();
        var color=$('#color').text();
        var date=$('#date').val();
        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('bag/find') ?>',
            data: {size: size,name:name,color:color,date:date},
            success:function (data) {
                $('#exist').html(data);

            }
        });
    }

</script>





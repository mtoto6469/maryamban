<?php
$url=Yii::$app->urlManager;
?>
<?php
$discount=\frontend\models\Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->one();
$count=\frontend\models\Tbldiscount::find()->where(['all_pro'=>1])->andWhere(['enabel_view'=>1])->count();
if($count>=1){?>

    <section id="advertisement">
        <div class="container">
            <div class="" style="background-color: orange;box-shadow: 10px 10px 5px grey;height: 100px;text-align: center">
                <h2 style="text-shadow: 0 0 3px #FF0000;"><?=$discount->name?></h2>
                <h3 style="text-shadow: 0 0 3px #FF0000;"><?=$discount->price?>% تخفیف</h3>
            </div>
        </div>
    </section>

    <?php
}


?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>دسته بندی</h2>

                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php
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

                                        <li><a href="<?=$url->createAbsoluteUrl(['product/brand','id'=>$b->id])?>"><?=$b->brand?></a></li>

                                    <?php  }?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->



                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">محصولات</h2>
                        <?php foreach ($color as $c){?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height:350px!important;">
                                            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$c->img?>" width="60%" height="55%" alt="">
                                            <h2>پک کامل</h2>
                                            <?php $ty=\frontend\models\TbltypeProduct::find()->where(['id'=>$product->id_type])->one();?>
                                            <?php $br=\frontend\models\Tblbrand::find()->where(['id'=>$product->id_brand])->one();?>
                                            <p><?=$c->color?></p>
                                            <?php
                                            if($ty!=null){
                                                echo '<span>'.$ty->type.'</span>';

                                            }
                                            ?>
                                            <?php
                                            if($br!=null){
                                                echo ' '.'<span>'.$br->brand.'</span>';

                                            }else{
                                                echo '';
                                            }
                                            echo '<br>';
                                            ?>
                                            <a href="<?=$url->createAbsoluteUrl(['bag/pack_details','id'=>$product->id,'color'=>$c->color])?>" class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>پک کامل</h2>
                                                <p><?=$c->color?></p>
                                                <?php
                                                if($ty!=null){
                                                    echo '<span>'.$ty->type.'</span>';

                                                }
                                                ?>
                                                <?php
                                                if($br!=null){
                                                    echo ' '.'<span>'.$br->brand.'</span>';

                                                }
                                                echo '<br>';
                                                //                                            ?>
                                                <a href="<?=$url->createAbsoluteUrl(['bag/pack_details','id'=>$product->id,'color'=>$c->color])?>" class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php  }?>

                    </div><!--features_items-->
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>





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

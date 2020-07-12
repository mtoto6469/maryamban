<?php
$url=Yii::$app->urlManager;
if (!Yii::$app->user->isGuest) {
    $find = \frontend\models\Tblprofile::find()->where(['user_id' => Yii::$app->user->getId()])->one();
    $role=$find->role;

}else{
    $role='user';
}
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
                        <h2 class="title text-center">برند<?=$brand_pro->brand?></h2>
                        <?php $product=\frontend\models\Tblproduct::find()->where(['id_brand'=>$brand_pro->id])->all()?>
                        <?php foreach ($product as $p) { ?>
                            <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                            <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                            <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
                            <div class="col-sm-4">
                                <?php
                                $d=\backend\models\TbldisPro::find()->where(['id_cat_pro'=>$p->id])->andWhere(['enabel_view'=>1])->one();
                                if($d!=null){
                                    $dis=\backend\models\Tbldiscount::find()->where(['id'=>$d->id_dis])->one();?>
                                    <div style="position: absolute;height:50px;width: 50px;background:#cc006a;top:2px;z-index: 1000;border-radius:25px 25px 25px 25px;text-align: center;color:white;padding-top:15px" >
                               <span style=""> <?php
                                   if ($role == 'user') {
                                       ?>
                                       <span><?= $dis->price?>%off</span>
                                   <?php } else {
                                       ?>
                                       <span><?= $dis->price_namayande ?>%off</span>
                                   <?php }
                                   ?></span>
                                    </div>

                                <?php  }

                                ?>

                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height:350px!important;">
                                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?>"
                                                 width="60%" height="55%" alt="">
                                            <?php
                                            if ($role == 'user') {
                                                ?>
                                                <h2><?= $p->price ?></h2>
                                            <?php } else {
                                                ?>
                                                <h2><?= $p->price_namayande ?></h2>
                                            <?php }
                                            ?>
                                            <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                                            <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                                            <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
                                            <p><?= $p->name  ?></p>
                                            <?php
                                            if ($ty != null) {
                                                echo '<span>' . $ty->type . '</span>';

                                            }
                                            ?>
                                            <?php
                                            if ($br != null) {
                                                echo ' ' . '<span>' . $br->brand . '</span>';

                                            } else {
                                                echo '';
                                            }
                                            echo '<br>';
                                            ?>
                                            <a href="<?= $url->createAbsoluteUrl(['bag/pro_color', 'id' => $p->id]) ?>"
                                               class="btn btn-default add-to-cart"><i class="fa fa-user"></i>رنگ
                                                بندی</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <?php
                                                if ($role == 'user') {
                                                    ?>
                                                    <h2><?= $p->price ?></h2>
                                                <?php } else {
                                                    ?>
                                                    <h2><?= $p->price_namayande ?></h2>
                                                <?php }
                                                ?>
                                                <?php
                                                if ($ty != null) {
                                                    echo '<span>' . $ty->type . '</span>';

                                                }
                                                ?>
                                                <?php
                                                if ($br != null) {
                                                    echo ' ' . '<span>' . $br->brand . '</span>';

                                                }
                                                echo '<br>';
                                                //                                            ?>
                                                <a href="<?= $url->createAbsoluteUrl(['bag/pro_color', 'id' => $p->id]) ?>"
                                                   class="btn btn-default add-to-cart"><i class="fa fa-user"></i>رنگ
                                                    بندی</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($role != 'user') { ?>
                                <!--                        //pack-->
                                <div class="col-sm-4">
                                    <?php
                                    $d=\backend\models\TbldisPro::find()->where(['id_cat_pro'=>$p->id])->andWhere(['enabel_view'=>1])->one();
                                    if($d!=null){
                                        $dis=\backend\models\Tbldiscount::find()->where(['id'=>$d->id_dis])->one();?>
                                        <div style="position: absolute;height:50px;width: 50px;background:#cc006a;top:2px;z-index: 1000;border-radius:25px 25px 25px 25px;text-align: center;color:white;padding-top:15px" >
                               <span style=""> <?php
                                   if ($role == 'user') {
                                       ?>
                                       <span><?= $dis->price?>%off</span>
                                   <?php } else {
                                       ?>
                                       <span><?= $dis->price_namayande ?>%off</span>
                                   <?php }
                                   ?></span>
                                        </div>

                                    <?php  }

                                    ?>
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center" style="height:350px!important;">

                                                <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $p->img ?> "
                                                     width="60%" height="55%" alt="">
                                                <h2><a href="">pack kamel</a></h2>
                                                <?php $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one(); ?>
                                                <?php $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one(); ?>
                                                <?php $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one(); ?>
                                                <p><?= $p->name  ?></p>
                                                <?php
                                                if ($ty != null) {
                                                    echo '<span>' . $ty->type . '</span>';

                                                }
                                                ?>
                                                <?php
                                                if ($br != null) {
                                                    echo ' ' . '<span>' . $br->brand . '</span>';

                                                } else {
                                                    echo '';
                                                }
                                                echo '<br>';
                                                ?>
                                                <a href="<?= $url->createAbsoluteUrl(['bag/pro_color', 'id' => $p->id]) ?>"
                                                   class="btn btn-default add-to-cart"><i class="fa fa-user"></i>رنگ
                                                    بندی</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><a href="">pack kamel</a></h2>
                                                    <p><?= $p->name  ?></p>
                                                    <?php
                                                    if ($ty != null) {
                                                        echo '<span>' . $ty->type . '</span>';

                                                    }
                                                    ?>
                                                    <?php
                                                    if ($br != null) {
                                                        echo ' ' . '<span>' . $br->brand . '</span>';

                                                    }
                                                    echo '<br>';
                                                    ?>

                                                    <a href="<?= $url->createAbsoluteUrl(['bag/pro_color', 'id' => $p->id]) ?>"
                                                       class="btn btn-default add-to-cart"><i class="fa fa-user"></i>رنگ
                                                        بندی</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                        }?>

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
<?php

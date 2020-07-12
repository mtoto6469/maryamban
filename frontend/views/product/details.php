<?php
?>



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
        <div class="col-sm-9" style="text-align: right!important;">
<div class="blog-post-area">
    <h2 class="title text-center"><?=$cat->name?></h2>
    <div class="single-blog-post">
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

        <a href="">
            <?php $img=\backend\models\Tblgallery::find()->where(['id'=>$product->img])->one()?>
            <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$img->address?>" style="width:800px;height: 400px" alt="<?=$img->alert?>">
        </a>
        <p><?=$product->description?></p>
        <span style="font-size: 18px ;font-weight: bold;color: maroon">این محصول در تاریخ <?=$product->time?>تولید میشود</>

    </div>


</div>





            <?php $form = ActiveForm::begin(); ?>
            <div class="row " style="margin: 3% 0 5%" >
                <div class="chose_area" >

                    <ul class="user_info" ">
                        <li class="single_field">
                            <span style="font-weight: bold;font-size: 16px">سایز</span>
                            <?php
                            $size=\frontend\models\Tblsize::find()->where(['id_pro'=>$product->id])->andWhere(['enabel_view'=>1])->all();
                            ?>
                            <select>
                                <?php
                                foreach ($size as $s){?>
                                    <option><?=$s->size?></option>

                                <?php }

                                ?>

                            </select>

                        </li>
                        <li class="single_field">
                            <span style="font-weight: bold;font-size: 16px">رنگ</span>
                            <?php
                            $color=\frontend\models\Tblcolor::find()->where(['id_pro'=>$product->id])->andWhere(['enabel_view'=>1])->all();
                            ?>
                            <select>
                                <?php
                                foreach ($color as $co){?>
                                    <option><?=$co->color?></option>

                                <?php }

                                ?>

                            </select>
                        </li>
                    <li><div class="form-group">
                            <?= Html::submitButton( Yii::t('app', '<span style="font-weight: bold;font-size: 16px"><i class="fa fa_plus"></i>اضافه کردن به سبد خرید</span>') , ['class' => 'btn btn-default update']) ?>
                        </div></li>
                    </ul>


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
                            <?=$cp->name?>
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
                    <h4 class="panel-title"><a href="#"><?=$cp->name?></a></h4>
                </div>
            </div>
        <?php }




    }
}

?>



<?php

class sub4{

    function add($t){

        $category=\frontend\models\TbltypeProduct::find()->where(['id_parent'=>$t->id])->andWhere(['enabel_view'=>1])->all();

        if($category!=null){?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#<?='t'.$t->id?>">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            <?=$t->type?>
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
                    <h4 class="panel-title"><a href="#"><?=$t->type?></a></h4>
                </div>
            </div>
        <?php }




    }
}

?>

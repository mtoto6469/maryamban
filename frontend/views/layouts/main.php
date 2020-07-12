<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAssetShop;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
$url=Yii::$app->urlManager;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
 
    <!--[if lt IE 9]>

    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">



    <!-- StyleSheets
    ============================================= -->

    <!-- Twitter Bootstrap -->

    <?php $this->head() ?>
</head><!--/head-->
<?php $this->beginBody() ?>


<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>09300915528</a></li>
                            <li><a href="#"> مریم بانو</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="<?=Yii::$app->request->hostInfo?>/upload/bg_border.png" alt="" /></a>
                    </div>
<!--                    <div class="btn-group pull-right">-->
<!--                        <div class="btn-group">-->
<!--                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
<!--                                USA-->
<!--                                <span class="caret"></span>-->
<!--                            </button>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">Canada</a></li>-->
<!--                                <li><a href="#">UK</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!---->
<!--                        <div class="btn-group">-->
<!--                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
<!--                                DOLLAR-->
<!--                                <span class="caret"></span>-->
<!--                            </button>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">Canadian Dollar</a></li>-->
<!--                                <li><a href="#">Pound</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            if (!Yii::$app->user->isGuest) {
                             $user=\common\models\User::findOne(Yii::$app->user->getId());
                               
                             ?>
                            
                            <li ><a style="color:orange" href="#" class="text-uppercase"><?=$user->username?></a></li>
                            <li><a href="<?=$url->createAbsoluteUrl(['profile/setting'])?>"><i class="fa fa-user"></i> پروفایل</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="<?=$url->createAbsoluteUrl(['bag/product'])?>"><i class="fa fa-shopping-cart"></i> سبد خرید</a></li>


                            <?php
                            if (!Yii::$app->user->isGuest) {
                                ?>
                                <li><a href="<?=$url->createAbsoluteUrl(['site/logout'])?>"><i class="fa fa-lock"></i> خروج</a></li>

                                <?php
                            }
                            else{
                                ?>
                                <li><a href="<?=$url->createAbsoluteUrl(['site/signup'])?>"><i class="fa fa-lock"></i> ثبت نام</a></li>
                                <li><a href="<?=$url->createAbsoluteUrl(['site/login'])?>"><i class="fa fa-lock"></i> ورود</a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3  " ">
                    <div class="search_box  pull-left" >
                        <a style="color:orange" href="https://t.me/joinchat/AAAAAD7iBtFtqJ0rFhHoIw" class="active">لینک تلگرام ما</a>
                    </div>
                </div>
                <div class="col-sm-9" >
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse new">

                            <li class="dropdown"><a href=""> درباره ما</a>

                            </li>

                            <li><a href="<?=$url->createAbsoluteUrl(['site/contact'])?>">تماس با ما</a></li>
                            <li><a href="<?=$url->createAbsoluteUrl(['site/shop'])?>">فروشگاه</a></li>
<!--                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul role="menu" class="sub-menu ul-new" >-->
<!--                                    -->
<!--                                                <div class="col-md-2">-->
<!--                                                    <li><a href="shop.html">gggg</a></li>-->
<!---->
<!--                                                </div>-->
<!--                                    -->
<!--                                </ul>-->
<!--                            </li>-->
                            <li><a href="<?=$url->createAbsoluteUrl(['site/index'])?>" class="active">صفحه اصلی</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->




    <div >
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>




<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2>مریم با نو</h2>
                        <p>logo</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=Yii::$app->request->hostInfo?>/upload/images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=Yii::$app->request->hostInfo?>/upload/images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=Yii::$app->request->hostInfo?>/upload/images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?=Yii::$app->request->hostInfo?>/upload/images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="<?=Yii::$app->request->hostInfo?>/upload/bg_border.png" alt="" />

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">

                <div class="col-sm-6" style="text-align: right">
                <div class="col-sm-3" style="float:right">
                    <div class="single-widget">
                        <h2>محصولات</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            $product=\frontend\models\Tblproduct::find()->limit(6)->all();
                            foreach ($product as $p){?>
                                <li><a href="#"><?=$p->name?></a></li>
                          <?php  }

                            ?>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3" style="float:right">
                    <div class="single-widget">
                        <h2>دسته بندی</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            $cate=\frontend\models\TblcategoryProduct::find()->limit(6)->all();
                            foreach ($cate as $c){?>
                                <li><a href="#"><?=$c->name?></a></li>
                            <?php }

                            ?>


                        </ul>
                    </div>
                </div>

                    <div class="col-sm-3" style="float:right">
                        <div class="single-widget">
                            <h2>جنس</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <?php
                                $type=\frontend\models\TbltypeProduct::find()->limit(6)->all();
                                foreach ($type as $t){?>
                                    <li><a href="#"><?=$t->type?></a></li>
                               <?php }

                                ?>


                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-3" style="float:right">
                        <div class="single-widget">
                            <h2>عضویت</h2>
                            <ul class="nav nav-pills nav-stacked">

                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    ?>
                                    <li><a href="<?=$url->createAbsoluteUrl(['site/logout'])?>"><i class="fa fa-lock"></i> خروج</a></li>

                                    <?php
                                }
                                else{
                                    ?>
                                    <li><a href="<?=$url->createAbsoluteUrl(['site/signup'])?>"> ثبت نام</a></li>
                                    <li><a href="<?=$url->createAbsoluteUrl(['site/login'])?>"> ورود</a></li>
                                    <?php
                                }
                                ?>
                                <li>  <a style="color:orange" href="https://t.me/joinchat/AAAAAD7iBtFtqJ0rFhHoIw" class="active">لینک تلگرام </a></li>
                            </ul>
                        </div>
                    </div>

</div>
                <div class="col-sm-6" style="text-align: right">
                    <div class="single-widget">
                        <h2 style="color:orange">آدرس</h2>
                        <?php $addres=\frontend\models\TbladdresPhon::find()->where(['id'=>1])->one()?>
                        <span style="color:grey"><?=$addres->address?></span>
                        <h2 style="color:orange">شماره تماس</h2>
                        <span style="color:grey"><?=$addres->tel?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-right">طراحی شده توسط تیم برنامه نویسی توسعه گروپ.</p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


</body>
</html>

<?php $this->endBody() ?>

<?php $this->endPage() ?>
<?php

class sub{

    function add($id_parent){
  $url=Yii::$app->urlManager;
        $category=\backend\models\Tblcategory::find()->where(['id_parent'=>$id_parent])->all();
        $count=\backend\models\Tblcategory::find()->where(['id_parent'=>$id_parent])->count();

    echo '<ul class="dropdown dropdown-left">';
    foreach ($category as $ca){
        echo '<li><a href="'.$url->createAbsoluteUrl(['category/post','id'=>$ca->id_category]).'">'.$ca->title_category.'</a>';
        $this->add($ca->id_category);
        echo '</li>';
    }
    echo ' </ul>';


    }
}

?>



<?php

class sub2{

    function add($id_parent){

        $url=Yii::$app->urlManager;
        $category=\frontend\models\TblcategoryProduct::find()->where(['id_parent'=>$id_parent])->all();

        echo '<ul class="dropdown dropdown-left">';
        foreach ($category as $ca){
            echo '<li><a href="#">'.$ca->name.'</a>';
            $this->add($ca->id);
            echo '</li>';
        }
        echo ' </ul>';


    }
}

?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAssetProfile;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetlogin;
use common\widgets\Alert;
$url=Yii::$app->urlManager;
AppAssetProfile::register($this);


$url=Yii::$app->urlManager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Page description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="Mashup templates have been developped by Orson.io team" name="author">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./assets/apple-icon-180x180.png" rel="apple-touch-icon">
    <link href="./assets/favicon.ico" rel="icon">



    <title>پروفایل</title>

    <!--    <link href="./main.82cfd66e.css" rel="stylesheet">-->
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>

<body >
<div class="row">
    <div  class="col-md-3" >
<!-- Add your content of header -->
<header class=""  >
    <div class="navbar navbar-default " >
        <button type="button" class="navbar-toggle collapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="./index.html" class="navbar-brand">Mashup Template</a>
    </div>

    <nav class="sidebar" style="background:#494947">
        <div class="navbar-collapse" id="navbar-collapse">
            <div class="site-header hidden-xs ">
                <div class="top">
                    <?php
                    $user=\common\models\User::findOne(Yii::$app->user->getId());
                    ?>
                    <h4 >  کاربر:<?=$user->username?></h4>
                    <h5>خوش آمدید</h5>
                </div>


            </div>
            <ul class="nav new">
                <li><a href="<?=$url->createAbsoluteUrl(['factor/index','flag'=>0])?>" title="">سفارشات</a></li>

                <hr >
                <li><a href="<?=$url->createAbsoluteUrl(['factor/index','flag'=>1])?>" title="">پیگیری سفارشات</a></li>
                <hr >
                <?php $profile=\frontend\models\Tblprofile::find()->where(['user_id'=>Yii::$app->user->getId()])->one();

                ?>

                <li><a href="<?=$url->createAbsoluteUrl(['profile/update','id'=>$profile->id])?>" title="">تنضیمات</a></li>
                <hr >

                <?php
                $check=\frontend\models\Tblprofile::find()->where(['user_id'=>Yii::$app->user->getId()])->one();

                if($check->role == 'costumer'){?>
                    <li><a href="<?=$url->createAbsoluteUrl(['replace/list'])?>" title=""> تعویض محصولات</a></li>
                    <hr >
                    <li><a href="<?=$url->createAbsoluteUrl(['pardakht/add'])?>" title="">افزایش اعتبار</a></li>
                    <hr >
               <?php }

                ?>

            </ul>



                <p>
                    <br><a class="a-new" href="<?=$url->createAbsoluteUrl(['site/index'])?>" title="Create website with free html template">بازگشت</a></p>

                <p class="nav-footer-social-buttons">
                    <a class="fa-icon a-new" href="https://www.instagram.com/" title="">
                        <i class="fa fa-instagram "></i>
                    </a>
                    <a class="fa-icon a-new" href="https://dribbble.com/" title="">
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <a class="fa-icon a-new" href="https://twitter.com/" title="">
                        <i class="fa fa-twitter"></i>
                    </a>
                </p>

        </div>
    </nav>
</header>
        </div>
<div  class="col-md-9" style="width: 80%" >
<?=$content?>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        masonryBuild();
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        navbarToggleSidebar();
        navActivePage();
    });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID

<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>




-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="./main.85741bff.js"></script>
</body>

</html>

<?php $this->endBody() ?>

<?php $this->endPage() ?>

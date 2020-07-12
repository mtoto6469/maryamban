ش<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: #2A3F54">
<?php $this->beginBody() ?>`

<div class="wrap">
<?php
if(isset($_SESSION['log'])){
    if($_SESSION['log']!=null){?>
    <div class="text-center">
        <span style="color:white;text-align:center;"><?=$_SESSION['log']?></span></div>
    <?php
        
    }$_SESSION['log']=null;
}

?>
    <div class="container">
        <?= $content ?>
    </div>
</div>
<?php $this->endBody();?>
<footer class="footer " style="background-color: #2A3F54">
    <div class="container">
        <div class="pull-right" >
            طراحی و توسعه توسط <a href="https://no-et.com">شرکت برنامه نویسی توسعه گروپ</a>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


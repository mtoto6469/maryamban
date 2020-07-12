<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetlogin;
use common\widgets\Alert;
$url=Yii::$app->urlManager;
AppAssetlogin::register($this);


$url=Yii::$app->urlManager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="bg-login">
    <div class="cover-login">
        <?=$content?>
    </div>

</div>





</body>
</html>

<?php $this->endBody() ?>

<?php $this->endPage() ?>

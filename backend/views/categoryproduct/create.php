<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblcategoryProduct */

$this->title = Yii::t('app', 'دسته بندی محصول');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblcategory Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategory-product-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,

    ]) ?>

</div>

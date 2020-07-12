<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblcategoryProduct */

$this->title = Yii::t('app', 'ویرایش') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblcategory Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblcategory-product-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,

    ]) ?>

</div>

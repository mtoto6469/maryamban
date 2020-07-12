<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategory */

$this->title = Yii::t('app', 'ویرایش: ', [
    
]) . $model->id_category;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'دسته بندی'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_category, 'url' => ['view', 'id' => $model->id_category]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblcategory-update" >

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'itemcat'=>$itemcat,
    ]) ?>

</div>

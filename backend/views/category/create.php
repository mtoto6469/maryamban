<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategory */

$this->title = Yii::t('app', 'افزودن دسته');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'دسته بندی'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategory-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'itemcat'=>$itemcat,
    ]) ?>

</div>

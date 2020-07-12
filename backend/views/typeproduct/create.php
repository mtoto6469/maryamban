<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbltypeProduct */

$this->title = Yii::t('app', 'ویرایش جنس محصول');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbltype Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltype-product-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'type'=>$type,

    ]) ?>

</div>

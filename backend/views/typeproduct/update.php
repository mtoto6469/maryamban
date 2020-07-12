<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbltypeProduct */

$this->title = Yii::t('app', 'ویرایش') . $model->type;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbltype Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tbltype-product-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'type'=>$type,

    ]) ?>

</div>

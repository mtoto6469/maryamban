<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */

$this->title = Yii::t('app', 'ثبت محصول');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'محصول'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'name'=>$name,
        'type'=>$type,
        'brand'=>$brand,
        'img'=>$img,
        'modelf'=>$modelf,

    ]) ?>

</div>

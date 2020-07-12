<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblbrand */

$this->title = Yii::t('app', 'ویرایش ', [
    'modelClass' => 'Tblbrand',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'برند'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblbrand-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblproduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tblproduct',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblproducts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblproduct-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

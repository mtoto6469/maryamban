<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblbagReplace */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tblbag Replace',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblbag Replaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblbag-replace-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

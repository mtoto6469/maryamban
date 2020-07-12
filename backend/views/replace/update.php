<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblreplace */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tblreplace',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblreplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblreplace-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'flag'=>$flag,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblmessage */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tblmessage',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblmessages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblmessage-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

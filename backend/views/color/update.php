<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcolor */

$this->title = Yii::t('app', 'ویرایش') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblcolors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblcolor-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelf'=>$modelf,
    ]) ?>

</div>

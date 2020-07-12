]<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpardakht */

$this->title = Yii::t('app', ',ویرایش');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblpardakhts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblpardakht-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

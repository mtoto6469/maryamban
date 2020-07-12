<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblpardakht */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblpardakhts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelp->id, 'url' => ['view', 'id' => $modelp->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblpardakht-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'modelp' => $modelp,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblbagReplace */

$this->title = Yii::t('app', 'Create Tblbag Replace');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblbag Replaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblbag-replace-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

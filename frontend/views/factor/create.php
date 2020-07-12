<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblSodorFactor */

$this->title = Yii::t('app', 'Create Tbl Sodor Factor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Sodor Factors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sodor-factor-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

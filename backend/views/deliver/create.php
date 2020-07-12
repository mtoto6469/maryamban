<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbldeliverprice */

$this->title = Yii::t('app', 'Create Tbldeliverprice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbldeliverprices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldeliverprice-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbldiscount */

$this->title = Yii::t('app', 'ثبت تخفیف');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbldiscounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldiscount-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

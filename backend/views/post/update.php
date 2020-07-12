<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */

$this->title = Yii::t('app', 'ویرایش: ', [
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'پست'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblpost-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'img'=>$img,

    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */

$this->title = Yii::t('app', 'گالری ', [
  
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblgalleries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblgallery-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelup'=>$modelup,
    ]) ?>

</div>

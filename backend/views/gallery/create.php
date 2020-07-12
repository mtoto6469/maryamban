<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */

$this->title = Yii::t('app', 'گالری');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'گالری'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblgallery-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelup'=>$modelup,
    ]) ?>

</div>

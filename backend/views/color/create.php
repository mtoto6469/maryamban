<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcolor */

$this->title = Yii::t('app', 'ثبت رنگ بندی');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblcolors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcolor-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelf'=>$modelf,

    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblreplace */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblreplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblreplace-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'pro'=>$pro,
        'b'=>$b,
        'size'=>$size,

    ]) ?>

</div>

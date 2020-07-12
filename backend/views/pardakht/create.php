<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblpardakht */

$this->title = Yii::t('app', 'ثبت عدم تایید');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblpardakhts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpardakht-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'fac'=>$fac,
        'user'=>$user,
    ]) ?>

</div>

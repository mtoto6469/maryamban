<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblbag */

$this->title = Yii::t('app', 'Create Tblbag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblbags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblbag-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

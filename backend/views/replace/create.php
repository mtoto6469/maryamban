<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblreplace */

$this->title = Yii::t('app', 'Create Tblreplace');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblreplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblreplace-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblprofile */

$this->title = Yii::t('app', 'Create Tblprofile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

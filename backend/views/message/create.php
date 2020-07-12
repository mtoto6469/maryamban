<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblmessage */

$this->title = Yii::t('app', 'Create Tblmessage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblmessages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

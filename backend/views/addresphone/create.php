<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TbladdresPhon */

$this->title = Yii::t('app', 'Create Tbladdres Phon');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbladdres Phons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbladdres-phon-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

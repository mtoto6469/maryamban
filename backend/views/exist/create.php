<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblexist */

$this->title = Yii::t('app', 'Create Tblexist');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblexists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblexist-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'name_pro'=>$name_pro,
       
    ]) ?>

</div>

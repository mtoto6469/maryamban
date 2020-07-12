<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblmenu */

$this->title = Yii::t('app', 'ویرایش ', [
   
]) . $model->id_menu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'منو'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_menu, 'url' => ['view', 'id' => $model->id_menu]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tblmenu-update" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'item'=>$item,
    ]) ?>

</div>

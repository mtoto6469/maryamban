<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblmenu */

$this->title = Yii::t('app', 'ایجاد منو');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'منو'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmenu-create" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'item'=>$item,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblmenu */

$this->title = $model->id_menu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'منو'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmenu-view" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id_menu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id_menu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_menu',
            'id_category',
            'position',
            'enable',
        ],
    ]) ?>

</div>

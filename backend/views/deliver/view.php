<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbldeliverprice */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'هزینه پست'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldeliverprice-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
     
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
        ],
    ]) ?>

</div>

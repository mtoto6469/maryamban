<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblpardakht */

?>
<div class="row" style="padding: 2%!important;">
    <div class="col-md-3"></div>
    <div class="col-md-9">


<div class="tblpardakht-view" style="text-align: right;">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
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
            'id',
            'id_fac',
            'end_number',
            'price',
            'date',
            'peygiri',
        ],
    ]) ?>

</div>
    </div>
</div>
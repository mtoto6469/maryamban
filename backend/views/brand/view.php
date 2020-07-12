<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblbrand */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'برند'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblbrand-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حدف'), ['delete', 'id' => $model->id], [
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

            'brand',
            'description:ntext',
            ['attribute'=>'enabel',
                'format'=>'html',
                'value'=>function($row){
                    if($row->enabel==0){
                        return '<p>خیر</p>';

                    }else{
                        return '<p>بله</p>';

                    }
                }
            ],

        ],
    ]) ?>

</div>

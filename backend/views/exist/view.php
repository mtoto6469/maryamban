<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblexist */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'موجودی'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblexist-view">

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
           
            ['attribute'=>'id_pro',

            'value'=>function($model){
                $pro=\backend\models\Tblproduct::find()->where(['id'=>$model->id_pro])->one();
                return $pro->name;
            }
            ],

            ['attribute'=>'size',
                'value'=>function($model){
                    if($model->size==0){
                        return 'پک کامل';
                    }else{
                        return $model->size;
                    }
                }

            ],

            'color',
            'exist',

        ],
    ]) ?>

</div>

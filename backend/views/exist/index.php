<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblexistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'موجودی');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblexist-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'ثبت موجودی جدید'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'id_pro',
                'value'=>'idPro.name',
                'label'=>'نام محصول',
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
            // 'date',
//             'date_ir',
            // 'enabel_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

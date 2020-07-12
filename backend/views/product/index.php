<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'محصول');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'ثبت محصول'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'id_category',


            ],
            // ['attribute'=>'id_type',

            // ],
            // ['attribute'=>'id_brand',

            // ],

            ['attribute'=>'price',

            ],
            ['attribute'=>'price_namayande',

            ],
            ['attribute'=>'img',
                'value'=>function($row){
                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$row->img.'" style="width:100px">';
                },
                'format'=>'html',

            ],
            'name',

             'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

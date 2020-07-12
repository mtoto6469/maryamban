<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcolorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'رنگ بندی');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcolor-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'ثبت رنگ بندی'), ['create','id'=>0], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_pro',
           'color',
            ['attribute'=>'img',
                'value'=>function($row){

                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$row->img.'" style="width:50px">';
                },
                'format'=>'html',

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

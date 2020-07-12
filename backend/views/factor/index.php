<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSodorFactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tbl Sodor Factors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sodor-factor-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_ref',
            'price',
            'description',
            [
                'attribute'=>'id_user',
                'value'=>'idUser.username',
                'label'=>'نام کاربری',
            ],

            // 'data',
             'data_ir',
            // 'resive',
            // 'visibel',

            [
                'class' => 'yii\grid\ActionColumn','template'=>'{view}'
                

            ],
        ],
    ]); ?>
</div>

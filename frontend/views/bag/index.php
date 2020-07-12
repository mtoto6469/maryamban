<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblbagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tblbags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblbag-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tblbag'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_pro',
            'count',
            'date',
            // 'date_ir',
            // 'id_fac',
            // 'enabel',
            // 'enable_view',
            // 'down_buy',
            // 'size',
            // 'color',
            // 'pak',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblbagReplaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tblbag Replaces');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblbag-replace-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tblbag Replace'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'id_fac',
            // 'enabel',
            // 'enabel_view',
            // 'down_buy',
            // 'size',
            // 'color',
            // 'id_all_post',
            // 'price',
            // 'id_replace',
            // 'id_bag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

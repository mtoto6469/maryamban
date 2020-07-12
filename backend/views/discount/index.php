<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbldiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'تخفیفات');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldiscount-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'ثبت تخفیف جدید'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
            'price',
            // 'date_start',
            // 'date_start_ir',
            // 'date_end',
            // 'date_end_ir',
            // 'enabel',
            // 'enabel_view',

            ['class' => 'yii\grid\ActionColumn','template'=>'{delete}  {view}'],
        ],
    ]); ?>
</div>

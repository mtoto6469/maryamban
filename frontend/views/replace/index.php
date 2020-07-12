<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblreplaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tblreplaces');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblreplace-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tblreplace'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_pro',
            'id_fac',
            'text_user:ntext',
            // 'category',
            // 'confirm',
            // 'text_admin:ntext',
            // 'post_price',
            // 'enabel_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'دسته بندی');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategory-index" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'افزودن دسته'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_category',
            'title_category',
            'description_category',
            'enable_category',
            'enabel_view_category',
            // 'id_parent',
            // 'group_category',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

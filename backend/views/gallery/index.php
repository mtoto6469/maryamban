<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblgallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'گالری');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblgallery-index" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'h'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            [
                'attribute'=>'address',
                'label'=>'آدرس جهت نمایش',
                'format'=>'html',
                'content'=>function($row){
                    $url=\yii::$app->urlManager;
                    $address = $url->hostInfo.'/upload'.'/'.$row->address;
                    return $address;
                }
            ],

//            'alert',
            'and_web',
            // 'description:ntext',
            // 'enable',
            // 'enable_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

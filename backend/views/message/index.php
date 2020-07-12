<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblmessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'پیام ها');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-index" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_user',
            'title',
            'text:ntext',
            'tell',
            // 'id_post',
             'email:email',
            // 'date',
             'date_ir',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}  {delete}'],
        ],
    ]); ?>
</div>

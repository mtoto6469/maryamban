<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'پست');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpost-index" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'ایجاد پست'), ['ghaleb_post'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_group',
            'title',
            'text_web:ntext',
            'id_img_mob',
            // 'id_img_web',
            // 'id_category_post:ntext',
            // 'enable',
            // 'enable_view',
            // 'tag',
            // 'keyword',
            // 'link',
            // 'type',
            // 'time',
            // 'time_ir',
            // 'user_id',
            // 'id_position:ntext',
            // 'description:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

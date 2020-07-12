<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'برگه'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpost-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_group',
            'title',
            'text_web:html',
            'id_img_web',
            'id_category_post:ntext',
            'enable',
            'enable_view',
            'tag',
            'keyword',
            'link',
            'type',
            'time',
            'time_ir',
            'user_id',
            'id_position:ntext',
            'description:ntext',
            'status',
        ],
    ]) ?>

</div>

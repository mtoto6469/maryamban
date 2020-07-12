<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblgallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'گالری'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;




function myaddress($row){
    $url=\yii::$app->urlManager;
    $address = $url->hostInfo.'/upload'.'/'.$row->address;
    return $address;
}

?>
<div class="tblgallery-view" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'title',
            [
                'attribute'=>'address',
                'label'=>'آدرس جهت نمایش',
                'format'=>'html',
                'value'=>myaddress($model),
            ],
            'alert',
            'and_web',
            'description:ntext',
            'enable',
            'enable_view',
        ],
    ]) ?>

</div>

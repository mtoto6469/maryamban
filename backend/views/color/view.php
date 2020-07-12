<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcolor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblcolors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcolor-view" style="height: 100vh">

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
        <?= Html::a(Yii::t('app', 'بعدی'), ['create', 'id' => $model->id_pro], ['class' => 'btn btn-warning']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pro',
            'color',
//            'img',
            ['attribute'=>'img',
                'value'=>function($row){

                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$row->img.'" style="width:100px">';
                },
                'format'=>'html',

            ],
        ],
    ]) ?>

</div>

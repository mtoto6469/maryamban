<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TbltypeProduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'جنس محصول'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltype-product-view">

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
            'type',
            'description:ntext',
            ['attribute'=>'id_parent',
                'format'=>'html',
                'value'=>function($row){
                    if($row->id_parent==0){
                        return '<p style="color: red">ندارد</p>';

                    }else{
                        $cat=\backend\models\TblcategoryProduct::find()->where(['id'=>$row->id_parent])->one();
                        return    Html::a(Yii::t('app',$cat->name ), ['view', 'id' => $cat->id], ['style' => 'color:blue']) ;
                    }
                }

            ],
            ['attribute'=>'enabel',
                'format'=>'html',
                'value'=>function($row){
                    if($row->enabel==0){
                        return '<p>خیر</p>';

                    }else{
                        return '<p>بله</p>';

                    }
                }
            ],

        ],
    ]) ?>

</div>

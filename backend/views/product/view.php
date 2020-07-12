<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'محصول'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-view">

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
        <?= Html::a(Yii::t('app', 'رنگ بندی'), ['color/create', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

    </p>
<p>برای تایین رنگ بندی محصول بر روی رنگ بندی کلیک کنید.</p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
        ['attribute'=>'id_category',
            'value'=>function($model){
                $name=\frontend\models\TblcategoryProduct::find()->where(['id'=>$model->id_category])->one();
                return Html::a(Yii::t('app',$name->name ), ['categoryproduct/view', 'id' => $name->id], ['style' => 'color:blue']) ;
            },
            'format'=>'html',
        ],

            ['attribute'=>'id_type',
                'value'=>function($model){
                    $name=\frontend\models\TbltypeProduct::find()->where(['id'=>$model->id_type])->one();
                    if($name!=null){
                        return Html::a(Yii::t('app',$name->type), ['typeproduct/view', 'id' => $name->id], ['style' => 'color:blue']) ;
                    }else{
                        return 'انتخاب نشده';
                    }
                },
                'format'=>'html',
            ],
            ['attribute'=>' id_brand',
                'value'=>function($model){
                    $name=\frontend\models\Tblbrand::find()->where(['id'=>$model->id_brand])->one();
                    if($name!=null){
                        return Html::a(Yii::t('app',$name->brand), ['view', 'id' => $name->id], ['style' => 'color:blue']) ;
                    }else{
                        return 'انتخاب نشده';
                    }
                },
                'format'=>'html',
                'label'=>'برند',
            ],

            ['attribute'=>'size',
            'format'=>'html',
                'value'=>function($model){
                    $size_pro='سایز های ';
                    $size=\backend\models\Tblsize::find()->where(['id_pro'=>$model->id])->andwhere(['enabel_view'=>1])->all();
                    foreach ($size as $s){
                        $size_pro.=$s->size .'<span style="color:red"> , </span>';
                    }
                    return $size_pro;

                }
            ],

            ['attribute'=>'color',
                'format'=>'html',
                'label'=>'رنگ بندی',
                'value'=>function($model){
                    $colo_pro='رنگ های ';
                    $color=\backend\models\Tblcolor::find()->where(['id_pro'=>$model->id])->all();
                    foreach ($color as $s){
                        $colo_pro.=$s->color .'<span style="color:red"> , </span>';
                    }
                    return $colo_pro;

                }
            ],

            ['attribute'=>'price',
            'label'=>'قیمت برای کاربر عادی'],
            ['attribute'=>'price_namayande',
                'label'=>'قیمت برای نماینده'],

            ['attribute'=>'img',
                'value'=>function($row){
                    return '<img src="'.Yii::$app->request->hostInfo.'/upload/'.$row->img.'" style="width:100px">';
                },
                'format'=>'html',

            ],
            'time_ir',
            'description:ntext',
        ],
    ]) ?>

</div>

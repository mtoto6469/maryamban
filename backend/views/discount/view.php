<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbldiscount */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbldiscounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbldiscount-view" style="height: 100vh">

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
            'name',
            'description:ntext',
            ['attribute'=>' all_pro',
                'label'=>'نام محصولات',
                'value'=>function($model){
                    if($model->all_pro==1){
                        return 'همه محصولات';
                    }else{
                        $dis=\backend\models\TbldisPro::find()->where(['id_dis'=>$model->id])->all();
                        $pro_dis='';
                        foreach ($dis as $d){
                           $cat=\backend\models\Tblproduct::find()->where(['id'=>$d->id_cat_pro])->one();
                            $pro_dis.=' , '.$cat->name;
                        }

                        return $pro_dis;
                    }
                }
            ],
            ['attribute'=>'price',
            'label'=>'درصد تخفیف کاربر'
            ],


        ],
    ]) ?>

</div>

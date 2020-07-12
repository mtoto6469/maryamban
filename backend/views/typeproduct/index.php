<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbltypeProductProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', ' جنس محصول');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltype-product-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tbltype Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'type',
            'description:ntext',
            ['attribute'=>'id_parent',
                'format'=>'html',
                'value'=>function($row){
                    if($row->id_parent==0){
                        return '<p style="color: red">ندارد</p>';

                    }else{
                        $type=\backend\models\TbltypeProduct::find()->where(['id'=>$row->id_parent])->one();
                        return    Html::a(Yii::t('app',$type->type), ['view', 'id' => $type->id], ['style' => 'color:blue']) ;
                    }
                }

            ],
            // 'enabel_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

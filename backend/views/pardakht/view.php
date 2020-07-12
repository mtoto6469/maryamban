<?php

use backend\models\TblSodorFactor;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpardakht */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblpardakhts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpardakht-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'تایید'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'عدم تایید'), ['create', 'id' => $model->id], [
            'class' => 'btn btn-danger',
           
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute'=>'id_fac',
                'value'=>function($model){
                    if($model->id_fac==0){

                    }else{
                        $fac=TblSodorFactor::find()->where(['id'=>$model->id_fac])->one();
                        return $fac->price;
                    }
                    },
                'label'=>'قیمت فاکتور',
            ],
            ['attribute'=>'user',
                'value'=>function($model){
                    if($model->id_fac==0){
                        $user=\common\models\User::find()->where(['id'=>$model->id_user])->one();
                        return $user->username;
                    }else{

                        $fac=TblSodorFactor::find()->where(['id'=>$model->id_fac])->one();
                        $user=\common\models\User::find()->where(['id'=>$fac->id_user])->one();
                        return $user->username;

                    }
                },

                'label'=>'نام کاربر',

            ],
            'end_number',
            'price',
            'date',
            'peygiri',
        ],
    ]) ?>

</div>

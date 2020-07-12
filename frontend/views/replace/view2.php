<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblreplace */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblreplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblreplace-view">

    <h3><?= Html::encode($this->title) ?></h3>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'id_pro',
            'id_fac',
            'text_user:ntext',
            ['attribute'=>'confirm',
            'value'=>function($model){
                if($model->confirm==1){
                    return '<span style="color:green">تایید شد</span>';
                }else{
                    return '<span style="color:red"> تایید نشد</span>';
                }
            },
                'format'=>'html',
            ],

            'text_admin:ntext',
            ['attribute'=>'post_price',
                'value'=>function($model){

                    if($model->confirm==1){
                        if($model->post_price==1){
                            return '<span style="color:green">بر عهده کارخانه</span>';
                        }else{
                            return '<span style="color:red"> بر عهده مشتری</span>';
                        }
                    }else{
                        return '-';
                    }


                },
                'format'=>'html',
            ],
            'price_cr',
        ],
    ]) ?>

</div>

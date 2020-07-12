<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'پروفایل');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'lastname',
             [
                'attribute'=>'user_id',
                'value'=>'idUser.username',
                'label'=>'نام کاربری',
            ],
            ['attribute'=>'role',
            'value'=>function($model){
                if($model->role=='costumer'){
                    return 'نماینده';
                }elseif($model->role=='admin'){
                    return 'مدیر کل';
                }else{
                    return 'کاربر';
                }
            }],

            // 'tel',
            // 'address:ntext',
            // 'enable_view',

           [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {list}  {view} {update} {delete}',
                'buttons' => [

                    'list' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-list-alt" aria-hidden="true" style="padding: 3px"></i>',
                            ['profile/list', 'id' => $model->id],
                            ['title'=>'لیست محصولات خریداری شده']
                        );
                    },

                ],
            ],
        ],
    ]); ?>
</div>

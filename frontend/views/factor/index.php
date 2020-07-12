<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblSodorFactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tbl Sodor Factors');
$this->params['breadcrumbs'][] = $this->title;
?>

<!---->
<?php
//
//if(isset($_SESSION['error5'])){
//
//    if($_SESSION['error5']!=null){;?>
<!---->
<!--        <div class="alert alert-danger">-->
<!--            --><?//=$_SESSION['error5']?>
<!---->
<!--        </div>-->
<!--    --><?php // }
//}else{
//
//    $_SESSION['error5']=null;
//}
//
//?>
<!---->
<!---->
<!---->
<?php
//
//if(isset($_SESSION['error6'])){
//
//    if($_SESSION['error6']!=null){;?>
<!---->
<!--        <div class="alert alert-danger">-->
<!--            --><?//=$_SESSION['error56']?>
<!---->
<!--        </div>-->
<!--    --><?php // }
//}else{
//
//    $_SESSION['error6']=null;
//}
//
//?>

<div class="row" style="margin:5% ">




    <h3>سفارشات</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
               ['attribute' => 'visibel',
                'value' => function ($row) {
                    if ($row->visibel == 0 ) {
                        return '<p style="color:red" >دیده نشد</p>';
                    } else {
                        return '<p style="color:green" >دیده شد</p>';
                    }

                },
               
                'format' => 'html',

            ],
            
    ['attribute' => 'print',
                'value' => function ($row) {
                    if ($row->print == 0 ) {
                        return '<p style="color:red" >بسته بندی نشد</p>';
                    } else {
                        return '<p style="color:green" >بسته بندی شد</p>';
                    }

                },
              'label'=>'بسته بندی',
                'format' => 'html',

            ],
          
             ['attribute' =>'resive',
                'value' => function ($row) {
                    if ($row->resive == 0 ) {
                        return '<p style="color:red" >ارسال نشد</p>';
                    } else {
                        return '<p style="color:green" >ارسال شد</p>';
                    }

                },
                
                'format' => 'html',

            ],
            
            
            
            'price',
            ['attribute' => 'confirm',
                'value' => function ($row) {
                    if ($row->confirm == 0 || $row->confirm == 3) {
                        return '<p style="color:red" >تایید نشده</p>';
                    } else {
                        return '<p style="color:green" >تایید شده</p>';
                    }

                },
                'label' => 'وضعیت',
                'format' => 'html',

            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {delete} {view} {chenge}',
//                'buttons' => [
//                    'chenge' => function($url, $model, $key) {     // render your custom button
//                        return Html::a('<span class="fa fa-edit"></span>تعویض', $url, [
//                            'title' => Yii::t('app', 'تعویض'),
//                            'class'=>'btn btn-primary btn-xs',
//                        ]);
//                }
//                ],
            ],

        ],
    ]); ?>


</div>

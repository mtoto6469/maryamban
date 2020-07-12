<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblprofile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-view">

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
            'name',
            'lastname',
               'attribute'=>'user_id',
              
            
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
            'tel',
            'address:ntext',
            'enable_view',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblprofile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblprofile-view" style="padding: 10%">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'lastname',
            'username',
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
        ],
    ]) ?>

</div>

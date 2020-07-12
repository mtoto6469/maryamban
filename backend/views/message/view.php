<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblmessage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblmessages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblmessage-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        
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
            'id_user',
            'title',
            'text:ntext',
            'tell',
            'id_post',
            'email:email',
            'date',
            'date_ir',
        ],
    ]) ?>

</div>

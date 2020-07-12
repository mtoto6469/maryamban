<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblreplace */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblreplaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblreplace-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', '  عدم تایید'), ['update', 'id' => $model->id ,'flag'=>0], ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Yii::t('app', ' تایید'), ['update', 'id' => $model->id ,'flag'=>1], [
            'class' => 'btn btn-primary',
          
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_user',
            'id_pro',
            'id_fac',
            'text_user:ntext',
            'category',
            'confirm',
            'text_admin:ntext',
            'post_price',
            'enabel_view',
            'id_bag',
        ],
    ]) ?>

</div>

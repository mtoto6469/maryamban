<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategory */

$this->title = $model->title_category;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'دسته بندی'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategory-view" style="height: 100vh">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id_category], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id_category], [
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
            'id_category',
            'title_category',
            'description_category',
            'enable_category',
            'enabel_view_category',
            'id_parent',
            'group_category',
            'menu_foter',
        ],
    ]) ?>

</div>

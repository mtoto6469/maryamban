<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */

$this->title = Yii::t('app', 'ایجاد برگه');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'برگه'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpost-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>

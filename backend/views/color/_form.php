<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcolor */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $id=$_GET['id'];
?>
<div class="row">
    <div class="col-md-9">

<div class="tblcolor-form" style="height: 100vh">

    <?php $form = ActiveForm::begin(); ?>
<?php

if($id==0){
  echo  $form->field($model, 'id_pro')->textInput()->hint('شناسه محصول را وارد کنید') ;
}else{
    echo '<div><p>شناسه محصول <span style="color:darkred;margin: 5px;font-weight: bolder">'.$id.'</span></p></div>';
}
?>
    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelf, 'image')->fileInput()->label('آپلود عکس')?>

    <?php
    if(!$model->isNewRecord){?>

        <img id="blah" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$model->img?>" alt="your image" style="width: 200px">

    <?php  }else{
        echo '<img id="blah" src="#" alt="your image" style="width: 200px">';
    }

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویزایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
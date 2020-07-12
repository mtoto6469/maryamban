<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblexist */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">

<?php
if(isset($_SESSION['error8'])){
    if($_SESSION['error8']!=null){?>

        <div class="alert alert-danger"><?=$_SESSION['error8']?></div>
   <?php

        $_SESSION['error8']=null;

    }
}



?>

<div class="tblexist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pro')->dropDownList($name_pro,['prompt'=>'انتخاب کنید','onclick'=>'sendFirstpost()'])->label('نام محصول')?>

    <?php
    if(!$model->isNewRecord){
        if($model->size==0){
            echo '   سایز : '. 'پک کامل';
        }else{
            echo '   سایز : '. $model->size;
        }
        
       echo '<br>';
      echo '  رنگ :  '. $model->color;


    }

    ?>

    <div id="ress">

        
        
    </div>




    <?= $form->field($model, 'exist')->textInput() ?>


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>





<script type="text/javascript">
    function sendFirstpost() {

        var name= $('#tblexist-id_pro').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('exist/find') ?>',
            data: {name: name},
            success:function (data) {
                $('#ress').html(data);

            }
        });
    }

</script>
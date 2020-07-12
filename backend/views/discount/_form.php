<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbldiscount */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-9">
        <?php

        if(isset($_SESSION['error1'])){
            if($_SESSION['error1']!=null){
                echo '<div class="alert alert-danger">'.$_SESSION['error1'].'</div>';
                $_SESSION['error1']=null;
            }

        }

        ?>
        <?php

        if(isset($_SESSION['error3'])){
            if($_SESSION['error3']!=null){
                echo '<div class="alert alert-danger">'.$_SESSION['error3'].'</div>';
                $_SESSION['error3']=null;
            }

        }

        ?>

        <div class="tbldiscount-form">

<?php $form = ActiveForm::begin(); ?>


<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'all_pro')->radioList([1=>'بله',0=>'خیر'],['onchange' =>'pro_user()']) ?>

    <div class="pro" style="display: block">
       <h3 >
            انتخاب محصول
        </h3>
        <div class="row">
            <div class="col-md-4">

              <?= $form->field($model, 'product')->textInput(['maxlength' => true])->label('کلمه قابل سرچ')->hint('نام محصول را سرچ کنید',['style'=>'color:#169F85']) ?>
           </div>
           <div class="col-md-4">
                <span>جهت نمایش نتیجه کلیک کنید</span><br/>
                <button class="btn btn-success btn-block" type="button" onclick="myfunction()">
                    جستجو
            </button>

        </div>
        <div class="col-md-4">
            <div id="res">

            </div>
        </div>
    </div>

</div>

<?= $form->field($model, 'price')->textInput()->hint('به طور مثال 10%',['style'=>'color:#169F85'])->label('درصد تخفیف1  ') ?>



        <?= $form->field($model, 'enabel')->radioList([1=>'بله',0=>'خیر']) ?>
            

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
   </div>
<script >
        function myfunction() {

           var product= $('#tbldiscount-product').val();

           $.ajax({
               type: 'POST',
               url: '<?php echo \Yii::$app->getUrlManager()->createUrl('discount/find') ?>',
               data: {product: product},
                success:function (data) {
                   $('#res').html(data);


               }
           });
       }

</script>

<!--<script>-->
<!--    function pro_user() {-->
<!---->
<!--       var check=$('#tbldiscount-all_pro :input').val();-->
<!--       if(check==1){-->
<!--            $('.pro').css('display','block');-->
<!--        }else {-->
<!---->
<!--           $('.pro').css('display', 'none');-->
<!--       }-->
<!---->
<!--    }-->
<!---->
<!--</script>-->

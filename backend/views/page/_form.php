<?php

use PharIo\Manifest\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;
/* @var $this yii\web\View */
/* @var $model backend\models\Tblpost */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="col-md-9 col-lg-9">
    <div class="tblpost-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <span style="color:#169F85">
            دسته ی والد مورد نظر خود را انتختب کنید، میتوانید سرچ کنید اگر دسته ای را انتخاب نکنید بدون والد در نظر گرفته میشود
        </span>
        <div class="row">
            <div class="col-md-4">

                <?= $form->field($model, 'serch')->textInput(['maxlength' => true])->label('کلمه قابل سرچ') ?>
            </div>
            <div class="col-md-4">
                <span>جهت نمایش نتیجه کلیک کنید</span><br/>
                <button class="btn btn-success btn-block" type="button" onclick="sendFirstCategory()">
                    جستجو
                </button>

            </div>
            <div class="col-md-4">
                <div id="res">

                </div>
            </div>
        </div>

        <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-md-4">

                <?= $form->field($model, 'serchpost')->textInput(['maxlength' => true])->label('کلمه قابل سرچ') ?>
            </div>
            <div class="col-md-4">
                <span>جهت نمایش نتیجه کلیک کنید</span><br/>
                <button class="btn btn-success btn-block" type="button" onclick="sendFirstpost()">
                    جستجو
                </button>

            </div>
            <div class="col-md-4">
                <div id="ress">

                </div>
            </div>
        </div>



        
        <?php

        echo TinyMCE::widget(['name' => 'text-content', 'toggle' => ['active' => true]]);

        $form->field($model, 'text_web')->widget(TinyMCE::className(), [
            'toggle' => [
                'active' => true,
            ]
        ]);
        ?>

    </div>

     <span style="color:#169F85;">
           پست هایی که می خواهید در این صفحه باشند را میتوانید با سرچ کردن بر اساس عنوان انتخاب کنید
        </span>



    <?= $form->field($model, 'enable')->radioList([1=>'بله',2=>'خیر'])?>

    <h3 style="color:darkred">سئو</h3>
    <p style="color:steelblue">این بخش مربوط به سئو بوده و برای بهینه سازی سایت شما ضرروری است</p>


    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true])->hint('کلمات کلیدی را با , از هم جدا کنید',['style'=>'color:#169F85']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <input type="submit" class="btn btn-success" name="publish" value="انتشار">

    <input type="submit" class="btn btn-danger" name="draft" value="پیش نویس">


    <?php ActiveForm::end(); ?>

</div>
</div>

<script type="text/javascript">
    function sendFirstCategory() {

        var search= $('#tblpost-serch').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('page/find') ?>',
            data: {search: search},
            success:function (data) {
                $('#res').html(data);
            }
        });
    }

</script>


<script type="text/javascript">
    function sendFirstpost() {

        var searchpost= $('#tblpost-serchpost').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('page/findpost') ?>',
            data: {searchpost: searchpost},
            success:function (data) {
                $('#ress').html(data);


            }
        });
    }

</script>

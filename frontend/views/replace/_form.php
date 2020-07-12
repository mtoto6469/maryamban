<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblreplace */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$url=Yii::$app->urlManager;



?>




    <?php $form = ActiveForm::begin(); ?>





    <div class="container-fluid">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <h3 class="text-center pull-left" style="padding-left: 30px;">تعویض </h3>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center"> عکس </th>
                        <th class="text-center"> نام محصول</th>
                        <th class="text-center"> رنگ </th>
                        <th class="text-center"> سایز</th>
                        <th class="text-center">تعداد</th>

                    </tr>
                    </thead>

                    <tbody>


                                <tr>
                                    <td class="text-center"> <img src="<?=Yii::$app->request->hostInfo?>/upload/<?=$pro->img?>" width="80px" height="0px"> </td>
                                    <td class="text-center"> <?=$pro->name?></td>
                                    <td class="text-center"> <?=$b->color?> </td>
                                    <td class="text-center"> <?=$form->field($model,'new_size')->dropDownList($size,['prompt'=>'پک کامل '])->label('')?> </td>
                                    <td class="text-center">
                                        <label></label>
                                        <input id="tblreplace-new_count" class="form-control" name="Tblreplace[new_count]" type="number" min="1" max="<?=$b->count?>" value="1">
                                    </td>
                                    <?php
                                    if(!$model->isNewRecord){
                                        if($model->id_pro==$pro->id){?>
                                            <input name="sub[<?=$pro->id?>]" value="<?=$pro->id?>" id="<?=$b->id?>" type="checkbox" checked  onclick="$(this).val(this.checked ? 1 : 0)">
                                        <?php  }else{?>
                                            <input name="sub[<?=$pro->id?>]" value="<?=$pro->id?>" id="<?=$b->id?>" type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)">
                                        <?php  }

                                    }else{?>
                                        <td>

                                            <input name="sub[<?=$pro->id?>]" value="<?=$pro->id?>" id="<?=$b->id?>" type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)">
                                        </td>

                                  <?php  }

                                    ?>

                                </tr>


                    </tbody>
                </table>
            </div>


            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">

                            <?= $form->field($model, 'text_user')->textarea(['rows' => 4])->label('علت مرجوعی') ?>


                            <div class="form-group">
                                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'ثبت') : Yii::t('app', 'ویرایش'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>


                    </div>
                </div>
            </div>
        </div>



        <?php ActiveForm::end(); ?>
    </div>




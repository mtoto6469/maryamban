<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

foreach ($fac as $f) {
    $time = date_create($f->date_deliver);

    date_add($time, date_interval_create_from_date_string("4 days"));
    $date = strtotime(date_format($time, "Y-m-d"));

    $today_date = strtotime(date('Y/m/d'));

    if ($today_date <= $date) {


        $bag = \frontend\models\Tblbag::find()->where(['id_fac' => $f->id])->all();
        $radiolist=[];
        $i=0;
        foreach ($bag as $b) {

    
            $check=\frontend\models\TblbagReplace::find()->where(['id_replace'=>$b->id])->count();
            if($check==0){
                $radiolist[$i]=$b->id;
            }

    
            }

    }


}
 $form = ActiveForm::begin();
if($radiolist==null){
    echo 'ohgd an';
}else{
foreach ($radiolist as $ra){
    $pro = \frontend\models\Tblproduct::find()->where(['id' => $b->id_pro])->one();?>
    <label><?=$pro->name?></label>
    <input type="radio" name="check" value="<?=$ra?>">
    <?php
}

?>

   
    <div id="tblallpost-price_post">
        <label><input name="Tblallpost[price_post]" value="1" type="radio"> تیپاکس</label>
        <label><input name="Tblallpost[price_post]" value="2" type="radio"> پست</label>
        <label><input name="Tblallpost[price_post]" value="3" type="radio"> پیک موتوری</label>
    </div>

    
    <textarea></textarea>



    
    
    

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); }?>



<?php
use backend\models\TblSodorFactor;
use frontend\models\Tblallpost;
use frontend\models\Tblbag;
use frontend\models\Tblexist;
use frontend\models\Tblproduct;
use frontend\models\TblWaitPardakht;
use frontend\models\TblDaryaftShod;
use backend\models\TblDasteAnjam;
$id_get = new yii::$app->request;
//echo '<pre />';
//var_dump($id_get);
//var_dump($_GET);
//exit;
$result = $result;

if (!empty($result) and $result ==1) {
    echo '
    <div class="alert alert-success">'
  .'<strong>موفقیت!</strong> پرداخت با موفقیت انجام شده است ..</div>';



    $id_fac = $id_get->get('order_id');

    $int=intval($id_fac);

    $SodorFactor=TblSodorFactor::find()->where(['id'=>$int])->one();
    $SodorFactor->id_ref=$_GET['au'];
    $SodorFactor->confirm =0;
    $SodorFactor->update();
    $bag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();

                foreach ($bag as $b) {
                    $b->id_fac = $SodorFactor->id;
                    $b->down_buy = 1;
                    $b->update();
                    $p = Tblproduct::find()->where(['id' => $b->id_pro])->one();
                    $ex = Tblexist::find()->where(['id_pro' => $p->id])->andWhere(['size' => $b->size])->andWhere(['color' => $b->color])->one();
                    if ($ex) {
                        $ex->exist = $ex->exist - $b->count;
                        $ex->save();
                    }
                    $allpost = Tblallpost::find()->where(['id' => $b->id_all_post])->all();
                    foreach ($allpost as $all) {
                        if ($all->id_fac == null) {
                            $all->id_fac = $SodorFactor->id;
                            $all->down_buy = 1;
                            $all->update();
                        }

                    }

                }
    

} else {
    $SodorFactor=TblSodorFactor::find()->where(['id'=>$int])->one();
    $SodorFactor->id_ref=0;
    $massege='';
    if ($result == (-1)) $massege = 'در پرداخت مشکلی پیش آمده است لطفا به مدیران شرکت اطلاع بدهید اما هزینه ای از حساب شما کسر نشده است ';
    if ($result == (-2)) $massege = 'مبلغ از کف تعریف شده کمتر است';
    if ($result == (-3)) $massege = 'مبلغ از سقف تعریف شده بیشتر است';
    if ($result == (-4)) $massege = 'مبلغ نامعتبر است';
    if ($result == (-6)) $massege = ' درگاه غیرفعال است لطفا در زمان دیگری اقدام بفرمایید';
    if ($result == (-7)) $massege = 'در پرداخت مشکلی پیش آمده است لطفا به مدیران شرکت اطلاع بدهید اما هزینه ای از حساب شما کسر نشده است';
    if ($result == (-9)) $massege = 'آدرس کال بک خالی است';
    if ($result == (-10)) $massege = ' چنین تراکنشی یافت نشد لطفا مجددا سعی فرمایید';
    if ($result == (-11)) $massege = 'تراکنش انجام نشده و مبلغی از حساب شما کسر نشده است';
    if ($result == (-12)) $massege = 'تراکنش انجام شده اما مبلغ نادرست است در صورتی که از حساب شما هزینه کسر شده باشد ظرف 72 ساعت به حساب شما برمی گردد';
    echo '
    <div class="alert alert-danger">
    <strong>پرداخت نا موفق!</strong>'.$massege.'</div>';
}

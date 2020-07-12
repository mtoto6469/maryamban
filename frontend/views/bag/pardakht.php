<?php

$url=Yii::$app->urlManager;
//آدرس برگشت
$address=$url->createAbsoluteUrl(['/bag/call']);

// گرفتن آی دی قیمت نهایی
//echo $id;exit;
//$id_get= new Yii::$app->request;
//$id_get=$id_get->get('id');
//echo $id_get;exit;
// استخراج قیمت نهایی
$Tbl=new \frontend\models\TblSodorFactor();
$fac=$Tbl->find()->where(['id'=>$id])->one();
//آدرس سایت پذیرنده
$client = new SoapClient("http://pardano.com/p/webservice/?wsdl");
//کد دریافتی از سایت پذیرنده
$api ="UR4oh" ;
// قیمت نهایی
$amount =$fac->price ; //Tooman
//تعریف آدرس برگشت
$callbackUrl = $address;
$orderId = $fac->id;
//توضیحات
$txt = urlencode('پرداخت به صورت انلاین');
/** @var TYPE_NAME $callbackUrl */
$res = $client->requestpayment($api , $amount , $callbackUrl , $orderId , $txt);

Yii::$app->getResponse()->Redirect("http://pardano.com/p/payment/{$res}");
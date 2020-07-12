<?php
namespace frontend\controllers;

use backend\models\Tblbrand;
use backend\models\TbltypeProduct;
use frontend\models\TblcategoryProduct;
use frontend\models\Tblmessage;
use frontend\models\Tblproduct;
use frontend\models\Tblprofile;
use frontend\models\TblUser;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
  /**
   * @inheritdoc
   */
  public $enableCsrfValidation = false;

  public function behaviors()
  {
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout', 'signup','profile'],
            'rules' => [
                [
                    'actions' => ['signup'],
                    'allow' => true,
                    'roles' => ['?'],
                ],
                [
                    'actions' => ['logout'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    'actions' => ['profile'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
//                    'logout' => ['post'],
            ],
        ],
    ];
  }

  /**
   * @inheritdoc
   */
  public function actions()
  {
    return [
        'error' => [
            'class' => 'yii\web\ErrorAction',
        ],
        'captcha' => [
            'class' => 'yii\captcha\CaptchaAction',
            'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return mixed
   */
  public function actionIndex()
  {
    $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
    $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
    $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
    $product=Tblproduct::find()->where(['enabel_view'=>1])->all();
    return $this->render('index',[
        'cat_pro'=>$cat_pro,
        'type'=>$type,
        'brand'=>$brand,
        'product'=>$product,
    ]);


  }





  public function actionShop()
  {
    $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
    $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
    $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
    $product=Tblproduct::find()->where(['enabel_view'=>1])->all();
    return $this->render('shop',[
        'cat_pro'=>$cat_pro,
        'type'=>$type,
        'brand'=>$brand,
        'product'=>$product,
    ]);


  }

  public function actionOrder()
  {
    return $this->render('order');
  }

  public function actionOrderpic()
  {
    return $this->render('orderpic');
  }

  public function actionLogin()
  {
    $urlBack= Yii::$app->user->getReturnUrl();

    $this->layout="login.php";
    if (!Yii::$app->user->isGuest) {
      return $this->redirect($urlBack);

    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {

      return $this->redirect($urlBack);

    } else {
      return $this->render('login', [
          'model' => $model,
      ]);
    }
  }

  public function actionLogout()
  {

    Yii::$app->user->logout();

    return $this->goHome();
  }

  public function actionContact()
  {


    $mess=new Tblmessage();
    if ($mess->load(Yii::$app->request->post()) && $mess->save()) {
      return $this->redirect(['contact']);
    }
    else{
//            var_dump($mess->getErrors());
//            exit;
      return $this->render('contact',[
          'message'=>$mess
      ]);

    }
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        } else {
//            return $this->render('contact', [
//                'model' => $model,
//            ]);
//        }
  }

  public function actionAbout()
  {
    return $this->render('about');
  }

  public function actionSignup()
  {
    $this->layout="login.php";
    $model = new SignupForm();
    if ($model->load(Yii::$app->request->post())) {
      if ($user = $model->signup()) {
        if (Yii::$app->getUser()->login($user)) {
          return $this->goHome();
        }

      }
    }
    $roles = ['costumer'=>'مشتری','student'=>'دانشجو','teacher'=>'استاد','collsge'=>'همکار'];

    return $this->render('signup', [
        'model' => $model,
        'roles'=>$roles,
    ]);
  }



  public function actionProfile()
  {
    $this->layout="login.php";
    $model=new Tblprofile();
    $model=$model->find()->where(['user_id'=>Yii::$app->user->getId()])->one();




    if ($model->load(Yii::$app->request->post()) && $model->save()) {


      return $this->goHome();


    }
    $roles = ['costumer'=>'مشتری','student'=>'دانشجو','teacher'=>'استاد','collsge'=>'همکار'];

    return $this->render('profile', [
        'model' => $model,
        'roles'=>$roles,
    ]);
  }

  public function actionRequestPasswordReset()
  {
    $model = new PasswordResetRequestForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      if ($model->sendEmail()) {
        Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

        return $this->goHome();
      } else {
        Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
      }
    }

    return $this->render('requestPasswordResetToken', [
        'model' => $model,
    ]);
  }

  public function actionResetPassword($token)
  {
    try {
      $model = new ResetPasswordForm($token);
    } catch (InvalidParamException $e) {
      throw new BadRequestHttpException($e->getMessage());
    }

    if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
      Yii::$app->session->setFlash('success', 'New password saved.');

      return $this->goHome();
    }

    return $this->render('resetPassword', [
        'model' => $model,
    ]);
  }






}

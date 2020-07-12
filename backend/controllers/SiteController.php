<?php
namespace backend\controllers;

use backend\models\SignupForm;
use backend\models\Tblallpost;
use backend\models\Tblpost;
use backend\models\Tblprofile;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup', 'init', 'logout', 'list'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'list'],
                        'allow' => true,
                        'roles' => ['admin'],
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


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {

        return $this->render('index');
    }


    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $profile = \backend\models\Tblprofile::find()->where(['user_id' => Yii::$app->user->getId()])->one();
            if ($profile->role != 'admin') {
                $_SESSION['log'] = 'َشما اجازه ورود ندارید لطفا با مدیریت هماهنگ کنید';
                return $this->redirect(['site/login']);
            } else {

                return $this->goBack();
            }

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


    public function actionList()
    {
        $allpost = Tblallpost::find()->where(['id_fader' => 0])->andFilterWhere(['!=', 'tel', 0])->all();
        return $this->render('list', ['allpost' => $allpost]);
    }

    public function actionSignup()
    {

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
                return $this->goHome();
//                }
            }
        }
        $roles = ['admin' => 'مدیر کل', 'costumer' => 'نمایندگی', 'user' => 'کاربر عادی'];
        return $this->render('signup', [
            'model' => $model,
            'roles' => $roles,

        ]);
    }


    public function actionInit()
    {
//        $auth = Yii::$app->authManager;
//
//        $admin = $auth->createRole('admin');
//        $auth->add($admin);
//
//        $auth->assign($admin, 1);
//
//        $costumer = $auth->createRole('costumer');
//        $auth->add($costumer);
//
//        $auth->assign($costumer, 2);
//
//        $user = $auth->createRole('user');
//        $auth->add($user);
//
//        $auth->assign($user, 3);
//
//        $user = $auth->createRole('student');
//        $auth->add($user);
//
//        $auth->assign($user, 4);
//
//        $user = $auth->createRole('teacher');
//        $auth->add($user);
//
//        $auth->assign($user, 5);
//
//        $user = $auth->createRole('collsge');
//        $auth->add($user);
//
//        $auth->assign($user, 6);
    }


}

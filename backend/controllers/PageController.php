<?php

namespace backend\controllers;

use backend\models\Tblcategory;
use backend\models\TblpostPage;
use common\components\jdf;
use common\models\User;
use Yii;
use backend\models\Tblpost;
use backend\models\TblpostSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Tblpost model.
 */
class PageController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete','update','view','create'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $searchModel = new TblpostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$flag=2);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGhaleb_page()
    { $model = new Tblpost();
        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['create', 'id_group' => $model->id_group]);
        }
        return $this->render('ghaleb_page',[
            'model' => $model,
        ]);
    }


    public function actionFind(){
  $model = new  Tblcategory();

            $query = $model->find()->where(['like', 'title_category', $_POST['search']])->all();
            $count = $model->find()->where(['like', 'title_category', $_POST['search']])->count();

            if ($count>=1){
            $find = '';
            $find .= ' <div class="form-group field-tblpost-id_category_post required has-success">';
            $find .= '<label class="control-label" for="tblpost-id_category_post">نتیجه جستجو</label>';
            $find .= '<input name="Tblpost[id_category_post]" value="" type="hidden"><div id="tblpost-id_category_post">';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $find .= '<label><input name="Tblpost[id_category_post][]" value="';
                $find .= $query[$i]->id_category;
                $find .= '" type="radio">';
                $find .= $query[$i]->title_category;
                $find .= '</label>';
            }
            $find .= '<div class="help-block"></div></div>';
            }else{
                $find='هیچ موردی یافت نشد';
            }

            return ($find);
            }



    public function actionFindpost(){
        $model = new  Tblpost();
        
        $query = $model->find()->where(['like', 'title', $_POST['searchpost']])->andWhere(['type'=>1])->all();
        $count = $model->find()->where(['like', 'title', $_POST['searchpost']])->andWhere(['type'=>1])->count();

        if ($count>=1){
            $find = '';
            $find .= ' <div class="form-group field-tblpost-id_position">';
            $find .= '<label class="control-label">نتیجه جستجو</label>';
            $find .= '<input name="Tblpost[id_position]" value="" type="hidden"><div id="tblpost-id_position">';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $find .= '<label><input name="Tblpost[id_position][]" value="';
                $find .= $query[$i]->id;
                $find .= '" type="checkbox">';
                $find .= $query[$i]->title;
                $find .= '</label>';
            }
            $find .= '</div><div class="help-block"></div></div>';
        }else{

            $find='هیچ موردی یافت نشد';
        }

        return ($find);


    }



    public function actionCreate()
    {

        $model = new Tblpost();
        $model->type=2;// for page
//        $model->id_group=$id_group;
        if ($model->load(Yii::$app->request->post())) {

            $data = new jdf();
            $model->time = date('Y/m/d');
            $model->time_ir = $data->date('y/m/d');
            $model->user_id=Yii::$app->user->getId();
            $model->text_web=$_POST["text-content"];
            if(\Yii::$app->request->post('publish')){
                $model->status='publish';
            }if(\Yii::$app->request->post('draft')){
                $model->status='draft';
            }
            if(isset($_POST['Tblpost']['id_category_post'])){
                if($_POST['Tblpost']['id_category_post']==null){
                    //ارور فرستاده شود که این پست بدون دسته بندی است و در  صفحه ی خاصی قرار نمیگیرد
                }else{

                    foreach ($_POST['Tblpost']['id_category_post'] as $key){

                        $model->id_category_post=$key;

                    }
                }
            }
            if(isset($_POST['Tblpost']['id_position'])){
                if ($_POST['Tblpost']['id_position']!= null) {
                    $model->id_position = implode(',', $_POST['Tblpost']['id_position']);
                }
            }
            $model->save();
            if(isset($_POST['Tblpost']['id_position'])){
                if ($_POST['Tblpost']['id_position']!= null) {
                    foreach ($_POST['Tblpost']['id_position'] as $key){

                        $modelpo_pa= new TblpostPage();
                        $modelpo_pa->id_psge=$model->id;
                        $modelpo_pa->id_post=$key;
                        $modelpo_pa->save();
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $data = new jdf();
            $model->time = date('Y/m/d');
            $model->time_ir = $data->date('y/m/d');
            $model->text_web=$_POST["text-content"];
            if(\Yii::$app->request->post('publish')){
                $model->status='publish';
            }if(\Yii::$app->request->post('draft')){
                $model->status='draft';
            }
            if(isset($_POST['Tblpost']['id_category_post'])){
                if($_POST['Tblpost']['id_category_post']==null){
                    //ارور فرستاده شود که این پست بدون دسته بندی است و در  صفحه ی خاصی قرار نمیگیرد
                }else{

                    foreach ($_POST['Tblpost']['id_category_post'] as $key){

                        $model->id_category_post=$key;

                    }
                }
            }
            if(isset($_POST['Tblpost']['id_position'])){
                if ($_POST['Tblpost']['id_position']!= null) {
                    $model->id_position = implode(',', $_POST['Tblpost']['id_position']);
                }
            }
            $model->save();
            if(isset($_POST['Tblpost']['id_position'])){
                if ($_POST['Tblpost']['id_position']!= null) {
                    foreach ($_POST['Tblpost']['id_position'] as $key){

                        $modelpo_pa= new TblpostPage();
                        $modelpo_pa->id_psge=$model->id;
                        $modelpo_pa->id_post=$key;
                        $modelpo_pa->save();
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tblpost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

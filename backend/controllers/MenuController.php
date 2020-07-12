<?php

namespace backend\controllers;

use backend\models\Tblcategory;
use Yii;
use backend\models\Tblmenu;
use backend\models\TblmenuSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Tblmenu model.
 */
class MenuController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Tblmenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblmenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblmenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tblmenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblmenu();

        $item=$this->setCategory($parent=0);

        if ($model->load(Yii::$app->request->post())&&$model->save() ) {
            
            return $this->redirect(['view', 'id' => $model->id_menu]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'item'=>$item,
            ]);
        }
    }

    function setCategory($parent=0){
        $result=[];
        $cat=Tblcategory::find()->where(['id_parent'=>$parent])->andFilterWhere(['!=','id_category','0'])->all();

        foreach ($cat as $item){
            $result[$item->id_category]=$item->title_category;
            $result= $result + $this->setCategory($item->id_category);
        }
        return $result;

    }
    /**
     * Updates an existing Tblmenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $item=$this->setCategory($parent=0);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_menu]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'item'=>$item,
            ]);
        }
    }

    /**
     * Deletes an existing Tblmenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblmenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblmenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblmenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

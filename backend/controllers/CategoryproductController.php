<?php

namespace backend\controllers;

use backend\models\Tblcolor;
use backend\models\Tblexist;
use backend\models\Tblproduct;
use backend\models\Tblsize;
use Yii;
use backend\models\TblcategoryProduct;
use backend\models\TblcategoryProductSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryproductController implements the CRUD actions for TblcategoryProduct model.
 */
class CategoryproductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete','update','view','create','error'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * Lists all TblcategoryProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblcategoryProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblcategoryProduct model.
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
     * Creates a new TblcategoryProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblcategoryProduct();
        $category=ArrayHelper::map(TblcategoryProduct::find()->where(['enabel_view'=>1])->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->id_parent==null){
                $model->id_parent=0;
                $model->save();
            }else{
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category'=>$category,
            ]);
        }
    }

    /**
     * Updates an existing TblcategoryProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $category=ArrayHelper::map(TblcategoryProduct::find()->where(['enabel_view'=>1])->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category'=>$category,
            ]);
        }
    }

    /**
     * Deletes an existing TblcategoryProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        $cat = TblcategoryProduct::find()->where(['id_parent' => $model->id])->all();

        if ($cat != null) {
            foreach ($cat as $c) {

                $pro = Tblproduct::find()->where(['id_type' => $c->id])->all();
                if ($pro != null) {
                    foreach ($pro as $item) {

                        $modelsize=Tblsize::find()->where(['id_pro'=>$item->id])->all();
                        if($modelsize!=null){
                            foreach ($modelsize as $ms){
                                $ms->enabel_view=0;
                                $ms->update();
                            }
                        }

                        $modelcolor=Tblcolor::find()->where(['id_pro'=>$item->id])->all();
                        if($modelcolor!=null){
                            foreach ($modelcolor as $mc){
                                $mc->enabel_view=0;
                                $mc->update();
                            }
                        }

                        $modelexist=Tblexist::find()->where(['id_pro'=>$item->id])->all();
                        if($modelcolor!=null){
                            foreach ($modelexist as $me){
                                $me->enabel_view=0;
                                $me->update();
                            }
                        }
                        $item->enabel_view = 0;
                        $item->esize = '0';
                        $item->update();
                    }
                    $c->enabel_view = 0;
                    $c->save();
                }else{
                    $c->enabel_view = 0;
                    $c->save();
                }
            }

        }

        $pro = Tblproduct::find()->where(['id_type' => $model->id])->all();
        if ($pro != null) {
            foreach ($pro as $item) {
                $modelsize=Tblsize::find()->where(['id_pro'=>$item->id])->all();
                if($modelsize!=null){
                    foreach ($modelsize as $ms){
                        $ms->enabel_view=0;
                        $ms->update();
                    }
                }

                $modelcolor=Tblcolor::find()->where(['id_pro'=>$item->id])->all();
                if($modelcolor!=null){
                    foreach ($modelcolor as $mc){
                        $mc->enabel_view=0;
                        $mc->update();
                    }
                }

                $modelexist=Tblexist::find()->where(['id_pro'=>$item->id])->all();
                if($modelcolor!=null){
                    foreach ($modelexist as $me){
                        $me->enabel_view=0;
                        $me->update();
                    }
                }
                $item->enabel_view = 0;
                 $item->esize = '0';
                $item->update();
            }
            $model->enabel_view = 0;
            $model->update();
        } else {
            $model->enabel_view = 0;
            $model->update();
        }

        $model->enabel_view =0;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblcategoryProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblcategoryProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblcategoryProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

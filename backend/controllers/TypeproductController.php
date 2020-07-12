<?php

namespace backend\controllers;

use backend\models\Tblcategory;
use backend\models\Tblcolor;
use backend\models\Tblexist;
use backend\models\Tblproduct;
use backend\models\Tblsize;
use Yii;
use backend\models\TbltypeProduct;
use backend\models\TbltypeProductProductSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypeproductController implements the CRUD actions for TbltypeProduct model.
 */
class TypeproductController extends Controller
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
     * Lists all TbltypeProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbltypeProductProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbltypeProduct model.
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
     * Creates a new TbltypeProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbltypeProduct();
        $type = ArrayHelper::map(TbltypeProduct::find()->where(['enabel_view'=>1])->all(), 'id', 'type');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->id_parent == null) {
                $model->id_parent = 0;
                $model->save();
            } else {
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'type' => $type,
            ]);
        }
    }

    /**
     * Updates an existing TbltypeProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $type = ArrayHelper::map(TbltypeProduct::find()->where(['enabel_view'=>1])->all(), 'id', 'type');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'type' => $type,
            ]);
        }
    }

    /**
     * Deletes an existing TbltypeProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $cat = TbltypeProduct::find()->where(['id_parent' => $model->id])->all();

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

                        $modelexist=Tblexist::find()->where(['id_pro'=>$item->name])->all();
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

                $modelexist=Tblexist::find()->where(['id_pro'=>$item->name])->all();
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

        $model->enabel_view = 0;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbltypeProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbltypeProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbltypeProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

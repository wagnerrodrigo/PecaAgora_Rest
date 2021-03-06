<?php

namespace app\controllers;

use app\models\Mercado;
use app\models\MercadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\RestClient;
use RestClient as GlobalRestClient;

/**
 * MercadoController implements the CRUD actions for Mercado model.
 */
class MercadoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Mercado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MercadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionObterDadosProduto($id= 'MLB1570636742')
    {
        $api = new GlobalRestClient([
            'base_url' => 'https://api.mercadolibre.com/items/',
            'headers' => [
                'Authorization' => 'Bearer $ACCESS_TOKEN',
                'Accept' =>'application/json'
            ]
        ]);
        
        $result = $api->get($id);
        $response = json_decode($result->response);
        $product = [
            'id'=> $response->id,  
            'title'=> $response->title,  
            'category'=> $response->category_id,  
            'price'=> $response->price,  
            'available_quantity'=> $response->available_quantity, 
            'thumbnail'=> $response->thumbnail, 
            'permalink'=> $response->permalink 
        ];
        // echo '<pre>'; print_r($product); die;

        return $this->render('rest',[
            'product' => $product,
        ]);
    }

    /**
     * Displays a single Mercado model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mercado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mercado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Mercado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Mercado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mercado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Mercado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mercado::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

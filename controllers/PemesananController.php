<?php

namespace app\controllers;

use Yii;
use app\models\Pemesanan;
use app\models\PemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pelanggan;
use yii\web\JsExpression;
use app\models\Produk;
use app\models\Detailpemesanan;

/**
 * PemesananController implements the CRUD actions for Pemesanan model.
 */
class PemesananController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pemesanan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pemesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pemesanan();

        $dpost = Yii::$app->request->post();
        $dtrans = \Yii::$app->db->beginTransaction();
        try {
            if ($model->load($dpost) && $model->save()){
                $all_success = TRUE;                
                foreach ($dpost['detailpemesanan'] as $ddtl){
                    $mdtl = new Detailpemesanan();
                    $mdtl->attributes = $ddtl;
                    $mdtl->idPemesanan = $model->idPemesanan;                    
                    if (!$mdtl->save()){
                        $all_success = FALSE;
                    }                    
                }
                if($all_success){
                    $dtrans->commit();
                    return $this->redirect(['view', 'id' => $model->idPemesanan]);
                }
            }
        } catch (Exception $ex) {
            $dtrans->rollBack();
            echo $ex->getTraceAsString();
        }
        return $this->render('create', [
            'model' => $model,            
        ]);
    
        
        }
    /*
    Fungsi Untuk Pemanggilan Pelanggan di _form Pemesanan, dalam active form
    */
    public function actionGetPelanggan(){
        $term = \Yii::$app->request->get('term');
        
        $pelanggan = Pelanggan::find()
        ->select(['idPelanggan','namaPelanggan','idPelanggan'])
        ->orFilterWhere(['like','idPelanggan',$term])
        ->orFilterWhere(['like','namaPelanggan',$term])
        ->limit(5)
        ->asArray()
        ->all();
        
        $dataUlang = [];
        foreach ($pelanggan as $pel){
            $dataUlang[] = [
                'id' => $pel['idPelanggan'],
                'label' => $pel['idPelanggan'].'  ->  '.$pel['namaPelanggan'],
                'value' => $pel['idPelanggan'],
            ];
        }
        
        return json_encode($dataUlang);
    }
    public function actionGetProduk(){
        $term = \Yii::$app->request->get('term');
        
        $produk = Produk::find()        
        ->orFilterWhere(['like','idProduk',$term])
        ->orFilterWhere(['like','namaProduk',$term])
        ->limit(5)
        ->asArray()
        ->all();
        
        $dataUlang = [];
        foreach ($produk as $pro){
            $dataUlang[] = [
                'id' => $pro['idProduk'],
                'label' => $pro['idProduk'].'  ->  '.$pro['namaProduk'],
                'value' => $pro['idProduk'],
                'name' => $pro['namaProduk'],
                'price' => $pro['harga'],
            ];
        }
        
        return json_encode($dataUlang);
    }
    /**
     * Updates an existing Pemesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPemesanan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }    
    /**
     * Deletes an existing Pemesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

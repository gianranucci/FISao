<?php

namespace app\controllers;

use Yii;
use app\models\Jugador;
use app\models\JugadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;

/**
 * JugadorController implements the CRUD actions for Jugador model.
 */
class JugadorController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all Jugador models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new JugadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jugador model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jugador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Jugador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jugador]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }
    
     function actionCrearJugadorPorEquipo($equipo_id)
    {
        
        $addJugador = Yii::$app->request->post('add-jugador');
        if($addJugador){
            $jugador = new Jugador(['equipo_id'=>$equipo_id]);
            $jugador->save();
            
        }
        $jugadores = Jugador::find()->where(['equipo_id'=>$equipo_id])->all();

        if (Model::loadMultiple($jugadores, Yii::$app->request->post()) && Model::validateMultiple($jugadores)) {
            foreach ($jugadores as $jugador) {
                $jugador->save(false);
            }
//            return $this->redirect('index');
        }

        return $this->render('multiCreate', [
                    'jugadores' => $jugadores,
                    'equipo_id' => $equipo_id,
        ]);
        
    }

//    public function actionMultiCreate() {
//        $count = Yii::$app->request->post('cant');
//        
//       
////        $count = 3;
//        $jugadores = [new Jugador()];
//        for ($i = 0; $i < $count; $i++) {
//            $jugadores[] = new Jugador();
//        }
////        $model = new Jugador();
//
//        if (Model::loadMultiple($jugadores, Yii::$app->request->post()) && Model::validateMultiple($jugadores)) {
//            foreach ($jugadores as $jugador) {
//                $jugador->save(false);
//            }
//            return $this->redirect('index');
//        }
//
//        return $this->render('multiCreate', [
////                    'model' => $model,
//                    'jugadores' => $jugadores,
//        ]);
    

    /**
     * Updates an existing Jugador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_jugador]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jugador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jugador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jugador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Jugador::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

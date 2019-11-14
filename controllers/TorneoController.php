<?php

namespace app\controllers;

use Yii;
use app\models\Torneo;
use app\models\Fecha;
use app\models\Equipo;
use app\models\Canchas;
use app\models\Partido;
use app\models\TorneoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TorneoController implements the CRUD actions for Torneo model.
 */
class TorneoController extends Controller {

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
     * Lists all Torneo models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TorneoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Torneo model.
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
     * Creates a new Torneo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Torneo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_torneo]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function acomodarEquipos($arreglo) {
        $equipo = $arreglo[1];
        array_splice($arreglo, 1, 1);
        $arreglo[] = $equipo;

        return $arreglo;
    }

    public function actionAuto() {
        $model = new Torneo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $categorias = Equipo::find()->select('categoria')->groupBy('categoria')->all();

            foreach ($categorias as $categoria) {
                $equiposPorCategoria = Equipo::find()->where(['categoria' => $categoria->categoria])->all();
                $cantidadDeEquipos = count($equiposPorCategoria);
                if (($cantidadDeEquipos % 2) != 0) {
                    $libre = new Equipo();
                    $libre->id_equipo = 9999;
                    $libre->nombre_equipo = 'Libre';
                    $libre->club_id = 1;
                    $libre->dt_id = 1;
                    $libre->categoria = ($categoria->categoria);

                    $equiposPorCategoria[] = $libre;
                    $cantidadDeEquipos = count($equiposPorCategoria);
                }


                $cantidadFecha = (count($equiposPorCategoria)) - 1;
                $partidosPorFecha = count($equiposPorCategoria) / 2;
                $fechaNum = 0;
                for ($f = 0; $f < $cantidadFecha; $f++) {
                    $fecha = new Fecha();
                    $fechaNum++;
                    $fecha->torneo_id = $model->id_torneo;
                    $fecha->numero = $fechaNum;
                    $fecha->save();
                    $punteroInicio = 2;
                    $punteroFin = $cantidadDeEquipos - 1;
                    for ($p = 0; $p < $partidosPorFecha; $p++) {
                        $partido = new Partido;

                        if ($p == 0) {
                            $partido->fecha_id = $fecha->id_fecha;
                            $partido->equipolocal_id = $equiposPorCategoria[0]->id_equipo;
                            $partido->equipovisitante_id = $equiposPorCategoria[1]->id_equipo;
                            $partido->cancha_id = 2;
                            $partido->fecha_inicio = null;
                            $partido->liga_id = $categoria->categoria;
                            $partido->save();
                        } else {
                            $partido->fecha_id = $fecha->id_fecha;
                            $partido->equipolocal_id = $equiposPorCategoria[$punteroInicio]->id_equipo;
                            $partido->equipovisitante_id = $equiposPorCategoria[$punteroFin]->id_equipo;
                            $partido->cancha_id = 2;
                            $partido->fecha_inicio = null;
                            $partido->liga_id = $categoria->categoria;
                            $partido->save();
                            $punteroInicio = $punteroInicio + 1;
                            $punteroFin = $punteroFin - 1;
                        }
                    }
                    $equiposPorCategoria = $this->acomodarEquipos($equiposPorCategoria);
                }
            }
        }
        //return $this->redirect(['view', 'id' => $model->id_torneo]);
//        }
//        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Torneo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_torneo]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Torneo model.
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
     * Finds the Torneo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Torneo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Torneo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

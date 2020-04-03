<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/358b0e44f1c1670b558e36588c267e47
 *
 * @package default
 */


// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\modules\crud\controllers\base;

use app\modules\crud\models\Liga;
use app\modules\crud\models\search\Liga as LigaSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * LigaController implements the CRUD actions for Liga model.
 */
class LigaController extends Controller
{


	/**
	 *
	 * @var boolean whether to enable CSRF validation for the actions in this controller.
	 * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
	 */
	public $enableCsrfValidation = false;


	/**
	 * Lists all Liga models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel  = new LigaSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

		Url::remember();
		\Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
			]);
	}


	/**
	 * Displays a single Liga model.
	 *
	 * @param integer $id_liga
	 * @return mixed
	 */
	public function actionView($id_liga) {
		\Yii::$app->session['__crudReturnUrl'] = Url::previous();
		Url::remember();
		Tabs::rememberActiveState();

		return $this->render('view', [
				'model' => $this->findModel($id_liga),
			]);
	}


	/**
	 * Creates a new Liga model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Liga;

		try {
			if ($model->load($_POST) && $model->save()) {
				return $this->redirect(['view', 'id_liga' => $model->id_liga]);
			} elseif (!\Yii::$app->request->isPost) {
				$model->load($_GET);
			}
		} catch (\Exception $e) {
			$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
			$model->addError('_exception', $msg);
		}
		return $this->render('create', ['model' => $model]);
	}


	/**
	 * Updates an existing Liga model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id_liga
	 * @return mixed
	 */
	public function actionUpdate($id_liga) {
		$model = $this->findModel($id_liga);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
					'model' => $model,
				]);
		}
	}


	/**
	 * Deletes an existing Liga model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id_liga
	 * @return mixed
	 */
	public function actionDelete($id_liga) {
		try {
			$this->findModel($id_liga)->delete();
		} catch (\Exception $e) {
			$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
			\Yii::$app->getSession()->addFlash('error', $msg);
			return $this->redirect(Url::previous());
		}


		// TODO: improve detection
		$isPivot = strstr('$id_liga', ',');
		if ($isPivot == true) {
			return $this->redirect(Url::previous());
		} elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
		} else {
			return $this->redirect(['index']);
		}
	}


	/**
	 * Finds the Liga model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @throws HttpException if the model cannot be found
	 * @param integer $id_liga
	 * @return Liga the loaded model
	 */
	protected function findModel($id_liga) {
		if (($model = Liga::findOne($id_liga)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}


}

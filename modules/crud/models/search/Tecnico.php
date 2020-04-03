<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/e0080b9d6ffa35acb85312bf99a557f2
 *
 * @package default
 */


namespace app\modules\crud\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\crud\models\Tecnico as TecnicoModel;

/**
 * Tecnico represents the model behind the search form about `app\modules\crud\models\Tecnico`.
 */
class Tecnico extends TecnicoModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id_tecnico'], 'integer'],
			[['nombre_tecnico', 'apellido_tecnico'], 'safe'],
		];
	}


	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}


	/**
	 * Creates data provider instance with search query applied
	 *
	 *
	 * @param array   $params
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = TecnicoModel::find();

		$dataProvider = new ActiveDataProvider([
				'query' => $query,
			]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
				'id_tecnico' => $this->id_tecnico,
			]);

		$query->andFilterWhere(['like', 'nombre_tecnico', $this->nombre_tecnico])
		->andFilterWhere(['like', 'apellido_tecnico', $this->apellido_tecnico]);

		return $dataProvider;
	}


}

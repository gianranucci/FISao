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
use app\modules\crud\models\Torneo as TorneoModel;

/**
 * Torneo represents the model behind the search form about `app\modules\crud\models\Torneo`.
 */
class Torneo extends TorneoModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id_torneo'], 'integer'],
			[['nombre_torneo', 'fecha_inicio', 'fecha_fin'], 'safe'],
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
		$query = TorneoModel::find();

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
				'id_torneo' => $this->id_torneo,
				'fecha_inicio' => $this->fecha_inicio,
				'fecha_fin' => $this->fecha_fin,
			]);

		$query->andFilterWhere(['like', 'nombre_torneo', $this->nombre_torneo]);

		return $dataProvider;
	}


}

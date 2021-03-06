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
use app\modules\crud\models\Partido as PartidoModel;

/**
 * Partido represents the model behind the search form about `app\modules\crud\models\Partido`.
 */
class Partido extends PartidoModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id_partido', 'equipolocal_id', 'equipovisitante_id', 'cancha_id', 'liga_id', 'num_fecha', 'torneo_id'], 'integer'],
			[['fecha_inicio'], 'safe'],
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
		$query = PartidoModel::find();

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
				'id_partido' => $this->id_partido,
				'equipolocal_id' => $this->equipolocal_id,
				'equipovisitante_id' => $this->equipovisitante_id,
				'cancha_id' => $this->cancha_id,
				'fecha_inicio' => $this->fecha_inicio,
				'liga_id' => $this->liga_id,
				'num_fecha' => $this->num_fecha,
				'torneo_id' => $this->torneo_id,
			]);

		return $dataProvider;
	}


}

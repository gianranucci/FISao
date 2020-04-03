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
use app\modules\crud\models\Equipo as EquipoModel;

/**
 * Equipo represents the model behind the search form about `app\modules\crud\models\Equipo`.
 */
class Equipo extends EquipoModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id_equipo', 'club_id', 'dt_id', 'categoria'], 'integer'],
			[['nombre_equipo'], 'safe'],
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
		$query = EquipoModel::find();

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
				'id_equipo' => $this->id_equipo,
				'club_id' => $this->club_id,
				'dt_id' => $this->dt_id,
				'categoria' => $this->categoria,
			]);

		$query->andFilterWhere(['like', 'nombre_equipo', $this->nombre_equipo]);

		return $dataProvider;
	}


}

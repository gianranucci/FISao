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
use app\modules\crud\models\Jugador as JugadorModel;

/**
 * Jugador represents the model behind the search form about `app\modules\crud\models\Jugador`.
 */
class Jugador extends JugadorModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id_jugador', 'equipo_id', 'categoria'], 'integer'],
			[['nombre_jugador', 'apellido_jugador'], 'safe'],
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
		$query = JugadorModel::find();

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
				'id_jugador' => $this->id_jugador,
				'equipo_id' => $this->equipo_id,
				'categoria' => $this->categoria,
			]);

		$query->andFilterWhere(['like', 'nombre_jugador', $this->nombre_jugador])
		->andFilterWhere(['like', 'apellido_jugador', $this->apellido_jugador]);

		return $dataProvider;
	}


}

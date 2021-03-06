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
use app\modules\crud\models\Token as TokenModel;

/**
 * Token represents the model behind the search form about `app\modules\crud\models\Token`.
 */
class Token extends TokenModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_id', 'created_at', 'type'], 'integer'],
			[['code'], 'safe'],
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
		$query = TokenModel::find();

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
				'user_id' => $this->user_id,
				'created_at' => $this->created_at,
				'type' => $this->type,
			]);

		$query->andFilterWhere(['like', 'code', $this->code]);

		return $dataProvider;
	}


}

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
use app\modules\crud\models\SocialAccount as SocialAccountModel;

/**
 * SocialAccount represents the model behind the search form about `app\modules\crud\models\SocialAccount`.
 */
class SocialAccount extends SocialAccountModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id', 'user_id', 'created_at'], 'integer'],
			[['provider', 'client_id', 'data', 'code', 'email', 'username'], 'safe'],
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
		$query = SocialAccountModel::find();

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
				'id' => $this->id,
				'user_id' => $this->user_id,
				'created_at' => $this->created_at,
			]);

		$query->andFilterWhere(['like', 'provider', $this->provider])
		->andFilterWhere(['like', 'client_id', $this->client_id])
		->andFilterWhere(['like', 'data', $this->data])
		->andFilterWhere(['like', 'code', $this->code])
		->andFilterWhere(['like', 'email', $this->email])
		->andFilterWhere(['like', 'username', $this->username]);

		return $dataProvider;
	}


}

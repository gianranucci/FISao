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
use app\modules\crud\models\Profile as ProfileModel;

/**
 * Profile represents the model behind the search form about `app\modules\crud\models\Profile`.
 */
class Profile extends ProfileModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_id'], 'integer'],
			[['name', 'public_email', 'gravatar_email', 'gravatar_id', 'location', 'website', 'bio', 'timezone'], 'safe'],
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
		$query = ProfileModel::find();

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
			]);

		$query->andFilterWhere(['like', 'name', $this->name])
		->andFilterWhere(['like', 'public_email', $this->public_email])
		->andFilterWhere(['like', 'gravatar_email', $this->gravatar_email])
		->andFilterWhere(['like', 'gravatar_id', $this->gravatar_id])
		->andFilterWhere(['like', 'location', $this->location])
		->andFilterWhere(['like', 'website', $this->website])
		->andFilterWhere(['like', 'bio', $this->bio])
		->andFilterWhere(['like', 'timezone', $this->timezone]);

		return $dataProvider;
	}


}

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
use app\modules\crud\models\AuthAssignment as AuthAssignmentModel;

/**
 * AuthAssignment represents the model behind the search form about `app\modules\crud\models\AuthAssignment`.
 */
class AuthAssignment extends AuthAssignmentModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['item_name', 'user_id'], 'safe'],
			[['created_at'], 'integer'],
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
		$query = AuthAssignmentModel::find();

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
				'created_at' => $this->created_at,
			]);

		$query->andFilterWhere(['like', 'item_name', $this->item_name])
		->andFilterWhere(['like', 'user_id', $this->user_id]);

		return $dataProvider;
	}


}

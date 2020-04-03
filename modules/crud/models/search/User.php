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
use app\modules\crud\models\User as UserModel;

/**
 * User represents the model behind the search form about `app\modules\crud\models\User`.
 */
class User extends UserModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id', 'confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags', 'last_login_at'], 'integer'],
			[['username', 'email', 'password_hash', 'auth_key', 'unconfirmed_email', 'registration_ip'], 'safe'],
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
		$query = UserModel::find();

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
				'confirmed_at' => $this->confirmed_at,
				'blocked_at' => $this->blocked_at,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at,
				'flags' => $this->flags,
				'last_login_at' => $this->last_login_at,
			]);

		$query->andFilterWhere(['like', 'username', $this->username])
		->andFilterWhere(['like', 'email', $this->email])
		->andFilterWhere(['like', 'password_hash', $this->password_hash])
		->andFilterWhere(['like', 'auth_key', $this->auth_key])
		->andFilterWhere(['like', 'unconfirmed_email', $this->unconfirmed_email])
		->andFilterWhere(['like', 'registration_ip', $this->registration_ip]);

		return $dataProvider;
	}


}

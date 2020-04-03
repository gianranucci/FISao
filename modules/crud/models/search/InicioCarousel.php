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
use app\modules\crud\models\InicioCarousel as InicioCarouselModel;

/**
 * InicioCarousel represents the model behind the search form about `app\modules\crud\models\InicioCarousel`.
 */
class InicioCarousel extends InicioCarouselModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id_carousel'], 'integer'],
			[['titulo_carousel', 'texto_carousel', 'image_path', 'boton_carousel'], 'safe'],
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
		$query = InicioCarouselModel::find();

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
				'id_carousel' => $this->id_carousel,
			]);

		$query->andFilterWhere(['like', 'titulo_carousel', $this->titulo_carousel])
		->andFilterWhere(['like', 'texto_carousel', $this->texto_carousel])
		->andFilterWhere(['like', 'image_path', $this->image_path])
		->andFilterWhere(['like', 'boton_carousel', $this->boton_carousel]);

		return $dataProvider;
	}


}

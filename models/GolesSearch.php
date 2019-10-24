<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goles;

/**
 * GolesSearch represents the model behind the search form of `app\models\Goles`.
 */
class GolesSearch extends Goles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gol', 'partido_id', 'jugador_id', 'equipo_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Goles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_gol' => $this->id_gol,
            'partido_id' => $this->partido_id,
            'jugador_id' => $this->jugador_id,
            'equipo_id' => $this->equipo_id,
        ]);

        return $dataProvider;
    }
}

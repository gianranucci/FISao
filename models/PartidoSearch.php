<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Partido;

/**
 * PartidoSearch represents the model behind the search form of `app\models\Partido`.
 */
class PartidoSearch extends Partido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_partido', 'equipolocal_id', 'equipovisitante_id', 'cancha_id', 'liga_id'], 'integer'],
            [['fecha_inicio'], 'safe'],
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
        $query = Partido::find();

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
            'id_partido' => $this->id_partido,
            'equipolocal_id' => $this->equipolocal_id,
            'equipovisitante_id' => $this->equipovisitante_id,
            'cancha_id' => $this->cancha_id,
            'fecha_inicio' => $this->fecha_inicio,
            'liga_id' => $this->liga_id,
        ]);

        return $dataProvider;
    }
}

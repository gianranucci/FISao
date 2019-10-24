<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tecnico;

/**
 * TecnicoSearch represents the model behind the search form of `app\models\Tecnico`.
 */
class TecnicoSearch extends Tecnico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tecnico'], 'integer'],
            [['nombre_tecnico', 'apellido_tecnico'], 'safe'],
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
        $query = Tecnico::find();

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
            'id_tecnico' => $this->id_tecnico,
        ]);

        $query->andFilterWhere(['like', 'nombre_tecnico', $this->nombre_tecnico])
            ->andFilterWhere(['like', 'apellido_tecnico', $this->apellido_tecnico]);

        return $dataProvider;
    }
}

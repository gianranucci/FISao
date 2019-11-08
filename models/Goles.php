<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goles".
 *
 * @property int $id_gol
 * @property int $partido_id
 * @property int $jugador_id
 * @property int $equipo_id
 * @property int $cant_goles
 *
 * @property Jugador $jugador
 */
class Goles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partido_id', 'jugador_id', 'equipo_id','cant_goles'], 'integer'],
            [['jugador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jugador::className(), 'targetAttribute' => ['jugador_id' => 'id_jugador']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gol' => 'Id Gol',
            'partido_id' => 'Partido ID',
            'jugador_id' => 'Jugador ID',
            'equipo_id' => 'Equipo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJugador()
    {
        return $this->hasOne(Jugador::className(), ['id_jugador' => 'jugador_id']);
    }
}

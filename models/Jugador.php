<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jugador".
 *
 * @property int $id_jugador
 * @property int $equipo_id
 * @property string $nombre_jugador
 * @property int $categoria
 * @property string $apellido_jugador
 *
 * @property Equipo $equipo
 */
class Jugador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jugador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nombre_jugador','required'],
            [['equipo_id', 'categoria'], 'integer'],
            [['nombre_jugador', 'apellido_jugador'], 'string', 'max' => 120],
            [['equipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['equipo_id' => 'id_equipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jugador' => 'Id Jugador',
            'equipo_id' => 'Equipo ID',
            'nombre_jugador' => 'Nombre Jugador',
            'categoria' => 'Categoria',
            'apellido_jugador' => 'Apellido Jugador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipo()
    {
        return $this->hasOne(Equipo::className(), ['id_equipo' => 'equipo_id']);
    }
    
    
    function golesPartido($partido_id){
        $gol = Goles::findOne(['partido_id'=> $partido_id, 'jugador_id'=> $this->id_jugador]);
        return $gol->cant_goles;
    }
}

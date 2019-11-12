<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo".
 *
 * @property int $id_equipo
 * @property string $nombre_equipo
 * @property int $club_id
 * @property int $dt_id
 * @property int $categoria
 *
 * @property Tecnico $dt
 * @property Club $club
 * @property Jugador[] $jugadors
 * @property Partido[] $partidos
 * @property Partido[] $partidos0
 */
class Equipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_id', 'dt_id', 'categoria'], 'integer'],
            [['nombre_equipo'], 'string', 'max' => 120],
            [['dt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tecnico::className(), 'targetAttribute' => ['dt_id' => 'id_tecnico']],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id' => 'id_club']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_equipo' => 'Id Equipo',
            'nombre_equipo' => 'Nombre Equipo',
            'club_id' => 'Club ID',
            'dt_id' => 'Dt ID',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDt()
    {
        return $this->hasOne(Tecnico::className(), ['id_tecnico' => 'dt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::className(), ['id_club' => 'club_id']);
    }
    public function getNombreEquipo()
    {
        return $this->hasMany(Equipo::className(), ['nombre_equipo' => 'nombre_equipo']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJugadors()
    {
        return $this->hasMany(Jugador::className(), ['equipo_id' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(Partido::className(), ['equipolocal_id' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos0()
    {
        return $this->hasMany(Partido::className(), ['equipovisitante_id' => 'id_equipo']);
    }
    
    function golesPartido($partido_id):int
    {
        $golesPorEquipo = Goles::find()->where(['partido_id' => $partido_id, 'equipo_id' => $this->id_equipo])->all();
        $golesEquipo = 0;
        
        foreach($golesPorEquipo as $goles)
        {
            if($goles->cant_goles < 0){
                $goles->cant_goles = 0;
                $golesEquipo = $goles->cant_goles;
                
            }
            $golesEquipo += $goles->cant_goles;
            
        }
        return $golesEquipo;
    }
}

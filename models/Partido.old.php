<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partido".
 *
 * @property int $id_partido
 * @property int $equipolocal_id
 * @property int $equipovisitante_id
 * @property int $cancha_id
 * @property string $fecha_inicio
 * @property int $liga_id
 *
 * @property Liga $liga
 * @property Canchas $cancha
 * @property Equipo $equipolocal
 * @property Equipo $equipovisitante
 */
class Partido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipolocal_id', 'equipovisitante_id', 'cancha_id', 'liga_id'], 'integer'],
            [['fecha_inicio','fecha_id'], 'safe'],
            [['fecha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fecha::className(), 'targetAttribute' => ['fecha_id' => 'id_fecha']],
            [['cancha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Canchas::className(), 'targetAttribute' => ['cancha_id' => 'id_cancha']],
            [['equipolocal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['equipolocal_id' => 'id_equipo']],
            [['equipovisitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['equipovisitante_id' => 'id_equipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_partido' => 'Id Partido',
            'equipolocal_id' => 'Equipo Local',
            'equipovisitante_id' => 'Equipo Visitante',
            'cancha_id' => 'Cancha',
            'fecha_inicio' => 'Fecha Inicio',
            'liga_id' => 'Liga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiga()
    {
        return $this->hasOne(Liga::className(), ['id_liga' => 'liga_id']);
    }
    public function getFecha()
    {
        return $this->hasOne(Fecha::className(), ['id_fecha' => 'fecha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCancha()
    {
        return $this->hasOne(Canchas::className(), ['id_cancha' => 'cancha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipolocal()
    {
        return $this->hasOne(Equipo::className(), ['id_equipo' => 'equipolocal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipovisitante()
    {
        return $this->hasOne(Equipo::className(), ['id_equipo' => 'equipovisitante_id']);
    }
    
    
}

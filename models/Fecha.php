<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fecha".
 *
 * @property int $id_fecha
 * @property int $torneo_id
 * @property int $numero
 * @property string $estado
 *
 * @property Torneo $torneo
 */
class Fecha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fecha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['torneo_id', 'numero'], 'integer'],
            [['estado'], 'string', 'max' => 45],
            [['torneo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Torneo::className(), 'targetAttribute' => ['torneo_id' => 'id_torneo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fecha' => 'Id Fecha',
            'torneo_id' => 'Torneo ID',
            'numero' => 'Numero',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneo()
    {
        return $this->hasOne(Torneo::className(), ['id_torneo' => 'torneo_id']);
    }
}

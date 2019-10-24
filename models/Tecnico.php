<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tecnico".
 *
 * @property int $id_tecnico
 * @property string $nombre_tecnico
 * @property string $apellido_tecnico
 *
 * @property Equipo[] $equipos
 */
class Tecnico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tecnico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_tecnico'], 'string', 'max' => 90],
            [['apellido_tecnico'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tecnico' => 'Id Tecnico',
            'nombre_tecnico' => 'Nombre Tecnico',
            'apellido_tecnico' => 'Apellido Tecnico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['dt_id' => 'id_tecnico']);
    }
}

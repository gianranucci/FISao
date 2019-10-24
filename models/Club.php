<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Club".
 *
 * @property int $id_club
 * @property string $nombre_club
 * @property string $direccion
 *
 * @property Equipo[] $equipos
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_club'], 'integer'],
            [['nombre_club'], 'string', 'max' => 120],
            [['direccion'], 'string', 'max' => 45],
            [['id_club'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_club' => 'Id Club',
            'nombre_club' => 'Nombre Club',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['club_id' => 'id_club']);
    }
}

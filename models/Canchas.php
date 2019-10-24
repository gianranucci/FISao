<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "canchas".
 *
 * @property int $id_cancha
 * @property string $nombre_cancha
 *
 * @property Partido[] $partidos
 */
class Canchas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'canchas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_cancha'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cancha' => 'Id Cancha',
            'nombre_cancha' => 'Nombre Cancha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(Partido::className(), ['cancha_id' => 'id_cancha']);
    }
}

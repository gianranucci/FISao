<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "torneo".
 *
 * @property int $id_torneo
 * @property string $nombre_torneo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * @property Liga[] $ligas
 */
class Torneo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'torneo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre_torneo'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_torneo' => 'Id Torneo',
            'nombre_torneo' => 'Nombre Torneo',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLigas()
    {
        return $this->hasMany(Liga::className(), ['torneo_id' => 'id_torneo']);
    }
}

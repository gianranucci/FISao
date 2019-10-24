<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liga".
 *
 * @property int $id_liga
 * @property int $torneo_id
 * @property int $categoria
 *
 * @property Torneo $torneo
 * @property Partido[] $partidos
 */
class Liga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'liga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['torneo_id', 'categoria'], 'integer'],
            [['torneo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Torneo::className(), 'targetAttribute' => ['torneo_id' => 'id_torneo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_liga' => 'Id Liga',
            'torneo_id' => 'Torneo ID',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneo()
    {
        return $this->hasOne(Torneo::className(), ['id_torneo' => 'torneo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(Partido::className(), ['liga_id' => 'id_liga']);
    }
}

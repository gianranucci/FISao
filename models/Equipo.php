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
 *
 * @property Club $club
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
            [['nombre_equipo','club_id'],'required'],
            [['club_id', 'dt_id','categoria'], 'integer'],
            [['nombre_equipo'], 'string', 'max' => 120],
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
            'club_id' => 'Club',
            'dt_id' => 'Director Tecnico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::className(), ['id_club' => 'club_id']);
    }
}

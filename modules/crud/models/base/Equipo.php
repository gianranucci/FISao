<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "equipo".
 *
 * @property integer $id_equipo
 * @property string $nombre_equipo
 * @property integer $club_id
 * @property integer $dt_id
 * @property integer $categoria
 *
 * @property \app\modules\crud\models\Tecnico $dt
 * @property \app\modules\crud\models\Club $club
 * @property \app\modules\crud\models\Jugador[] $jugadors
 * @property \app\modules\crud\models\Partido[] $partidos
 * @property \app\modules\crud\models\Partido[] $partidos0
 * @property string $aliasModel
 */
abstract class Equipo extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['club_id', 'dt_id', 'categoria'], 'integer'],
            [['nombre_equipo'], 'string', 'max' => 120],
            [['dt_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\crud\models\Tecnico::className(), 'targetAttribute' => ['dt_id' => 'id_tecnico']],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\crud\models\Club::className(), 'targetAttribute' => ['club_id' => 'id_club']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_equipo' => Yii::t('models', 'Id Equipo'),
            'nombre_equipo' => Yii::t('models', 'Nombre Equipo'),
            'club_id' => Yii::t('models', 'Club ID'),
            'dt_id' => Yii::t('models', 'Dt ID'),
            'categoria' => Yii::t('models', 'Categoria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDt()
    {
        return $this->hasOne(\app\modules\crud\models\Tecnico::className(), ['id_tecnico' => 'dt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(\app\modules\crud\models\Club::className(), ['id_club' => 'club_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJugadors()
    {
        return $this->hasMany(\app\modules\crud\models\Jugador::className(), ['equipo_id' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(\app\modules\crud\models\Partido::className(), ['equipolocal_id' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos0()
    {
        return $this->hasMany(\app\modules\crud\models\Partido::className(), ['equipovisitante_id' => 'id_equipo']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\EquipoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\EquipoQuery(get_called_class());
    }


}

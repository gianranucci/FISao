<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "partido".
 *
 * @property integer $id_partido
 * @property integer $equipolocal_id
 * @property integer $equipovisitante_id
 * @property integer $cancha_id
 * @property string $fecha_inicio
 * @property integer $liga_id
 * @property integer $num_fecha
 * @property integer $torneo_id
 *
 * @property \app\modules\crud\models\Torneo $torneo
 * @property \app\modules\crud\models\Cancha $cancha
 * @property \app\modules\crud\models\Equipo $equipolocal
 * @property \app\modules\crud\models\Equipo $equipovisitante
 * @property string $aliasModel
 */
abstract class Partido extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipolocal_id', 'equipovisitante_id', 'cancha_id', 'liga_id', 'num_fecha', 'torneo_id'], 'integer'],
            [['fecha_inicio'], 'safe'],
            [['torneo_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\crud\models\Torneo::className(), 'targetAttribute' => ['torneo_id' => 'id_torneo']],
            [['cancha_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\crud\models\Cancha::className(), 'targetAttribute' => ['cancha_id' => 'id_cancha']],
            [['equipolocal_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\crud\models\Equipo::className(), 'targetAttribute' => ['equipolocal_id' => 'id_equipo']],
            [['equipovisitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\modules\crud\models\Equipo::className(), 'targetAttribute' => ['equipovisitante_id' => 'id_equipo']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_partido' => Yii::t('models', 'Id Partido'),
            'equipolocal_id' => Yii::t('models', 'Equipolocal ID'),
            'equipovisitante_id' => Yii::t('models', 'Equipovisitante ID'),
            'cancha_id' => Yii::t('models', 'Cancha ID'),
            'fecha_inicio' => Yii::t('models', 'Fecha Inicio'),
            'liga_id' => Yii::t('models', 'Liga ID'),
            'num_fecha' => Yii::t('models', 'Num Fecha'),
            'torneo_id' => Yii::t('models', 'Torneo ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneo()
    {
        return $this->hasOne(\app\modules\crud\models\Torneo::className(), ['id_torneo' => 'torneo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCancha()
    {
        return $this->hasOne(\app\modules\crud\models\Cancha::className(), ['id_cancha' => 'cancha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipolocal()
    {
        return $this->hasOne(\app\modules\crud\models\Equipo::className(), ['id_equipo' => 'equipolocal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipovisitante()
    {
        return $this->hasOne(\app\modules\crud\models\Equipo::className(), ['id_equipo' => 'equipovisitante_id']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\PartidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PartidoQuery(get_called_class());
    }


}

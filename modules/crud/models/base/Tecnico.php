<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "tecnico".
 *
 * @property integer $id_tecnico
 * @property string $nombre_tecnico
 * @property string $apellido_tecnico
 *
 * @property \app\modules\crud\models\Equipo[] $equipos
 * @property string $aliasModel
 */
abstract class Tecnico extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tecnico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tecnico'], 'string', 'max' => 90],
            [['apellido_tecnico'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tecnico' => Yii::t('models', 'Id Tecnico'),
            'nombre_tecnico' => Yii::t('models', 'Nombre Tecnico'),
            'apellido_tecnico' => Yii::t('models', 'Apellido Tecnico'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(\app\modules\crud\models\Equipo::className(), ['dt_id' => 'id_tecnico']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\TecnicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TecnicoQuery(get_called_class());
    }


}
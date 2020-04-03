<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "canchas".
 *
 * @property integer $id_cancha
 * @property string $nombre_cancha
 *
 * @property \app\modules\crud\models\Partido[] $partidos
 * @property string $aliasModel
 */
abstract class Cancha extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'canchas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_cancha'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cancha' => Yii::t('models', 'Id Cancha'),
            'nombre_cancha' => Yii::t('models', 'Nombre Cancha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(\app\modules\crud\models\Partido::className(), ['cancha_id' => 'id_cancha']);
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\CanchaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CanchaQuery(get_called_class());
    }


}

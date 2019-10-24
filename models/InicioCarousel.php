<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inicio_carousel".
 *
 * @property int $id_carousel
 * @property string $titulo_carousel
 * @property string $texto_carousel
 * @property string $image_path
 * @property string $boton_carousel
 */
class InicioCarousel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inicio_carousel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo_carousel', 'texto_carousel', 'image_path', 'boton_carousel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_carousel' => 'Id Carousel',
            'titulo_carousel' => 'Titulo Carousel',
            'texto_carousel' => 'Texto Carousel',
            'image_path' => 'Image Path',
            'boton_carousel' => 'Boton Carousel',
        ];
    }
}

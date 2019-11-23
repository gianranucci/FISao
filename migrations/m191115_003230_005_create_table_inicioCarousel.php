<?php

use yii\db\Migration;

class m191115_003230_005_create_table_inicioCarousel extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%inicioCarousel}}', [
            'id_carousel' => $this->primaryKey(),
            'titulo_carousel' => $this->string(),
            'texto_carousel' => $this->string(),
            'image_path' => $this->string(),
            'boton_carousel' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%inicioCarousel}}');
    }
}

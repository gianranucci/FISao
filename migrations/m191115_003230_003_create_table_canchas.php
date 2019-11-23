<?php

use yii\db\Migration;

class m191115_003230_003_create_table_canchas extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%canchas}}', [
            'id_cancha' => $this->primaryKey(),
            'nombre_cancha' => $this->string(120),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%canchas}}');
    }
}

<?php

use yii\db\Migration;

class m191115_003230_020_create_table_goles extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%goles}}', [
            'id_gol' => $this->primaryKey(),
            'partido_id' => $this->integer(),
            'jugador_id' => $this->integer(),
            'equipo_id' => $this->integer(),
            'cant_goles' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('fk_goles_1_idx', '{{%goles}}', 'jugador_id');
        $this->addForeignKey('fk_goles_1', '{{%goles}}', 'jugador_id', '{{%jugador}}', 'id_jugador', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%goles}}');
    }
}

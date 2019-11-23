<?php

use yii\db\Migration;

class m191115_003230_013_create_table_jugador extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%jugador}}', [
            'id_jugador' => $this->primaryKey(),
            'equipo_id' => $this->integer(),
            'nombre_jugador' => $this->string(120),
            'categoria' => $this->integer(),
            'apellido_jugador' => $this->string(120),
        ], $tableOptions);

        $this->createIndex('fk_jugador_1_idx', '{{%jugador}}', 'equipo_id');
        $this->addForeignKey('fk_jugador_1', '{{%jugador}}', 'equipo_id', '{{%equipo}}', 'id_equipo', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%jugador}}');
    }
}

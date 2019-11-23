<?php

use yii\db\Migration;

class m191115_003230_015_create_table_partido extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%partido}}', [
            'id_partido' => $this->primaryKey(),
            'equipolocal_id' => $this->integer(),
            'equipovisitante_id' => $this->integer(),
            'cancha_id' => $this->integer(),
            'fecha_inicio' => $this->dateTime(),
            'liga_id' => $this->integer(),
            'num_fecha' => $this->integer(),
            'torneo_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('fk_partido_2_idx', '{{%partido}}', 'cancha_id');
        $this->createIndex('fk_partido_4_idx', '{{%partido}}', 'equipovisitante_id');
        $this->createIndex('fk_partido_3_idx', '{{%partido}}', 'equipolocal_id');
        $this->createIndex('fk_partido_1_idx', '{{%partido}}', 'torneo_id');
        $this->addForeignKey('fk_partido_3', '{{%partido}}', 'equipolocal_id', '{{%equipo}}', 'id_equipo', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_partido_4', '{{%partido}}', 'equipovisitante_id', '{{%equipo}}', 'id_equipo', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_partido_1', '{{%partido}}', 'torneo_id', '{{%torneo}}', 'id_torneo', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_partido_2', '{{%partido}}', 'cancha_id', '{{%canchas}}', 'id_cancha', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%partido}}');
    }
}

<?php

use yii\db\Migration;

class m191115_003230_011_create_table_equipo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%equipo}}', [
            'id_equipo' => $this->primaryKey(),
            'nombre_equipo' => $this->string(120),
            'club_id' => $this->integer(),
            'dt_id' => $this->integer(),
            'categoria' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('fk_equipo_1_idx', '{{%equipo}}', 'dt_id');
        $this->createIndex('fk_equipo_2_idx', '{{%equipo}}', 'club_id');
        $this->addForeignKey('fk_equipo_1', '{{%equipo}}', 'dt_id', '{{%tecnico}}', 'id_tecnico', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_equipo_2', '{{%equipo}}', 'club_id', '{{%Club}}', 'id_club', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%equipo}}');
    }
}

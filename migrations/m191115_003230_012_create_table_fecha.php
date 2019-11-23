<?php

use yii\db\Migration;

class m191115_003230_012_create_table_fecha extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%fecha}}', [
            'id_fecha' => $this->primaryKey(),
            'torneo_id' => $this->integer(),
            'numero' => $this->integer(),
            'estado' => $this->string(45),
        ], $tableOptions);

        $this->createIndex('fk_fecha_1_idx', '{{%fecha}}', 'torneo_id');
        $this->addForeignKey('fk_fecha_1', '{{%fecha}}', 'torneo_id', '{{%torneo}}', 'id_torneo', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%fecha}}');
    }
}

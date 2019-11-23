<?php

use yii\db\Migration;

class m191115_003230_014_create_table_liga extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%liga}}', [
            'id_liga' => $this->primaryKey(),
            'torneo_id' => $this->integer(),
            'categoria' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('fk_liga_1_idx', '{{%liga}}', 'torneo_id');
        $this->addForeignKey('fk_liga_1', '{{%liga}}', 'torneo_id', '{{%torneo}}', 'id_torneo', 'NO ACTION', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%liga}}');
    }
}

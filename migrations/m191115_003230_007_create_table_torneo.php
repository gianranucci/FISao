<?php

use yii\db\Migration;

class m191115_003230_007_create_table_torneo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%torneo}}', [
            'id_torneo' => $this->primaryKey(),
            'nombre_torneo' => $this->string(120),
            'fecha_inicio' => $this->dateTime(),
            'fecha_fin' => $this->dateTime(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%torneo}}');
    }
}

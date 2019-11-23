<?php

use yii\db\Migration;

class m191115_003230_006_create_table_tecnico extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tecnico}}', [
            'id_tecnico' => $this->primaryKey(),
            'nombre_tecnico' => $this->string(90),
            'apellido_tecnico' => $this->string(45),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%tecnico}}');
    }
}

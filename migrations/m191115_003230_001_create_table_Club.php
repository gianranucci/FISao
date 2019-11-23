<?php

use yii\db\Migration;

class m191115_003230_001_create_table_Club extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%Club}}', [
            'id_club' => $this->primaryKey(),
            'nombre_club' => $this->string(120),
            'direccion' => $this->string(45),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%Club}}');
    }
}

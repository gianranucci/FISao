<?php

use yii\db\Migration;

class m191115_003230_004_create_table_country extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%country}}', [
            'code' => $this->char(2)->notNull()->append('PRIMARY KEY'),
            'name' => $this->char(52)->notNull(),
            'population' => $this->integer()->notNull()->defaultValue('0'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%country}}');
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        /*
        $this->createTable('{{%party}}', [
            'id' => Schema::TYPE_PK,
        ], $tableOptions);

        $this->createTable('{{%party_type}}', [
            'id' => Schema::TYPE_STRING,
        ], $tableOptions);

        $this->createTable('{{%customer}}', [
            'id' => Schema::TYPE_PK,
        ]);

        $this->createTable('{{%order}}', [
            'id' => Schema::TYPE_PK,
            'external_id' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'customer_id' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'status' => Schema::TYPE_STRING . ' NOT NULL',
            'party_id' => Schema::TYPE_INTEGER. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%payment}}',[
            'id' => Schema::TYPE_PK,
            'external_id' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'customer_id' => Schema::TYPE_STRING . ' DEFAULT NULL',
            'order_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_STRING . ' DEFAULT NULL',
        ], $tableOptions);

        $this->createTable('{{%finance_account}}', [
            'id' => Schema::TYPE_PK,
            'external_id' => Schema::TYPE_STRING . 'DEFAULT NULL',
            'party_id' => Schema::TYPE_INTEGER,
            'customer_id' => Scheme::TYPE_INTEGER,
        ], $tableOptions);
         */

        $this->createTable('{{%shop}}', [
            'id' => Schema::TYPE_PK,
            'party_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        /*
        $this->dropTable('{{%party}}');
        $this->dropTable('{{%party_type}}');
        $this->dropTable('{{%customer}}');
        $this->dropTable('{{%finance_account}}');
        $this->dropTable('{{%order}}');
        $this->dropTable('{{%payment}}');
         */
    }
}

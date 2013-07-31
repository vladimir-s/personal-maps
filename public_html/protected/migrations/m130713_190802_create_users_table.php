<?php

class m130713_190802_create_users_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('pm_users', array(
            'id' => 'pk',
            'u_name' => 'string NOT NULL',
            'u_email' => 'string NOT NULL',
            'u_pass' => 'string NOT NULL',
            'u_role' => 'string NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('pm_users');
    }
}
<?php

class m130713_193329_create_places_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('pm_places', array(
            'id' => 'pk',
            'p_title' => 'string NOT NULL',
            'p_description' => 'string NOT NULL',
            'p_lng' => 'float NOT NULL',
            'p_lat' => 'float NOT NULL',
            'p_user_id' => 'integer NOT NULL',
        ));

        $this->addForeignKey('user_id', 'pm_places', 'p_user_id', 'pm_users', 'id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
        $this->dropForeignKey('user_id', 'pm_places');
        $this->dropTable('pm_users');
	}
}
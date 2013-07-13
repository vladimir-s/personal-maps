<?php

class m130713_193329_create_places_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('pm_places', array(
            'id' => 'pk',
            'p_title' => 'string NOT NULL',
            'p_description' => 'string NOT NULL',
            'p_coords' => 'string NOT NULL',
            'p_user_id' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('pm_users');
	}
}
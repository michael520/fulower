<?php

use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
    	$data = file_get_contents(__DIR__ . '../../resources/data/data.sql');

		$this->execute($data);
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
		$this->table('ww_categories')->drop();
		$this->table('ww_flower')->drop();
    }
}
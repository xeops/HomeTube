<?php

use yii\db\Migration;

/**
 * Class m220312_201845_Video
 */
class m220312_201845_Video extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createIndex('order_added', 'video', 'added');
		$this->createIndex('order_views', 'video', 'views');
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "m220312_201845_Video cannot be reverted.\n";

		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m220312_201845_Video cannot be reverted.\n";

		return false;
	}
	*/
}

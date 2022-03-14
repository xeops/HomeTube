<?php

use yii\db\Migration;

/**
 * Class m220312_114457_video
 */
class m220312_114457_video extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('video', [
			'id' => $this->primaryKey(),
			'title' => $this->string()->notNull(),
			'thumbnail' => $this->string()->defaultValue('/assets/img/thumbnail.png'),
			'duration' => $this->integer()->unsigned(),
			'views' => $this->integer()->unsigned()->defaultValue(0),
			'added' => $this->dateTime()->defaultExpression('now()')
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "m220312_114457_video cannot be reverted.\n";

		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m220312_114457_video cannot be reverted.\n";

		return false;
	}
	*/
}

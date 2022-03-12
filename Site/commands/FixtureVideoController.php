<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;


use app\models\Video\db\Video;
use yii\bootstrap4\Progress;
use yii\console\Controller;
use yii\db\Transaction;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FixtureVideoController extends Controller
{
	public function actionGenerate(?int $count = 1000000, ?bool $regenerate = true)
	{
		$this->stdout("Now we started {$count} with {$regenerate}\n", Console::BOLD);

		$transaction = \Yii::$app->db->beginTransaction(Transaction::REPEATABLE_READ);

		if ($regenerate)
		{
			Video::deleteAll();
		}
		try
		{
			for ($i = 0; $i < $count; $i++)
			{
				$video = new Video();
				$video->title = "Video #{$i}";
				$video->duration = mt_rand(0, 86399);
				$video->views = mt_rand(0, PHP_INT_MAX);

				$video->save();
			}
		}
		catch (\Throwable $exception)
		{
			$this->stderr($exception->getMessage());
			$transaction->rollBack();
			return;
		}
		$transaction->commit();
	}
}

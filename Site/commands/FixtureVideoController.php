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
	public function actionGenerate(?int $count = 1000000, ?int $regenerate = 1)
	{
		$this->stdout("Now we started {$count} with {$regenerate}\n", Console::BOLD);


		if ($regenerate == 1)
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
				$video->views = mt_rand(0, 2000000000);

				$video->save();
			}
		}
		catch (\Throwable $exception)
		{
			$this->stderr($exception->getMessage());

			return;
		}
	}
}

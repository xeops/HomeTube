<?php

namespace app\controllers;

use app\models\Video\db\Video;
use yii\data\Sort;
use yii\web\Controller;
use \yii\data\Pagination;
class VideoController extends Controller
{
	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$time = microtime(true);
		$sort = new Sort([
			'attributes' => ['views', 'added' => []],
		]);


		$query = Video::find();
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$models = $query->offset($pages->offset)
			->limit($pages->limit)
			->orderBy($sort->orders)
			->all();

		return $this->render('index', [
			'videos' => $models,
			'pages' => $pages,
			'sort'=>$sort,
			'time'=>microtime(true) - $time
		]);
	}
}

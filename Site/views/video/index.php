<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
	<h1>Videos</h1>
<?= $time ?>
	<ul>
		<?php foreach ($videos as $video): ?>
			<li>
				<?= Html::encode("{$video->title}") ?>:
				<?= $video->views ?>
			</li>
		<?php endforeach; ?>
	</ul>

<?= LinkPager::widget(['pagination' => $pages]) ?>
<?=
 $sort->link('views') . ' | ' . $sort->link('added');
?>

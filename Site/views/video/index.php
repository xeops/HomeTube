<?php

use yii\helpers\Html;
use yii\bootstrap4\LinkPager;

?>
<small>
	<?= $time ?>
</small>

<h1>Videos</h1>
<?= LinkPager::widget(['pagination' => $pages]) ?>
<?=
$sort->link('views') . ' | ' . $sort->link('added');
?>

<div class="video-grid-container">
	<?php foreach ($videos as $video): ?>
		<div class="video-item card" style="width: 18rem;">
			<img src="<?= $video->thumbnail ?? '/assets/img/thumbnail.png' ?>" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?= Html::encode("{$video->title}") ?></h5>
				<p class="card-text">Duration: <?= $video->duration ?></p>
				<p class="card-text">Views: <?= $video->views ?></p>
				<p class="card-text">Added: <?= $video->added ?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?= LinkPager::widget([
	'pagination' => $pages,
	'firstPageLabel' => true,
	'lastPageLabel' => true,
])
?>

<?= \nterms\pagesize\PageSize::widget([
	'sizes' => $pages
]) ?>


<style>
    .video-item {
        margin: 10px;
        padding: 5px;
    }

    .video-grid-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
</style>
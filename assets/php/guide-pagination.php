<?php
$pages = isset($a[0]) ? $a[0] : '';
$index = isset($a[1]) ? $a[1] : '';
?>

<div class="guide-pagination">
	<div class="guide-pagination-prev-btn-wrapper">
		<?php
		if ($index != 0) { ?>
			<a href="?pg=<?php echo $index; ?>">
				<div class="guide-pagination-prev-next-btn">
					<?php echo $pages[$index - 1]['title']; ?>
				</div>
			</a>
		<?php } ?>
	</div>
	<div class="guide-pagination-pages">
		<?php
		for ($i = 0; $i < count($pages); $i++) {
			if ($i != $index) { ?>
				<a href="?pg=<?php echo $i + 1; ?>">
			<?php } ?>
				<div class="guide-pagination-page-btn"><?php echo $i + 1; ?></div>
			<?php if ($i != $index) { ?>
				</a>
			<?php }
		} ?>
	</div>
	<div class="guide-pagination-next-btn-wrapper">
		<?php
		if ($index != count($pages) - 1) { ?>
			<a href="?pg=<?php echo $index + 2; ?>">
				<div class="guide-pagination-prev-next-btn">
					<?php echo $pages[$index + 1]['title']; ?>
				</div>
			</a>
		<?php } ?>
	</div>
</div>
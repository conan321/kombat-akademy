<?php
$text = isset($a[0]) ? $a[0] : '';
$url = isset($a[1]) ? $a[1] : '';
?>

<div class="btn-wrapper-align-right">
	<a href="<?php echo $url ?>">
		<div class="more-btn">
			<?php echo $text ?>
			<i class="fa-solid fa-arrow-right"></i>
		</div>
	</a>
</div>
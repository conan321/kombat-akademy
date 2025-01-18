<?php
$title = isset($a[0]) ? $a[0] : '';
$caption = isset($a[1]) ? $a[1] : '';
$url = isset($a[2]) ? $a[2] : '';
$align = isset($a[3]) ? $a[3] : '';
$wrap = isset($a[4]) ? $a[4] : true;
$full = isset($a[5]) ? $a[5] : false;
$title_bottom = isset($a[6]) ? $a[6] : false;
$class = '';

if ($full) {
	$class = 'image-full';
} else if ($align == 'left') {
	$class = $wrap ? 'image-left-wrap' : 'image-left';
} else if ($align == 'right') {
	$class = $wrap ? 'image-right-wrap' : 'image-right';
} else if ($align == 'center') {
	$class = 'image-center';
}
?>

<figure class="image-wrapper <?php echo $class ?>">
	<?php if ($title && !$title_bottom) { ?>
		<div class="image-title"><?php echo $title ?></div>
	<?php } ?>
	<div class="image">
		<img alt="<?php echo $title ?>" src="<?php echo $url ?>" />
	</div>
	<?php if ($title && $title_bottom) { ?>
		<div class="image-title image-title-bottom"><?php echo $title ?></div>
	<?php }
	if ($caption) { ?>
		<figcaption><?php echo $caption ?></figcaption>
	<?php } ?>
</figure>
<?php
$title = isset($a[0]) ? $a[0] : '';
$caption = isset($a[1]) ? $a[1] : '';
$url = isset($a[2]) ? $a[2] : '';
$align = isset($a[3]) ? $a[3] : '';
$wrap = isset($a[4]) ? $a[4] : true;
$autoplay = isset($a[5]) ? (int)$a[5] : 1;
$loop = isset($a[6]) ? (int)$a[6] : 1;
$mute = isset($a[7]) ? (int)$a[7] : 1;
$title_bottom = isset($a[8]) ? $a[8] : false;
$id = '';
$class = '';
$origin = 'https://mk1.kombatakademy.com';

// Get YouTube ID
$reg_exp = '/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
preg_match($reg_exp, $url, $match);

if ($match && strlen($match[2]) == 11) {
	$id = $match[2];
}

$src = 'https://www.youtube.com/embed/' . $id . '?playlist=' . $id . '&origin=' . $origin . '&autoplay=' . $autoplay . '&loop=' . $loop . '&mute=' . $mute;

if ($align == 'left') {
	$class = $wrap ? 'video-left-wrap' : 'video-left';
} else if ($align == 'right') {
	$class = $wrap ? 'video-right-wrap' : 'video-right';
} else if ($align == 'center') {
	$class = 'video-center';
}
?>

<figure class="video-wrapper <?php echo $class ?>">
	<?php if ($title && !$title_bottom) { ?>
		<div class="video-title"><?php echo $title ?></div>
	<?php } ?>
	<div class="video">
		<iframe src="<?php echo $src ?>" frameborder="0" allowfullscreen="true"></iframe>
	</div>
	<?php if ($title && $title_bottom) { ?>
		<div class="video-title video-title-bottom"><?php echo $title ?></div>
	<?php }
	if ($caption) { ?>
		<figcaption><?php echo $caption ?></figcaption>
	<?php } ?>
</figure>
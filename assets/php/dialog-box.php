<?php
$title = isset($a[0]) ? $a[0] : '';
$msg = isset($a[1]) ? $a[1] : '';
$size = isset($a[2]) ? $a[2] : '';

if ($size) {
	if (strtolower($size) == "small") {
		$size = " dialog-box-sm";
	} else if (strtolower($size) == "large") {
		$size = " dialog-box-lg";
	}

}
?>

<div class="dialog-box<?php echo $size ?>">
	<div class="dialog-box-header">
		<div class="dialog-box-title"><?php echo $title ?></div>
		<i class="dialog-box-close-btn fa-solid fa-xmark"></i>
	</div>
	<div class="dialog-box-body"><?php echo $msg ?></div>
</div>
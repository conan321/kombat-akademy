<?php
$pages = array(
	array(
		'slug' => 'intro',
		'title' => 'Introduction'
	),
	array(
		'slug' => 'controls',
		'title' => 'Controls'
	),
	array(
		'slug' => 'preparation',
		'title' => 'Preparation'
	)
);

include(__DIR__ . '/../guide-page-select.php');
?>

<div class="guide">
	<?php include_file('guide-navigation.php', array($pages, $index)); ?>
	<?php include('intro/' . $page . '.php'); ?>
	<?php include_file('guide-pagination.php', array($pages, $index)); ?>
</div>
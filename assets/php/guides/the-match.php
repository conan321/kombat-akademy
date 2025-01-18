<?php
$pages = array(
	array(
		'slug' => 'the-match',
		'title' => 'The Match'
	),
	array(
		'slug' => 'movement',
		'title' => 'Movement'
	),
	array(
		'slug' => 'moves',
		'title' => 'Moves'
	),
	array(
		'slug' => 'mechanics',
		'title' => 'Mechanics'
	)
);

include(__DIR__ . '/../guide-page-select.php');
?>

<div class="guide">
	<?php include_file('guide-navigation.php', array($pages, $index)); ?>
	<?php include('the-match/' . $page . '.php'); ?>
	<?php include_file('guide-pagination.php', array($pages, $index)); ?>
</div>
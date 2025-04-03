<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
		),
		array(
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=t-1000')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2 class="in-progress">Midscreen</h2>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=t-1000')) ?>
</section>
<section id="strategy" class="in-progress">
	<h1>STRATEGY</h1>
	<?php include_file('more-btn.php', array('FULL STRATEGY', '')) ?>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
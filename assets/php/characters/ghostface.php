<section id="move-list" class="in-progress">
	<h1>MOVE LIST</h1>

	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=ghostface')) ?>
</section>
<section id="combos" class="in-progress">
	<h1>COMBOS</h1>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=ghostface')) ?>
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
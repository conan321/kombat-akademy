<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Short Circuit', '1,1', 'High, Mid', 'A high into mid attack that is used at close-range to punish unsafe moves.'),
			array('Cyber Beatdown', 'B+1,2', 'Throw', 'A command grab that is used for mix-ups at close-range.'),
			array('Blast Overhead', 'B+2', 'Overhead', 'A slow 28 frame overhead attack that launches for a combo.'),
			array('Sliding Detonation', 'B+2,4', 'Overhead, Low', 'An overhead into low attack that can be used for mix-ups at close-range. It’s unsafe at -12 on block.'),
			array('Quick Buzz', 'F+2', 'Mid, Mid, Mid', 'A multi-hitting mid attack that is safe on block and can be hit-confirmed into a combo.'),
			array('Metal Mid Heel', 'B+3,3', 'Mid, High', 'A 12 frame mid attack that is safe on block and can be hit-confirmed into a combo.')
		),
		array(
			array('Capture Foam', 'BF1', 'High', 'A high projectile that stuns the opponent allowing for a combo. When enhanced, it becomes a mid projectile that destroys the opponent\'s projectiles.'),
			array('Close/Mid/Far Bomb', 'DF2', 'Mid', 'A bomb that detonates after a duration and launches for a combo. Hold <span class="inputs">4</span> during start-up to throw a Dud. When enhanced, it moves toward the foe and deploys a drone.'),
			array('Bomb Mistwalk', 'DB3', 'Mid', 'A teleport that positions Cyrax behind the opponent while leaving a bomb behind. Hold <span class="inputs">4</span> during start-up to leave behind a Dud. When enhanced, Cyrax retreats instead of teleporting.'),
			array('Mistwalk', 'DF3', '', 'A teleport that positions Cyrax behind the opponent. When enhanced, Cyrax advances instead of teleporting.'),
			array('Sawtooth Kick', 'DB4', 'Mid', 'A mid attack that is mainly used as a combo ender.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=cyrax')) ?>
</section>
<section id="combos" class="in-progress">
	<h1>COMBOS</h1>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=cyrax')) ?>
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
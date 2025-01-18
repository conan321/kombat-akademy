<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Ambitious Strikes', '1,2', 'High, Overhead, Mid', 'A high into overhead attack that is mainly used at close-range and to punish unsafe moves.'),
			array('Karrion Kuts', 'F+1,4,4', 'Mid, Mid, Mid, Low', 'A multi-hitting mid attack ending in a low that is safe on block and is mostly used at close-range.'),
			array('Bloody Fusion', 'F+2,4,2', 'High, Low, Mid', 'An advancing high, low, mid attack that is +2 on block and is useful for applying pressure from mid-distance.'),
			array('Cartheel', 'F+4', 'Overhead, Overhead', 'A safe overhead attack that is mostly used for mix-ups at close-range.')
		),
		array(
			array('Straight Sai', 'BF1', 'High', 'A high projectile. When enhanced, it destroys the opponent\'s projectiles. It\'s usually used for zoning from mid-distance.'),
			array('Teleport Down', 'DB2', 'Mid', 'A downwards teleport. When enhanced, it grants armor.'),
			array('Teleport Up', 'DF2', 'High', 'An upwards teleport. When enhanced, it launches for a combo.'),
			array('Low Sai', 'BF3', 'Low', 'A low projectile that is usually used for zoning from mid-distance.'),
			array('Roll', 'BD4', 'Mid', 'A fast, advancing mid attack that travels across the screen and launches for a combo. When enhanced, it becomes unbreakable. It can be used to punish unsafe moves from a distance or thrown out occasionally as a surprise attack.'),
			array('(Air) Ball', 'DB4', 'Mid', 'An aerial attack that launches for a combo. When enhanced, it tracks the opponent and is cancelable into other (Air) Special Moves. It can be delayed by holding <span class="inputs">4</span> or cancelled by inputting <span class="inputs">DD</span>.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=mileena')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>There are a couple of ways to start a combo with Mileena. <b>Roll</b> (<span class="inputs">BD4</span>) is a quick advancing attack that is good for meterless combos. It can be used after attacks such as <span class="inputs">1,2</span> or thrown out to catch the opponent off-guard.</p>

	<?php include_file('combo.php', array('1,2 BD4 U+F+2,2 DB4 FF F+4', 'MEDIUM', '320.09', 'Sideswitch')) ?>

	<p>For higher damaging combos, <b>Enhanced Teleport Up</b> (<span class="inputs">DF2+EX</span>) can be done as a combo starter. By using <b>Roll</b> in the middle of the combo, it'll launch the opponent once more and allow for a combo extension.</p>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=Q8Kth28lmek')) ?>

	<?php include_file('combo.php', array('1,2 DF2+EX 1,2,2 FF 2,1 BD4 U+F+2,2 DB4 FF F+4', 'MEDIUM', '412.10', null, 1)) ?>

	<h2>Corner</h2>

	<p>In the corner, combos can be ended with a jump attack <span class="inputs">U+F+1,2,2</span> followed by <b>(Air) Teleport Down</b> (<span class="inputs">DB2</span>) for additional damage.

	<?php include_file('combo.php', array('1,2 BD4 U+F+2,2 DB4 U+F+1,2,2 DB2', 'MEDIUM', '343.24')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=mileena')) ?>
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
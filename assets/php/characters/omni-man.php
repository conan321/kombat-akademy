<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Konquerer Killer', '1,2', 'High, Mid', 'A high into mid attack that is +3 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Beast Breaker', 'B+1,1', 'Mid, High', 'A mid into high attack that launches for a combo.'),
			array('Around The World', 'F+2', 'Overhead', 'An overhead attack that has slow start-up but travels quickly across the screen. It can be thrown out occasionally to catch opponents off-guard for blocking low.'),
			array('Earthquake Stomp', 'F+3', 'Low, Mid', 'A low attack that is mostly used at close-range and can lead into a combo.'),
			array('Uh-Oh', 'F+4,1', 'Mid, Mid', 'An advancing mid attack that can be safely hit confirmed into a combo.')
		),
		array(
			array('Mega Clap', 'BF1', 'Mid', 'A mid attack. When enhanced, it destroys the opponent\'s projectiles. It can be used to attack from mid-distance.'),
			array('Giblet Maker', 'BF2', 'Mid', 'A mid attack. When enhanced, it grants armor.'),
			array('Viltrumite Stance', 'DB3', '', 'A stance that dodges projectile attacks and can lead into multiple attacks. When enhanced, it also dodges high and mid attacks. It can be cancelled by inputting <span class="inputs">D+EX</span> or it can be used to teleport towards the enemy by inputting <span class="inputs">F+EX</span>.'),
			array('Invincible Rush', 'BF4', 'Mid', 'An advancing mid attack that travels across the screen. It\'s mostly used as a combo extender.'),
			array('(Air) Fly Toward/Away', 'F+SS / B+SS', 'High', 'An aerial move that propels Omni-Man forward or backward. It costs 1 bar of Super Meter for each consecutive use.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=omni-man')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=XLfgwYqXeQc', 'right', true)) ?>

	<p>Omni-Man's combos are done by going into his <b>Viltrumite Stance</b> (<span class="inputs">DB3</span>) and grabbing the opponent with <b>Thragged Through Mud</b> (<span class="inputs">1</span>). This is usually followed up with a jump attack <span class="inputs">U+F+2,1,2</span> into <b>(Air) Fly Toward</b> (<span class="inputs">F+SS</span>), and ended with <span class="inputs">1,2,1+3</span>.</p>

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('1,2 DB3 1 U+F+2,1,2 F+SS 1,2,1+3', 'MEDIUM', '319.87')) ?>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=nxgPidDQAGw', 'right', true)) ?>

	<p>Higher damaging combos can be achieved by using Omni-Man's <b>Invincible Rush</b> (<span class="inputs">BF4</span>), which will bounce the opponent upwards for a follow-up attack. This can be rather difficult to time as the opponent must be hit as they're falling and right before they touch the ground.</p>

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('1,2 DB3 1 U+F+1 3 BF4 B+4', 'HARD', '344.80', null, 'Jump punch must hit late.', null, 'Sideswitch')) ?>

	<h2>Corner</h2>

	<p>Omni-Man's corner combos are very much the same as his midscreen combos. The only limitation is that <b>Invincible Rush</b> cannot be used in the corner for higher damage output since the opponent will be too close for the move to bounce the opponent up.</p>

	<?php include_file('combo.php', array('1,2 DB3 1 U+F+2,1,2 F+SS 1,2,1+3', 'MEDIUM', '319.87')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=omni-man')) ?>
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
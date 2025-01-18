<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Body Blows', '2,1', 'High, Mid', 'A high into mid attack that is +3 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Downward Slice', 'F+2', 'Overhead', 'An overhead attack that can lead into a combo when cancelled into Special Moves. It can be thrown out occasionally to catch opponents off-guard for blocking low.'),
			array('Double Down', '3', 'High, Overhead', 'A high into overhead attack that is 0 on block. It can be thrown out occasionally to catch opponents off-guard for blocking low.'),
			array('Focused Footsies', 'B+3,3', 'Mid, Low', 'A mid into low attack that is safe on block and is used for mix-ups.'),
			array('Monastery Mixup', 'B+3,4', 'Mid, Overhead', 'A mid into overhead attack that is safe on block and is used for mix-ups.')
		),
		array(
			array('Buzzsaw', 'BF1', 'High', 'A high projectile that is used in zoning to keep opponents away. It grants advantage if blocked from a distance.'),
			array('Hat Toss', 'DB1', 'Mid', 'A mid projectile that is used in zoning to keep opponents away. It can be directed Up or Down.'),
			array('Shaolin Shimmy', 'BF2', 'Mid', 'A mid attack. When enhanced, it grants armor, is safe on block, and the first hit becomes unbreakable in a combo.'),
			array('Kung-Kussion', 'DB2', 'Mid', 'A mid attack. When enhanced, the victim slowly collapses on hit allowing for a combo. It can be used as a combo ender to switch positions with the opponent or to extend combos.'),
			array('Shoalin Spin', 'DU3', 'Mid', 'A mid attack. It can be extended by holding <span class="inputs">3</span>. When enhanced, it grants armor and can be moved forward or backward.'),
			array('Soaring Monk', 'DB4', 'High', 'A high attack. When enhanced, it launches for a combo and is cancelable into jump attacks. It\'s primarily used as a combo starter.'),
			array('(Air) Dive Kick', 'DB4', 'Mid', 'An aerial attack. While it\'s unsafe at -26 on block, it can be difficult to punish from a distance or on whiff due to its quick recovery. It can be useful for approaching opponents from the air.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=kung-lao')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Kung Lao can launch opponents with <b>Enhanced Soaring Monk</b> (<span class="inputs">DB4+EX</span>). When enhanced, this move can be canceled into a jump attack for a combo. Kung Lao can keep opponents juggled with his <span class="inputs">B+2,4</span>. Combos are typically ended with <b>Shaolin Shimmy</b> (<span class="inputs">BF2</span>).</p>

	<?php include_file('combo.php', array('2,1,2 DB4+EX 2 FF B+2,4 FF 1,2,1 BF2', 'MEDIUM', '387.24', null, null, 1)) ?>

	<p>Combos can also be ended with <b>Kung-Kussion</b> (<span class="inputs">DB2</span>). This move will reverse positions with the opponent while only sacrificing a small amount of damage.</p>

	<?php include_file('combo.php', array('2,1,2 DB4+EX 2 FF B+2,4 FF 1,2,1 DB2', 'MEDIUM', '384.80', 'Sideswitch', null, 1)) ?>

	<h2>Corner</h2>

	<p>Corner combos are similar to midscreen combos. In the corner, dashing forward isn't necessary, which makes combos easier to execute. Additionally, an extra hit can be added in corner combos, resulting in higher damage.</p>

	<?php include_file('combo.php', array('2,1,2 DB4+EX 2 4 B+2,4 1,2,1 BF2', 'MEDIUM', '424.10', null, null, 1)) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=kung-lao')) ?>
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
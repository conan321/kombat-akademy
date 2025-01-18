<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Shadow Upper', '1', 'High', 'A 9 frame high attack that is +4 on block.'),
			array('Darkness Fall', '1,2,3', 'High, Mid, Overhead', 'A 23 frame overhead attack that is +1 on block. During Embrace Khaos, it can be used for mix-ups.'),
			array('Saibot Blast', 'F+1,2,1', 'Mid, Mid, Mid', 'An advancing mid attack that can be safely hit-confirmed into a combo.'),
			array('Night Rain', '2,1,2', 'High, Mid, Low', 'A 7 frame high attack that is mainly used at close-range to punish unsafe moves.'),
			array('Gravedigger', 'B+3,3', 'Low, Mid', 'A 12 frame low into mid attack that can be safely hit-confirmed into a combo.'),
			array('Guillotine', 'F+3,3', 'Overhead', 'A 20 frame overhead attack that can be used to catch opponents off-guard for blocking low.'),
			array('Black Mace', '4,4', 'High, Overhead', 'A high into overhead attack that is safe on block. During Embrace Khaos, it can be used for mix-ups.')
		),
		array(
			array('Ghost Ball', 'DF1', 'High', 'A high projectile. Upon contact with the opponent (Hit or Block), it enables Exorcism. When enhanced, Shadow Klone holds Ghost Ball for a duration before firing.'),
			array('Exorcism', 'DF1', 'Mid', 'A mid attack that is unavoidable. Requires Ghostball contact (Hit or Block). On hit, it launches for a combo. After Ghostball makes contact, it can be enhanced with <span class="inputs">BDF1+EX</span> at the cost of 2 bars of Super Meter.'),
			array('Embrace Khaos', 'FDB1', '', 'Enables Netherrealm Summons, and Shadow Klone Special Moves warp victims toward Noob Saibot. Available once per match. After expiration, Shadow Klone becomes unavailable for the rest of the round. When enhanced, it is cancelable into Special Moves.'),
			array('Netherrealm Summons', 'BF2', 'Low', 'Requires Embrace Khaos. A low projectile that warps victims toward Noob Saibot. When enhanced, Shadow Klone holds the portal before firing.'),
			array('Netherrealm Portal', 'DB2', 'Low', 'A low attack that is fired upwards into the air before falling. It can be directed Close, Mid, or Far. On hit, it warps victims towards Noob Saibot.'),
			array('Shadow Tackle', 'BF3', 'Mid', 'Requires Shadow Klone. A mid attack that charges towards the opponent.'),
			array('Shadow Slicer', 'DB3', 'High', 'Requires Shadow Klone. A high attack that is mostly used in the corner.'),
			array('Shadow Slide', 'BF4', 'Low', 'Requires Shadow Klone. A low attack that travels across the screen.'),
			array('Shadow Sweep', 'DB4', 'Low', 'Requires Shadow Klone. An 18 frame low attack with great range. When enhanced, it grants armor.'),
			array('(Air) Shadow Kick', 'BF4', 'High', 'Requires Shadow Klone. An aerial attack that travels directly across the screen. When enhanced, it destroys the opponent\'s projectiles.'),
			array('(Air) Shadow Dive', 'DB4', 'Overhead', 'Requires Shadow Klone. An aerial attack that is fired downwards. When enhanced, it stuns the opponent for a combo.'),
			array('(Air) Shadow Plunge', 'DD4', 'Mid', 'Requires Shadow Klone. An aerial attack that is fired directly downwards. When enhanced, it causes victims to slowly collapse on Hit.'),
			array('Tele-Slam', 'DU', 'High', 'A high teleport attack. When enhanced, it launches for a combo. It can also be used in air.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=noob-saibot')) ?>
</section>
<section id="combos" class="in-progress">
	<h1>COMBOS</h1>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=noob-saibot')) ?>
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
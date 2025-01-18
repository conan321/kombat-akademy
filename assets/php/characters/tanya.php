<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Active Threat', '1,2', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Devoted Follower', 'F+2,1,1,2', 'Mid, Mid, Mid, Mid, Overhead', 'An advancing mid attack ending in an overhead that has good range and can be hit confirmed into a combo.'),
			array('Boomerpain', 'B+2', 'High', 'A high attack that can be thrown out from a distance to hit opponents out of the air.'),
			array('Branching Out', '3', 'High', 'A high attack with incredible range. It\'s mostly used to attack opponents from afar.'),
			array('Whirlwinder', 'B+3,4,4', 'Low, Low, Low, Low', 'A multi-hitting low attack that goes underneath high attacks.')
		),
		array(
			array('Heavenly Hand', 'DF1', 'High', 'A high projectile that is used in zoning to keep opponents away. When enhanced, it becomes a mid projectile that destroys the opponent\'s projectiles.'),
			array('(Air) Heavenly Hand', 'DF1', 'Mid', 'An aerial mid projectile that is fired downwards. When enhanced, it destroys the opponent\'s projectiles and the opponent slowly collapses on hit allowing for a combo.'),
			array('Seeking Guidance', 'DF3', '', 'Grants Charges of Guidance (Max 2). It can be delayed by holding <span class="inputs">3</span>. While at 2 Charges, Tanya\'s dashes go farther when cancelled into attacks.'),
			array('Umgadi Dodge', 'DF3', '', 'Requires 2 Charges of Guidance. Teleports Tanya diagonally upwards. When enhanced, it becomes a high attack that can be cancelled into aerial attacks for a combo. Enhanced Umgadi Dodge requires 2 Charges of Guidance.'),
			array('Divine Protection', 'DB3', '', 'Parries high and mid attacks. If holding <span class="inputs">3+B</span>, it grants armor. When enhanced, it also parries projectiles, and if holding <span class="inputs">3+B</span> it grants invulnerability. It grants 1 Charge of Guidance upon a successful parry.'),
			array('Drill Kick', 'BF4', 'Mid', 'An advancing mid attack that travels across the screen and switches positions with the opponent. When enhanced, it launches for a combo.'),
			array('Spinning Splits Kick', 'DB4', 'Mid', 'A multi-hitting mid attack that travels across the screen. When enhanced, it grants armor.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=tanya')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Tanya's combos are done by using attacks such as <span class="inputs">F+2,1,1</span> and hit-confirming into <b>Enhanced Drill Kick</b> (<span class="inputs">BF4+EX</span>), which will launch the opponent up for a combo. This is followed by a quick forward dash into <span class="inputs">F+4</span>. Combos can be ended with <span class="inputs">2,1+3</span> into <b>Spinning Splits Kick</b> (<span class="inputs">DB4</span>).</p>

	<?php include_file('combo.php', array('F+2,1,1 BF4+EX FF F+4 FF 2,1+3 DB4', 'MEDIUM', '312.40', null, null, 1)) ?>

	<p>Ending combos with <b>Drill Kick</b> (<span class="inputs">BF4</span>) instead has the benefit of dealing slightly more damage, granting higher hit advantage, and switching positions with the opponent if needed.</p>

	<?php include_file('combo.php', array('F+2,1,1 BF4+EX FF F+4 FF 2,1+3 BF4', 'MEDIUM', '314.37', null, null, 1, 'Sideswitch')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=tanya')) ?>
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
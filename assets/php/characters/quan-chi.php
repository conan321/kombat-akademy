<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Dangerous Ally', '1,2', 'High, Mid', 'A high into mid attack that is -2 on block.'),
			array('Skewer Strike', '1,3', 'High, Overhead', 'A high into overhead attack that launches for a combo and is mainly used at close-range to punish unsafe moves.'),
			array('Nether Eruption', 'B+2', 'Overhead', 'A slow overhead attack that is unsafe at -12 on block. It can be charged by holding <span class="inputs">2</span>. When fully charged, it becomes +8 on block.'),
			array('Is That A Tongue?', '3', 'High', 'A high attack that is mostly used in to extend combos.'),
			array('Koccyx Krusher', 'B+3,4,2', 'Low, Mid, Mid', 'A low into mid attack that launches for a combo.'),
			array('Kunning Kick', '4', 'High', 'A high attack that appears behind the enemy. It\'s primarily used to attack from long distances.'),
			array('Best Foot Backward', 'D+F+4', 'Mid', 'A mid attack that appears behind the enemy. It\'s mostly used to attack from long distances.')
		),
		array(
			array('Head Rush', 'BF1', 'High', 'A high projectile that is used in zoning to keep opponents away. When enhanced, it becomes a large mid projectile that destroys the opponent\'s projectiles. When Quan Chi is near Zone of Power, extra projectiles are spawned, and when enhanced, the opponent is teleported above Quan Chi.'),
			array('(Air) Head Rush', 'BF1', 'Mid', 'A mid projectile that is fired downwards from the air. When enhanced, it becomes a large mid projectile. When Quan Chi is near Zone of Power, it homes in on the foe, and when enhanced, the opponent is teleported above Quan Chi.'),
			array('Psycho Skull', 'DB1', 'Overhead', 'An overhead projectile that appears from above. It can be directed Close, Mid, Far, or Very Far. When enhanced, it homes in on the foe. When enhanced, it homes in on the foe and launches for a combo.'),
			array('Psycho Skull Volley', 'DB1', 'Mid', 'Requires nearby Zone of Power. An attack that fires 3 mid projectiles diagonally from above. When enhanced, it fires 2 mid projectiles diagonally from above and an overhead projectile that homes in on foe.'),
			array('Field of Bones', 'BDF2', 'Mid', 'A mid attack that restricts the victim\'s movement for a duration. It can be directed Close, Mid, Far, or Very Far. When enhanced, the duration is increased to 150 frames.'),
			array('Zone Of Power', 'DB3', '', 'Creates a portal that stays on the screen for a duration. When Quan Chi is near Zone of Power, extra effects granted to Head Rush, (Air) Head Rush, and Psycho Skull.'),
			array('Zone of Fear', 'DB3+EX', '', 'Creates a portal that stays on the screen for a duration. Zone of Fear repels opponents.'),
			array('Zone Of Waste', 'DF3', '', 'Creates a portal that stays on the screen for a duration. When the opponent is near Zone of Waste, it drains opponent\'s Super Meter. If enough Super Meter is drained, Quan Chi gains armor for a brief duration.'),
			array('Falling Death', 'BF4', 'Overhead', 'An overhead teleport. When enhanced, it grants armor.'),
			array('From The Fog', 'DB4', 'Low', 'A low attack that launches the opponent for a combo. It costs 2 bars of Super Meter.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=quan-chi')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Quan Chi has a few ways to begin his combos. <span class="inputs">1,3</span> can be done at close-range and will launch the opponent. Quan Chi's <span class="inputs">3</span> can be used within combos, which can be immediately followed with a jump attack <span class="inputs">U+F+2</span> or <span class="inputs">U+F+2,1</span>. Combos can either be ended with <span class="inputs">F+4,4</span> to send the opponent away, or <span class="inputs">F+4</span> into <b>From The Fog</b> (<span class="inputs">DB4</span>) to keep the opponent close.</p>

	<?php include_file('combo.php', array('1,3 3 U+F+2 3 U+F+2,1 F+4,4', 'MEDIUM', '276.50')) ?>

	<p>Quan Chi's <span class="inputs">B+3,4,2</span> will also launch opponents up for a combo. This is a great advancing low starter that can be done from mid to close-range. However, <span class="inputs">3</span> cannot be used as the opponent will be too far to follow up with a jump attack.</p>

	<?php include_file('combo.php', array('B+3,4,2 1,3 4 DB4', 'MEDIUM', '289.05')) ?>

	<p>Higher damaging combos are possible by using <b>Enhanced From The Fog</b> (<span class="inputs">DB4+EX</span>), which will relaunch the opponent and allow Quan Chi to continue the combo.</p>

	<?php include_file('combo.php', array('B+3,4,2 1,3 4 DB4+EX 3 U+F+1,2 BF4', 'MEDIUM', '369.99', null, null, 2)) ?>

	<div class="note"><b>Enhanced From The Fog</b> is very resource-heavy as it costs 2 bars of Super Meter, so most times it may not be worth using unless the combo will win the round.</div>

	<h2>Corner</h2>

	<p>Corner combos are quite similar to midscreen combos. The main difference is that a jump attack <span class="inputs">U+F+3</span> can be used instead for higher damage. When doing so, the jump attack must hit late as the opponent is falling and just before they touch the ground.</p>

	<?php include_file('combo.php', array('1,3 3 U+F+3 3 U+F+2,1 F+4,4', 'MEDIUM', '276.50')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=quan-chi')) ?>
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
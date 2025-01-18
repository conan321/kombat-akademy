<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Warrior\'s Stance', '1,2', 'High, Mid', 'A high into mid attack that is +1 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Lightning Strikes', 'B+2', 'Overhead', 'An overhead attack that is mostly used at close-range for mix-ups.'),
			array('No Apprentice', 'F+2,2,4', 'Mid, High, Low', 'An advancing mid attack that can be hit confirmed into a combo.'),
			array('Double Strike', 'F+3,4', 'High, Overhead, Overhead', 'A high into overhead attack that launches for a combo.'),
			array('The Basics', 'F+4,3', 'Low, Low', 'A low attack that can be hit confirmed into a combo.')
		),
		array(
			array('Electric Orb', 'DF1', 'High', 'A high projectile. It can be extended by holding <span class="inputs">1</span>, firing additional projectiles. It\'s mostly used in zoning to keep opponents away.'),
			array('Razzle Dazzle', 'DB2', 'Mid', 'A mid attack. When enhanced, it deals additional damage and switches positions with the opponent.'),
			array('Shocker', 'DF2', 'High', 'A high attack. It can be extended by holding <span class="inputs">2</span>. When enhanced, it launches for a combo. It\'s mostly used to extend combos or as a combo ender.'),
			array('Electric Fly', 'BF3', 'Mid', 'A mid attack that travels across the screen. When enhanced, it grants armor and becomes unbreakable. It\'s a great move to use while airborne to fly away from the opponent or escape the corner.'),
			array('Electromagnetic Storm', 'DB3', 'Mid', 'A multi-hitting mid attack. When enhanced, it becomes a multi-hitting low attack pushes the opponent away. It deals very good block damage and builds a decent amount of Super Meter, but is unsafe on block.'),
			array('Lightning Port', 'DU', '', 'A quick teleport. When enhanced, it costs 2 bars of Super Meter, becomes a low attack, and can combo into aerial attacks.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=raiden')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Raiden's combos begin by using attacks such as <span class="inputs">F+4,3</span> and hit-confirming into <b>Enhanced Shocker</b> (<span class="inputs">DF2+EX</span>). Combos are usually ended with <span class="inputs">F+2,2</span> into <b>Shocker</b> (<span class="inputs">DF2</span>).</p>

	<?php include_file('combo.php', array('F+4,3 DF2+EX F+3,4 F+2,2 DF2', 'MEDIUM', '327.32')) ?>

	<p>Combos can alternatively be ended with <b>Electric Fly</b> (<span class="inputs">BF3</span>), which will send the opponent closer to the corner. However, this will sacrifice a bit of combo damage.</p>

	<?php include_file('combo.php', array('F+4,3 DF2+EX F+3,4 BF3', 'MEDIUM', '294.28')) ?>

	<p>If using <b>Enhanced Electromagnetic Storm</b> (<span class="inputs">DB3+EX</span>), it must hit 3 or less times in order to start a combo. The more hits that land, the greater the combo damage will be. By inputting <span class="inputs">3</span> during the move, it will launch the opponent for a combo.</p>

	<?php include_file('combo.php', array('DB3+EX 3 F+3,4 F+2,2 DF2', 'MEDIUM', '252.39', null, 'Electromagnetic Storm must hit 3 or less times.', 1)) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=raiden')) ?>
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
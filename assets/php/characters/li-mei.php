<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Forces Of Light', '1,2', 'High, Mid', 'A high into mid attack that is +2 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Against The Rope', '2,1,4', 'High, Mid, Mid', 'A high into mid attack that is +6 on block and is used at close-range for pressure.'),
			array('Double Palm', 'B+2', 'Mid', 'An advancing mid attack that is -3 on block and is mostly used to attack from mid-distance.'),
			array('Nova Blast', 'B+2,1', 'Mid, Mid', 'An advancing mid attack that is safe on block.'),
			array('Rising Sun', 'B+2,4', 'Mid, High', 'An advancing mid into high attack that is safe on block and launches for a combo.'),
			array('High Heel', 'B+3', 'Mid', 'An advancing mid attack that is +3 on block and is useful for applying pressure from mid-range.'),
			array('No Holds Barred', 'B+3,4', 'Mid, Low', 'A mid into low attack that is +7 on block.'),
			array('Lion\'s Pounce', 'F+3', 'Overhead', 'A slow overhead attack that is safe on block and is able to go over certain moves. It can be cancelled by holding <span class="inputs">3</span>.'),
			array('Pankration Champion', '4,3,1,2', 'High, Mid, Mid, Mid', 'A high into mid attack that is safe on block and can be hit confirmed into a combo.'),
			array('Calculated', '4,3,4', 'High, Mid, High', 'A high, mid, high attack that is +3 on block and can be useful at close-range for pressure.'),
			array('Kick Precision', 'F+4,3', 'Low, Mid', 'A low into mid attack that launches for a combo. While unsafe at -20 on block, it can be used occasionally for mix-ups at close-range.'),
			array('Lion Tail', 'F+4,4', 'Low, Overhead', 'A low into overhead attack that is safe at -6 on block and is useful for mix-ups at close-range.')
		),
		array(
			array('Nova Blast', 'BF1', 'High', 'A high projectile. When enhanced, it launches for a combo. It\'s primarily used for zoning and as a combo starter.'),
			array('Sky Lantern', 'DB2', 'Unblockable', 'A projectile that floats in the air and slowly travels across the screen. It is ignited upon contact with the opponent or by certain moves. It\'s primarily used to prevent opponents from freely moving about and to combo from other attacks.'),
			array('Shi Zi Lion', 'DB3', 'Mid', 'A mid attack. When enhanced, it becomes a fast 7 frame attack that is able to punish many moves and is unbreakable.'),
			array('Chain Reaction', 'BF4', 'Mid', 'An advancing mid attack. When enhanced, it grants armor and becomes unbreakable.'),
			array('(Air) Flipping Heel Kick', 'DB4', 'Overhead', 'An aerial overhead attack that is mainly used for mix-ups at close-range and as a combo ender.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=li-mei')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Li Mei's combos begin by using her <b>Enhanced Nova Blast</b> (<span class="inputs">BF1+EX</span>), a high projectile attack that launches opponents into the air. This is followed by a jump attack attack (<span class="inputs">U+F+1,3,4</span>) and ended with <b>(Air) Flipping Heel Kick</b> (<span class="inputs">DB4</span>).</p>

	<?php include_file('combo.php', array('1,2,4 BF1+EX U+F+1,3,4 DB4', 'MEDIUM', '348.08', null, null, 1)) ?>

	<p>Li Mei becomes more threatening while her <b>Sky Lantern</b> (<span class="inputs">DB2</span>) is on the screen. If a Sky Lantern is floating above the opponent, attacks such as <span class="inputs">1,2,4</span> and <span class="inputs">B+3,4</span> can launch the opponent into it, causing the Sky Lantern to detonate for a combo.</p>

	<?php include_file('combo.php', array('DB2 1,2,4 U+F+1,3,4 DB4', 'MEDIUM', '348.08', null, 'Sky Lantern must be behind opponent.')) ?>

	<h2>Corner</h2>

	<p>In the corner, Li Mei's combos are nearly identical to her midscreen combos. Rather than jumping forward after launching the opponent, a backwards jump must be done in order to continue the combo.</p>

	<?php include_file('combo.php', array('1,2,4 BF1+EX U+B+1,3,4 DB4', 'MEDIUM', '348.08', null, null, 1)) ?>

	<div class="note">Li Mei normally doesn't deal much damage on her own, but when paired with certain Kameos, her combo potential drastically increases. See the <a href="#kameos">Kameos</a> section for more information.</div>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=li-mei')) ?>
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
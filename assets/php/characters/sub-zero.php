<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Lin Kuei Storm', '1,2', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Frozen Over', 'F+1,2', 'Mid, Mid', 'A mid attack that can be hit confirmed into a combo.'),
			array('Spinal Tap', 'B+2', 'Overhead', 'An overhead attack that launches for a combo. While unsafe at -23 on block, it can be thrown out occasionally to catch opponents off-guard for blocking low.'),
			array('Permafrost', 'B+3,4', 'Low, Low', 'A low attack.')
		),
		array(
			array('Ice Ball', 'DF1', 'High', 'A slow high projectile that freezes the opponent allowing for a combo. When enhanced, it destroys the opponent\'s projectiles. It\'s useful for trading with enemy projectiles.'),
			array('Ice Klone', 'DB1', 'Mid', 'A clone made of ice that appears in Sub-Zero\'s place, lasting for a short duration. It negates enemy projectiles and freezes the opponent upon contact allowing for a combo. When enhanced, the Ice Klone lasts for a longer duration. Ice Klone can also be slightly enhanced by tapping <span class="inputs">EX</span>, or enhanced twice, creating 3 Ice Klones. It\'s mainly used to stop opponent approaches and to trap opponents in the corner.'),
			array('Ice Klone Charge', 'BF2', 'Mid', 'A mid projectile that travels across the screen. When enhanced, it destroys the opponent\'s projectiles. It\'s mostly used in zoning to keep opponents away.'),
			array('Ice Slide', 'BF3', 'Low', 'A quick advancing low attack. When enhanced, it switches positions with the opponent, grants armor and becomes unbreakable. It can be used to punish unsafe moves from a distance or thrown out occasionally as a surprise attack.'),
			array('(Air) Diving Glacier', 'DB4', 'Mid', 'An aerial attack that stuns the opponent allowing for a combo. While unsafe at -16 on block, it can be more difficult to punish when blocked low to the ground. When enhanced, it launches for a combo.'),
			array('Deadly Vapors', 'DF4', 'Mid', 'A mid attack that appears beneath the opponent, slowing down their movements. When enhanced and the opponent is hit prior, it freezes the opponent allowing for a combo.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=sub-zero')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Sub-Zero's combos start by freezing the opponent with <b>Enhanced Deadly Vapors</b> (<span class="inputs">DF4+EX</span>) and launching with <span class="inputs">B+2</span>. Combos can be ended with <span class="inputs">1,2</span> into <b>Ice Slide</b> (<span class="inputs">BF3</span>).</p>

	<?php include_file('combo.php', array('F+1,2 DF4+EX B+2 B+2 U+F+2,1 1,2 BF3', 'MEDIUM', '325.48', null, null, 1)) ?>

	<p>Using <b>Ice Klone</b> (<span class="inputs">DB1</span>) as the opponent falls will extend the combo for additional damage. However, these combos can be a bit more difficult to execute.</p>

	<?php include_file('combo.php', array('F+1,2 DF4+EX B+2 B+2 U+F+2,1 DB1 U+F+2 4 BF3', 'HARD', '339.74', null, '2nd jump punch must hit late.', 1)) ?>

	<h2>Corner</h2>

	<p>In the corner, Super Meter isn't required in order to start a combo. If the opponent is hit with attacks such as <span class="inputs">1,2</span> or <span class="inputs">F+1,2</span>, using <b>Ice Klone</b> afterwards will freeze the opponent.</p>

	<?php include_file('combo.php', array('F+1,2 DB1 U+F+2 B+2 B+2 U+F+2,1 1,2 BF3', 'MEDIUM', '331.94', null, '2nd Spinal Tap must be delayed.')) ?>

	<div class="note">When using <span class="inputs">B+2</span> in the corner, the 2nd use of it must be slightly delayed. Otherwise, the opponent will be too high for the move to connect.</div>

	<p>Higher damage can be achieved by spending Super Meter on attacks such as <b>Enhanced Deadly Vapors</b> (<span class="inputs">DF4+EX</span>) and <b>(Air) Enhanced Diving Glacier</b> (<span class="inputs">DB4+EX</span>), however the damage increase is very minimal and is often not worth it unless the combo will win the round.</p>

	<?php include_file('combo.php', array('F+1,2 DF4+EX B+2 B+2 B+2 4 DB1 U+F+3 4 BF3', 'HARD', '353.38', null, '2nd Spinal Tap must be delayed. Jump kick must hit late.', 1)) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=sub-zero')) ?>
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
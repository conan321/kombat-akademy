<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Clock Cleaner', '1,2', 'High, Mid', 'A high into mid attack that is +3 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Head On Approach', '2,2,1+3', 'High, Mid, Throw', 'A high into mid attack ending with a command grab. If it connects, it can be cancelled into Enhanced Special Moves, Beautiful Bird Bullet, Kameo Attacks, and Fatal Blow. It\'s primarily used at close-range for mix-ups.'),
			array('Kommited Kick', '2,2,4', 'High, Mid, Mid', 'A high into mid attack.'),
			array('Krotch Obliterator', 'B+2,4', 'Mid, Mid', 'A mid attack that can be hit confirmed into a combo.'),
			array('Coming Through!', 'F+4,1', 'Mid, Mid', 'An advancing mid attack that can be hit confirmed into a combo.')
		),
		array(
			array('Silent And Deadly', 'DB1', 'Unblockable', 'An anti-aerial attack that can be thrown out to preemptively counter jump attacks. It can also be used to extend combos.'),
			array('Force Multiplier', 'BF1', 'High', 'A high projectile that is mostly used in zoning to keep opponents away. When enhanced, 2 additional projectiles are fired.'),
			array('Activate Human Torpedo!', 'BF2', 'Mid', 'A fast 12 frame advancing mid attack. When enhanced, it grants armor. It can be used to punish unsafe moves from a distance or thrown out occasionally as a surprise attack.'),
			array('Activate Anti-Gravity', 'DB2', 'Overhead', 'An overhead attack where Peacemaker flies into the air before landing on top of the enemy. It can also be directed In Front or Behind. It can be cancelled by holding <span class="inputs">U</span> to land without attacking the opponent. When enhanced, Peacemaker flies away from the opponent.'),
			array('Activate Force Field', 'FDB3', '', 'Activates a force field that deflects projectiles for a duration. When enhanced, it briefly reflects projectiles and repels foes, then deflects projectiles for a duration.'),
			array('Activate Sonic Boom', 'BF3', 'Mid', 'A mid attack. When enhanced, it launches for a combo. It\'s mostly used as a combo starter or to extend combos.'),
			array('Ground-Air Offensive', 'DF4', 'Low', 'A low attack that travels quickly across the screen and launches for a combo. It can be thrown out occasionally as a surprise attack.'),
			array('Beautiful Bird Bullet', 'DB4', 'Mid', 'A mid attack that travels quickly across the screen. It\'s very useful for creating distance from the opponent. It also grants greater block advantage the farther away it\'s blocked.'),
			array('The Ultimately Ally', 'D+SS', '', 'Summons Eagly to attack opposing Kameos.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=peacemaker')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Peacemaker's <b>Activate Sonic Boom</b> (<span class="inputs">BF3</span>) launches for a combo and is usually done after hit-confirming attacks such as <span class="inputs">1,2</span> and <span class="inputs">2,2</span>. This is typically followed with a forward dash into <span class="inputs">F+4,1,2</span>, and ended with <b>Activate Human Torpedo!</b> (<span class="inputs">BF2</span>).</p>

	<?php include_file('combo.php', array('1,2 BF3 FF F+4,1,2 BF2', 'MEDIUM', '259.81')) ?>

	<p>Combo damage can be increased by using <b>Enhanced Activate Sonic Boom</b> (<span class="inputs">BF3+EX</span>) instead. By enhancing this move, it'll launch the opponent even higher, allowing for a jump attack <span class="inputs">U+F+2,1,2</span>.

	<?php include_file('combo.php', array('1,2 BF3+EX U+F+2,1,2 2,2 BF3 BF2', 'MEDIUM', '308.54', null, null, 1)) ?>

	<h2>Corner</h2>

	<p>In the corner, combos are started with <b>Beautiful Bird Bullet</b> (<span class="inputs">DB4</span>). Peacemaker's <b>Silent And Deadly</b> (<span class="inputs">DB1</span>) can be used repeatedly in the corner to keep opponents juggled. It's usually best to end corner combos with <b>Activate Sonic Boom</b> (<span class="inputs">BF3</span>) as it'll grant enough advantage for Peacemaker to continue his offense.</p>

	<?php include_file('combo.php', array('1,2 DB4 FF 2 DB1 2,2 DB1 2,2 BF3 4 BF3', 'MEDIUM', '348.99')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=peacemaker')) ?>
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
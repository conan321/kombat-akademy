<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Whiplash', '1,2', 'High, High', 'A high attack that is mainly used at close-range to punish unsafe moves.'),
			array('Inner Pain', '2,1', 'High, Mid', 'A high into mid attack that has decent range.'),
			array('Swiping Kunai', 'B+2', 'High', 'A high attack that can be used to anti-air opponents.'),
			array('Raising Hell', 'F+3,2', 'Mid, High', 'A mid into high attack that launches for a combo. It\'s unsafe if the opponent ducks the last hit.'),
			array('Fire Pillar Thrust', 'F+3,4', 'Mid, Mid', 'A mid attack that is safe on block.'),
			array('Sweeping Scorpion Tail', 'B+3', 'Low, Low', 'A low attack that has incredible range and is mostly used to attack from a distance.')
		),
		array(
			array('Spear', 'BF1', 'High', 'A high projectile that quickly travels across the screen, dragging opponents in for a combo. It\'s mostly used as a combo starter and to stop approaches from afar.'),
			array('Blazing Charge', 'BF2', 'Mid', 'An advancing mid attack. When enhanced, it grants armor.'),
			array('(Air) Kyo Snag', 'BF2', 'Unblockable', 'An aerial attack. It can be directed Close by inputting <span class="inputs">DB2</span> instead. When enhanced, it becomes cancellable on hit into other aerial attacks. It\'s mostly used as a combo ender or to extend combos.'),
			array('Twisted Kyo', 'DB2', 'Mid', 'A multi-hitting mid attack. When enhanced, it deals increased damage. It deals decent block damage and builds a good amount of Super Meter, but is unsafe on block.'),
			array('Flame-Port', 'DB3', 'High', 'A high teleport that attacks from behind. When enhanced, Scorpion teleports without attacking. If done airborne and enhanced, it becomes cancellable into other aerial attacks.'),
			array('Devouring Flame', 'BF4', 'Low', 'A low attack that appears beneath the opponent. When enhanced, it becomes an unblockable attack that deals damage over time. It can be useful to attack from fullscreen or to deal increased damage at the end of combos if enhanced.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=scorpion')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>One of Scorpion's main combo starters is his <b>Spear</b> (<span class="inputs">BF1</span>). This move drags the opponent towards Scorpion, leaving them in a stunned state. This is usually followed up with <span class="inputs">F+3,2</span> which will launch the opponent up for a combo. Repeated use of <span class="inputs">F+3,2</span> will keep the opponent juggled within combos. <b>Spear</b> can be used once again to end the combo, leaving the opponent at Scorpion's feet.</p>

	<?php include_file('combo.php', array('2,1 BF1 F+3,2 F F+3,2 F F+3,2 4 BF1', 'MEDIUM', '319.11')) ?>

	<p><span class="inputs">F+3,2</span> can also be used as a combo starter. If <b>Spear</b> connects with the opponent during the combo, it'll keep them standing and allow for a follow-up attack. After restanding the opponent, using <span class="inputs">3,3</span> into <b>Devouring Flame</b> (<span class="inputs">BF4</span>) will deal good damage while granting +13 hit advantage.</p>

	<?php include_file('combo.php', array('F+3,2 F F+3,2 F F+3,2 4 BF1 3,3 BF4', 'MEDIUM', '348.07', 'Restand')) ?>

	<p>For higher damage, combos can be extended with a jump attack <span class="inputs">U+F+1,2</span> into <b>(Air Close) Enhanced Kyo Sang</b> (<span class="inputs">DB2+EX</span>). This can be followed with a jump attack <span class="inputs">1,1,1</span> just before landing and extended with <b>Spear</b>. However, these combos are a bit more difficult to execute.</p>

	<?php include_file('combo.php', array('F+3,2 F F+3,2 U+F+1,2 DB2+EX 1,1,1 BF1 F+3,2 1 BF2', 'HARD', '407.92', null, null, 1)) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=scorpion')) ?>
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
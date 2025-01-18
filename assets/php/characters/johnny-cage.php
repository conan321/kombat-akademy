<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Rough House', '1,1', 'High, Mid', 'A high into mid attack that is +1 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Breaking Backhand', 'F+1', 'High', 'An advancing high attack that is +3 on block and is used at close-range for pressure.'),
			array('Footless', 'B+3', 'Mid', 'A fast mid attack that launches for a combo. It can be thrown out at times to stop approaches.'),
			array('Elbow Before Me', 'F+3,2', 'Mid, Mid', 'A fast, forward-advancing 9 frame mid attack. It\'s one of Johnny Cage\'s strongest moves due to its speed, safety, and ability to hit confirm into a combo.')
		),
		array(
			array('Ball Buster', 'BD1', 'Mid', 'A mid attack that is primarily used as a combo ender.'),
			array('Show Off', 'DB1', '', 'A parry that counters high, mid, and overhead attacks, excluding jump attacks.'),
			array('Rising Star', 'DB3', 'Mid', 'A mid attack. When enhanced, it launches for a combo.'),
			array('Shadow Kick', 'BF4', 'High', 'A quick, advancing high attack that is usually done as a combo ender, but can also be thrown out occasionally as a surprise attack. When enhanced, it grants armor.'),
			array('Hype', 'FDB4', '', 'Builds Johnny Cage\'s Hype Meter.'),
			array('Wowing Out', 'FDB4', '', 'Requires full Hype Meter. It temporarily allows Johnny Cage to cancel Special Moves into other Special Moves, Kameo Summons, or Fatal Blow up to 2 times in a row. Special Moves are always enhanced during Wowing Out.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=johnny-cage')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Johnny Cage has several ways to initiate a combo. The most notable combo starter is <b>Enhanced Rising Star</b> (<span class="inputs">DB3+EX</span>). After launching with this move, it can be canceled into a jump attack. If the jump attack hits late, it'll allow for a second jump attack. By ending combos with <b>Ball Buster</b> (<span class="inputs">BD1</span>), it'll grant enough hit advantage for Johnny Cage to apply pressure on knockdown.</p>

	<?php include_file('combo.php', array('F+3,2 DB3+EX 2 U+F+2 2,1,2 FF F+3 BD1', 'MEDIUM', '362.58', null, '1st jump punch must hit late.', 1)) ?>

	<p>Combos can also be ended with <b>Shadow Kick</b> (<span class="inputs">BF4</span>), which is not only easier to connect than <b>Ball Buster</b>, but deals slightly higher damage as well. The tradeoff is that <b>Shadow Kick</b> sends the opponent away, preventing Johnny Cage from guaranteeing a follow-up attack.</p>

	<h2>Corner</h2>

	<p>In the corner, Johnny Cage's jump attack <span class="inputs">U+F+2,4,4</span> can be used within combos. This can then be ended with <span class="inputs">2,1,4</span> into <b>Shadow Kick</b>.</p>

	<?php include_file('combo.php', array('F+3,2 DB3+EX 2 U+F+2,4,4 2,1,4 BF4', 'MEDIUM', '364.58', null, '1st jump punch must hit late.', 1)) ?>

	<div class="note">Although ending corner combos with <b>Ball Buster</b> isn't necessary to keep the opponent close, it remains a viable option due to its high hit advantage.</div>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=johnny-cage')) ?>
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
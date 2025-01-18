<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Cleric Of Chaos', '1,1', 'High, Mid', 'A high into mid attack that is +3 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('Neck Snapper', '1,1,2', 'High, Mid, Overhead', 'A high, mid, overhead attack that is +3 on block and is used at close-range for pressure.'),
			array('Disrupting Order', 'F+1,2,2', 'High, Mid, Overhead', 'A high, mid, overhead attack that is +3 on block and is used at close-range for pressure.'),
			array('Decaying Guard', '2,1', 'High, Mid', 'A high into mid attack that is +6 on block and is used at close-range for pressure.'),
			array('Skab Stab', 'B+2,2,1+3', 'Mid, Mid, Throw', 'An advancing mid attack ending in a command grab that is useful for mix-ups.'),
			array('Destroying Balance', 'B+2,2,4', 'Mid, Mid, Low', 'An advancing mid attack ending in a low.'),
			array('No Order', 'F+4,3', 'Low, Low', 'A low attack that is safe on block.')
		),
		array(
			array('Neoplasm', 'BF1', 'High', 'A high projectile that slowly circles around Havik before flying towards the opponent. If the opponent is already hit beforehand, it launches for a combo. When enhanced, it will fly behind the opponent and hit as a mid.'),
			array('Helping Hand', 'DB1', 'Mid', 'A slow, armored mid attack that is safe on block and launches for a combo unless Havik is hit. When enhanced, it grants 3 hits of armor instead of 1.'),
			array('Blood Bath', 'BF2', 'High', 'An advancing high attack that when used will roll underneath high attacks and projectiles. When enhanced, it costs 2 bars of Super Meter and becomes unbreakable.'),
			array('Corpse Taunt', 'BF2', 'Unblockable', 'An unblockable attack that can only be done after the opponent is hit with Enhanced Blood Bath. Once used, the victim slowly collapses on hit allowing for a combo.'),
			array('Seeking Neoplasm', 'BF3', 'Mid', 'A mid projectile that travels quickly across the screen. It can be very difficult to avoid as it covers a large portion of the screen. When enhanced, an additional projectile is fired towards the opponent.'),
			array('Twisted Torso', 'DB4', 'High, High, High, High', 'A multi-hitting high attack that is primarily used as a combo ender.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=havik')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Havik's combos are very straightforward and are typically initiated by hit-confirming attacks into <b>Neoplasm</b> (<span class="inputs">BF1</span>). Neoplasm normally knocks the opponent down on hit, but if it follows a previous hit, it'll launch for a combo. This is usually followed up with <span class="inputs">B+2,2</span> and ended with <b>(Close) Blood Bath</b> (<span class="inputs">BF2, Hold B</span>).</p>

	<?php include_file('combo.php', array('B+2,2 BF1 FF B+2,2 BF2 Hold B', 'MEDIUM', '273.23')) ?>

	<p>For a slight damage increase, combos can instead be ended with <b>Twisted Torso</b> (<span class="inputs">DB4</span>). The downside is that this move leaves the opponent too far to effectively continue attacking. Alternatively, Havik's <span class="inputs">B+2,2,1+3</span> can be done at the end of a combo. This will not only deal increased damage, but will also reverse positions with the opponent.</p>

	<?php include_file('combo.php', array('B+2,2 BF1 FF B+2,2,1+3', 'MEDIUM', '283.61', null, null, null, 'Sideswitch')) ?>

	<h2>Corner</h2>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=c6bLHkd40eM', 'right', true)) ?>

	<p>In the corner, <b>Neoplasm</b> can be done multiple times to keep the opponent juggled. Unlike midscreen combos, both the normal and close versions of <b>Blood Bath</b> (<span class="inputs">BF2</span>) can be used at the end of corner combos.</p>

	<p>Since the opponent is cornered, combos can also be ended with <b>Twisted Torso</b> without giving up hit advantage. Although it deals greater damage, it can be slightly more difficult to connect due to the move's slower start-up.</p>

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('B+2,2 BF1 3 BF1 2,2 BF2', 'MEDIUM', '345.68')) ?>

	<?php include_file('combo.php', array('B+2,2 BF1 FF F+4 BF1 2,2 DB4', 'MEDIUM', '357.59')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=havik')) ?>
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
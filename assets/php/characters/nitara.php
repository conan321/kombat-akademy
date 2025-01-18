<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Never Die', '1,2,1,2', 'High, Mid, Mid, Mid', 'A high into mid attack that launches for a combo and is mainly used at close-range to punish unsafe moves.'),
			array('Must Feed', '1,2,4', 'High, Mid, Mid', 'A high into mid attack that is -3 on block and is mostly used at close-range.'),
			array('Easy Prey', 'F+1,2', 'Mid, Overhead', 'A fast 11 frame mid into overhead attack.'),
			array('Lunging Leech', 'B+2', 'Overhead', 'An advancing aerial overhead attack that goes over certain moves and is cancelable into (Air) Special Moves.')
		),
		array(
			array('Bad Blood', 'BF1', 'High', 'A high attack. It deals damage over time when Blood Sacrifice is active. When enhanced, it grants armor and becomes unbreakable.'),
			array('Quick Taste', 'BF2', 'High', 'An advancing high attack. When enhanced, it launches for a combo. It heals Nitara when Blood Sacrifice is active. It can be used to punish unsafe moves from a distance or thrown out occasionally as a surprise attack.'),
			array('Leap Of Faith', 'DB2', 'Unblockable', 'A fast anti-aerial attack that propels Nitara into the air.'),
			array('Bloody Bolt', 'BF3', 'Mid', 'A mid projectile that is only performable when Blood Sacrifice is active. It can be directed Close, Mid, or Far.'),
			array('(Air) Dark Plunge', 'DB4', 'Mid', 'An aerial attack that launches for a combo. While it\'s unsafe on block, it can be difficult to punish on whiff due to its quick recovery. It can be useful for approaching opponents from the air.'),
			array('Blood Sacrifice', 'DF4', '', 'Changes the properties of certain Special Moves. When enhanced, it heals Nitara when near the opponent.'),
			array('(Air) Dash', '', '', 'An aerial attack that propels Nitara in any direction. It costs 1 bar of Super Meter for consecutive Air Dashes. It\'s the most important move in Nitara\'s moveset as it gives her extremely powerful mobility.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=nitara')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=qt9-TLEb9W0', 'right', true)) ?>

	<p>Nitara's combos can be rather difficult to execute as some involve the use of her <b>(Air) Dash</b> (<span class="inputs">SS</span>). Aerial attacks such as <span class="inputs">U+F+1,2,4</span> can be immediately followed with an <b>(Air) Dash</b> into any direction, allowing Nitara to combo into a secondary attack. In general, combos end with <b>Quick Taste</b> (<span class="inputs">BF2</span>).</p>

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('1,2,1,2 U+F+1,2,4 D+F+SS 2,4,2 BF2', 'MEDIUM', '345.49')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=nitara')) ?>
</section>
<section id="strategy">
	<h1>STRATEGY</h1>

	<h2>(Air) Dash Frame Data</h2>
	<p>The following lists the block advantage for Nitara's <b>(Air) Dash Downward</b> (<span class="inputs">D+SS</span>) when done after certain Basic Attacks.</p>

	<?php
	$air_dash_frame_data = array(
		'matrix-table tbody-th-align-right td-align-center',
		'50%',
		null,
		array(
			array(''),
			array('(Air) Dash Downward')
		),
		array(
			'<span class="inputs">2,2,1</span>',
			'<span class="inputs">B+2</span>',
			'<span class="inputs">3</span>',
			'<span class="inputs">F+4</span>'
		),
		array(
			array('-10'),
			array('+8'),
			array('+5'),
			array('+8 | +11')
		),
		true
	);
	?>

	<?php include_file('table.php', $air_dash_frame_data) ?>

	<div class="note">The block advantage after <span class="inputs">F+4</span> into (Air) Dash Downward is greater the farther away it is blocked.</div>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
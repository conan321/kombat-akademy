<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Beach Slap', '1,1,', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Attitude Adjustment', '1,1,2', 'High, Mid, High', 'A high into mid attack that is 0 on block and pushes the opponent back.'),
			array('Kraken Killer', 'F+1,2', 'Mid, Mid', 'A 12 frame advancing mid attack that is safe on block.'),
			array('It Pours', '2,1,1,2', 'High, High, Mid, Overhead, Mid', 'A multi-hitting attack that has decent range, deals good block damage and pushes the opponent back.'),
			array('Tide', 'B+2', 'Low', 'A low attack that can lead into a combo.'),
			array('Undertow', 'F+2,1', 'Mid, Low', 'A mid into low attack that can be hit confirmed into a combo.'),
			array('Trench Foot', '3', 'High', 'A high attack that is +4 on block and useful at close-range for pressure.'),
			array('Centrifugal Force', 'F+3,2', 'Overhead, Overhead', 'A slow overhead attack that is safe on block and launches for a combo.'),
			array('Surface Breacher', 'B+3,4', 'Low, High', 'An advancing low into high attack that has good range and launches for a combo.'),
			array('Hydropho-Kick', '4', 'High', 'A high attack that kicks the opponent offscreen before landing behind Rain. It can be charged by holding <span class="inputs">4</span> and cancelled by inputting <span class="inputs">F</span> or <span class="inputs">B</span>. When fully charged, it allows for a combo on hit.'),
			array('Beneath The Waves', 'B+4', 'Low', 'A low attack with good range.'),
			array('Drizzle', 'U+F+2', 'Mid', 'An aerial attack that can be difficult to anti-air.')
		),
		array(
			array('Water Beam', 'BF1', 'High', 'A high projectile that is mostly used in zoning to keep opponents away. It can be charged by holding <span class="inputs">1</span> and cancelled by inputting <span class="inputs">FF</span>, <span class="inputs">BB</span>, or other Special Moves. When fully charged, the victim slowly collapses on hit allowing for a combo.'),
			array('Upflow', 'DB1', 'High', 'A high attack. When enhanced, it launches for a combo. It\'s mostly used as a combo starter.'),
			array('Water Gate', 'DB2', '', 'Creates a portal of water on the screen. Up to 2 Water Gates can be placed on the screen at a time.'),
			array('Water Gate Teleport', 'DF2', '', 'Teleports Rain between Water Gates. When enhanced, Rain creates a beam of water in between Water Gates instead of teleporting.'),
			array('Geyser', 'DB3', 'Mid', 'A mid attack that can be directed Mid or Far. When enhanced, it grants armor.'),
			array('Water Shield', 'FDB4', '', 'Creates a protective layer of water surrounding Rain, hiding attacks from within while destroying opposing projectiles. When enhanced, it follows Rain\'s movements and lasts slightly longer.'),
			array('Ancient Trap', 'BF4', 'Low', 'A low attack that stays on the screen for a duration. It\'s +2 on block and can be directed Close, Mid, or Far. Upon contact, the opponent falls through and is launched for a combo. It\'s primarily used for setups.'),
			array('Rain God', 'DDU', 'Mid', 'A mid attack that attacks opponents from the sky and can be directed Close, Mid, or Far. It can be delayed by holding <span class="inputs">U</span> or <span class="inputs">EX</span> and cancelled by inputting <span class="inputs">SS</span>. It\'s mostly used in zoning to keep opponents away.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=rain')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Rain's combos start by hit-confirming attacks into <b>Enhanced Upflow</b> (<span class="inputs">DB1+EX</span>), which can be followed up with a jump attack <span class="inputs">U+F+2,4,3</span>. Combos are typically ended with <b>(Far) Geyser</b> (<span class="inputs">DB3,F</span>).</p>

	<?php include_file('combo.php', array('F+2,1 DB1+EX U+F+2,4,3 2 DB3,F', 'MEDIUM', '351.85')) ?>

	<p>Combos can optionally be ended with <span class="inputs">1,1,2</span>, sending the opponent away. This will however deal slightly less damage than other combo enders.</p>

	<?php include_file('combo.php', array('F+2,1 DB1+EX U+F+2,4,3 FF 1,1,2', 'MEDIUM', '345.02')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=rain')) ?>
</section>
<section id="strategy">
	<h1>STRATEGY</h1>

	<h2>Water Beam Cancel Frame Data</h2>
	<p>The following lists the block advantage for Rain's <b>Water Beam</b> (<span class="inputs">BF1</span>) when cancelling out of it after his Basic Attacks.</p>

	<?php
	$water_beam_frame_data = array(
		'matrix-table tbody-th-align-right td-align-center',
		'50%',
		null,
		array(
			array(''),
			array('Water Beam Cancel')
		),
		array(
			'<span class="inputs">1</span>',
			'<span class="inputs">1,1</span>',
			'<span class="inputs">1,1,4</span>',
			'<span class="inputs">D+1</span>',
			'<span class="inputs">F+1</span>',
			'<span class="inputs">2</span> (1st Hit)',
			'<span class="inputs">2</span> (2nd Hit)',
			'<span class="inputs">2,1,1</span> (3rd Hit)',
			'<span class="inputs">2,1,1</span> (4th Hit)',
			'<span class="inputs">B+2</span>',
			'<span class="inputs">F+2</span>',
			'<span class="inputs">F+2,1</span>',
			'<span class="inputs">3</span>',
			'<span class="inputs">B+3</span>',
			'<span class="inputs">D+3</span>',
			'<span class="inputs">F+3</span>',
			'<span class="inputs">D+4</span>'
		),
		array(
			array('-5'),
			array('0'),
			array('+4'),
			array('-15'),
			array('-7 | -3'),
			array('-9'),
			array('-11'),
			array('0'),
			array('-10'),
			array('-14 | -10'),
			array('-5'),
			array('-3'),
			array('+2'),
			array('-7'),
			array('-14'),
			array('-6'),
			array('-11')
		),
		true
	);
	?>

	<?php include_file('table.php', $water_beam_frame_data) ?>

	<div class="note">The block advantage after <span class="inputs">F+1</span> and <span class="inputs">B+2</span> into Water Beam Cancel is greater the farther away they are blocked.</div>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
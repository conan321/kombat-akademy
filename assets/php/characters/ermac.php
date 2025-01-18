<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Sinking Feeling', '1,2', 'High, Mid', 'A high into mid attack that is 0 on block and is mainly used at close-range to punish unsafe moves.'),
			array('Mass Driver', '2,1', 'High, Mid', 'A high into mid attack that has decent range and can be hit confirmed into a combo.'),
			array('Heavy Wights', 'B+2,4', 'Mid, Overhead', 'A mid into overhead attack that can be hit confirmed into a combo.'),
			array('Ceiling Krawl', 'F+2', 'Overhead', 'A 23 frame overhead attack that can be used to catch opponents off-guard for blocking low.'),
			array('Knee Deep', 'F+4', 'High', 'A fast 11 frame advancing high attack that sends Ermac into the air and can lead into pressure.'),
			array('Wrung Out', 'THROW or 1+3', 'Throw', 'A throw with very good range.')
		),
		array(
			array('Spirit Punch', 'BF1', 'Mid', 'A mid attack. It can be charged by holding <span class="inputs">1</span> and cancelled by inputting <span class="inputs">FF</span> or <span class="inputs">BB</span>. When enhanced, the victim slowly collapses on hit allowing for a combo. It\'s one of Ermac\'s main offensive tools.'),
			array('Witch Slam', 'DB1', 'Mid', 'A mid attack. When enhanced, it launches for a combo. It\'s mostly used as a combo starter and ender.'),
			array('Behind You', 'BF2', 'High', 'A high attack. It\'s mostly used as a combo ender.'),
			array('(Air) Suspended Animation', 'DB2', '', 'A move that allows Ermac to float in the air. It can be cancelled by inputting <span class="inputs">D+EX</span>. When enhanced, it recovers quicker. It\'s one of Ermac\'s main offensive tools.'),
			array('Death\'s Embrace', 'FDB3', '', 'Activates Mana Shield, causing incoming damage to deplete Super Meter before health. It can be deactivated by inputting <span class="inputs">D+SS</span>.'),
			array('(Air) Hungry Hands', 'DB3', 'Low', 'A low attack that travels across the screen. When enhanced, it stuns the opponent allowing for a combo. It can be useful for mix-ups at close-range.'),
			array('Shrieking Souls', 'BF3', 'High', 'A high attack. It can be cancelled by inputting <span class="inputs">FF</span> or <span class="inputs">BB</span>. When enhanced, it pushes the opponent back. It\'s mostly used as a combo starter and to extend combos.'),
			array('Shifting Spirits', 'DB4', 'High', 'A high teleport. When enhanced, it launches for a combo. It\'s mostly used in combos.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=ermac')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Ermac's typical combo sequence involves launching the opponent with <b>Shrieking Souls</b> (<span class="inputs">BF3</span>). After this, it can be canceled with a quick forward dash and lead into a jump attack (<span class="inputs">U+F+1,2,2</span> or <span class="inputs">U+F+1,2,3</span>).</p>

	<?php include_file('combo.php', array('1,2 BF3 FF U+F+1,2,2 2,1,1+3', 'MEDIUM', '328.66')) ?>

	<div class="note">Dash canceling out of Shrieking Souls will not work if a dash cancel has already been done in the combo. For instance, a combo involving Spirit Punch (<span class="inputs">BF1</span>) and canceling out of it will not allow Ermac to cancel out of Shrieking Souls.</div>

	<p>For higher damage, combos can be extended with <b>Enhanced Witch Slam</b> (<span class="inputs">DB1</span>).</p>

	<?php include_file('combo.php', array('1,2 BF3 FF U+F+1,2,2 FF 4 DB1+EX U+F+1,2,3 DB1', 'MEDIUM', '365.44', null, null, 1)) ?>

	<p>By ending combos with <b>Witch Slam</b> (<span class="inputs">DB1</span>), the opponent remains close enough for Ermac to apply pressure on knockdown. Ending combos with <b>Behind You</b> (<span class="inputs">BF2</span>) or <span class="inputs">F+4,3</span> will deal slightly higher damage, but will leave the opponent too far to follow with an attack. To switch positions with the opponent, use <b>(Air) Down Shifting Spirits</b> (<span class="inputs">DB4,D</span>).</p>

	<p>Ermac also has ways to end combos and create highly effective setups. While airborne, using <b>(Air) Suspended Animation</b> (<span class="inputs">DB2</span>) will allow Ermac to levitate above the opponent and attack as they're getting up from the ground. Another ender is <b>(Air) Enhanced Hungry Hands</b> (<span class="inputs">DB3</span>), which keeps the opponent standing and prevents them from using a Getup Attack. However, this setup is quite costly as it requires 2 bars of Super Meter while sacrificing some damage in the process.</p>

	<h2>Corner</h2>

	<p>In the corner, multiple jump attacks can be done without the need to spend Super Meter. After performing the first jump attack, immediately follow up with a second one. As the opponent is cornered, ending combos with <b>Witch Slam</b> isn't necessary to keep them nearby.</p>

	<?php include_file('combo.php', array('1,2 BF3 FF U+F+1,2,2 U+F+1,2,3 4 BF2', 'HARD', '349.24')) ?>

	<div class="note">Corner combos starting with Shrieking Souls can be rather difficult. For more consistency, Ermac's midscreen combos can also be done in the corner without sacrificing much damage.</div>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=ermac')) ?>
</section>
<section id="strategy">
	<h1>STRATEGY</h1>

	<h2>Spirit Punch Cancel Frame Data</h2>
	<p>The following lists the block advantage for Ermac's <b>Spirit Punch</b> (<span class="inputs">BF1</span>) when cancelling out of it after his Basic Attacks.</p>

	<?php
	$spirit_punch_frame_data = array(
		'matrix-table tbody-th-align-right td-align-center',
		'50%',
		null,
		array(
			array(''),
			array('Spirit Punch Cancel', '35%'),
			array('Enhanced Spirit Punch Cancel', '35%')
		),
		array(
			'<span class="inputs">1</span>',
			'<span class="inputs">1,2</span>',
			'<span class="inputs">D+1</span>',
			'<span class="inputs">2</span>',
			'<span class="inputs">2,1</span>',
			'<span class="inputs">B+2</span>',
			'<span class="inputs">B+2,4</span>',
			'<span class="inputs">F+2</span>',
			'<span class="inputs">3</span>',
			'<span class="inputs">D+3</span>',
			'<span class="inputs">4</span>',
			'<span class="inputs">D+4</span>'
		),
		array(
			array('-2', '+3'),
			array('-2', '+3'),
			array('-8', '-3'),
			array('0 | -3', '+5 | +2'),
			array('-1', '+4'),
			array('-3', '+2'),
			array('-2', '+3'),
			array('-2', '+3'),
			array('+2', '+7'),
			array('-11', '-6'),
			array('-2', '+3'),
			array('-9', '-4'),
		),
		true
	);
	?>

	<?php include_file('table.php', $spirit_punch_frame_data) ?>

	<div class="note">The block advantage after <span class="inputs">2</span> into Spirit Punch Cancel is greater at close-range (0) than it is from further away (-3).</div>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
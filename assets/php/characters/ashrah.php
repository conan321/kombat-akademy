<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Final Blessing', '1,2', 'High, Mid', 'A high into mid attack that is 0 on block and mainly used at close-range to punish unsafe moves.'),
			array('Sinner Stab', 'F+2', 'High', 'A high attack with incredible range.'),
			array('Short Stab', 'B+3', 'Low', 'A low attack that is safe on block.'),
			array('Soaring Demon', 'F+3', 'Overhead', 'A slow 23 frame overhead attack that can occasionally be thrown out to catch opponents off-guard for blocking low.'),
			array('Crown Cracker', 'F+4,2', 'Mid, Overhead', 'A mid into overhead attack that is primarily used at close-range and can be hit confirmed into a combo.')
		),
		array(
			array('Invoking The Light / Summoning The Darkness', 'DB1', '', 'Switches between Heaven Mode and Hell Mode.'),
			array('Heaven\'s Beacon / Hell\'s Pillar', 'DF1', 'Mid / Low', 'In Heaven Mode, Ashrah sends out a light slash that grants block advantage. In Hell Mode, Ashrah sends out a dark slash that hits low and is mostly used for zoning.'),
			array('Astral Projection / Astral Manifestation', 'BF2', 'Mid', 'An advancing attack that allows Ashrah to travel towards the opponent. In Heaven Mode, it\'s mostly used as a combo ender and when enhanced, it grants armor. In Hell Mode, it\'s useful for pressure at close-range.'),
			array('God\'s Wrath / Demon\'s Wrath', 'DB2', 'Mid', 'A multi-hitting mid attack that is usually used as a combo ender.'),
			array('Light Ascension / Dark Ascension', 'DF3', 'Mid', 'A mid attack that sends Ashrah into the air. When enhanced, it launches for a combo. It\'s mostly used as a combo starter.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=ashrah')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Ashrah's combos start by launching with <b>Enhanced Light/Dark Ascension</b> (<span class="inputs">DF3+EX</span>) and following up with a jump attack. Combos can be ended with <b>(Air) Astral Projection/Manifestation</b> (<span class="inputs">BF2</span>) into Spirit Slice (<span class="inputs">Hold D</span>). Although this reverses positions with the opponent, it leaves them close enough for Ashrah to continue her offense. In <b>Heaven Mode</b>, combos can be ended without <b>Spirit Slice</b>, yielding slightly higher damage while keeping the opponent at mid-range.</p>

	<?php include_file('combo.php', array('F+4,2 DF3+EX 1,2,2 BF2 Hold D', 'MEDIUM', '296.40', null, null, 1, 'Sideswitch')) ?>

	<p>Use <b>Enhanced Light/Dark Ascension</b> (<span class="inputs">DF3+EX</span>) again to extend combos.</p>

	<?php include_file('combo.php', array('F+4,2 DF3+EX 1 4 DF3+EX 1,2,2 BF2 Hold D', 'MEDIUM', '398.20', null, null, 2, 'Sideswitch')) ?>

	<h2>Corner</h2>

	<p>Ashrah's combos are slightly different in the corner. After launching the opponent, a jump kick is used instead and is followed by <span class="inputs">F+4,2</span>. In <b>Heaven Mode</b>, corner combos end with <b>Astral Projection</b> (<span class="inputs">BF2</span>), whereas in <b>Hell Mode</b>, they end with <b>Demon's Wrath</b> (<span class="inputs">DB2</span>).</p>

	<?php include_file('combo.php', array('F+4,2 DF3+EX 3 F+4,2 BF2', 'MEDIUM', '299.52', null, 'Must be in Heaven Mode', 1)) ?>
	<?php include_file('combo.php', array('F+4,2 DF3+EX 3 F+4,2 DB2', 'MEDIUM', '291.87', null, 'Must be in Hell Mode', 1)) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=ashrah')) ?>
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
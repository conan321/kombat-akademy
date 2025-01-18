<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Kiss The Ring', '1,1', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Shear Genius', 'F+1', 'High, Mid, Mid', 'A multi-hitting high into mid attack that has good range and can be hit confirmed into a combo.'),
			array('Turning Heel', '2,4', 'High, Mid', 'A high into mid attack that is +2 on block and is used at close-range for pressure.'),
			array('Beneath Me', 'B+2', 'Mid', 'A mid attack that sends Sindel upwards. It\'s cancelable into (Air) Special Moves. '),
			array('Divine Decree', 'B+2,3', 'Mid, Overhead', 'A mid into overhead attack that launches for a combo.'),
			array('Brush With Death', 'D+3', 'Low', 'A low attack that has very good range.')
		),
		array(
			array('Low Hairball', 'DB1', 'Low', 'A low projectile that is used in zoning to keep opponents away. When enhanced, it becomes a fast 9 frame mid attack followed by a low projectile.'),
			array('Hairball', 'DF1', 'High', 'A high projectile that is used in zoning to keep opponents away. When enhanced, it destroys the opponent\'s projectiles.'),
			array('Scream', 'BF2', 'Mid', 'A mid attack with very good range. It stuns the opponent briefly allowing for a combo. ?If hitting an airborne opponent, it keeps the opponent standing. It can be thrown out occasionally from mid-range as a surprise attack.'),
			array('(Air) Levitate', 'DB2', '', 'Allows Sindel to float in the air. It can move Sindel backward or forward by inputting <span class="inputs">B</span> or <span class="inputs">F</span>, and cancelled by inputting <span class="inputs">D</span>. Levitate is a core part of Sindel\'s gameplan as it gives her strong mobility and pressure.'),
			array('Inspire', 'DB3', '', 'Increases Kameo Meter regeneration speed. When enhanced, it instead allows Sindel to counter the opponent\'s Kombo Breaker for a duration.'),
			array('Queen\'s Kommand', 'DB4', '', 'Disables the opponent\'s Kameo for a short duration and recovers Kameo Meter on hit. It can only hit the opponent\'s Kameo. When enhanced, Sindel\'s Kameo is replaced with the opponent\'s Kameo for a duration.'),
			array('Kartwheel', 'DF4', 'Overhead', 'An advancing overhead attack. When enhanced, it grants armor and becomes unbreakable.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=sindel')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Sindel's combos require a bit more execution compared to others. Combos usually start by using her <span class="inputs">F+1</span> and hit-confirming into <b>Scream</b> (<span class="inputs">BF2</span>), which will leave the opponent in a stunned state and allow for a follow-up attack. Being able to use Sindel's <b>(Air) Levitate</b> (<span class="inputs">DB2</span>), moving with <span class="inputs">B</span> or <span class="inputs">F</span>, and using a jump attack immediately after is highly important as it's very common in Sindel's combos and will allow her to deal as much damage as possible. Combos are ended with <b>Kartwheel</b> (<span class="inputs">DF4</span>), knocking the opponent down while granting very high hit advantage.</p>

	<?php include_file('combo.php', array('F+1 BF2 FF B+2 DB2 2 F+4,3 U+F+2 DB2 Hold F 2 FF 2,4 DF4', 'MEDIUM', '322.23')) ?>

	<p><span class="inputs">F+4,3</span> will also launch the opponent up for a combo and can be followed up with a jump attack <span class="inputs">U+F+2</span>. If <b>Scream</b> is done while the opponent is airborne, it'll cause a restand and prevent them from using a Getup Attack. If done near the end of a combo, it's usually best to keep the opponent standing and end with <b>Hairball</b> (<span class="inputs">DF1</span>).</p>

	<?php include_file('combo.php', array('F+4,3 U+F+2 2,4 BF2 FF F+4 DF1', 'MEDIUM', '294.32', null, null, null, 'Restand')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=sindel')) ?>
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
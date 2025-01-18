<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Devastating Blow', '1,2', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Body Bag', 'F+1,2', 'Mid, Mid', 'An advancing mid attack that can be hit confirmed into a combo.'),
			array('Deadly Warfare', '2,1', 'High, Mid', 'A high into mid attack that is +2 on block and is used at close-range for pressure.'),
			array('Raid', '2,1,4', 'High, Mid, Low', 'A high, mid, low attack that pushes the opponent back.'),
			array('Brutal Backhand', 'B+2', 'High', 'A high attack that is +8 on block and is mostly used at close-range for pressure.'),
			array('Bloody Pitcher', 'F+2', 'Overhead', 'An overhead attack that is primarily used at close-range for mix-ups.'),
			array('Push Kick', 'B+3', 'Mid', 'A mid attack with very good range.'),
			array('Low Takedown', 'B+4', 'Low', 'A low attack that is +3 on block and is primarily used at close-range for mix-ups.')
		),
		array(
			array('Retaliation', 'DB1', '', 'A parry that counters high, mid, and overhead attacks. When enhanced, it stuns the opponent after a successful parry allowing for a combo.'),
			array('Pale Rider', 'BDF1', 'Throw', 'A command grab that is used at close-range for mix-ups. It can switch positions with the opponent by holding <span class="inputs">B</span>. When enhanced, it costs 2 bars of Super Meter and becomes unbreakable.'),
			array('Assassin Throwing Stars', 'BF2', 'High', 'A series of high projectiles that is used in zoning to keep opponents away. When enhanced, additional projectiles are thrown with all of them hitting as mid attacks.'),
			array('Charging Pain', 'BF3', 'Low', 'An advancing low attack that travels across the screen. It can be delayed by holding <span class="inputs">3</span> and cancelled by inputting <span class="inputs">DD</span>. By holding <span class="inputs">U</span> or <span class="inputs">B</span>, it becomes a mid attack that launches for a combo.'),
			array('Tactical Takedown', 'DB3', 'Mid', 'A mid attack that switches positions with the opponent. When enhanced, it grants armor and becomes unbreakable.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=reiko')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Reiko can launch for a combo with <b>Charging Pain</b> (<span class="inputs">BF3</span>) and immediately following up with <b>Pain Knee</b> (<span class="inputs">Hold U Or B</span>). Combos can either be ended with <b>Pale Rider</b> (<span class="inputs">BDF1</span>) or <b>Tactical Takedown</b> (<span class="inputs">DB3</span>), both of which will switch positions with the opponent. <b>Pale Rider</b> has the option to keep the opponent on the same side by holding <span class="inputs">B</span>.</p>

	<?php include_file('combo.php', array('1,2 BF3 Hold U 3,4 DB3', 'EASY', '250.60', null, null, null, 'Sideswitch')) ?>

	<?php include_file('combo.php', array('1,2 BF3 Hold U FF 1 3 BDF1 Hold B', 'MEDIUM', '239.61')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=reiko')) ?>
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
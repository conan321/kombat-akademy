<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Kold-Blooded Blow', '1,1', 'High, Mid', 'A high into mid attack that is 0 on block and is used at close-range to punish unsafe moves.'),
			array('Killer Kick', '1,1,4', 'High, Mid, Mid', 'A high into mid attack that can be cancelled into (Air) Falling Fangs.'),
			array('Devastating Blow', 'B+2', 'Overhead', 'An overhead attack that is unsafe at -13 on block and is used at close-range for mix-ups. It can be charged by holding <span class="inputs">2</span> and cancelled into Special Moves while charging. It becomes safer the longer it\'s charged.'),
			array('Raking Blow', 'F+2,1', 'Mid, Mid', 'A 12 frame mid attack that is used at close-range and can be hit confirmed into a combo.'),
			array('Bloody Trail', 'B+3,1', 'Low, Mid', 'A low into mid attack that has very good range and can be hit confirmed into a combo.'),
			array('Die-ving For It', 'B+4', 'Low', 'A quick low attack that has very good range.')
		),
		array(
			array('Acid Spit', 'DF1', 'High', 'A high attack with very good range. By holding <span class="inputs">1</span>, it fires a high projectile across the screen. When enhanced, it becomes an unbreakable mid attack. It can be thrown out occasionally from mid-range to stop approaches.'),
			array('Dash Attack', 'BF2', 'Mid', 'A fast advancing mid attack that travels across the screen. When enhanced, it\'s followed up with an overhead attack that is safe on block. It can be difficult to punish on whiff due to its fast recovery. It can also be used to punish unsafe moves from a distance or thrown out occasionally as a surprise attack.'),
			array('Force Ball', 'DF3', 'Mid', 'A slow mid projectile that travels across the screen and launches for a combo. Its speed can be altered by inputting <span class="inputs">B</span> or <span class="inputs">F</span>. When enhanced, it lasts for a longer duration.'),
			array('Death Roll', 'BF4', 'Low', 'An advancing low attack. When enhanced, it grants armor and becomes unbreakable.'),
			array('Invisibility', 'DU4', '', 'Grants invisibility for a duration. When enhanced, Reptile becomes invisible earlier after use. It can be set up during or at the end of combos, strengthening Reptile\'s offense.'),
			array('(Air) Falling Fangs', 'DB4', 'Overhead', 'An aerial overhead attack. When enhanced, it grants armor and becomes unbreakable. It can be cancelled by holding <span class="inputs">D</span>, which grants invisibility at the cost of 1 bar of Super Meter. Enhanced (Air) Falling Fangs is one of Reptile\'s best moves for setting up his offense.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=reptile')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Reptile's combos start by using attacks such as <span class="inputs">B+3,1</span> and hit-confirming into <b>Fast Force Ball</b> (<span class="inputs">DF3,F</span>). The fast version of <b>Force Ball</b> is advised because if hitting the opponent from a distance, the other versions may not reach in time. Both Reptile's <span class="inputs">F+2,3</span> and <b>Force Ball</b> (<span class="inputs">DF3</span>) can be used to keep opponents juggled in combos. In general, combos are ended with <span class="inputs">F+3,2</span> followed by <b>Death Roll</b> (<span class="inputs">BF4</span>).</p>

	<?php include_file('combo.php', array('B+3,1 DF3,F F+2,3 FF F+2 DF3 F+3,2 BF4', 'MEDIUM', '346.69')) ?>

	<div class="note"><b>Force Ball</b> will not launch the opponent if the same version is used twice in a combo. A combination of slow, normal, and far versions must be used in order for the move to relaunch the opponent in a combo.</div>

	<p>By ending with <span class="inputs">F+3,2</span>, it'll also allow Reptile to safely set up his <b>Invisibility</b> (<span class="inputs">DU4</span>). The enhanced version will turn Reptile invisible sooner and increase its duration.</p>

	<?php include_file('combo.php', array('B+3,1 DF3,F F+2,3 FF F+2 DF3 F+3,2 DU4', 'MEDIUM', '316.76', null, null, null, 'Setup')) ?>

	<p>For higher damage, combos can be ended with a jump attack <span class="inputs">U+F+2,3,3</span> into <b>(Air) Falling Fangs</b> (<span class="inputs">DB4</span>). The tradeoff is that it sends the opponent too far for Reptile to attack the opponent on knockdown.</p>

	<?php include_file('combo.php', array('B+3,1 DF3,F F+2,3 FF F+2 DF3 U+F+2,3,3 DB4', 'MEDIUM', '374.03')) ?>

	<h2>Corner</h2>

	<p>In the corner, <b>Fast Force Ball</b> isn't necessary to start the combo. After launching with <b>Force Ball</b> (<span class="inputs">DF3</span>), a backdash must be done in order to keep the opponent cornered. Ending corner combos with <b>(Air) Falling Fangs</b> (<span class="inputs">DB4</span>) is preferred for maximum damage output.</p>

	<?php include_file('combo.php', array('B+3,1 DF3 BB 2,3 4 DF3,F U+2,3,3 DB4', 'MEDIUM', '371.07')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=reptile')) ?>
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
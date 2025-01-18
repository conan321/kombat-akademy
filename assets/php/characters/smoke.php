<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('No Escape', '1,1,1,4', 'High, Mid, Mid, Low', 'A multi-hitting high into mid attack that is mainly used at close-range. Although it\'s -9 on block, it\'s usually safe due to pushback.'),
			array('Perfect Pierce', 'F+1,2', 'High, Mid', 'An advancing high into mid attack that is +2 on block and is primarily used at close-range for pressure.'),
			array('Everywhere', '2,1,2', 'High, Mid, Mid', 'A multi-hitting high into mid attack that is mostly used at close-range to punish unsafe moves.'),
			array('Tricky Karambit', 'F+3,2', 'Low, Overhead', 'A low into overhead attack that is mostly used at close-range for mix-ups.'),
			array('Tele-Stab', 'B+2', 'Overhead', 'An advancing overhead attack that has incredible range and is useful for mix-ups.'),
			array('Face Walk', 'F+4', 'High', 'An advancing high into mid attack that is +8 on block and is useful for applying pressure from mid-distance.')
		),
		array(
			array('Shadow Blade', 'DB1', 'Unblockable', 'An anti-aerial attack that can be thrown out at times to hit opponents out of the air. It can also be used as a combo ender.'),
			array('Smoke Bomb', 'DB2', 'Overhead', 'An overhead teleport. When enhanced, it grants armor and invisibility.'),
			array('Vicious Vapors', 'BF3', 'Mid', 'A mid attack that travels toward the opponent while evading projectiles. It can be cancelled by inputting <span class="inputs">B+EX</span>. When enhanced, it has quicker recovery and grants higher advantage. It\'s mainly used for pressure and hit confirming attacks.'),
			array('Smoke-Port', 'DB4', 'Low', 'A low teleport. It can be cancelled by inputting <span class="inputs">F</span>. When enhanced, it can combo into aerial attacks. Cancelling out of Enhanced Smoke-Port grants invisibility.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=smoke')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>All of Smoke's combos are usually done by hit-confirming attacks into <b>Vicious Vapors</b> (<span class="inputs">BF3</span>), cancelling out of it by inputting <span class="inputs">B+EX</span>, then launching the opponent with <span class="inputs">3,2</span>. There are a variety of ways to end Smoke's combos, but in general, combos are ended with a jump attack (<span class="inputs">U+F+1,1,2</span>).</p>

	<?php include_file('combo.php', array('F+3,2 BF3,B+EX 3,2 FF 3,2 U+F+1,1,2', 'MEDIUM', '347.10')) ?>

	<div class="note">If the opponent is too low to the ground to use a jump attack, an easy way to end combos is to enter <span class="inputs">F+1,2,1+3</span> followed by <b>Shadow Blade</b> (<span class="inputs">DB1</span>).</div>

	<p><b>Enhanced Smoke-Port</b> (<span class="inputs">DB4+EX</span>) can be used to increase combo damage and switch positions with the opponent.</p>

	<?php include_file('combo.php', array('F+3,2 BF3,B+EX 3,2 FF 3,2 F+1,2,1+3 DB4+EX 1,1,2', 'MEDIUM', '400.20', null, null, 1, 'Sideswitch')) ?>

	<h2>Corner</h2>

	<p>In the corner, Smoke's combos are usually ended with either <span class="inputs">F+1,2,1+3</span> into <b>Shadow Blade</b> (<span class="inputs">DB1</span>) or <span class="inputs">1,1,1,4</span>. Although corner combos can be ended with a jump attack, it'll result in Smoke being placed in the corner instead so it's ill-advised.</p>

	<?php include_file('combo.php', array('F+3,2 BF3,B+EX 3,2 4 F+1,2,1+3 DB1', 'MEDIUM', '322.93')) ?>

	<div class="note">If the opponent is too low to the ground, it can be risky to end corner combos with <span class="inputs">F+1,2,1+3</span> since the last hit will miss. Using Smoke's <span class="inputs">4</span> after <span class="inputs">3,2</span> will keep the opponent high enough to safely finish the combo.</div>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=smoke')) ?>
</section>
<section id="strategy">
	<h1>STRATEGY</h1>

	<p>
	Smoke is a versatile character best played at mid-to-close range. His toolkit is built around maintaining pressure and using his unique ability to turn himself invisible in order to enforce mix-ups while keeping opponents guessing on what his next attack will be.
	</p>

	<h2>Pressure</h2>

	<p>
	<b><span class="inputs">F+1,2</span></b> - This is a high into mid attack and is a strong pressure tool at close-range. It's +2 on block, meaning if the opponent blocks it, Smoke still maintains slight advantage. Use this to keep up pressure and set up for additional moves or mix-ups. It can also be hit-confirmed into a combo.
	</p>

	<p>
	<b><span class="inputs">F+4</span></b> - This move is great for starting pressure as it's an advancing high attack. If blocked, it leaves Smoke at +8, allowing for follow-up attacks such as <span class="inputs">THROW</span>, <span class="inputs">1,1</span> and <span class="inputs">B+3</span>. Additionally, because it consists of multiple attacks, it will break armor. This can be very strong while the opponent's knocked down as it'll break their armor when using a Getup Attack.
	</p>

	<h2>Other Attacks</h2>

	<p>
	<b><span class="inputs">B+2</span></b> - Use this overhead attack when you anticipate an opponent blocking low. It's also effective for countering low pokes as Smoke will go directly over the opponent's poke and punish them if done at the right moment. Due to its range, it's also a great move to throw out from a distance. Usually it's best to use <b>Vicious Vapors</b> (<span class="inputs">BF3</span>) after it, then cancelling out of it for a combo.
	</p>

	<p>
	<b><span class="inputs">F+3</span></b> - Utilize this low attack to catch opponents off-guard while blocking high. It's one of Smoke's main tools to use for countering pokes. From <span class="inputs">F+3</span>, Smoke can either complete the string by using <span class="inputs">F+3,2</span>, or cancel it into <b>Vicious Vapors</b>, both of which can lead into a combo. Smoke's <span class="inputs">F+3,2</span> can be tricky to block since it is a low into overhead attack, so opponents must quickly switch their block type upon seeing the move.
	</p>

	<div class="note">Despite <span class="inputs">F+3,2</span> being hard to block, it must be used with caution as the overhead can be Up Blocked and punished if the opponent reacts quick enough. To counter this, use <span class="inputs">F+3</span> followed by a secondary <span class="inputs">F+3</span>.</div>

	<h2>Invisibility</h2>

	<p>
	Smoke's ability to turn himself invisible adds an extra layer of unpredictability to his offense. This is done by using <b>Enhanced Smoke-Port</b> (<span class="inputs">DB4+EX</span>) and canceling out of it with <span class="inputs">F</span> or using <b>Enhanced Smoke Bomb</b> (<span class="inputs">DB2+EX</span>). Activate Smoke's invisibility to conceal your attacks while making it more difficult for opponents to anticipate your next move. The best ways to set up invisibility is to use it at the end of a combo or after specific Kameo moves. <b>Enhanced Smoke Bomb</b> can also be done after any attack on block and can be hard to counter if the opponent isn't prepared.
	</p>

	<h2>Mix-Ups</h2>

	<p>
	Invisibility opens up opportunities for various mix-ups. While invisible, opponents will have a difficult time blocking Smoke's overhead and low attacks. For instance, Smoke's <span class="inputs">B+2</span> can normally be blocked on reaction due to its somewhat slow start-up, but it becomes nearly impossible to react to while Smoke is invisible. Use a mixture of <span class="inputs">B+2</span> and <span class="inputs">F+3</span> to keep opponents guessing. Other moves such as <span class="inputs">F+3,2</span> and <span class="inputs">THROW</span> can also be used while invisible.
	</p>

	<h2>Anti-Airs</h2>

	<p>
	In order to stop aerial attacks, use attacks such as <span class="inputs">1</span> and <span class="inputs">D+2</span>. At farther ranges, throwing out <b>Shadow Blade</b> (<span class="inputs">DB1</span>) can be useful for hitting airborne opponents. This move is especially strong against opponents who tend to jump back and use aerial projectiles.
	</p>

	<h2>Closing Distance</h2>

	<p>Use <b>Vicious Vapors</b> and <b>(Air) Smoke-Port Cancel</b> (<span class="inputs">DB4,F</span>) to close the distance quickly while avoiding projectiles. <b>Vicious Vapors</b> will go directly through projectiles and can be canceled with <span class="inputs">B</span> while remaining relatively safe. On the other hand, <b>(Air) Smoke-Port Cancel</b> must be used in the air and will immediately teleport Smoke behind the opponent, but will leave Smoke more susceptible to punishes.
	</p>

	<h2>Vicious Vapors Cancel</h2>

	<p>
	Using <b>Vicious Vapors</b> and canceling out of it with <span class="inputs">B+EX</span> is essential to Smoke's offensive. By successfully canceling out of <b>Vicious Vapors</b>, Smoke will be able to safely hit-confirm attacks such as <span class="inputs">B+2</span> and <span class="inputs">F+3</span> while also maintaining a slight bit of offense. Most cancels leave Smoke at a disadvantage, however some opponents may hesitate to attack out of fear of being hit by the <b>Vicious Vapors</b>. If opponents tend to block after the cancels, you'll be free to continue Smoke's offensive. Conversely, if opponents attack after Smoke's cancels, it's best to block or try to interrupt their attack. You can also simply not cancel the <b>Vicious Vapors</b> to counter opponents trying to interrupt a cancel, but it'll be highly punishable if blocked.
	</p>

	<p>
	<b>Enhanced Vicious Vapors Cancel</b> is much more effective as the cancels are advantageous on block and can lead to additional combo routes. It can be useful to mix in enhanced cancels with normal cancels as the animation can make it hard to distinguish between the two moves and it'll stop opponents trying to interrupt a normal cancel.
	</p>

	<div class="tip"><b>Vicious Vapors Cancels</b> can be difficult to perform. To practice execution, in Practice Mode, set the AI's Block Type to Random Block. Then, use attacks into <b>Vicious Vapors</b> and cancel out of it.</div>

	<h2>Vicious Vapors Cancel Frame Data</h2>
	<p>The following lists the block advantage for Smoke's <b>Vicious Vapors</b> (<span class="inputs">BF3</span>) when canceling out of it after his Basic Attacks.</p>

	<?php
	$vicious_vapors_frame_data = array(
		'matrix-table tbody-th-align-right td-align-center',
		'50%',
		null,
		array(
			array(''),
			array('Vicious Vapors Cancel', '35%'),
			array('Enhanced Vicious Vapors Cancel', '35%')
		),
		array(
			'<span class="inputs">1</span>',
			'<span class="inputs">1,1</span>',
			'<span class="inputs">1,1,1,4</span> (3rd Hit)',
			'<span class="inputs">D+1</span>',
			'<span class="inputs">F+1</span>',
			'<span class="inputs">F+1,2</span>',
			'<span class="inputs">F+1,2,2,4</span> (3rd Hit)',
			'<span class="inputs">F+1,2,2,4</span> (4th Hit)',
			'<span class="inputs">2</span>',
			'<span class="inputs">2,1</span>',
			'<span class="inputs">2,1,2</span>',
			'<span class="inputs">B+2</span>',
			'<span class="inputs">3</span> (1st Hit)',
			'<span class="inputs">3</span> (2nd Hit)',
			'<span class="inputs">D+3</span>',
			'<span class="inputs">D+3,4</span>',
			'<span class="inputs">F+3</span>',
			'<span class="inputs">F+3,2</span>',
			'<span class="inputs">4</span>',
			'<span class="inputs">D+4</span>'
		),
		array(
			array('-7', '-2'),
			array('-5', '0'),
			array('-7', '-2'),
			array('-12', '-7'),
			array('-5', '0'),
			array('-6', '-1'),
			array('-2', '+3'),
			array('-6', '-1'),
			array('-3', '+2'),
			array('-10', '-5'),
			array('0', '+5'),
			array('-3', '+2'),
			array('-5', '0'),
			array('-5', '0'),
			array('-10', '-5'),
			array('-7', '-2'),
			array('-4', '+1'),
			array('-5', '0'),
			array('-5', '0'),
			array('-6', '-1')
		),
		true
	);
	?>

	<?php include_file('table.php', $vicious_vapors_frame_data) ?>

	<div class="in-progress">
	<?php include_file('more-btn.php', array('FULL STRATEGY', '')) ?>
	</div>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
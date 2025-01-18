<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Clogged Up', '1,2', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Speed Up', 'B+1,2', 'Mid, Mid', 'An advancing mid attack that is safe on block and launches for a combo.'),
			array('Slab Returnal', 'F+1,2,1+3', 'Mid, Mid, Mid', 'A fast 11 frame mid attack that is mostly used at close-range.'),
			array('Factual Force', 'F+3', 'Overhead', 'An overhead attack with very good range. Although it\'s -25 on block, it can be difficult to punish from a distance.'),
			array('Timefall', 'B+4', 'Low', 'A low attack with very good range. Although it\'s -11 on block, it can be difficult to punish from a distance.'),
			array('For The Fire God', 'F+4,4', 'Low, Low', 'A low attack that launches for a combo. It\'s unsafe at -16 on block, but can be used sparingly for mix-ups.')
		),
		array(
			array('Time Stop', 'BF1', 'Mid', 'A mid attack. When enhanced, it momentarily stops time for the victim. It\'s primarily used in combos.'),
			array('History Lesson', 'DF2', 'Throw', 'A command grab that is mostly used at close-range for mix-ups. It can also be done as a combo ender. It deals increased damage when throwing the opponent out of the corner.'),
			array('Follow-Up Exam', 'DB2', 'Throw', 'A command grab that is mostly used at close-range for mix-ups. It can also be done as a combo ender. It deals increased damage when throwing the opponent out of the corner.'),
			array('Redo', 'BF3', '', 'Marks spot as Geras\' Anchor. After a duration or being hit, Geras teleports back to the Anchor. When enhanced, Geras creates a sand clone that will mimic inputs during Time Stop. Enhancing costs 2 bars of Super Meter.'),
			array('Countdown', 'DB3', '', 'Increases Countdown Charges by 1. When enhanced, it increases Contdown Charges by 3. Changes to Inevitable when at 3 Charges.'),
			array('Inevitable', 'DB3', 'Mid', 'Can only be done with 3 Charges of Countdown. A mid attack. When enhanced, Geras resets back to where he was 3 seconds ago with his previous health value.'),
			array('Denial', 'DB4', 'Mid', 'A mid attack. When enhanced, it grants armor.'),
			array('Sandstorm', 'DF4', 'Mid', 'A mid attack that launches for a combo. It can be directed Close, Mid, or Far. When enhanced, the Sandstorm will be delayed for a short duration before appearing. Enhanced Sandstorm also increases Countdown Charges by 1.')
		)
    );
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=geras')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Geras's main combo starter is his <b>Enhanced World Stop</b> (<span class="inputs">BF1+EX</span>), which will momentarily stop time for the opponent. During this time, attacks such as <span class="inputs">B+1,2</span> won't launch until after the opponent becomes unfrozen. Combos are generally ended with either <b>History Lesson</b> (<span class="inputs">DF2</span>) or <b>Follow-Up Exam</b> (<span class="inputs">DB2</span>), depending on which direction you want to throw the opponent in.</p>

	<?php include_file('combo.php', array('1,2 BF1+EX 4 B+1,2 F+2 DB4 FF B+1,2 DF2', 'MEDIUM', '395.61', null, null, 1)) ?>

	<p>Combos involving <span class="inputs">1,2,2,1+3</span> and <b>Countdown</b> (<span class="inputs">DB3</span>) will increase Geras' Countdown Charges, but at the cost of sacrificing some damage. This can be useful for building up Geras's Hourglass as he becomes much more threatening if fully charged.</p>

	<?php include_file('combo.php', array('1,2 BF1+EX 4 B+1,2 F+2 DB4 FF 1,2,2,1+3', 'MEDIUM', '380.07', 'Sideswitch', 'Increases Countdown Charges by 1.', 1)) ?>
	<?php include_file('combo.php', array('1,2 BF1+EX B+1,2 DB3 F+2 DB4 FF 1,2,2,1+3', 'MEDIUM', '339.66', 'Sideswitch', 'Increases Countdown Charges by 2.', 1)) ?>

	<div class="tip">Use Countdown Charge combos when the opponent is low on health and the combo will win the round so that Geras' Hourglass will be charged at the start of the next round.</div>

	<p>Geras' <span class="inputs">B+1,2</span> is another great combo starter. This move is usually followed up with <b>Denial</b> (<span class="inputs">DB4</span>) to launch the opponent even higher. <b>Enhanced World Stop</b> (<span class="inputs">BF1+EX</span>) can also be used in the middle of the combo to freeze the opponent, dealing higher damage.</p>

	<?php include_file('combo.php', array('B+1,2 DB4 FF F+2 DB4 FF F+2 DF2', 'MEDIUM', '314.35')) ?>
	<?php include_file('combo.php', array('B+1,2 DB4 FF F+2,4 BF1+EX B+1,2 DB4 FF F+2 DB2', 'MEDIUM', '403.44', null, 'Denial must be reversed.', 1)) ?>

	<div class="note">Certain combos involving Geras' <span class="inputs">B+1,2</span> will cause him to go underneath the opponent, putting him on the other side. In order to use <b>Denial</b> (<span class="inputs">DB4</span>) afterwards, the inputs must be reversed (<span class="inputs">DF4</span>).</div>

	<h2>Corner</h2>

	<p>In the corner, attacks such as <span class="inputs">3</span> can be used in combos, dealing slightly higher damage.</p>

	<?php include_file('combo.php', array('B+1,2 DB4 3 DB4 F+2 DF2', 'MEDIUM', '314.77')) ?>

	<div class="tip">In the corner, <b>Follow-Up Exam</b> (<span class="inputs">DB2</span>) will deal increased damage. This can be a great combo ender if the opponent is low on health. The tradeoff is that it'll throw the opponent out of the corner.</div>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=geras')) ?>
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
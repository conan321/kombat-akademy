<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('See No Evil', '1,4', 'High, Low', 'A high into low attack that is mainly used at close-range for punishing unsafe moves.'),
			array('Spirit Strike', 'B+2', 'Mid', 'A long-reaching mid attack that is safe at -4 on block and is a great move to throw out from mid-distance.'),
			array('Slice N\' Dive', 'F+2,2', 'Mid, Mid', 'A mid attack that has very good range and can be hit confirmed into a combo.'),
			array('Achilles Cutter', 'B+4', 'Low', 'A low attack with very good range. It\'s Kenshi\'s longest-reaching attack allowing him to safely attack opponents from afar.'),
			array('Transcending Cut', 'B+1,2' ,'Low, Mid', 'Must be in Sento Stance. A low into mid attack that is used for mix-ups and launches for a combo.'),
			array('Impaler', 'B+2', 'Overhead', 'Must be in Sento Stance. An overhead attack that is used for mix-ups and can lead into a combo with Kenshi\'s Spirit.'),
			array('Fading Light', 'F+2,2', 'Mid, Mid', 'Must be in Sento Stance. A mid attack that, when combined with Kenshi\'s Spirit, is useful for dealing block damage.'),
			array('Bad Feeling', 'F+3,2', 'Low, Mid', 'Must be in Sento Stance. A low into mid attack that can lead into a combo with Kenshi\'s Spirit.'),
			array('Double Tab', 'F+4', 'Mid', 'Must be in Sento Stance. A mid attack that is +1 on block and can also used as a combo ender.')
		),
		array(
			array('Ancestral Guard', 'DF1', 'Mid', 'An advancing mid attack. When used, Kenshi will run towards the opponent, destroying enemy projectiles. It can be extended by holding <span class="inputs">1</span> or cancelled by inputting <span class="inputs">SS</span>.'),
			array('Soul Charge', 'BF2', 'Mid', 'A mid attack. When enhanced, it grants armor and becomes unbreakable.'),
			array('Demon Drop', 'DB2', 'Overhead', 'An overhead attack that can be used to attack opponents from a distance. It can be directed Close, Mid, or Far. When enhanced, it launches for a combo.'),
			array('Rising Karma', 'BF3', 'Mid', 'A mid attack that launches for a combo.'),
			array('Force Push', 'BF4', 'Mid', 'A mid attack. It can be charged by holding <span class="inputs">4</span>. It\'s normally unsafe at -11 on block, but grants more advantage the longer it\'s charged. When enhanced, it\'s -1 on block and becomes unbreakable. '),
			array('Summon Ancestor', 'DB1', '', 'Kenshi enters Sento Stance. Disables Kenshi\'s Kameo for a duration.'),
			array('Banish Ancestor', 'DB1', '', 'Ends Sento Stance.'),
			array('Spiritual Alignment', 'DB2', '', 'Requires Sento Stance. Resets the position of Kenshi\'s Spirit back to where Kenshi is. When enhanced, it refreshes Kenshi\'s Spirit timer.'),
			array('Soaring Sento', 'DB3', 'Mid', 'Requires Sento Stance. A mid attack. When enhanced, it can combo into aerial attacks.'),
			array('Teamwork', 'DB4', 'Mid', 'Requires Sento Stance. A mid attack. If holding <span class="inputs">EX</span>, Kenshi\'s Spirit attacks the opponent instead. When enhanced, Kenshi throws his sword across the screen for an unbreakable attack.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=kenshi')) ?>
</section>
<section id="combos" class="in-progress">
	<h1>COMBOS</h1>
	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=kenshi')) ?>
</section>
<section id="strategy" class="in-progress">
	<h1>STRATEGY</h1>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
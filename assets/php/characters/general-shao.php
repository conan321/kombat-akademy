<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Fury Strikes', '1,2', 'High, Mid', 'A high into mid attack that is -3 on block and is mainly used at close-range and for punishing unsafe moves.'),
			array('Forward March', '2,2', 'High, Mid', 'A high into mid attack with good range and is safe on block.'),
			array('Make Way', 'B+2', 'Mid', 'A slow, long-ranged mid attack that has incredible range, is +3 on block, and launches for a combo.'),
			array('You\'re Weak', 'F+2,1+3', 'Overhead, Mid', 'An overhead into mid attack that is primarily used at close-range for mix-ups.'),
			array('Widow Breaker', 'B+3,2', 'Low, Overhead', 'A low into overhead attack that is safe on block and is used for mix-ups at close-range.'),
			array('Run Over', '2,2,4', 'High, Mid, Mid', 'Requires No Axe. A high into mid attack that is +2 on block and is mostly used at close-range for pressure.'),
			array('Raising Stakes', 'B+2', 'Mid', 'Requires No Axe. A mid attack that is +3 on block and launches for a combo.'),
			array('Double Axe Handle', 'F+2', 'Overhead', 'Requires No Axe. An overhead attack that is safe on block and launches for a combo.'),
			array('Superiority Komplex', 'U+F+2', 'Mid', 'An aerial attack with good range. It can be difficult for opponents to anti-air.')
		),
		array(
			array('Dark Energy', 'DF1', '', 'Strengthens Axe moves for a duration.'),
			array('Devastator', 'DB3', 'High', 'A high attack. When enhanced, it grants armor and becomes unbreakable. Enhanced Devastator can be cancelled on hit into Power Strike (<span class="inputs">DF4</span>) if its armor wasn\'t broken, launching for a combo.'),
			array('Death Quake', 'DB4', 'Low', 'A fullscreen low attack. When enhanced, it launches for a combo. It can be useful at a distance for trading against projectiles.'),
			array('Power Strike', 'DF4', 'Overhead', 'A slow overhead attack. When used, it changes General Shao\'s moveset to No Axe. It\'s unsafe at -10 on block. When enhanced, it becomes safe at 0 on block.'),
			array('Axe Recall', 'DF4', '', 'Recalls General Shao\'s axe. Only usable when General Shao is in No Axe.'),
			array('Treechopper', 'DF1', 'Mid', 'Requires No Axe. Must be near Axe. A mid attack that recalls General Shao\'s axe and is +3 on block. When enhanced, it grants armor.'),
			array('Reverse Treechopper', 'DF2', 'Throw', 'Requires No Axe. Must be near Axe. A throw that is used for mix-ups at close-range. If it hits, General Shao will recall his axe. When enhanced, it grants armor and becomes unbreakable.'),
			array('Klassic Kahn', 'DB3', 'High', 'Requires No Axe. A high attack that launches for a combo. When enhanced, it grants armor.'),
			array('Axe Quake', 'DB4', 'Low', 'Requires No Axe. A fullscreen low attack. If the opponent is near the axe, it becomes an overhead into low attack that can be difficult to block. When enhanced, it launches for a combo.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=general-shao')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>General Shao's combos are typically done by using <b>Power Strike</b> (<span class="inputs">DF4</span>) after certain moves. This causes General Shao to lose his axe, allowing him to end combos with <b>Reverse Treechopper</b> (<span class="inputs">DF2</span>).</p>

	<?php include_file('combo.php', array('1,2 DF4 B+3,2 4 DF2', 'MEDIUM', '322.77')) ?>

	<p>Ending combos with <b>Klassic Kahn</b> (<span class="inputs">DB3</span>) will result in higher damage. Although General Shao will be without his axe at the end of the combo, certain moves such as <span class="inputs">2,2</span> and <span class="inputs">F+2</span> will become much stronger offensively.</p>

	<?php include_file('combo.php', array('1,2 DF4 B+3,2 B+3,2 2,2 DB3', 'MEDIUM', '339.06')) ?>

	<p>If General Shao doesn't have his axe, his <span class="inputs">F+2</span> will launch for a combo. This move becomes much more threatening because it hits as an overhead and can be used for mix-ups.</p>

	<?php include_file('combo.php', array('F+2 2,2 DB3 2,2 DB3', 'MEDIUM', '274.86', null, 'Must be in No Axe stance.')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=general-shao')) ?>
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
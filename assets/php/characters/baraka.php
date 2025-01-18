<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Gutwrencher', '1,2', 'High, Mid', 'A high into mid attack that is mainly used at close-range to punish unsafe moves.'),
			array('Gurgler', '2,1', 'High, Mid', 'A high into mid attack that has decent range and can be hit confirmed into a combo.'),
			array('Battle Cry', 'B+3,1', 'Mid, Low, High', 'A multi-hitting mid into low attack that launches for a combo.'),
			array('Heel Drop', 'F+3', 'Overhead', 'A slow 29 frame overhead attack that goes over certain attacks, is safe on block, and launches for a combo. It can occasionally be thrown out to catch opponents off-guard for blocking low.'),
			array('Butcher', '4,4,4', 'High, Mid', 'A multi-hitting high into mid attack that deals decent block damage.')
		),
		array(
			array('Bleeding Blade', 'BF1', 'High', 'A high projectile that is used in zoning to keep opponents away. When enhanced and the opponent is hit, they take damage over time and increased block damage for a duration.'),
			array('(Air) Blade Sparks', 'DB1', 'Mid', 'A downwards aerial projectile. When enhanced, the opponent slowly collapses on hit allowing for a combo. It can sometimes be used to counter anti-aerial attacks.'),
			array('Stab Stab', 'DB1', 'High', 'An anti-aerial attack. When enhanced, the opponent takes increased block damage for a duration.'),
			array('Baraka Barrage', 'DF2', 'Mid', 'A multi-hitting mid attack. When enhanced, it launches for a combo.'),
			array('(Air) Death Spin', 'DF2', 'Mid', 'A multi-hitting aerial attack that travels across the screen. It can be difficult to avoid due to its speed and the amount of space it covers.'),
			array('Chop Chop', 'BF3', 'Mid', 'A quick mid attack that travels across the screen. It can be thrown out occasionally as a surprise attack and can be useful for countering projectiles. When enhanced, it grants armor and becomes unbreakable. It can be enhanced twice to deal increased damage.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=baraka')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=Nxkb01HWc3M', 'right', true)) ?>

	<p>Baraka's combos are quite simple and don't require much execution. His main combo starters include <span class="inputs">B+3,1</span> and <span class="inputs">F+3</span>, as well as <b>Enhanced Baraka Barrage</b> (<span class="inputs">DF2+EX</span>). After launching, <span class="inputs">B+3,1</span> can be used to keep opponents juggled. Combos are normally ended with <span class="inputs">2,1</span> into <b>Baraka Barrage</b> (<span class="inputs">DF2</span>).

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('B+3,1 FF B+3,1 FF 2,1 DF2', 'MEDIUM', '311.01')) ?>

	<h2>Corner</h2>

	<p>Baraka's corner combos are nearly identical to his midscreen combos. The only difference is that there's no need to perform a forward dash at the end of the combo.</p>

	<?php include_file('combo.php', array('F+3 B+3,1 2,1 DF2', 'MEDIUM', '268.16')) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=baraka')) ?>
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
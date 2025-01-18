<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Dragon Scales', '1,2', 'High, Mid', 'A high into mid attack that is 0 on block and is mainly used at close-range to punish unsafe moves.'),
			array('Dragon Fangs', '2,2', 'High, Mid', 'A high into mid attack that is +3 on block and is used at close-range for pressure.'),
			array('Twisted', 'B+2', 'Mid', 'A fast 10 frame mid attack that is -4 on block and is useful at close-range for pressure.'),
			array('Tailwhip', 'B+2,3', 'Mid, High', 'A fast 10 frame mid into high attack that is mainly used as a combo starter.'),
			array('Chosen One', '3,2', 'High, Overhead', 'A high into overhead attack that is +2 on block.'),
			array('The Creator', 'F+4,3', 'Mid, Mid, Mid', 'A multi-hitting mid attack that is -4 on block and can be hit confirmed into a combo. It\'s one of Liu Kang\'s safest moves to use at close-range.')
		),
		array(
			array('Cosmic Flame', 'BF1', 'High', 'A fast high projectile. When enhanced, it becomes a mid projectile that destroys the opponent\'s projectiles. It\'s mostly used for zoning to keep opponents away.'),
			array('Low Dragon', 'DB1', 'Low', 'A slow low projectile that grants advantage on block. It\'s mostly used for zoning to keep opponents away.'),
			array('Dragon\'s Tail', 'BF3', 'High, Mid', 'A high projectile followed by a flying kick that travels across the screen. When enhanced, it is not followed by a flying kick and instead launches for a combo. It can be used to punish unsafe moves at a distance, but can also be thrown out occasionally as a surprise attack.'),
			array('Dancing Dragon', 'BF4', 'Mid, High, High', 'A mid attack. When enhanced, it grants armor. It\'s mostly used as a combo ender.'),
			array('Dragon\'s Breath', 'DB4', 'Mid', 'A mid attack that is invulnerable to jump attacks. When enhanced, it launches for a combo.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=liu-kang')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=StQmOE59M2Q', 'right', true)) ?>

	<p>Liu Kang can launch opponents with either <span class="inputs">B+2,3</span> or <b>Enhanced Dragon's Tail</b> (<span class="inputs">BF3+EX</span>). This is usually followed up with <span class="inputs">B+2,3</span> which will keep the opponent juggled in the air. Combos are typically ended with <b>Dragon's Breath</b> (<span class="inputs">DB4</span>) to keep the opponent nearby, or <b>Dragon's Tail</b> (<span class="inputs">BF3</span>) for maximum damage.</p>

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('F+4,3 BF3+EX FF B+2,3 FF 3,3,3 BF3', 'MEDIUM', '365.37', null, null, 1)) ?>

	<h2>Corner</h2>

	<p>Corner combos are similar to midscreen combos. In the corner, dashing forward isn't necessary, which makes combos easier to execute. Additionally, an extra hit can be added in corner combos, resulting in higher damage.</p>

	<?php include_file('combo.php', array('F+4,3 BF3+EX B+2,3 1 3,3,3 BF3', 'MEDIUM', '370.28', null, null, 1)) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=liu-kang')) ?>
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
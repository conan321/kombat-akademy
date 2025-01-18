<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Who Runs The World', 'B+1,4', 'High, High', 'A high attack that is +3 on block.'),
			array('Twisted Edenian', 'F+1,2', 'Mid, Mid, Mid', 'A multi-hitting mid attack that is safe on block and can be hit confirmed into a combo.'),
 			array('Heavy Is The Krown', 'B+2,4', 'Mid, Mid', 'A mid attack that has decent range, is safe on block, and can be hit confirmed into a combo.'),
			array('Sweeping Fan', 'B+4', 'Low', 'A low attack with very good range. It\'s -9 on block but safe from a distance.')
		),
		array(
			array('Fan Toss', 'BF1', 'High', 'A high projectile that is primarily used in zoning. When enhanced, it becomes a slow mid projectile that is +14 on block and launches for a combo. Enhanced Fan Toss can be directed Close, Mid, or Far.'),
			array('Fan-Nado', 'DB1', 'High', 'A high projectile that circles around Kitana before flying upwards. It launches for a combo and can be directed Close, Mid, or Far. It can be thrown out to stop enemies from approaching from the ground and air.'),
			array('Princess Pirouette', 'DF2', 'Mid', 'A mid attack. When enhanced, it grants armor and the first hit becomes unbreakable.'),
			array('Square Wave', 'DB2', 'High', 'A high attack. When enhanced, it becomes unbreakable and is cancelable on hit into other (Air) Special Moves.'),
			array('Fancy Flick', 'DB3', 'Mid', 'A slow mid attack that grants advantage on block. It can be directed Close, Mid, or Far. When enhanced, it launches for a combo.'),
			array('Wind Bomb', 'BDF4', 'Mid', 'A mid attack that stays on screen for a duration. It can be directed Close, Mid, Far, or Very Far. If it makes contact with the opponent, it launches for a combo. It\'s useful to prevent enemies from advancing.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=kitana')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>
	
	<?php include_file('video.php', array(null, null, 'https://www.youtube.com/watch?v=v2dbj8IjwMo', 'right', true)) ?>

	<p>Kitana's combos begin by using attacks into <b>Fan-Nado</b> (<span class="inputs">DB1</span>). This move will launch the opponent and can be followed with a jump attack (<span class="inputs">U+F+2</span>). Combos can then be ended with a secondary jump attack (<span class="inputs">U+F+1,1,2</span>).</p>

	<div class="clearfix"></div>

	<?php include_file('combo.php', array('2,4,1,2 DB1 U+F+2 U+F+1,1,2', 'MEDIUM', '313.69')) ?>

	<p><b>Enhanced Fan-Nado</b> (<span class="inputs">DB1+EX</span>) deals increased damage and keeps the opponent in the air slightly longer, giving Kitana enough time to land a jump attack (<span class="inputs">U+F+3</span>) for additional damage.</p>
	
	<?php include_file('combo.php', array('2,4,1,2 DB1 BF1+EX U+F+3 U+F+1,1,2', 'MEDIUM', '357.25', null, null, 1)) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=kitana')) ?>
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
<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Afterburn', '1,1', 'High, Mid', 'A high into mid attack that is used at close-range to punish unsafe moves.'),
			array('Assembly Required', 'B+2', 'Overhead', 'A slow 24 frame overhead attack that can be used to catch opponents off-guard for blocking low.'),
			array('Overcharging Elbow', 'F+2,1', 'Mid, High', 'An advancing mid attack that is safe on block and can be hit-confirmed into a combo.'),
			array('Run Down', 'B+3,4', 'Low, Low, Mid', 'A low attack that is safe on block and can be hit-confirmed into a combo.')
		),
		array(
			array('Unguided Rocket', 'BF1', 'High', 'A high projectile used in zoning to keep opponents away. When enhanced, it becomes a mid projectile that destroys the opponent\'s projectiles and causes damage over time.'),
			array('Sidewinder', 'DB1', 'Mid', 'A mid projectile that flies into the air before falling. It can be directed Close, Mid, or Very Far. When enhanced, it destroys the opponent\'s projectiles and homes in on the foe.'),
			array('(Air) Burst Grenade', 'DB1', 'Mid', 'An aerial projectile that can be directed Close, Mid, or Far. When enhanced it destroys the opponent\'s projectiles. It can be detonated upon release of <span class="inputs">1</span> and <span class="inputs">EX</span>.'),
			array('Flamethrower', 'BF2', 'Mid', 'A mid attack with good range. When enhanced, it grants armor.'),
			array('Anti-Air Flak', 'DB2', 'High', 'An anti-aerial attack.'),
			array('Blast Shield', 'DB3', '', 'Eliminates projectile damage and pushback. Upon successful deflection, it can be canceled into Unguided Rocket or Sidewinder. Energizes Charge Bionic Blast and enables Force Sensor. When enhanced, it can be canceled into Special Moves upon successful deflection.'),
			array('Tactical Redeploy', 'DB4', 'Mid', 'Sektor flies up into the air before crashing down. It\'s mainly used as a combo starter.'),
			array('(Air) Thruster Boost', 'U+B+SS / U+SS / U+F+SS', '', 'Boosts Sektor upwards for a short period.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=sektor')) ?>
</section>
<section id="combos" class="in-progress">
	<h1>COMBOS</h1>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=sektor')) ?>
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
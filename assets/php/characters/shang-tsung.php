<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Spurned God', '1', 'High', 'A high that is +2 on block and is mainly used at close-range for pressure and to punish unsafe moves.'),
			array('A God\'s Whimsy', 'F+3', 'Overhead', 'Requires Young Form. A 23 frame overhead attack that is safe at -4 on block and can be thrown out occasionally to catch opponents off-guard for blocking low.'),
			array('Spin Kick', 'F+4,3,4', 'Mid, Mid, Mid', 'Requires Young Form. A mid attack that can be hit confirmed into a combo.'),
			array('Knee Reverser', '2,4', 'High, Low', 'Requires Old Form. A high into low attack that is +1 on block. It\'s mainly used at close-range for pressure.'),
			array('Nerve Endings', 'F+4,1,2', 'Mid, Mid, High', 'Requires Old Form. A mid attack that can be hit confirmed into a combo.')
		),
		array(
			array('Quick Age Morph', 'D+SS', '', 'Changes form between Young and Old.'),
			array('Form Stealer', 'FDB4', '', 'Changes form from Shang Tsung to the opponent. When enhanced, Shang Tsung deals increased damage while morphed.'),
			array('Perfect Form', 'FB4', '', 'Changes form from the opponent back to Shang Tsung'),
			array('Straight Skull', 'DF1', 'High', 'Requires Young Form. A high projectile that is used in zoning to keep opponents away. When enhanced, an additional mid projectile is fired.'),
			array('Double Skull', 'DB1', 'High, High', 'Requires Young Form. A series of 2 high projectiles that is used in zoning to keep opponents away. When enhanced, an additional mid projectile is fired.'),
			array('Triple Skull', 'DBF1', 'High, High, High', 'Requires Young Form. A series of 3 high projectiles that is used in zoning to keep opponents away. When enhanced, an additional mid projectile is fired.'),
			array('Spinning Spikes', 'DF2', 'Mid, Mid, Mid', 'Requires Young Form. A multi-hitting mid attack. When enhanced, it grants armor.'),
			array('Bed Of Spikes', 'DB3', 'Low', 'Requires Young Form. A low attack that moves Shang Tsung backwards. When enhanced, it becomes more difficult to punish on block. It can be useful at close-range to create distance from the opponent.'),
			array('(Air) Down Skull', 'DF1', 'Mid', 'Requires Old Form. An aerial mid projectile that is fired downwards and appears beneath the opponent. It can be directed Close, Mid, or Far.'),
			array('Ground Skull', 'DF1', 'Mid', 'Requires Old Form. A mid projectile that appears from the ground. It can be directed Close, Mid, or Far. When enhanced, 3 Ground Skulls appear from the ground that launch for a combo.'),
			array('Vicinity Slash', 'DF2', 'Mid', 'Requires Old Form. A mid attack. When enhanced, it grants armor and becomes unbreakable.'),
			array('Injection', 'DB3', 'Mid', 'Requires Old Form. A mid attack. When enhanced, it becomes unbreakable and increases Shang Tsung\'s damage while morphed. It\'s mostly used as a combo ender.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=shang-tsung')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Shang Tsung's combos vary depending on which form he's in. Although his <b>Young Form</b> provides multiple different combo starters, most of his combo damage stems from his <b>Old Form</b>. In Shang Tsung's <b>Old Form</b>, his <b>Ground Skull</b> (<span class="inputs">DF1</span>) is key for use in combos as it's not only a great combo starter, but it can be used several times to keep opponents afloat while extending combos. Typically, this is done by using <span class="inputs">4</span> or <span class="inputs">F+4</span> in between each <b>Ground Skull</b>. Combos are usually ended with <b>Injection</b> (<span class="inputs">DB3</span>) for maximum damage and to send the opponent fullscreen where Shang Tsung can begin zoning with projectiles.</p>

	<?php include_file('combo.php', array('F+4,1,2,1 DF1 4 DF1 4 DF1 F+4 DF1 F+4 DB3', 'MEDIUM', '388.15', null, 'Must be in Old Form.')) ?>

	<p>In order to keep opponents nearby, switching to Shang Tsung's <b>Young Form</b> just before the end of the combo will allow him to use <b>Bed Of Spikes</b> (<span class="inputs">DB3</span>). Switching forms during combos is done by using <b>Quick Age Morph</b> (<span class="inputs">D+SS</span>) in between inputs.</p>

	<p>In Shang Tsung's <b>Young Form</b>, he's able to launch from his <span class="inputs">B+1,2</span>. Quickly switching to his <b>Old Form</b> will allow for combos using <b>Ground Skull</b>.

	<?php include_file('combo.php', array('B+1,2 D+SS 4 DF1 4 DF1 F+4 DF1 F+4 DB3', 'MEDIUM', '359.08', null, 'Must be in Young Form.')) ?>

	<h2 class="in-progress">Corner</h2>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=shang-tsung')) ?>
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
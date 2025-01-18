<section id="move-list">
	<h1>MOVE LIST</h1>
	<?php
	$move_list = array(
		array(
			array('Twisting Blades', '1,2', 'High, Mid, Mid', 'A multi-hitting high into mid attack that is -1 on block and is mainly used at close-range for pressure.'),
			array('Stomach Smasher', '2,1', 'High, Mid, Mid', 'A high into mid attack that is used to punish unsafe moves.'),
			array('Temple Razer', 'B+2,1', 'Mid, Mid', 'A long-ranged mid attack that can be hit-confirmed into a combo.'),
			array('Prey Maker', 'B+3,4', 'Low, Low', 'An advancing low attack that is safe on block.'),
			array('Hurrikane Kick', 'F+4', 'Overhead', 'A slow 22 frame overhead attack that can be used to catch opponents off-guard for blocking low.'),
			array('Lasher-ation', 'U,D+B+1 or U,D+F+1', 'High', 'An aerial attack with great horizontal range. It can be used to attack from a distance.'),
			array('Slasher-ation', 'U,D+B+2 or U,D+F+2', 'Mid', 'An aerial attack with great vertical range. It can be difficult to anti-air.')
		),
		array(
			array('Shooting Star', 'DF1', 'Low', 'A low projectile that can be directed and used while airborne. It\'s primarily used for zoning to keep opponents away. When enhanced, Takeda throws 3 shurikens across the screen which can launch for a combo. Enhanced Shooting Star can be delayed by holding <span class="inputs">1</span>, granting higher block advantage.'),
			array('Smart Shuriken', 'DB1', '', 'A projectile that stays on the screen. If Shooting Star is used, it will detonate the Smart Shuriken, launching for a combo. Similar to Shooting Star, Enhancing Smart Shuriken allows Takeda to throw 3 shurikens across the screen, but the shurikens will detonate in the opposite direction.'),
			array('Double Spear Ryu', 'BF2', 'High', 'A high attack that travels across the screen. When enhanced, it launches the opponent for a combo. The opponent can be thrown forward by holding <span class="inputs">F</span>. It\'s mainly used as a combo starter.'),
			array('(Air) Spear Ryu', 'DB2', 'Mid', 'A downwards aerial attack that can be used to counter projectiles. When enhanced, it launches for a combo. It\'s mostly used as a combo ender or to extend combos.'),
			array('Swift Stride', 'BF3', 'Mid', 'A mid attack that travels across the screen. By pressing <span class="inputs">U or B</span>, Takeda will teleport behind the opponent with an attack that launches for a combo. It can be canceled by inputting <span class="inputs">D</span>. When enhanced, it grants armor. It\'s mostly used as a combo starter.'),
			array('(Air) Rushing Nimbus', 'BF3', '', 'An aerial attack that allows Takeda to leap across the screen. It\'s mainly used in combos or to approach from a distance.'),
			array('(Air) Rushing Nimbus Attack', 'DB3', 'High', 'An aerial attack that allows Takeda to swing across the screen. It can be used as a combo ender.'),
			array('Tornado Kick', 'DB4', 'Overhead', 'An overhead attack that can be directed and used while airborne. It\'s mostly used as a combo ender, granting high hit advantage.'),
			array('Whip Art', 'DF4', 'High', 'A high attack that can be used after attacks. It can be done up to 3 times and delayed with each hit. The final hit can be enhanced, launching for a combo.')
		)
	);
	?>

	<?php include_file('character-move-list.php', array($move_list)) ?>
	<?php include_file('more-btn.php', array('ALL MOVES', '/move-list/?character=takeda')) ?>
</section>
<section id="combos">
	<h1>COMBOS</h1>

	<h2>Midscreen</h2>

	<p>Takeda's combos start by using attacks such as <span class="inputs">B+2,1</span> and hit-confirming into <b>Swift Stride Phase</b> (<span class="inputs">BF3,U or BF3,B</span>). Following this, using <span class="inputs">4</span> will briefly keep Takeda airborne, allowing him to perform <b>(Air) Rushing Nimbus</b> (<span class="inputs">BF3</span>). Combos are ended with Takeda's jump attack <span class="inputs">U+F+2,4</span> into <b>(Air) Spear Ryu</b> (<span class="inputs">DB2</span>).</p>

	<?php include_file('combo.php', array('B+2,1 BF3 Hold U FF 4 BF3 2,4 DB2', 'MEDIUM', '313.48', null, 'Must repeatedly press jump punch after (Air) Rushing Nimbus Technique.')) ?>

	<div class="tip">After <b>(Air) Rushing Nimbus</b>, repeatedly tap <span class="inputs">2</span> in order to easily perform a jump attack.</div>

	<p>While <b>(Air) Spear Ryu</b> will deal the most damage, it'll switch positions with the opponent and may not always be ideal. To keep the opponent on the same side, use combo enders such as <b>(Air) Rushing Nimbus Attack</b> (<span class="inputs">DB3</span>) or <b>(Air) Tornado Kick</b> (<span class="inputs">DB4</span>).</p>

	<div class="note"><b>(Air) Tornado Kick</b> provides great hit advantage despite dealing less damage. Use Takeda's jump attack <span class="inputs">U+F+2,1</span> beforehand in order to consistently land this move in a combo.</div>

	<p>Combos can be extended by using <b>Enhanced (Air) Spear Ryu</b> (<span class="inputs">DB2+EX</span>) and following up with a delayed jump attack <span class="inputs">U+F+1</span> or an immediate jump attack <span class="inputs">U+F+2,4</span>.</p>

	<?php include_file('combo.php', array('B+2,1 BF3 Hold U FF 4 BF3 2,4 DB2+EX 1 U+F+2,4 DB2', 'HARD', '411.89', null, 'Must repeatedly press jump punch after (Air) Rushing Nimbus Technique. Jump punch after (Air) Enhanced Spear Ryu must hit late.', 1)) ?>

	<div class="note">It can be difficult to time Takeda's jump attack <span class="inputs">U+F+1</span> after <b>Enhanced (Air) Spear Ryu</b>. For more consistency, use an immediate jump attack <span class="inputs">U+F+2,4</span> or <span class="inputs">U+F+2,1</span> into an aerial Special Move instead.</div>

	<h2>Corner</h2>

	<p>Corner combos are mostly similar to midscreen combos. However, it's important to know is which moves to use in order to keep the opponent cornered. For instance, if starting a combo with <b>Enhanced Double Spear Ryu</b> (<span class="inputs">BF2+EX</span>), holding <span class="inputs">F</span> will keep the opponent on the same side. Ending corner combos with moves such as <b>(Air) Tornado Kick</b> instead of <b>(Air) Spear Ryu</b> is also advised to prevent switching positions.</p>

	<?php include_file('combo.php', array('1,2 BF2+EX,F U+F+2,4 BF3 2,1 DB4', 'MEDIUM', '306.55', null, null, 1)) ?>

	<?php include_file('more-btn.php', array('MORE COMBOS', '/combos/?character=takeda')) ?>
</section>
<section id="strategy">
	<h1>STRATEGY</h1>

	<p>
	Takeda is a character that relies on long-ranged normals and projectiles to keep opponents at bay while using setups to create mix-ups up-close. While he doesn't have the strongest offense or zoning, his exceptional range, mobility, and setplay make him a versatile fighter who can adapt to various situations and maintain control over the pace of the match.
	</p>

	<h2>Close-Range</h2>

	<p>
	<b><span class="inputs">1,2</span></b> - This is a multi-hitting high into mid attack, best used up-close. If it connects, it can be easily hit-confirmed into <b>Enhanced Double Spear Ryu</b> (<input class="inputs">BF2+EX</span>) for a combo. On block, it leaves Takeda at only -1 making it very safe. The string can also be completed by inputting <span class="inputs">1,2,2+4</span> to stop opponents from attacking immediately after <span class="inputs">1,2</span>.
	</p>

	<p>
	<b><span class="inputs">2,1</span></b> - Use this attack to punish unsafe moves. It can lead into <b>Swift Stride</b> (<span class="inputs">BF3,U</span>) for a combo.
	</p>

	<h2>Mid-Range</h2>

	<p>
	<b><span class="inputs">B+2,1</span></b> - This is one of Takeda's primary long-ranged attacks. It has excellent reach and can be hit-confirmed into a combo for punishing opponents trying to close the gap. The string can also be completed by inputting <span class="inputs">B+2,1,2+4</span> to stop opponents from moving immediately after <span class="inputs">B+2,1</span>.
	</p>

	<p>
	<b><span class="inputs">B+3,4</span></b> - This advancing low attack has great range, is safe on block, and can lead to a combo when paired with certain Kameos. Without a Kameo, the first hit can be linked into Special Moves such as <b>Whip Art</b> (<span class="inputs">DF4</span>) which can also lead into a combo, however this can be rather unsafe. It can be good to throw out to keep the opponent's movements in check, and is also a great whiff punisher.
	</p>

	<h2>Zoning</h2>

	<p>
	At longer distances, use <b>Shooting Star</b> (<span class="inputs">DF1</span>) to control space. It can also be used while in the air, which can be useful when jumping back. Once the opponent is conditioned to block Takeda's shurikens, <b>Smart Shuriken</b> (<span class="inputs">DB1</span> can be used to lay traps on the ground. This will temporarily place a shuriken on the ground and will detonate upon making contact with <b>Shooting Star</b>. Although not an immediate threat, opponents will be more hesitant to move as the <b>Smart Shuriken</b> will launch for a combo.
	</p>

	<h2>Shuriken Setups</h2>

	<p>
	Takeda's <b>Smart Shuriken</b> (<span class="inputs">DB1</span>) can be extremely useful for setups. The best way to set this up is to use a Kameo during a combo and place the shuriken while the opponent is being hit by the Kameo. Once set up and a <b>Smart Shuriken</b> is underneath the opponent, Takeda's offense becomes much deadlier. For instance, a Back Throw will cause the shuriken to detonate, launching for a combo.
	</p>

	<p>
	Additionally, since Takeda's <b>(Air) Shooting Star</b> (<span class="inputs">DF1</span>) hits as a low, it can be used as a mix-up with jump attacks which hit as overheads. While a <b>Smart Shuriken</b> set, jumping into the air and using <b>(Air) Shooting Star</b> will cause the shuriken to detonate. If the opponent is expecting a jump attack and blocks high, it'll launch for a combo. Conversely, if the opponent is afraid of the <b>Smart Shuriken</b> and blocks low, that'll open them up to being hit by a jump attack.
	</p>

	<div class="note"><b>(Air) Shooting Star</b> (<span class="inputs">DF1</span>) is slightly faster than the grounded version and hits as a low, which can be more effective for zoning.</div>

	<h2>Enhanced Shurikens</h2>

	<p>
	When either <b>Shooting Star</b> (<span class="inputs">DF1</span>) or <b>Smart Shuriken</b> (<span class="inputs">DB1</span>) are enhanced, Takeda will throw 3 shurikens onto the ground, covering a large portion of the screen. The shurikens will detonate upon releasing <span class="inputs">1</span>. By delaying the shurikens, Takeda will be free to go on the offensive as the opponent will be hesitant to move. This can be a great way to quickly close the gap on the opponent, or to deal easy damage if the opponent is low on health. Furthermore, the shurikens will grant advantage on block. If timed correctly, performing any attack then detonating the shurikens immediately after will allow Takeda to apply pressure on the opponent.
	</p>

	<h2>Whip Art</h2>

	<p>
	Takeda's <b>Whip Art</b> (<span class="inputs">DF4</span>) is a move that can create mindgames on block. It can be done after attacks such as <span class="inputs">B+3</span> and <span class="inputs">1,2</span>. It can be followed up with additional attacks by inputting <span class="inputs">4</span> afterwards. This can be done up to 3 times, where each hit can be delayed. The longer each hit is delayed, the safer Takeda will be, however this will create gaps that can be interrupted. Ideally, it's best to delay each hit long enough to keep Takeda safe, but short enough where the opponent won't be able to interrupt with a normal. If the opponent is hit, <b>Whip Art</b> can be enhanced to launch for a combo.
	</p>

	<p>
	The primary reason to use this move is to deal additional block damage while building Super Meter and to semi-safely combo off of attacks such as <span class="inputs">B+3</span> without the need for a Kameo. Due to its unsafe nature and being a high though, it should not be overused.
	</p>

	<div class="in-progress">
	<?php include_file('more-btn.php', array('FULL STRATEGY', '')) ?>
	</div>
</section>
<section id="kameos">
	<h1>KAMEOS</h1>

	<?php include_file('character-kameos.php', array($character["name"])) ?>

	<?php include_file('more-btn.php', array('ALL KAMEOS', '/kameos/')) ?>
</section>
<?php
$move_list = isset($a[0]) ? $a[0] : '';
$basic_attacks = $move_list[0];
$special_moves = $move_list[1];
?>

<div class="character-move-list">
	<div>
		<div>
			<span>Basic Attacks</span>
		</div>
		<?php foreach ($basic_attacks as $move) { ?>
			<div>
				<div><span><?php echo $move[0] ?></span>
				<?php if ($move[1]) { ?>
					<span class="inputs"><?php echo $move[1] ?></span>
				<?php } ?>
				<span><?php echo $move[2] ?></span></div>
				<div><?php echo $move[3] ?></div>
			</div>
		<?php } ?>
	</div>
	<div>
		<div>
			<span>Special Moves</span>
		</div>
		<?php foreach ($special_moves as $move) { ?>
			<div>
				<div><span><?php echo $move[0] ?></span>
				<?php if ($move[1]) { ?>
					<span class="inputs"><?php echo $move[1] ?></span>
				<?php } ?>
				</span><span><?php echo $move[2] ?></span></div>
				<div><?php echo $move[3] ?></div>
			</div>
		<?php } ?>
	</div>
</div>
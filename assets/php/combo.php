<?php
$input = isset($a[0]) ? $a[0] : '';
$difficulty = isset($a[1]) ? $a[1] : '';
$damage = isset($a[2]) ? $a[2] : '';
$url = isset($a[3]) ? $a[3] : ''; // Note: Need to implement url into HTML/JS later
$notes = isset($a[4]) ? $a[4] : '';
$meter = isset($a[5]) ? $a[5] : '';
$tags = isset($a[6]) ? $a[6] : '';
$kameo = isset($a[7]) ? $a[7] : false;
$kameo_meter = isset($a[8]) ? $a[8] : '';
?>

<div class="combos-list-combo">
	<div class="combos-list-combo-header">
		<div class="combos-list-combo-header-left">
			<div class="combos-list-combo-combo">
				<span class="inputs btn-inputs btn-inputs-s"><?php echo $input ?></span>
			</div>
		</div>
		<div class="combos-list-combo-header-right">
			<div class="combos-list-combo-difficulty">
				<?php
				$difficulty_class = '';
				if (strtoupper($difficulty) == "EASY") { $difficulty_class = ' combo-difficulty-easy'; }
				else if (strtoupper($difficulty) == "MEDIUM") { $difficulty_class = ' combo-difficulty-medium'; }
				else if (strtoupper($difficulty) == "HARD") { $difficulty_class = ' combo-difficulty-hard'; } ?>
				<div class="combo-difficulty<?php echo $difficulty_class; ?>"><?php echo strtoupper($difficulty) ?></div>
			</div>
			<div class="combos-list-combo-damage"><?php echo $damage ?></div>
		</div>
	</div>
	<?php if ($tags || $meter || $kameo_meter || $notes) { ?>
	<div class="combos-list-combo-footer">
		<?php if ($notes) { ?>
		<div class="combos-list-combo-notes"><?php echo $notes ?></div>
		<?php } ?>
		<div class="combos-list-combo-footer-right">
			<?php
			if ($meter || $kameo_meter) { ?>
			<div class="combos-list-combo-meter">
				<?php
				if ($meter) {
					if ($meter > 0) {
						echo $meter;
						if ($meter == 1) {
							echo ' Bar';
						} else {
							echo ' Bars';
						}
					}

					if ($kameo_meter) {
						if ($meter > 0 && $kameo_meter > 0) {
							echo ' | ';
						}
					}
				}

				if ($kameo_meter) {
					if ($kameo_meter > 0) {
						echo $kameo_meter;
						if ($kameo_meter == 1) {
							echo ' Kameo';
						} else {
							echo ' Kameos';
						}
					}
				}
				?>
			</div>
			<?php }
			if ($kameo) { ?>
			<div class="combos-list-combo-kameo">
				<div class="combo-kameo">Kameo</div>
			</div>
			<?php }
			if ($tags) { ?>
			<div class="combos-list-combo-tags">
			<?php
				$combo_tags = explode(', ', $tags);
				foreach ($combo_tags as $combo_tag) {
					$tag_class = '';
					if ($combo_tag == "Buff") { $tag_class = ' combo-tag-buff'; }
					else if ($combo_tag == "Restand") { $tag_class = ' combo-tag-restand'; }
					else if ($combo_tag == "Setup") { $tag_class = ' combo-tag-setup'; }
					else if ($combo_tag == "Sideswitch") { $tag_class = ' combo-tag-sideswitch'; }
					else if ($combo_tag == "Unbreakable") { $tag_class = ' combo-tag-unbreakable'; }
					else if ($combo_tag == "Fatal Blow") { $tag_class = ' combo-tag-fatal-blow'; } ?>
					<div class="combo-tag<?php echo $tag_class; ?>"><?php echo $combo_tag; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
</div>
<?php
$kameos = include("data/kameos.php");

$roster = array(
	'Janet Cage', 'Darrius', 'Sareena', 'Cyrax', 'Kano', 'Jax', 'Sonya', 'Sektor', 'Frost', 'Khameleon', 'Madam Bo',
	'Ferra', 'Stryker', 'Scorpion', 'Sub-Zero', 'Kung Lao', '', 'Shujinko', 'Motaro', 'Goro', 'Tremor', 'Mavado'
);
$total = 22;

?>

<div class="kameos-page">
	<div class="page-title">KAMEOS</div>
	<div class="page-content">
		<div class="kameo-roster">
			<?php
			for ($i = 0; $i < $total; $i++) {
				if ($i == 0 || $i == $total / 2) { ?>
					<div class="kameo-roster-row">
				<?php }
				if ($i != -1 && $i != 16) { ?>
						<div id="<?php echo $roster[$i] ?>" class="kameo-roster-portrait" title="<?php echo $roster[$i] ?>" style="background-image: url('/images/kameos/portraits/<?php echo $kameos[$roster[$i]]['slug'] ?>.png'), linear-gradient(to top, rgb(105, 89, 73), #000);">
							<a href="/kameos/<?php echo $kameos[$roster[$i]]['slug'] ?>/"></a>
						</div>
				<?php } else { ?>
						<div class="kameo-roster-portrait empty" style="background-image: linear-gradient(to top, rgb(105, 89, 73), #000);"></div>
				<?php }
				if ($i == ($total / 2) - 1 || $i == $total - 1) { ?>
					</div>
				<?php }
			} ?>
		</div>
	</div>
</div>
<?php
$characters = include("data/characters.php");

$roster = array(
	'Noob Saibot', 'Cyrax', 'Ermac', 'Kitana', 'Mileena', 'Tanya', 'Rain', 'Smoke', 'Scorpion', 'Sub-Zero', 'Reptile', 'Li Mei', 'Kenshi', 'Baraka', 'Geras', 'Omni-Man', 'Peacemaker', 'Ghostface', 'T-1000',
	'', 'Sektor', 'Takeda', 'Shang Tsung', 'General Shao', 'Sindel', 'Reiko', 'Raiden', 'Liu Kang', '', 'Johnny Cage', 'Kung Lao', 'Ashrah', 'Nitara', 'Havik', 'Quan Chi', 'Homelander', '', ''
);
$total = 38;

?>

<div class="characters-page">
	<div class="overlay hidden">
		<?php include_file('dialog-box.php', array('', '', 'large')) ?>
	</div>
	<div class="page-title">CHARACTERS</div>
	<div class="page-content">
		<div class="characters-page-header hidden">
			<div class="character-info">
				<div>
					<div class="character-img-wrapper"></div>
				</div>
				<div class="character-name"></div>
			</div>
			<div class="character-stats">
				<div>
					<div class="character-stats-left">
						<div>OFFENSE</div>
						<div>DEFENSE</div>
						<div>DAMAGE</div>
						<div>MOBILITY</div>
						<div>RANGE</div>
						<div>ZONING</div>
					</div>
					<div class="character-stats-right">
						<div class="character-stats-chart">
							<div class="character-stats-chart-row">
								<div id="offense" class="character-stats-chart-bar character-stats-chart-bar-0" aria-label="Offense: 0"></div>
							</div>
							<div class="character-stats-chart-row">
								<div id="defense" class="character-stats-chart-bar character-stats-chart-bar-0" aria-label="Defense: 0"></div>
							</div>
							<div class="character-stats-chart-row">
								<div id="damage" class="character-stats-chart-bar character-stats-chart-bar-0" aria-label="Damage: 0"></div>
							</div>
							<div class="character-stats-chart-row">
								<div id="mobility" class="character-stats-chart-bar character-stats-chart-bar-0" aria-label="Mobility: 0"></div>
							</div>
							<div class="character-stats-chart-row">
								<div id="range" class="character-stats-chart-bar character-stats-chart-bar-0" aria-label="Range: 0"></div>
							</div>
							<div class="character-stats-chart-row">
								<div id="zoning" class="character-stats-chart-bar character-stats-chart-bar-0" aria-label="Zoning: 0"></div>
							</div>
						</div>
						<div class="character-stats-values">
						<?php
						for ($i = 1; $i <= 5; $i++) { ?>
							<div><?php echo $i ?></div>
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="character-stats-btn-wrapper">
					<div class="character-stats-btn">More Details</div>
					<div class="hide-stats-btn">Hide Stats</div>
				</div>
			</div>
		</div>
		<div class="view-stats-btn-wrapper">
			<div class="view-stats-btn">View Stats</div>
		</div>
		<div class="character-roster">
			<?php
			for ($i = 0; $i < $total; $i++) {
				if ($i == 0 || $i == $total / 2) { ?>
					<div class="character-roster-row">
				<?php }
				if ($i != 19 && $i != 28 && $i != 36 && $i != 37) { ?>
						<div id="<?php echo $roster[$i] ?>" class="character-roster-portrait" title="<?php echo $roster[$i] ?>" style="background-image: url('/images/characters/portraits/<?php echo $characters[$roster[$i]]['slug'] ?>.jpg');">
							<a href="/characters/<?php echo $characters[$roster[$i]]['slug'] ?>/"></a>
						</div>
				<?php } else { ?>
						<div class="character-roster-portrait empty" style="background-image: url('/images/characters/portraits/empty.jpg');"></div>
				<?php }
				if ($i == ($total / 2) - 1 || $i == $total - 1) { ?>
					</div>
				<?php }
			} ?>
		</div>
	</div>
</div>

<script>
let characters;

<?php if ($characters) { ?>
	characters = <?php echo json_encode($characters); ?>;
<?php } ?>
</script>
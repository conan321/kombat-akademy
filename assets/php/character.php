<?php
include("db.php");
$characters = include("data/characters.php");

$character = null;
$stats = null;
$slug = get_post_field('post_name');

foreach($characters as $c) {
	if ($c["slug"] == $slug) {
		$character = $c;
	}
}

// Gameplay
$videos = null;

try {
	$name = $character["name"];
	$limit = 2;

	$query = "Select title, description, url, date FROM gameplay WHERE character_page LIKE '%$name%' LIMIT $limit";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {}

$conn = null;

/*
include("db.php");
$versions = include("data/versions.php");

usort($versions, function ($a, $b) {
	return ($a["release_date"] > $b["release_date"]) ? -1 : 1;
});

$date = date('m_d_Y', strtotime($versions[0]["release_date"]));
$move_list = null;

try {
	$table = "move_list_" . $date;
	$name = $character["name"];

	$query = "Select move_name, command, block_type, startup, active, recovery, cancel, hit_advantage, block_advantage, fblock_advantage FROM $table WHERE char_name = '$name'";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	$move_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {}

$get_move = function($command, $move_name = null) use ($move_list) {
	if ($move_list == null) return "";

	if ($move_name == null) {
		foreach($move_list as $move) {
			if ($move["command"] == $command) {
				return $move;
			}
		}
	} else {
		foreach($move_list as $move) {
			if ($move["command"] == $command && $move["move_name"] == $move_name) {
				return $move;
			}
		}
	}

	return "";
};

$conn = null;
*/
?>

<style>
.character-nav-top {
	background: linear-gradient(30deg, <?php echo $character["color_dark"] ?>, <?php echo $character["color"] ?>);
}

.character-nav div:hover {
	border-color: <?php echo $character["color"] ?>;
}

.character-page section {
	border-bottom: 1px solid <?php echo $character["color"] ?>;
}

.character-page .more-btn {
	background: linear-gradient(30deg, <?php echo $character["color_dark"] ?>, <?php echo $character["color"] ?>);
}
</style>

<?php if ($character) { ?>
<div class="character-page guide">
<div class="overlay hidden">
	<?php include_file('dialog-box.php', array('', '', 'large')) ?>
</div>
<nav class="character-nav-top">
	<div data-target="overview">
		<i class="fa-solid fa-user-ninja"></i>
		OVERVIEW
	</div>
	<div data-target="move-list">
		<i class="fa-solid fa-rectangle-list"></i>
		MOVE LIST
	</div>
	<div data-target="combos">
		<i class="fa-solid fa-hand-fist"></i>
		COMBOS
	</div>
	<div data-target="strategy">
		<i class="fa-solid fa-brain"></i>
		STRATEGY
	</div>
	<div data-target="kameos">
		<i class="fa-solid fa-user-group"></i>
		KAMEOS
	</div>
	<div data-target="gameplay">
		<i class="fa-solid fa-tv"></i>
		GAMEPLAY
	</div>
</nav>
<section id="character-header">
	<div class="character-header-title"><?php echo strtoupper($character["name"]) ?></div>
	<div class="character-header-content">
		<div class="character-nav-wrapper">
			<div class="character-nav">
				<div data-target="overview">
					<i class="fa-solid fa-user-ninja"></i>
					OVERVIEW
				</div>
				<div data-target="move-list">
					<i class="fa-solid fa-rectangle-list"></i>
					MOVE LIST
				</div>
				<div data-target="combos">
					<i class="fa-solid fa-hand-fist"></i>
					COMBOS
				</div>
				<div data-target="strategy">
					<i class="fa-solid fa-brain"></i>
					STRATEGY
				</div>
				<div data-target="kameos">
					<i class="fa-solid fa-user-group"></i>
					KAMEOS
				</div>
				<div data-target="gameplay">
					<i class="fa-solid fa-tv"></i>
					GAMEPLAY
				</div>
			</div>
		</div>
		<div class="character-img-wrapper">
			<img title="<?php echo $character["name"] ?>" alt="<?php echo $character["name"] ?> Render" src="/images/characters/renders/<?php echo $slug ?>.png" />
		</div>
	</div>
</section>
<section id="overview">
	<h1>OVERVIEW</h1>
	<div class="character-overview-content">
		<div class="character-info">
			<div class="character-info-header">
				<img title="<?php echo $character["name"] ?>" alt="<?php echo $character["name"] ?> Portrait" src="/images/characters/square/<?php echo $slug ?>.png" />
				<div>
					<div><?php echo strtoupper($character["name"]) ?></div>
					<div>Type: <?php echo $character["type"] ?></div>
					<div>Health: <?php echo $character["health"] ?></div>
					<div class="character-description"><?php echo $character["description"] ?></div>
				</div>
			</div>
			<?php if ($character["pros"] && $character["cons"]) { ?>
				<div class="character-pros-cons">
					<div class="character-pros-cons-section">
						<div>PROS</div>
						<div>CONS</div>
					</div>
					<div class="character-pros-cons-section">
						<ul class="character-pros">
							<?php
							if ($character["pros"]) {
								foreach ($character["pros"] as $pro) { ?>
									<li><?php echo $pro ?></li>
								<?php }
							} ?>
						</ul>
						<ul class="character-cons">
							<?php
							if ($character["cons"]) {
								foreach ($character["cons"] as $con) { ?>
									<li><?php echo $con ?></li>
								<?php }
							} ?>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php if ($character["stats"]) { ?>
		<div class="character-stats">
			<div>
				<div class="character-stats-left">
					<?php
					foreach ($character["stats"] as $key => $value) { ?>
						<div><?php echo strtoupper($key) ?></div>
					<?php } ?>
				</div>
				<div class="character-stats-right">
					<div class="character-stats-chart empty">
						<?php
						foreach ($character["stats"] as $key => $value) { ?>
							<div class="character-stats-chart-row">
								<div class="character-stats-chart-bar character-stats-chart-bar-<?php echo $value ?>" aria-label="<?php echo ucfirst($key) . ': ' . $value ?>"></div>
							</div>
						<?php } ?>
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
			</div>
		</div>
		<?php } ?>
	</div>
</section>

<?php
if (file_exists(dirname(__DIR__) . '/php/characters/' . $slug . '.php')) {
	include dirname(__DIR__) . '/php/characters/' . $slug . '.php';
}
?>

<section id="gameplay">
	<h1>GAMEPLAY</h1>

	<div class="videos">
		<?php
		foreach($videos as $video) {
			if ($video["url"]) {
				$date = date_create($video["date"]);
				$date_formatted = date_format($date, "m/d/Y");
				$caption = $video["description"] ? $video["description"] . "<br>" . $date_formatted : $date_formatted;

				include_file('video.php', array($video["title"], $caption, $video["url"], null, null, false, false, false, true));
			}
		} ?>
	</div>

	<?php include_file('more-btn.php', array('SEE MORE', '/gameplay?character=' . $slug)) ?>
</section>

</div>
<?php } ?>
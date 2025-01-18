<?php
include("db.php");
$characters = include("data/characters.php");
$kameos = include("data/kameos.php");
$versions = include("data/versions.php");

usort($versions, function ($a, $b) {
	return ($a["release_date"] > $b["release_date"]) ? -1 : 1;
});

$slug_character = "";
$slug_kameo = "";
$char_name = "";
$kameo_name = "";
$start_date = "";
$end_date = "";
$videos = null;

if (isset($_GET["character"])) {
	$slug_character = $_GET["character"];
}

if (isset($_GET["kameo"])) {
	$slug_kameo = $_GET["kameo"];
} else if (isset($_GET["cameo"])) {
	$slug_kameo = $_GET["cameo"];
}

if (isset($_GET["start_date"])) {
	$start_date = $_GET["start_date"];

	if ($start_date == "") {
		$start_date_time = DateTime::createFromFormat('Y-m-d', end($versions)["release_date"]);
		$start_date = $start_date_time->format('m-d-Y');
	}
} else {
	$start_date_time = DateTime::createFromFormat('Y-m-d', end($versions)["release_date"]);
	$start_date = $start_date_time->format('m-d-Y');
}

if (isset($_GET["end_date"])) {
	$end_date = $_GET["end_date"];

	if ($end_date == "") {
		$end_date = date('m-d-Y');
	}
} else {
	$end_date = date('m-d-Y');
}

if ($slug_character) {
	foreach ($characters as $key => $character) {
		if ($character["slug"] == $slug_character) {
			$char_name = $key;
		}
	}
}

if ($slug_kameo) {
	foreach ($kameos as $key => $kameo) {
		if ($kameo["slug"] == $slug_kameo) {
			$kameo_name = $key;
		}
	}
}

if ($char_name || $kameo_name) {
	try {
		$query = "Select title, description, url, date FROM gameplay";

		if ($char_name) {
			$query .= " WHERE characters LIKE '%$char_name%'";

			if ($kameo_name) {
				$query .= " AND kameos LIKE '%$kameo_name%'";
			}
		} else if ($kameo_name) {
			$query .= " WHERE kameos LIKE '%$kameo_name%'";
		}

		$start_date_time = DateTime::createFromFormat('m-d-Y', $start_date);
		$end_date_time = DateTime::createFromFormat('m-d-Y', $end_date);
		$start_date_formatted = $start_date_time->format('Y-m-d');
		$end_date_formatted = $end_date_time->format('Y-m-d');

		$query .= " AND `date` BETWEEN '$start_date_formatted' AND '$end_date_formatted' ORDER BY date DESC";

		$stmt = $conn->prepare($query);
		$stmt->execute();
		$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {}
}

$conn = null;
?>

<div class="gameplay-page">
	<?php if (!$char_name && !$kameo_name) { ?>
	<div class="page-title">GAMEPLAY</div>
	<?php } else if ($char_name) { ?>
	<div class="page-title">
		<?php
		echo 'GAMEPLAY - ';
		echo strtoupper($char_name);
		if ($kameo_name) { echo ' / ' . strtoupper($kameo_name); }
		?>
	</div>
	<?php } else if ($kameo_name) { ?>
	<div class="page-title">
		<?php echo 'GAMEPLAY - ' . strtoupper($kameo_name) . ' (KAMEO)'; ?>
	</div>
	<?php } ?>
	<div class="gameplay-page-description">Select a Character and/or Kameo below to view their gameplay.</div>
	<div class="gameplay-select">
		<div class="gameplay-select-header">
			<div>CHARACTER</div>
			<div>KAMEO</div>
			<div>START DATE</div>
			<div>END DATE</div>
		</div>
		<form action="" onsubmit="disableEmpty(this)">
			<div>
				<select name="character">
					<option value="">None</option>
					<?php foreach ($characters as $c) { ?>
						<option <?php if ($c["slug"] == $slug_character) { echo 'selected'; } ?> value="<?php echo $c["slug"] ?>">
							<?php echo $c["name"] ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div>
				<select name="kameo">
					<option value="">None</option>
					<?php foreach ($kameos as $k) { ?>
						<option <?php if ($k["slug"] == $slug_kameo) { echo 'selected'; } ?> value="<?php echo $k["slug"] ?>">
							<?php echo $k["name"] ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div>
				<select name="start_date">
					<?php foreach ($versions as $v) {
						$release_date = date_create($v["release_date"]);
						$release_date_formatted_1 = date_format($release_date, "m-d-Y");
						$release_date_formatted_2 = date_format($release_date, "m/d/Y"); ?>

						<option value="<?php echo $release_date_formatted_1 ?>" <?php if ($release_date_formatted_1 == $start_date) { echo 'selected'; } ?>>
							<?php echo $release_date_formatted_2 ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div>
				<select name="end_date">
					<?php
					$current_date = date_create(date('Y-m-d'));
					$current_date_formatted_1 = date_format($current_date, "m-d-Y");
					$current_date_formatted_2 = date_format($current_date, "m/d/Y"); ?>
					<option value="<?php echo $current_date_formatted_1 ?>" <?php if ($current_date_formatted_1 == $end_date) { echo 'selected'; } ?>>
						Today
					</option>

					<?php foreach ($versions as $v) {
						$release_date = date_create($v["release_date"]);
						$release_date_formatted_1 = date_format($release_date, "m-d-Y");
						$release_date_formatted_2 = date_format($release_date, "m/d/Y"); ?>

						<option value="<?php echo $release_date_formatted_1 ?>" <?php if ($release_date_formatted_1 == $end_date) { echo 'selected'; } ?>>
							<?php echo $release_date_formatted_2 ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<input type="submit" value="Enter">
		</form>
	</div>
	<?php if ($videos) { ?>
	<div class="gameplay">
		<div class="videos">
			<?php
			foreach($videos as $video) {
				if ($video["url"]) {
					$video_date = date_create($video["date"]);
					$date_formatted = date_format($video_date, "m/d/Y");
					$caption = $video["description"] ? $video["description"] . "<br>" . $date_formatted : $date_formatted;

					include_file('video.php', array($video["title"], $caption, $video["url"], null, null, false, false, false, true));
				}
			} ?>
		</div>
	</div>
	<?php } ?>
</div>
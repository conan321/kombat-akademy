<?php
include("db.php");
$characters = include("data/characters.php");
$kameos = include("data/kameos.php");

$slug_character = "";
$slug_kameo = "";
$category = "midscreen";
$char_name = "";
$kameo_name = "";
$combos_results = null;
$combos = null;
$videos = null;
$url_characters = "/images/characters/renders/";
$url_kameos = "/images/kameos/renders/";

if (isset($_GET["character"])) {
	$slug_character = $_GET["character"];
}

if (isset($_GET["kameo"])) {
	$slug_kameo = $_GET["kameo"];
} else if (isset($_GET["cameo"])) {
	$slug_kameo = $_GET["cameo"];
}

if (isset($_GET["category"])) {
	$category = strtolower($_GET["category"]);

	if (($category != "midscreen") && ($category != "corner")) {
		$category = "midscreen";
	}
}

if ($slug_kameo) {
	foreach ($kameos as $key => $kameo) {
		if ($kameo["slug"] == $slug_kameo) {
			$kameo_name = $key;
		}
	}
}

if ($slug_character) {
	foreach ($characters as $key => $character) {
		if ($character["slug"] == $slug_character) {
			$char_name = $key;
		}
	}

	try {
		$query = "Select combo_id, kameo_name, category, subcategory, combo, damage, difficulty, meter, tags, url, notes FROM combos WHERE char_name = '$char_name' AND kameo_name = ''";

		if ($kameo_name) {
			$query = "Select combo_id, kameo_name, category, subcategory, combo, damage, difficulty, meter, kameo_meter, tags, url, notes FROM combos WHERE (char_name = '$char_name' AND kameo_name = '') OR (char_name = '$char_name' AND kameo_name = '$kameo_name')";
		}

		$stmt = $conn->prepare($query);
		$stmt->execute();
		$combos_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {}
}

if ($combos_results) {
	$midscreen_combos = array_filter($combos_results, function ($arr) {
		return $arr["category"] == "Midscreen";
	});

	$corner_combos = array_filter($combos_results, function ($arr) {
		return $arr["category"] == "Corner";
	});

	$combos = [$midscreen_combos, $corner_combos];

	$videos = [];
	foreach ($combos_results as $combo) {
		if ($combo["url"]) {
			$obj = new stdClass;
			$obj->url = $combo["url"];
			$obj->combo = '<span class="inputs btn-inputs-l">' . $combo["combo"] . '</span>';

			array_push($videos, $obj);
		}
	}
}

$conn = null;
?>

<div class="combos-page">
	<div class="overlay hidden">
		<div class="combos-video-wrapper">
			<div class="combos-video">
				<iframe></iframe>
			</div>
			<div class="combos-video-combo"></div>
		</div>
	</div>
	<?php if (!$char_name) { ?>
	<div class="page-title">COMBOS</div>
	<?php } else { ?>
	<div class="page-title">
		<?php
		echo 'COMBOS - ';
		echo strtoupper($char_name);
		if ($kameo_name) { echo ' / ' . strtoupper($kameo_name); }
		?>
	</div>
	<?php } ?>



	<?php // NOTE: TEMPORARY UNTIL ALL COMBOS HAVE BEEN ADDED
	$corner_combo_count = 0;
	$kameo_combo_count = 0;
	if ($combos) {
	for ($i = 0; $i < 2; $i++) {
		foreach ($combos[$i] as $combo) {
			if ($i == 1) { $corner_combo_count++; }
			if ($combo["kameo_name"]) { $kameo_combo_count++; }
		}
	}
	}
	if ($corner_combo_count <= 5 || ($kameo_combo_count <= 5 && $kameo_name)) {
		$missing = "";
		if ($corner_combo_count <= 5) { $missing = "Corner"; }
		if ($kameo_combo_count <= 5 && $kameo_name) { $missing = "Kameo"; }
		if ($corner_combo_count <= 5 && $kameo_combo_count <= 5 && $kameo_name) { $missing = "Corner/Kameo"; }
		?>
		<div class="combos-page-description" style="background: rgb(64 16 16); color: #fff; width: 75%; border-radius: 8px; margin: 16px auto; font-weight: 200; padding: 16px;">
			This character is missing <?php echo $missing; ?> combos. Submit combos to <a href="mailto:kombatakademy@gmail.com?subject=Combo Submission">kombatakademy@gmail.com</a>.
		</div>
	<?php } else { ?>
	<div class="combos-page-description">
		If you'd like to help with this project, submit combos to <a href="mailto:kombatakademy@gmail.com?subject=Combo Submission">kombatakademy@gmail.com</a>.
	</div>
	<?php } ?>



	<?php if ($char_name) { ?>
	<div class="combos-page-header">
		<div class="combos-page-header-left">
			<div class="combos-playlist">
				<iframe></iframe>
			</div>
		</div>
		<div class="combos-page-header-right">
			<?php if ($kameo_name) { ?>
			<img class="kameo-img" title="<?php echo $kameo_name ?>" alt="" src="<?php echo $url_kameos . $slug_kameo ?>.png" />
			<?php } ?>
			<img class="character-img" title="<?php echo $char_name ?>" alt="" src="<?php echo $url_characters . $slug_character ?>.png" />
		</div>
	</div>
	<?php } ?>
	<div class="combos-select">
		<div class="combos-select-header">
			<div>CHARACTER</div>
			<div>KAMEO</div>
		</div>
		<form action="" onsubmit="disableEmpty(this)">
			<div>
				<select name="character">
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
			<input type="submit" value="Enter">
		</form>
	</div>
	<?php if ($combos) { ?>
	<div class="combos-wrapper">
	<div class="combos">
		<div class="combos-header">
			<div class="combos-header-btns">
				<div class="combos-header-toggle-filters-btn">Show Filters</div>
				<div class="combos-header-toggle-groups-btn">Collapse All</div>
			</div>
			<div class="combos-filters hidden">
				<div class="combos-filters-label">FILTERS:</div>
				<?php if ($kameo_name) { ?>
					<div class="combos-filters-kameo">
						<div class="combo-kameo">KAMEO</div>
					</div>
				<?php } ?>
				<div class="combos-filters-difficulties">
					<div class="combo-difficulty combo-difficulty-easy">EASY</div>
					<div class="combo-difficulty combo-difficulty-medium">MEDIUM</div>
					<div class="combo-difficulty combo-difficulty-hard">HARD</div>
				</div>
				<div class="combos-filters-tags">
					<div class="combo-tag combo-tag-buff">Buff</div>
					<div class="combo-tag combo-tag-restand">Restand</div>
					<div class="combo-tag combo-tag-setup">Setup</div>
					<div class="combo-tag combo-tag-sideswitch">Sideswitch</div>
					<div class="combo-tag combo-tag-unbreakable">Unbreakable</div>
					<div class="combo-tag combo-tag-fatal-blow">Fatal Blow</div>
				</div>
			</div>
			<nav>
				<div class="<?php if ($category == "midscreen") { echo 'active'; } ?>">MIDSCREEN</div>
				<div class="<?php if ($category == "corner") { echo 'active'; } ?>">CORNER</div>
			</nav>
		</div>
		<div class="combos-body">
			<?php
			for ($i = 0; $i < 2; $i++) {
				$category_class = $i == 0 ? "midscreen" : "corner";

				// Hide other categories
				if (($i != 0 && $category == "midscreen") || ($i != 1 && $category == "corner")) {
					$category_class .= " hidden";
				} ?>
				<div class="<?php echo $category_class ?>">
					<div class="combos-list">
						<?php
						$subcategory = "";

						$j = 0;
						foreach ($combos[$i] as $combo) {
							if ($combo["subcategory"] != $subcategory) {
								$subcategory = $combo["subcategory"];

								// Close off previous group
								if ($j > 0) { ?>
									</div></div>
								<?php } ?>

								<div class="combos-list-group">
									<div class="combos-list-group-header">
										<div class="combos-list-subcategory">
											<span class="inputs"><?php echo $subcategory ?></span>
										</div>
										<div class="combos-list-group-toggle-icon">
											<i class="fa-solid fa-minus"></i>
										</div>
									</div>
									<div class="combos-list-group-body">
							<?php } ?>
							<div class="combos-list-combo">
								<div class="combos-list-combo-header">
									<div class="combos-list-combo-header-left">
										<div class="combos-list-combo-combo">
											<span class="inputs"><?php echo $combo["combo"] ?></span>
										</div>
									</div>
									<div class="combos-list-combo-header-right">
										<div class="combos-list-combo-difficulty">
											<?php
											$difficulty_class = '';
											if ($combo["difficulty"] == "Easy") { $difficulty_class = ' combo-difficulty-easy'; }
											else if ($combo["difficulty"] == "Medium") { $difficulty_class = ' combo-difficulty-medium'; }
											else if ($combo["difficulty"] == "Hard") { $difficulty_class = ' combo-difficulty-hard'; } ?>
											<div class="combo-difficulty<?php echo $difficulty_class; ?>"><?php echo strtoupper($combo["difficulty"]) ?></div>
										</div>
										<div class="combos-list-combo-url">
											<?php if ($combo["url"]) { ?>
											<i class="combo-play-btn fa-solid fa-circle-play"></i>
											<?php } ?>
										</div>
										<div class="combos-list-combo-damage"><?php echo $combo["damage"] ?></div>
									</div>
								</div>
								<?php if ($combo["kameo_name"] || $combo["tags"] || $combo["meter"] || $combo["notes"]) { ?>
								<div class="combos-list-combo-footer">
									<?php
									if ($combo["notes"]) { ?>
									<div class="combos-list-combo-notes"><?php echo $combo["notes"] ?></div>
									<?php } ?>
									<div class="combos-list-combo-footer-right">
										<?php
										if ($combo["meter"] || $combo["kameo_meter"]) { ?>
										<div class="combos-list-combo-meter">
											<?php
											if ($combo["meter"]) {
												if ($combo["meter"] > 0) {
													echo $combo["meter"];
													if ($combo["meter"] == 1) {
														echo ' Bar';
													} else {
														echo ' Bars';
													}
												}

												if ($combo["kameo_meter"] && $combo["meter"] > 0 && $combo["kameo_meter"] > 0) {
													echo ' | ';
												}
											}

											if ($combo["kameo_meter"] && $combo["kameo_meter"] > 0) {
												echo $combo["kameo_meter"];
												if ($combo["kameo_meter"] == 1) {
													echo ' Kameo';
												} else {
													echo ' Kameos';
												}
											}
											?>
										</div>
										<?php }
										if ($combo["kameo_name"]) { ?>
										<div class="combos-list-combo-kameo">
											<div class="combo-kameo">Kameo</div>
										</div>
										<?php }
										if ($combo["tags"]) { ?>
										<div class="combos-list-combo-tags">
										<?php
											$combo_tags = explode(', ', $combo["tags"]);
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
							<?php
							// If last combo, close off group
							if ($j == count($combos[$i]) - 1) { ?>
								</div></div>
							<?php }
							$j++;
						} ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	</div>
	<?php } ?>
	<div class="terms-of-service-banner">
		Please <a href="/terms-of-service/">read this</a> regarding the Terms of Service and usage of information on this site.
	</div>
</div>

<script>
let videos;

<?php if ($videos) { ?>
	videos = <?php echo json_encode($videos); ?>;
<?php } ?>
</script>
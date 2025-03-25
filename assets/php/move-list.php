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
$category = "basic-attacks";
$date = date('Y_m_d', strtotime($versions[0]["release_date"]));

$advanced = false;
$move_param = "";
$block_type = "";
$data_field_param = "";
$data_field = "";
$operator = "";
$data_value = "";
$property = "";
$sort = "";
$order = "";
$fblock_block = false;
$kombo_attacks = "";
$aerial_attacks = "";
$filter_all = false;

$char_name = "";
$kameo_name = "";
$move_list_results = null;
$move_list = null;
$basic_attacks = null;
$special_moves = null;
$finishers = null;
$kameo_moves = null;

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

	if (($category != "basic-attacks") &&
		($category != "special-moves") &&
		($category != "finishers") &&
		($category != "kameo-moves")) {
		$category = "basic-attacks";
	}
}

if (isset($_GET["date"])) {
	$date = str_replace('-', '_', $_GET["date"]);

	if ($date == "") {
		$date = str_replace('-', '_', $versions[0]["release_date"]);
	}
}

// Advanced

if (isset($_GET["move"]) || isset($_GET["block-type"]) || isset($_GET["data-field"]) || isset($_GET["operator"]) || isset($_GET["data-value"])
	|| isset($_GET["property"]) || isset($_GET["fblock-block"]) || isset($_GET["kombo-attacks"]) || isset($_GET["aerial-attacks"])
	|| isset($_GET["sort"]) || isset($_GET["order"]) || isset($_GET["filter-all"])) {
	$advanced = true;
}

if (isset($_GET["move"])) {
	$move_param = $_GET["move"];
}

if (isset($_GET["block-type"])) {
	$block_type = $_GET["block-type"];
}

if (isset($_GET["data-field"])) {
	$data_field_param = $_GET["data-field"];

	if ($data_field_param == "hit-damage") $data_field = "hit_damage";
	else if ($data_field_param == "block-damage") $data_field = "block_damage";
	else if ($data_field_param == "fblock-damage") $data_field = "fblock_damage";
	else if ($data_field_param == "start-up") $data_field = "startup";
	else if ($data_field_param == "active") $data_field = "active";
	else if ($data_field_param == "recovery") $data_field = "recovery";
	else if ($data_field_param == "cancel") $data_field = "cancel";
	else if ($data_field_param == "hit-advantage") $data_field = "hit_advantage";
	else if ($data_field_param == "block-advantage") $data_field = "block_advantage";
	else if ($data_field_param == "fblock-advantage") $data_field = "fblock_advantage";
}

if (isset($_GET["operator"])) {
	$operator = $_GET["operator"];
}

if (isset($_GET["data-value"])) {
	$data_value = $_GET["data-value"];
}

if (isset($_GET["property"])) {
	$property = $_GET["property"];
}

if (isset($_GET["fblock-block"])) {
	if ($_GET["fblock-block"] == true) {
		$fblock_block = true;
	}
}

if (isset($_GET["kombo-attacks"])) {
	if ($_GET["kombo-attacks"] == "hide") {
		$kombo_attacks = "hide";
	}
}

if (isset($_GET["aerial-attacks"])) {
	if ($_GET["aerial-attacks"] == "hide") {
		$aerial_attacks = "hide";
	}
}

if (isset($_GET["sort"])) {
	$sort = $_GET["sort"];
}

if (isset($_GET["order"])) {
	$order = $_GET["order"];
}

if (isset($_GET["filter-all"])) {
	if ($_GET["filter-all"] == true) {
		$filter_all = true;
	}
}

if ($slug_character || $filter_all) {
	try {
		$query = create_query("character", $slug_character, $slug_kameo, $characters, $kameos, $date, $char_name, $kameo_name,
			$filter_all, $move_param, $block_type, $data_field_param, $data_field, $operator, $data_value,
			$property, $fblock_block, $kombo_attacks, $aerial_attacks, $sort, $order);

		$stmt = $conn->prepare($query);
		$stmt->execute();
		$move_list_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {}
}

if ($slug_kameo || $filter_all) {
	try {
		$query = create_query("kameo", $slug_character, $slug_kameo, $characters, $kameos, $date, $char_name, $kameo_name,
			$filter_all, $move_param, $block_type, $data_field_param, $data_field, $operator, $data_value,
			$property, $fblock_block, $kombo_attacks, $aerial_attacks, $sort, $order);

		$stmt = $conn->prepare($query);
		$stmt->execute();
		$kameo_moves = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {}
}

if ($move_list_results) {
	$basic_attacks = array_filter($move_list_results, function ($arr) {
		return $arr["category"] == "Basic Attacks";
	});

	$special_moves = array_filter($move_list_results, function ($arr) {
		return $arr["category"] == "Special Moves";
	});

	$finishers = array_filter($move_list_results, function ($arr) {
		return $arr["category"] == "Finishers";
	});

	$move_list = [$basic_attacks, $special_moves, $finishers];
}

if ($kameo_moves) {
	if ($move_list) {
		array_push($move_list, $kameo_moves);
	} else {
		$move_list = [[], [], [], $kameo_moves];
	}
}

if ($move_list_results == null && $kameo_moves) {
	$category = "kameo-moves";
}

function create_query($type, $slug_character, $slug_kameo, $characters, $kameos, $date, &$char_name, &$kameo_name,
	$filter_all, $move_param, $block_type, $data_field_param, $data_field, $operator, $data_value,
	$property, $fblock_block, $kombo_attacks, $aerial_attacks, $sort, $order) {

	$query = "";

	if ($type == "character") {
		$table = "move_list_" . $date;

		if ($slug_character) {
			foreach ($characters as $key => $character) {
				if ($character["slug"] == $slug_character) {
					$char_name = $key;
				}
			}
		}

		$query = "Select char_name, category, subcategory, parent_command, move_name, command, hit_damage, block_damage, fblock_damage, block_type, startup, active, recovery, cancel, hit_advantage, block_advantage, fblock_advantage, properties, notes FROM $table";
	}
	else if ($type == "kameo") {
		$table = "move_list_kameo_" . $date;

		if ($slug_kameo) {
			foreach ($kameos as $key => $kameo) {
				if ($kameo["slug"] == $slug_kameo) {
					$kameo_name = $key;
				}
			}
		}

		$query = "Select kameo_name, category, subcategory, parent_command, move_name, command, hit_damage, block_damage, fblock_damage, block_type, startup, active, recovery, cancel, hit_advantage, block_advantage, fblock_advantage, properties, notes FROM $table";
	}

	if ($filter_all) {
		if ($type == "character") {
			$query .= " WHERE char_name <> ''";
		} else if ($type == "kameo") {
			$query .= " WHERE kameo_name <> ''";
		}
	} else {
		if ($type == "character") {
			$query .= " WHERE char_name = '$char_name'";
		} else if ($type == "kameo") {
			$query .= " WHERE kameo_name = '$kameo_name'";
		}
	}

	if ($move_param && $move_param != "all") {
		$command = strtoupper($move_param);

		if ($move_param != "f+throw" && $move_param != "fatal-blow") {
			$query .= " AND category = 'Basic Attacks'";
		}

		if ($move_param == "u+f+3") {
			$command = "U+F+3 or U+F+4";
		} else if ($move_param == "f+throw") {
			$command = "F+THROW or F+1+3";
		} else if ($move_param == "b+throw") {
			$command = "THROW or 1+3";
		} else if ($move_param == "fatal-blow") {
			$command = "SS+EX";
		}
		
		$query .= " AND command = '$command'";
	}

	if ($block_type) {
		$block_type_uc = ucfirst($block_type);
		$query .= " AND block_type = '$block_type_uc'";
	}

	if ($data_field_param && $data_field && $operator && $data_value != "") {
		$query .= " AND CAST($data_field AS DECIMAL(10,5))";

		if ($operator == "lt") {
			$query .= " < ";
		} else if ($operator == "lte") {
			$query .= " <= ";
		} else if ($operator == "eq") {
			$query .= " = ";
		} else if ($operator == "gte") {
			$query .= " >= ";
		} else if ($operator == "gt") {
			$query .= " > ";
		}

		$query .= " '$data_value' AND $data_field <> ''";
	}

	if ($property) {
		$property_value = $property;

		if ($property == "armor") $property_value = "Armor";
		else if ($property == "invisibility") $property_value = "Invisibility";
		else if ($property == "invulnerability") $property_value = "Invulnerability";
		else if ($property == "parry") $property_value = "Parry";
		else if ($property == "projectile-break") $property_value = "Projectile Break";
		else if ($property == "projectile-immunity") $property_value = "Projectile Immunity";
		else if ($property == "projectile-reflect") $property_Value = "Projectile Reflect";
		else if ($property == "unbreakable") $property_value = "Unbreakable";

		$query .= " AND properties LIKE '%$property_value%'";
	}

	if ($fblock_block) {
		$query .= " AND CAST(fblock_advantage AS DECIMAL(10,5)) < CAST(block_advantage AS DECIMAL(10,5)) AND fblock_advantage <> '' AND block_advantage <> ''";
	}

	if ($kombo_attacks == "hide") {
		$query .= " AND NOT (command LIKE '%,%' AND category = 'Basic Attacks')";
	}

	if ($aerial_attacks == "hide") {
		$query .= " AND NOT (command LIKE '%U+F+1%' OR command LIKE '%U+F+2%' OR command LIKE '%U+F+3%' OR command LIKE '%U+F+4%' AND category = 'Basic Attacks')";
	}

	if ($sort && $order) {
		if ($sort == "character") {
			if ($type == "character") {
				$query .= " ORDER BY char_name $order";
			} else if ($type == "kameo") {
				$query .= " ORDER BY kameo_name $order";
			}
		} else if ($sort == "block-type") {
			if ($type == "character") {
				$query .= " ORDER BY block_type $order, char_name ASC";
			} else if ($type == "kameo") {
				$query .= " ORDER BY block_type $order, kameo_name ASC";
			}
		} else {
			$sort_field = "";

			if ($sort == "hit-damage") $sort_field = "hit_damage";
			else if ($sort == "block-damage") $sort_field = "block_damage";
			else if ($sort == "fblock-damage") $sort_field = "fblock_damage";
			else if ($sort == "start-up") $sort_field = "startup";
			else if ($sort == "active") $sort_field = "active";
			else if ($sort == "recovery") $sort_field = "recovery";
			else if ($sort == "cancel") $sort_field = "cancel";
			else if ($sort == "hit-advantage") $sort_field = "hit_advantage";
			else if ($sort == "block-advantage") $sort_field = "block_advantage";
			else if ($sort == "fblock-advantage") $sort_field = "fblock_advantage";

			if ($type == "character") {
				$query .= " ORDER BY CAST($sort_field AS DECIMAL(10,5)) $order, char_name ASC";
			} else if ($type == "kameo") {
				$query .= " ORDER BY CAST($sort_field AS DECIMAL(10,5)) $order, kameo_name ASC";
			}
		}
	}

	return $query;
}

$conn = null;
?>

<div class="move-list-page">
	<div class="overlay hidden"></div>
	<?php if (!$move_list) { ?>
	<div class="page-title">MOVE LIST</div>
	<div class="move-list-page-description">Select a Character and/or Kameo below to view their move list.</div>
	<?php } else { ?>
	<div class="page-title">
		<?php
		if (!$filter_all) {
			echo 'MOVE LIST - ';

			if ($char_name && $kameo_name) {
				echo strtoupper($char_name) . ' / ' . strtoupper($kameo_name);
			} else if ($char_name) {
				echo strtoupper($char_name);
			} else if ($kameo_name) {
				echo strtoupper($kameo_name) . ' (KAMEO)';
			}
		} else {
			echo 'MOVE LIST';
		}
		?>
	</div>
	<?php } ?>
	<div class="move-list-select">
		<div class="move-list-select-header">
			<div>CHARACTER</div>
			<div>KAMEO</div>
			<div>DATE</div>
		</div>
		<form action="" onsubmit="disableEmpty(this)">
			<div>
				<div>
					<select name="character">
						<option value="">None</option>
						<?php foreach ($characters as $c) { ?>
							<option value="<?php echo $c["slug"] ?>" <?php if ($c["slug"] == $slug_character) { echo 'selected'; } ?>>
								<?php echo $c["name"] ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div>
					<select name="kameo">
						<option value="">None</option>
						<?php foreach ($kameos as $k) { ?>
							<option value="<?php echo $k["slug"] ?>" <?php if ($k["slug"] == $slug_kameo) { echo 'selected'; } ?>>
								<?php echo $k["name"] ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div>
					<select name="date">
						<?php foreach ($versions as $v) {
							$release_date = date_create($v["release_date"]);
							$release_date_formatted_1 = date_format($release_date, "Y-m-d");
							$release_date_formatted_2 = date_format($release_date, "Y/m/d"); ?>

							<option value="<?php echo $release_date_formatted_1 ?>" <?php if ($release_date_formatted_1 == str_replace('_', '-', $date)) { echo 'selected'; } ?>>
								<?php echo $release_date_formatted_2 ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<input type="submit" value="Enter" <?php if ($advanced) { echo 'class="hidden"'; } ?>>
			</div>
			<div class="move-list-select-advanced<?php if (!$advanced) { echo ' hidden'; } ?>">
				<div class="move-list-select-advanced-group">
					<div class="move-list-select-advanced-header">
						<div class="move-list-select-advanced-move">MOVE</div>
						<div class="move-list-select-advanced-block-type">BLOCK TYPE</div>
						<div class="move-list-select-advanced-data-field">DATA FIELD</div>
						<div class="move-list-select-advanced-operator">OP</div>
						<div class="move-list-select-advanced-data-value">DATA VALUE</div>
						<div class="move-list-select-advanced-property">PROPERTY</div>
					</div>
					<div class="move-list-select-advanced-body">
						<div class="move-list-select-advanced-move">
							<select name="move" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value="all" <?php if ($move_param == "all") { echo 'selected'; } ?>>All</option>
								<option value="1" <?php if ($move_param == "1") { echo 'selected'; } ?>>Front Punch (1)</option>
								<option value="2" <?php if ($move_param == "2") { echo 'selected'; } ?>>Back Punch (2)</option>
								<option value="3" <?php if ($move_param == "3") { echo 'selected'; } ?>>Front Kick (3)</option>
								<option value="4" <?php if ($move_param == "4") { echo 'selected'; } ?>>Back Kick (4)</option>
								<option value="d+1" <?php if ($move_param == "d+1") { echo 'selected'; } ?>>Down + Front Punch (D+1)</option>
								<option value="d+2" <?php if ($move_param == "d+2") { echo 'selected'; } ?>>Down + Back Punch (D+2)</option>
								<option value="d+3" <?php if ($move_param == "d+3") { echo 'selected'; } ?>>Down + Front Kick (D+3)</option>
								<option value="d+4" <?php if ($move_param == "d+4") { echo 'selected'; } ?>>Down + Back Kick (D+4)</option>
								<option value="b+4" <?php if ($move_param == "b+4") { echo 'selected'; } ?>>Back + Back Kick (B+4)</option>
								<option value="u+f+1" <?php if ($move_param == "u+f+1") { echo 'selected'; } ?>>Jump + Front Punch (U+F+1)</option>
								<option value="u+f+2" <?php if ($move_param == "u+f+2") { echo 'selected'; } ?>>Jump + Back Punch (U+F+2)</option>
								<option value="u+f+3" <?php if ($move_param == "u+f+3") { echo 'selected'; } ?>>Jump + Kick (U+F+3)</option>
								<option value="f+throw" <?php if ($move_param == "f+throw") { echo 'selected'; } ?>>Forward Throw (F+1+3)</option>
								<option value="b+throw" <?php if ($move_param == "b+throw") { echo 'selected'; } ?>>Back Throw (B+1+3)</option>
								<option value="fatal-blow" <?php if ($move_param == "fatal-blow") { echo 'selected'; } ?>>Fatal Blow (SS+EX)</option>
							</select>
						</div>
						<div class="move-list-select-advanced-block-type">
							<select name="block-type" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value=""></option>
								<option value="high" <?php if ($block_type == "high") { echo 'selected'; } ?>>High</option>
								<option value="mid" <?php if ($block_type == "mid") { echo 'selected'; } ?>>Mid</option>
								<option value="low" <?php if ($block_type == "low") { echo 'selected'; } ?>>Low</option>
								<option value="overhead" <?php if ($block_type == "overhead") { echo 'selected'; } ?>>Overhead</option>
								<option value="unblockable" <?php if ($block_type == "unblockable") { echo 'selected'; } ?>>Unblockable</option>
								<option value="throw" <?php if ($block_type == "throw") { echo 'selected'; } ?>>Throw</option>
							</select>
						</div>
						<div class="move-list-select-advanced-data-field">
							<select name="data-field" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value=""></option>
								<option value="hit-damage" <?php if ($data_field_param == "hit-damage") { echo 'selected'; } ?>>Hit Damage</option>
								<option value="block-damage" <?php if ($data_field_param == "block-damage") { echo 'selected'; } ?>>Block Damage</option>
								<option value="fblock-damage" <?php if ($data_field_param == "fblock-damage") { echo 'selected'; } ?>>F/Block Damage</option>
								<option value="start-up" <?php if ($data_field_param == "start-up") { echo 'selected'; } ?>>Start-up</option>
								<option value="active" <?php if ($data_field_param == "active") { echo 'selected'; } ?>>Active</option>
								<option value="recovery" <?php if ($data_field_param == "recovery") { echo 'selected'; } ?>>Recovery</option>
								<option value="cancel" <?php if ($data_field_param == "cancel") { echo 'selected'; } ?>>Cancel</option>
								<option value="hit-advantage" <?php if ($data_field_param == "hit-advantage") { echo 'selected'; } ?>>Hit Advantage</option>
								<option value="block-advantage" <?php if ($data_field_param == "block-advantage") { echo 'selected'; } ?>>Block Advantage</option>
								<option value="fblock-advantage" <?php if ($data_field_param == "fblock-advantage") { echo 'selected'; } ?>>F/Block Advantage</option>
							</select>
						</div>
						<div class="move-list-select-advanced-operator">
							<select name="operator" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value=""></option>
								<option value="lt" <?php if ($operator == "lt") { echo 'selected'; } ?>><</option>
								<option value="lte" <?php if ($operator == "lte") { echo 'selected'; } ?>><=</option>
								<option value="eq" <?php if ($operator == "eq") { echo 'selected'; } ?>>=</option>
								<option value="gte" <?php if ($operator == "gte") { echo 'selected'; } ?>>>=</option>
								<option value="gt" <?php if ($operator == "gt") { echo 'selected'; } ?>>></option>
							</select>
						</div>
						<div class="move-list-select-advanced-data-value">
							<input type="text" name="data-value" value="<?php echo $data_value; ?>" <?php if (!$advanced) { echo 'disabled'; } ?> pattern="^-?[0-9]\d*(\.\d+)?$" title="Number" maxlength="10"></input>
						</div>
						<div class="move-list-select-advanced-property">
							<select name="property" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value=""></option>
								<option value="armor" <?php if ($property == "armor") { echo 'selected'; } ?>>Armor</option>
								<option value="invisibility" <?php if ($property == "invisibility") { echo 'selected'; } ?>>Invisibility</option>
								<option value="invulnerability" <?php if ($property == "invulnerability") { echo 'selected'; } ?>>Invulnerability</option>
								<option value="parry" <?php if ($property == "parry") { echo 'selected'; } ?>>Parry</option>
								<option value="projectile-break" <?php if ($property == "projectile-break") { echo 'selected'; } ?>>Projectile Break</option>
								<option value="projectile-immunity" <?php if ($property == "projectile-immunity") { echo 'selected'; } ?>>Projectile Immunity</option>
								<option value="projectile-reflect" <?php if ($property == "projectile-reflect") { echo 'selected'; } ?>>Projectile Reflect</option>
								<option value="unbreakable" <?php if ($property == "unbreakable") { echo 'selected'; } ?>>Unbreakable</option>
							</select>
						</div>
					</div>
				</div>
				<div class="move-list-select-advanced-group">
					<div class="move-list-select-advanced-header">
						<div class="move-list-select-advanced-fblock-block">F/BLOCK < BLOCK</div>
						<div class="move-list-select-advanced-kombo-attacks">KOMBO ATTACKS</div>
						<div class="move-list-select-advanced-aerial-attacks">AERIAL ATTACKS</div>
						<div class="move-list-select-advanced-sort">SORT</div>
						<div class="move-list-select-advanced-order">ORDER</div>
						<div class="move-list-select-advanced-filter-all">ALL CHARACTERS</div>
					</div>
					<div class="move-list-select-advanced-body">
						<div class="move-list-select-advanced-fblock-block">
							<select name="fblock-block" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value="true" <?php if ($fblock_block) { echo 'selected'; } ?>>Yes</option>
								<option value="" <?php if (!$fblock_block) { echo 'selected'; } ?>>No</option>
							</select>
						</div>
						<div class="move-list-select-advanced-kombo-attacks">
							<select name="kombo-attacks" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value="" <?php if (!$kombo_attacks) { echo 'selected'; } ?>>Show</option>
								<option value="hide" <?php if ($kombo_attacks == "hide") { echo 'selected'; } ?>>Hide</option>
							</select>
						</div>
						<div class="move-list-select-advanced-aerial-attacks">
							<select name="aerial-attacks" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value="" <?php if (!$aerial_attacks) { echo 'selected'; } ?>>Show</option>
								<option value="hide" <?php if ($aerial_attacks == "hide") { echo 'selected'; } ?>>Hide</option>
							</select>
						</div>
						<div class="move-list-select-advanced-sort">
							<select name="sort" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value=""></option>
								<option value="character" <?php if ($sort == "character") { echo 'selected'; } ?>>Character/Kameo</option>
								<option value="block-type" <?php if ($sort == "block-type") { echo 'selected'; } ?>>Block Type</option>
								<option value="hit-damage" <?php if ($sort == "hit-damage") { echo 'selected'; } ?>>Hit Damage</option>
								<option value="block-damage" <?php if ($sort == "block-damage") { echo 'selected'; } ?>>Block Damage</option>
								<option value="fblock-damage" <?php if ($sort == "fblock-damage") { echo 'selected'; } ?>>F/Block Damage</option>
								<option value="start-up" <?php if ($sort == "start-up") { echo 'selected'; } ?>>Start-up</option>
								<option value="active" <?php if ($sort == "active") { echo 'selected'; } ?>>Active</option>
								<option value="recovery" <?php if ($sort == "recovery") { echo 'selected'; } ?>>Recovery</option>
								<option value="cancel" <?php if ($sort == "cancel") { echo 'selected'; } ?>>Cancel</option>
								<option value="hit-advantage" <?php if ($sort == "hit-advantage") { echo 'selected'; } ?>>Hit Advantage</option>
								<option value="block-advantage" <?php if ($sort == "block-advantage") { echo 'selected'; } ?>>Block Advantage</option>
								<option value="fblock-advantage" <?php if ($sort == "fblock-advantage") { echo 'selected'; } ?>>F/Block Advantage</option>
							</select>
						</div>
						<div class="move-list-select-advanced-order">
							<select name="order" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value=""></option>
								<option value="asc" <?php if ($order == "asc") { echo 'selected'; } ?>>ASC</option>
								<option value="desc" <?php if ($order == "desc") { echo 'selected'; } ?>>DESC</option>
							</select>
						</div>
						<div class="move-list-select-advanced-filter-all">
							<select name="filter-all" <?php if (!$advanced) { echo 'disabled'; } ?>>
								<option value="true" <?php if ($filter_all) { echo 'selected'; } ?>>Yes</option>
								<option value="" <?php if (!$filter_all) { echo 'selected'; } ?>>No</option>
							</select>
						</div>
						<input type="submit" value="Enter">
					</div>
				</div>
			</div>
			<div class="move-list-select-advanced-btn">
				<?php echo $advanced ? 'Hide Advanced' : 'Show Advanced'; ?>
			</div>
		</form>
	</div>
	<?php if ($move_list) { ?>
	<div class="move-list-select-view">
		<span>View:</span>
		<span class="move-list-view-btn active">Default</span>
		<span class="move-list-view-btn">Table</span>
	</div>
	<div class="move-list-wrapper">
	<div class="move-list<?php if ($filter_all) { echo ' filter-all'; } ?>">
		<div class="move-list-header">
			<div class="move-list-header-left">
				<nav>
					<div class="<?php if ($category == "basic-attacks") { echo 'active'; } ?>"><span>BASIC ATTACKS</span></div>
					<div class="<?php if ($category == "special-moves") { echo 'active'; } ?>"><span>SPECIAL MOVES</span></div>
					<div class="<?php if ($category == "finishers") { echo 'active'; } ?>"><span>FINISHERS</span></div>
					<div class="<?php if ($category == "kameo-moves") { echo 'active'; } ?>"><span>KAMEO MOVES</span></div>
				</nav>
				<div class="move-list-col-header">
					<?php if ($filter_all) { ?>
					<div class="move-list-col-header-character<?php if ($category == "kameo-moves") { echo ' hidden'; } ?>">CHARACTER</div>
					<div class="move-list-col-header-kameo<?php if ($category != "kameo-moves") { echo ' hidden'; } ?>">KAMEO</div>
					<?php } ?>
					<div class="move-list-col-header-move-name">MOVE NAME</div>
					<div class="move-list-col-header-kommand">KOMMAND</div>
					<?php
					if ($filter_all && $data_field_param && $data_field && $operator && $data_value != "") {
						$data_title = "";

						if ($data_field_param == "hit-damage") $data_title = "H. DMG";
						else if ($data_field_param == "block-damage") $data_title = "B. DMG";
						else if ($data_field_param == "fblock-damage") $data_title = "FBL DMG";
						else if ($data_field_param == "start-up") $data_title = "STA";
						else if ($data_field_param == "active") $data_title = "ACT";
						else if ($data_field_param == "recovery") $data_title = "REC";
						else if ($data_field_param == "cancel") $data_title = "CAN";
						else if ($data_field_param == "hit-advantage") $data_title = "HIT";
						else if ($data_field_param == "block-advantage") $data_title = "BLO";
						else if ($data_field_param == "fblock-advantage") $data_title = "FBL";
					?>
					<div class="move-list-col-header-data"><?php echo strtoupper($data_title); ?></div>
					<?php } ?>
				</div>
			</div>
			<div class="move-list-header-right">
				<div class="move-list-character-name">
					<?php if ($move_list_results && $char_name && !$filter_all) { ?>
						<div class="move-list-character-name-top"><?php echo strtoupper($char_name) ?></div>
					<?php } if ($kameo_moves && $kameo_name && !$filter_all) { ?>
						<div class="move-list-character-name-bottom"><?php echo strtoupper($kameo_name) ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="move-list-body">
			<?php
			$category_classes = ["basic-attacks", "special-moves", "finishers", "kameo-moves"];
			for ($i = 0; $i < 4; $i++) {
				$category_class = $category_classes[$i];

				// Hide other categories
				if (($i != 0 && $category == "basic-attacks") ||
					($i != 1 && $category == "special-moves") ||
					($i != 2 && $category == "finishers") ||
					($i != 3 && $category == "kameo-moves")) {
						$category_class .= " hidden";
				} ?>
				<div class="<?php echo $category_class ?>">
					<div class="move-list-moves">
						<?php
							if (($move_list_results && $kameo_moves == null && $i != 3) || // Character & No Kameo
								($kameo_moves && $move_list_results == null && $i == 3) || // Kameo & No Character
								($move_list_results && $kameo_moves)) { // Character & Kameo

								$subcategory = "";

								foreach ($move_list[$i] as $move) {
									if (!$filter_all) {
										if ($move["subcategory"] != $subcategory) {
											$subcategory = $move["subcategory"]; ?>
											<div class="move-list-subcategory"><?php echo strtoupper($subcategory) ?></div>
										<?php }
									}

									$child_class = !$filter_all && $move["parent_command"] != "" ? " move-list-move-child" : "";
									?>
									<div class="move-list-move<?php echo $child_class ?>">
										<div>
											<?php
											if ($filter_all) {
												if ($i != 3) { ?>
													<div class="move-list-move-character-name"><?php echo $move["char_name"] ?></div>
												<?php } else { ?>
													<div class="move-list-move-kameo-name"><?php echo $move["kameo_name"] ?></div>
											<?php }
											} ?>
											<div class="move-list-move-name"><?php echo $move["move_name"] ?></div>
											<div class="move-list-move-command">
												<span class="inputs"><?php echo $move["command"] ?></span>
											</div>
											<?php if ($filter_all && $data_field_param && $data_field && $operator && $data_value != "") { ?>
											<div class="move-list-move-data"><?php echo $move[$data_field] ?></div>
											<?php } ?>
										</div>
									</div>
								<?php }
							}
						?>
					</div>
					<div class="move-list-data">
						<div>
							<div class="move-list-data-header">MOVE</div>
							<div class="move-list-data-move-data">
								<div class="move-list-data-move">
									<div id="move-name" class="move-list-data-move-name">N/A</div>
									<div id="command" class="move-list-data-command"></div>
								</div>
							</div>
							<div class="move-list-data-header">MOVE DATA</div>
							<div class="move-list-data-move-data">
								<div class="move-list-data-row">
									<div class="move-list-data-col">
										<div class="move-list-data-title">HIT DAMAGE</div>
										<div id="hit-damage" class="move-list-data-value">N/A</div>
									</div>
									<div class="move-list-data-col">
										<div class="move-list-data-title">BLOCK DAMAGE</div>
										<div id="block-damage" class="move-list-data-value">N/A</div>
									</div>
								</div>
								<div class="move-list-data-row">
									<div class="move-list-data-col">
										<div class="move-list-data-title">BLOCK TYPE</div>
										<div id="block-type" class="move-list-data-value">N/A</div>
									</div>
									<div class="move-list-data-col">
										<div class="move-list-data-title">F/BLOCK DAMAGE</div>
										<div id="fblock-damage" class="move-list-data-value">N/A</div>
									</div>
								</div>
							</div>
							<div class="move-list-data-header">FRAME DATA</div>
							<div class="move-list-data-frame-data">
								<div class="move-list-data-row">
									<div class="move-list-data-col">
										<div class="move-list-data-title">START-UP</div>
										<div id="start-up" class="move-list-data-value">N/A</div>
									</div>
									<div class="move-list-data-col">
										<div class="move-list-data-title">HIT ADVANTAGE</div>
										<div id="hit-advantage" class="move-list-data-value">N/A</div>
									</div>
								</div>
								<div class="move-list-data-row">
									<div class="move-list-data-col">
										<div class="move-list-data-title">ACTIVE</div>
										<div id="active" class="move-list-data-value">N/A</div>
									</div>
									<div class="move-list-data-col">
										<div class="move-list-data-title">BLOCK ADVANTAGE</div>
										<div id="block-advantage" class="move-list-data-value">N/A</div>
									</div>
								</div>
								<div class="move-list-data-row">
									<div class="move-list-data-col">
										<div class="move-list-data-title">RECOVERY</div>
										<div id="recovery" class="move-list-data-value">N/A</div>
									</div>
									<div class="move-list-data-col">
										<div class="move-list-data-title">F/BLOCK ADVANTAGE</div>
										<div id="fblock-advantage" class="move-list-data-value">N/A</div>
									</div>
								</div>
								<div class="move-list-data-row">
									<div class="move-list-data-col">
										<div class="move-list-data-title">CANCEL</div>
										<div id="cancel" class="move-list-data-value">N/A</div>
									</div>
								</div>
							</div>
							<div class="move-list-data-header">NOTES</div>
							<div id="notes" class="move-list-data-notes"></div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="move-list-table hidden<?php if ($filter_all) { echo ' filter-all'; } ?>">
		<nav>
			<div class="<?php if ($category == "basic-attacks") { echo 'active'; } ?>">Basic Attacks</div>
			<div class="<?php if ($category == "special-moves") { echo 'active'; } ?>">Special Moves</div>
			<div class="<?php if ($category == "finishers") { echo 'active'; } ?>">Finishers</div>
			<div class="<?php if ($category == "kameo-moves") { echo 'active'; } ?>">Kameo Moves</div>
			<span>
				<?php
				if (!$filter_all) {
					if ($char_name && $kameo_name) {
						echo $char_name . ' / ' . $kameo_name;
					} else if ($char_name) {
						echo $char_name;
					} else if ($kameo_name) {
						echo $kameo_name . ' (Kameo)';
					}
					echo ' Frame Data';
				}
				?>
			</span>
		</nav>
		<div>
			<?php
			$category_classes = ["basic-attacks", "special-moves", "finishers", "kameo-moves"];
			$table_col_titles = ["Move", "Kommand", "Hit Damage", "Block Damage", "Block Type", "Start-up", "Active", "Recovery", "Cancel", "Hit Advantage", "Block Advantage", "Flawless Block Advantage", "Notes"]; // Exclude: "Flawless Block Damage"
			$table_col_short_titles = ["Move", "Kommand", "H. DMG", "B. DMG", "Block Type", "STA", "ACT", "REC", "CAN", "HIT", "BLO", "FBL", "Notes"]; // Exclude: "F/Block Dmg"
			$table_cols = ["move_name", "command", "hit_damage", "block_damage", "block_type", "startup", "active", "recovery", "cancel", "hit_advantage", "block_advantage", "fblock_advantage", "notes"]; // Exclude: "fblock_damage"

			for ($i = 0; $i < 4; $i++) {
				$category_class = $category_classes[$i];

				// Hide other categories; If Kameo & No Character then show last category
				if (($i != 0 && $category == "basic-attacks") ||
					($i != 1 && $category == "special-moves") ||
					($i != 2 && $category == "finishers") ||
					($i != 3 && $category == "kameo-moves")) {
						$category_class .= " hidden";
				} ?>
				<div class="<?php echo $category_class ?>">
					<div class="move-list-table-header">
						<?php
						if ($filter_all) { ?>
							<div class="text-overflow move-list-table-col-header-character<?php if ($category == "kameo-moves") { echo ' hidden'; } ?>" title="Character">Character</div>
							<div class="text-overflow move-list-table-col-header-kameo<?php if ($category != "kameo-moves") { echo ' hidden'; } ?>" title="Kameo">Kameo</div>
						<?php }
						for ($j = 0; $j < count($table_col_titles); $j++) { ?>
							<div class="text-overflow" title="<?php echo $table_col_titles[$j] ?>"><?php echo $table_col_short_titles[$j] ?></div>
						<?php } ?>
					</div>
					<div class="move-list-table-body">
						<?php
						if (($move_list_results && $kameo_moves == null && $i != 3) || // Character & No Kameo
							($kameo_moves && $move_list_results == null && $i == 3) || // Kameo & No Character
							($move_list_results && $kameo_moves)) { // Character & Kameo

							$subcategory = "";

							foreach($move_list[$i] as $move) {
								if (!$filter_all) {
									if ($move["subcategory"] != $subcategory) {
										$subcategory = $move["subcategory"]; ?>
										<div class="move-list-table-row move-list-table-subcategory"><?php echo $subcategory ?></div>
									<?php }
								} ?>
								<div class="move-list-table-row">
									<?php
									if ($filter_all) {
										if ($i != 3) { ?>
											<div>
												<div class="text-overflow"><?php echo $move["char_name"] ?></div>
											</div>
										<?php } else { ?>
											<div>
												<div class="text-overflow"><?php echo $move["kameo_name"] ?></div>
											</div>
									<?php }
									}
									foreach($move as $key => $value) {
										if (in_array($key, $table_cols)) { ?>
											<div>
												<div class="text-overflow">
													<?php
														if ($key == "notes") {
															echo str_replace(array("\r", "\n"), "<br>", $value);
														} else {
															echo $value;
														}
													?>
												</div>
											</div>
									<?php }
									} ?>
								</div>
						<?php }
						} ?>
					</div>
					<div class="move-list-table-footer">
						<?php if ($filter_all) { ?>
							<div class="text-overflow<?php if ($category == "kameo-moves") { echo ' hidden'; } ?>">Character</div>
							<div class="text-overflow<?php if ($category != "kameo-moves") { echo ' hidden'; } ?>">Kameo</div>
						<?php }
						for ($j = 0; $j < count($table_col_titles); $j++) { ?>
							<div class="text-overflow" title="<?php echo $table_col_titles[$j] ?>"><?php echo $table_col_short_titles[$j] ?></div>
						<?php } ?>
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
let basicAttacks;
let specialMoves;
let finishers;
let kameoMoves;

<?php if ($basic_attacks) { ?>
	basicAttacks = <?php echo json_encode(array_values($basic_attacks)); ?>;
<?php } ?>
<?php if ($special_moves) { ?>
	specialMoves = <?php echo json_encode(array_values($special_moves)); ?>;
<?php } ?>
<?php if ($finishers) { ?>
	finishers = <?php echo json_encode(array_values($finishers)); ?>;
<?php } ?>
<?php if ($kameo_moves) { ?>
	kameoMoves = <?php echo json_encode(array_values($kameo_moves)); ?>;
<?php } ?>;
</script>

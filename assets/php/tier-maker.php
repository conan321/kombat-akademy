<?php
include("db.php");
$characters = include("data/characters.php");
$kameos = include("data/kameos.php");
$versions = include("data/versions.php");

usort($versions, function ($a, $b) {
	return ($a["release_date"] > $b["release_date"]) ? -1 : 1;
});

$character_slugs = [];
$kameo_slugs = [];
$version = $versions[0];

foreach($characters as $character) {
	array_push($character_slugs, $character["slug"]);
}

foreach($kameos as $kameo) {
	array_push($kameo_slugs, $kameo["slug"]);
}
?>

<div class="tier-maker-page">
	<div class="page-title">TIER MAKER</div>
	<div class="tier-maker">
		<div class="overlay tier-maker-generated-overlay hidden">
			<div class="tier-maker-generated-wrapper">
				<div class="tier-maker-download-wrapper">
					<a href="#">
						<div class="tier-maker-download-btn">DOWNLOAD</div>
					</a>
					<i class="tier-maker-generated-close-btn fa-solid fa-xmark"></i>
				</div>
				<div class="tier-maker-image-wrapper"></div>
			</div>
		</div>
		<div class="overlay tier-list-form-overlay hidden">
			<div class="tier-list-form-wrapper">
				<div class="tier-list-form">
					<div class="tier-list-form-header">
						<div>EDIT TIER LIST</div>
						<i class="tier-list-form-close-btn fa-solid fa-xmark"></i>
					</div>
					<div class="tier-list-form-body">
						<div>
							<div>Title</div>
							<input type="text" class="tier-list-form-title" />
						</div>
						<div>
							<div>Description</div>
							<input type="text" class="tier-list-form-description" />
						</div>
						<div>
							<div>Author</div>
							<input type="text" class="tier-list-form-author" />
						</div>
						<div>
							<div>Background</div>
							<div class="tier-list-form-backgrounds">
								<div class="tier-list-form-colors"></div>
								<div class="tier-list-form-background-images"></div>
							</div>
						</div>
						<div>
							<div>Options</div>
							<div class="tier-list-form-options">
								<div>
									<input type="checkbox" id="alt-colors" name="alt-colors" />
									<label for="alt-colors">Use Alternate Colors</label>
								</div>
								<div>
									<input type="checkbox" id="darken-background" name="darken-background" />
									<label for="darken-background">Darken Background</label>
								</div>
								<div>
									<input type="checkbox" id="show-header-on-generate" name="show-header-on-generate" />
									<label for="show-header-on-generate">Show Header On Generate</label>
								</div>
								<div>
									<input type="checkbox" id="show-date" name="show-date" />
									<label for="show-date">Show Date</label>
								</div>
							</div>
						</div>
					</div>
					<div class="tier-list-form-footer">
						<div class="tier-list-form-btn tier-list-form-reset-btn">RESET</div>
						<div class="tier-list-form-btn tier-list-form-cancel-btn">CANCEL</div>
						<div class="tier-list-form-btn tier-list-form-save-btn">SAVE</div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay tier-form-overlay hidden">
			<div class="tier-form-wrapper">
				<div class="tier-form">
					<div class="tier-form-header">
						<div>EDIT TIER</div>
						<i class="tier-form-close-btn fa-solid fa-xmark"></i>
					</div>
					<div class="tier-form-body">
						<div>
							<div>Name</div>
							<input type="text" class="tier-form-title" />
						</div>
						<div>
							<div>Description</div>
							<input type="text" class="tier-form-description" />
						</div>
						<div>
							<div>Color</div>
							<div class="tier-form-colors"></div>
						</div>
					</div>
					<div class="tier-form-footer">
						<div class="tier-form-btn tier-form-cancel-btn">CANCEL</div>
						<div class="tier-form-btn tier-form-save-btn">SAVE</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tier-maker-options">
			<div class="tier-maker-options-left">
				<div class="tier-maker-options-btn tier-maker-save-btn">Save Progress</div>
				<input type="file" />
				<div class="tier-maker-options-btn tier-maker-import-btn">Import</div>
				<div class="tier-maker-options-btn tier-maker-export-btn">Export</div>
			</div>
			<div class="tier-maker-options-btn tier-maker-generate-btn">GENERATE</div>
			<div class="tier-maker-options-right"></div>
		</div>
		<div class="tier-list">
			<div class="tier-list-header">
				<div class="tier-list-options">
					<div class="tier-list-edit-btn">
						<i data-html2canvas-ignore class="fa-solid fa-gear"></i>
					</div>
				</div>
				<div class="tier-list-header-text">
					<div class="tier-list-title"></div>
					<div class="tier-list-description"></div>
				</div>
				<div class="tier-list-info">
					<div class="tier-list-author"></div>
				<div class="tier-list-date tier-list-date-hidden"></div>
				</div>
			</div>
			<div class="tier-list-body"></div>
		</div>
		<div class="tier-pool"></div>
		<div class="tier-pool-assists"></div>
	</div>
</div>

<script>
	const characters = <?php if ($character_slugs) { echo json_encode($character_slugs); } else { echo '[]'; } ?>;
	const assists = <?php if ($kameo_slugs) { echo json_encode($kameo_slugs); } else { echo '[]'; } ?>;
	const ver = <?php if ($version) { echo json_encode($version); } else { echo 'null'; } ?>;
</script>
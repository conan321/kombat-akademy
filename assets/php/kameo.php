<?php
$kameos = include("data/kameos.php");

$kameo = null;
$slug = get_post_field('post_name');
$url_renders = "https://mk1.appservice.vn/wp-content/uploads/kameos/renders/";

foreach($kameos as $k) {
	if ($k["slug"] == $slug) {
		$kameo = $k;
	}
}
?>

<style>
.kameo-nav div:hover {
	border-color: <?php echo $kameo["color"] ?>;
	color: <?php echo $kameo["color"] ?>;
}

.kameo-page section {
	border-bottom: 1px solid <?php echo $kameo["color"] ?>;
}

.kameo-page h2 {
	color: <?php echo $kameo["color"] ?>;
}

.kameo-page .more-btn {
	background: linear-gradient(30deg, <?php echo $kameo["color_dark"] ?>, <?php echo $kameo["color"] ?>);
}
</style>

<?php if ($kameo) { ?>
<div class="kameo-page">
<section id="kameo-header">
	<div class="kameo-header-title"><?php echo strtoupper($kameo["name"]) . ' (KAMEO)' ?></div>
	<div class="kameo-header-content">
		<div class="kameo-img-wrapper">
			<img title="<?php echo $kameo["name"] ?> alt="<?php echo $kameo["name"] ?> Render" src="<?php echo $url_renders . $slug ?>.png" />
		</div>
		<div class="kameo-nav-wrapper">
			<div class="kameo-nav">
				<a href="#kameo-move-list">
					<div>
						<i class="fa-solid fa-rectangle-list"></i>
						MOVE LIST
					</div>
				</a>
				<a href="#kameo-strategy">
					<div>
						<i class="fa-solid fa-brain"></i>
						STRATEGY
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<?php
if (file_exists(dirname(__DIR__) . '/php/kameos/' . $slug . '.php')) {
	include dirname(__DIR__) . '/php/kameos/' . $slug . '.php';
}
?>

</div>
<?php } ?>
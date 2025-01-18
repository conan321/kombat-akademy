<?php
$kameos = include("data/kameos.php");
$teams = include("data/teams.php");

$character = isset($a[0]) ? $a[0] : '';

$top_kameos = null;

if ($character != null) {
	$top_kameos = $teams[$character];
}
?>

<div class="character-kameos">
	<?php foreach($top_kameos as $kameo) {
		if ($kameo != "") { ?>
		<div class="character-kameo">
			<div class="character-kameo-portrait" title="<?php echo $kameos[$kameo]["name"] ?>" style="background-image: url('/images/kameos/portraits/<?php echo $kameos[$kameo]["slug"] ?>.png'), linear-gradient(to top, rgb(105, 89, 73), #000);">
				<a href="/kameos/<?php echo $kameos[$kameo]["slug"] ?>/"></a>
			</div>
			<div class="character-kameo-name"><?php echo $kameos[$kameo]["name"] ?></div>
		</div>
	<?php }
	} ?>
</div>
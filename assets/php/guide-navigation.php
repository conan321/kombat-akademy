<?php
$pages = isset($a[0]) ? $a[0] : '';
$index = isset($a[1]) ? $a[1] : '';
?>

<div class="guide-navigation">
	<div>
		<form>
			<div>
				<select name="pg" onchange="this.form.submit()">
					<?php for ($i = 0; $i < count($pages); $i++) { ?>
						<option value="<?php echo $i + 1; ?>" <?php if ($i == $index) { echo "selected"; } ?>>
							<?php echo ($i + 1) . ". " . $pages[$i]['title']; ?>
						</option>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
</div>
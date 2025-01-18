<?php
$table_class = isset($a[0]) ? $a[0] : null; // [matrix-table, tbody-th-align-center, tbody-th-align-right, td-align-center]
$table_width = isset($a[1]) ? $a[1] : null;
$table_align = isset($a[2]) ? $a[2] : null;
$table_col_headers = isset($a[3]) ? $a[3] : null;
$table_row_headers = isset($a[4]) ? $a[4] : null;
$table_rows = isset($a[5]) ? $a[5] : null;
$frame_data_table = isset($a[6]) ? $a[6] : false;

$table_container_style = "";

if ($table_width) {
	$table_container_style .= "width: " . $table_width . ";";
}

if ($table_align && $table_align == "center") {
	$table_container_style .= "margin-left: auto; margin-right: auto;";
}

if ($frame_data_table) {
	$table_class .= " frame-data highlight-none";
}
?>

<div class="table-container" style="<?php echo $table_container_style ?>">
	<table class="<?php echo $table_class ?>">
		<thead>
			<?php if ($table_col_headers) { ?>
			<tr>
				<?php foreach ($table_col_headers as $header) { ?>
					<th colspan="<?php if (isset($header[2])) { echo $header[2]; } ?>" style="<?php if (isset($header[1])) { echo 'width: ' . $header[1]; } ?>"><?php echo $header[0] ?></th>
				<?php } ?>
			</tr>
			<?php } ?>
		</thead>
		<tbody>
			<?php for ($i = 0; $i < count($table_rows); $i++) { ?>
			<tr>
				<?php if ($table_row_headers) { ?>
					<th><?php echo $table_row_headers[$i] ?></th>
				<?php } ?>
				<?php foreach ($table_rows[$i] as $data) { ?>
					<?php
						$data_class = null;
						if ($frame_data_table) {
							if ((int)$data < 0 || str_contains($data, '-')) {
								$data_class = "cell-red";
							} else if ((int)$data == 0) {
								$data_class = "cell-yellow";
							} else if ((int)$data > 1 || str_contains($data, '+')) {
								$data_class = "cell-green";
							}
						}
					?>
					<td class="<?php echo $data_class ?>"><?php echo $data ?></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php if ($frame_data_table) { ?>
	<div class="table-frame-data-options">
		<div onclick="highlightFrameData(this, 'red')" onmouseover="onHoverFrameDataOption(this, 'red')" onmouseout="offHoverFrameDataOption(this)">
			<input type="checkbox">
			Negative
		</div>
		<div onclick="highlightFrameData(this, 'yellow')" onmouseover="onHoverFrameDataOption(this, 'yellow')" onmouseout="offHoverFrameDataOption(this)">
			<input type="checkbox">
			Zero
		</div>
		<div onclick="highlightFrameData(this, 'green')" onmouseover="onHoverFrameDataOption(this, 'green')" onmouseout="offHoverFrameDataOption(this)">
			<input type="checkbox">
			Positive
		</div>
		<div onclick="highlightFrameData(this)" onmouseover="onHoverFrameDataOption(this)" onmouseout="offHoverFrameDataOption(this)">
			<input type="checkbox">
			All
		</div>
	</div>
	<?php } ?>
</div>
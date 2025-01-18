<?php
$characters = include("data/characters.php");
$kameos = include("data/kameos.php");
$teams = include("data/teams.php");

foreach ($kameos as &$kameo) {
	$kameo["count"] = 0;
}

unset($kameo); // Must unset $kameo after pass-by-reference loop to prevent & being prepended
?>

<div class="teams-page">
	<h1>TEAMS</h1>
	<p>
		The following is a list of each character and their recommended Kameos for use in competitive play. All information below is subject to change. To view more information, visit the Kameos section of a character's page.
	</p>
	<div class="teams-container guide">
		<div>
			<table>
				<tr>
					<th style="width: 25%;">Character</th><th>Kameos</th>
				</tr>
				<?php foreach ($teams as $key => $values) { ?>
					<tr>
						<td>
							<a href="/characters/<?php echo $characters[$key]["slug"] ?>/"><?php echo $characters[$key]["name"] ?></a>
						</td>
						<td>
							<?php
							for ($i = 0; $i < count($values); $i++) {
								if ($values[$i] != "") { ?>
									<a href="/kameos/<?php echo $kameos[$values[$i]]["slug"] ?>/"><?php echo $values[$i] ?></a><?php
									if ($i < count($values) - 1) {
										echo ", ";
									}

									$kameos[$values[$i]]["count"]++;
								} else {
									echo "N/A";
								}
							} ?>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div>
			<table>
				<tr>
					<th>Details</th>
				</tr>
				<tr>
					<td>
						<?php
						usort($kameos, function ($a, $b) {
							if ($a["count"] == $b["count"]) {
								return ($a["name"] < $b["name"]) ? -1: 1;
							}

							return ($a["count"] > $b["count"]) ? -1 : 1;
						});

						foreach ($kameos as $kameo) { ?>
							<div>
								<div><?php echo $kameo["name"] ?></div>
								<div><?php echo $kameo["count"] ?></div>
							</div>
						<?php } ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php
$index = 0;
$page = $pages[$index]['slug'];
$page_param = null;

if (isset($_GET["pg"])) {
	$page_param = (int)$_GET["pg"] ? (int)$_GET["pg"] : strtolower($_GET["pg"]);
}

if ($page_param) {
	if (is_int($page_param)) {
		if (array_key_exists($page_param - 1, $pages)) {
			$index = $page_param - 1;
			$page = $pages[$index]['slug'];
		}
	} else if (is_string($page_param)) {
		for ($i = 0; $i < count($pages); $i++) {
			if ($pages[$i]['slug'] == $page_param) {
				$index = $i;
				$page = $page_param;
				break;
			}
		}
	}
}
?>
<meta charset="UTF-8">
<?php
	define('SHORTINIT', true);
	require('../wp-load.php');
	global $wpdb;
	$test = $wpdb -> get_results("SELECT * FROM products");

	foreach($test as $one) {
		echo '<p>' . $one->name . '</p>';
	}


?>
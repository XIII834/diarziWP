<?php
add_action( 'admin_menu', 'my_plugin_menu' );
 
function my_plugin_menu() {
    add_menu_page( 'Категории', 'Категории', 'manage_options', 'my-unique-identifier', 'my_categories' );
    add_menu_page('Товары', 'Товары', 'manage_options', 'my-unique-identifier2', 'my_products');
}
 
function my_categories() {
		global $wpdb;
		$categories = $wpdb -> get_results("SELECT * FROM category");
		$products = $wpdb -> get_results("SELECT * FROM products");

		echo '<link rel="stylesheet" href="/wp-content/themes/diarzi/css/style.css">
					<link rel="stylesheet" href="/wp-content/themes/diarzi/css/font-awesome.css">
					<link rel="stylesheet" href="/wp-content/themes/diarzi/css/site.css">
					<link rel="stylesheet" href="/wp-content/themes/diarzi/css/site2.css">';

    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    echo '</pre>
<div class="wrap">';
	echo '<h1>Категории</h1>';
 echo '</div>
<pre>
';
	echo '<div class="admin-wrap">';
		foreach ($categories as $category) { 
			echo '<div class="admin-category-item">
				<img src="/' . $category->img . '" class="admin-category-item__photo"></img>
				<div class="admin-category-item__name">
                    <p> ' . $category->name . '</p>
                    <p class="admin-category-item__category-description">' . $category->description . '</p>
                </div>
				<div class="admin-category-item__right-panel">
                    <div class="admin-category-item__active-wrapper">';
    					if ($category->active) { 
    						echo '<div class="admin-category-item__active"></div>';
    					} else {
    						echo '<div class="admin-category-item__not-active"></div>';
    					 } 
                    echo '</div>
                    <div class="admin-categiry-item__up-del-block">
                        <a href=""><div class="admin-category-item__update"></div></a>
                        <a href=""><div class="admin-category-item__del"></div></a>
                    </div>
				</div>
			</div>';
		}

echo '</div>';
}

function my_products() {
		global $wpdb;
		$categories = $wpdb -> get_results("SELECT * FROM category");
		$products = $wpdb -> get_results("SELECT * FROM products");

		echo '<link rel="stylesheet" href="/wp-content/themes/diarzi/css/style.css">
					<link rel="stylesheet" href="/wp-content/themes/diarzi/css/font-awesome.css">
					<link rel="stylesheet" href="/wp-content/themes/diarzi/css/site.css">
					<link rel="stylesheet" href="/wp-content/themes/diarzi/css/site2.css">';


	echo '<h1>Товары</h1>';
	foreach ($categories as $category) {
	$flag = false;
	foreach ($products as $product) {
		if ($product->categoryID  == $category->id) {
			$flag = true;
			break;
		}
	}
	if ($flag) {
		echo '<p class="admin-products-category-title">' . $category->name . '</p>';
		foreach ($products as $product) { 
			if ($product->categoryID == $category->id) { 
					$imgs = explode(';', $product->imgs);
				

				echo '<div class="admin-wrap">
					<div class="admin-product-item">
						<img src=' . '"/img/' . $product->mainImg . '" class="admin-category-item__photo"></img>
						<div class="admin-product-name">
							<p>Нименование товара:</p>
							<div>' . $product->name .'</div>
						</div>
						<div class="admin-product-article">
							<p>Артикул:</p>
							<div>' . $product->article . '</div>
						</div>
						<div class="admin-product-price">
							<p>Цена:</p>
							<div>' . $product->price . '</div>
						</div>
						<div class="admin-product-description">' . $product->description . '</div>
						
						<div class="admin-categiry-item__up-del-block">
							<a href=""><div class="admin-category-item__update"></div></a>
							<a href=""><div class="admin-category-item__del"></div></a>
						</div>
					</div>';
					if ($imgs[0]) {
					echo '<div class="gallery">';
						for ($i = 0; $i < count($imgs) - 1; $i++) {
							
						}
					echo '</div>';
					}
				echo '</div>';

			}
		}
	}
}
}

?>
<?php


// set posts_per_page for post

function filter_main_query($query)
{
	/**
	 * =========================================
	 * resource
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('resource')) {
		// post per pagination
		$post_per_page = 12;
		$query->set('posts_per_page', $post_per_page);

		// order
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'published_date');
		$query->set('order', 'DESC');

		// get url parameters
		$_GET_category = (isset($_GET["category"])) ? $_GET["category"] : '';

		$_GET_related_thematic_area = (isset($_GET["related_thematic_area"])) ? $_GET["related_thematic_area"] : '';

		$_GET_free_title = (isset($_GET["free_title"])) ? $_GET["free_title"] : '';

		$_GET_year = (isset($_GET["p_year"])) ? $_GET["p_year"] : '';

		if ($_GET_free_title) {
			$query->set('search_post_title', $_GET_free_title);
		}

		// tax query
		$tax_query = array(
			'relation' => 'AND',
		);
		if ($_GET_category) {
			$tax_query[] = array(
				'taxonomy' => 'resources_category',
				'field' => 'slug',
				'terms' => $_GET_category,
			);
		}

		// meta query
		$meta_query = array(
			'relation' => 'AND',
		);

		if ($_GET_year) {
			$currentYear = $_GET_year . '/1/1';
			$nextYear = $_GET_year + 1 . '/1/1';
			$meta_query[] = array(
				'key' => 'published_date',
				'value' => $currentYear,
				'compare' => '>',
				'type' => 'DATE'
			);

			$meta_query[] = array(
				'key' => 'published_date',
				'value' => $nextYear,
				'compare' => '<',
				'type' => 'DATE'
			);
		}

		if ($_GET_related_thematic_area) {
			$meta_query[] = array(
				'key' => 'related_thematic_area',
				'value' => $_GET_related_thematic_area,
				'compare' => 'LIKE'
			);
		}

		if ($_GET_category) {
			$query->set('tax_query', $tax_query);
		}

		if ($_GET_related_thematic_area || $_GET_year) {
			$query->set('meta_query', $meta_query);
		}

		return;
	}

	/**
	 * =========================================
	 * story
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('story')) {
		// post per pagination
		$post_per_page = 12;
		$query->set('posts_per_page', $post_per_page);

		// get url parameters
		$_GET_related_thematic_area = (isset($_GET["related_thematic_area"])) ? $_GET["related_thematic_area"] : '';
		$_GET_free_title = (isset($_GET["free_title"])) ? $_GET["free_title"] : '';

		if ($_GET_free_title) {
			$query->set('search_post_title', $_GET_free_title);
		}


		// meta query
		$meta_query = array(
			'relation' => 'AND',
		);
		if ($_GET_related_thematic_area) {
			$meta_query[] = array(
				'key' => 'related_thematic_area',
				'value' => $_GET_related_thematic_area,
				'compare' => 'LIKE'
			);
		}

		if ($_GET_related_thematic_area) {
			$query->set('meta_query', $meta_query);
		}
		return;
	}

	/**
	 * =========================================
	 * news
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('news')) {
		// post per pagination
		$post_per_page = 12;
		$query->set('posts_per_page', $post_per_page);

		// get url parameters
		$_GET_category = (isset($_GET["category"])) ? $_GET["category"] : '';
		$_GET_related_project = (isset($_GET["related_project"])) ? $_GET["related_project"] : '';
		$_GET_related_thematic_area = (isset($_GET["related_thematic_area"])) ? $_GET["related_thematic_area"] : '';
		$_GET_free_title = (isset($_GET["free_title"])) ? $_GET["free_title"] : '';

		if ($_GET_free_title) {
			$query->set('search_post_title', $_GET_free_title);
		}

		// tax query
		$tax_query = array(
			'relation' => 'AND',
		);
		if ($_GET_category) {
			$tax_query[] = array(
				'taxonomy' => 'news_category',
				'field' => 'slug',
				'terms' => $_GET_category,
			);
		}

		// meta query
		$meta_query = array(
			'relation' => 'AND',
		);
		if ($_GET_related_project) {
			$meta_query[] = array(
				'key' => 'related_project',
				'value' => $_GET_related_project,
				'compare' => 'LIKE'
			);
		}
		if ($_GET_related_thematic_area) {
			$meta_query[] = array(
				'key' => 'related_thematic_area',
				'value' => $_GET_related_thematic_area,
				'compare' => 'LIKE'
			);
		}

		if ($_GET_category) {
			$query->set('tax_query', $tax_query);
		}
		if ($_GET_related_project || $_GET_related_thematic_area) {
			$query->set('meta_query', $meta_query);
		}
		return;
	}

	/**
	 * =========================================
	 * project
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && (is_post_type_archive('project') || $query->is_tax('project-type'))) {
		// post per pagination
		$post_per_page = 12;
		$query->set('posts_per_page', $post_per_page);

		// get url parameters 
		$_GET_project_status = (isset($_GET["project_status"])) ? $_GET["project_status"] : '';
		$_GET_project_location = (isset($_GET["project_location"])) ? $_GET["project_location"] : '';
		$_GET_related_partner = (isset($_GET["related_partner"])) ? $_GET["related_partner"] : '';
		$_GET_related_thematic_area = (isset($_GET["related_thematic_area"])) ? $_GET["related_thematic_area"] : '';
		$_GET_free_title = (isset($_GET["free_title"])) ? $_GET["free_title"] : '';

		if ($_GET_free_title) {
			$query->set('search_post_title', $_GET_free_title);
		}

		// tax query
		$tax_query = array(
			'relation' => 'AND',
		);
		if ($_GET_project_location) {
			$tax_query[] = array(
				'taxonomy' => 'location',
				'field' => 'slug',
				'terms' => $_GET_project_location,
			);
		}

		// meta query
		$meta_query = array(
			'relation' => 'AND',
		);
		if ($_GET_project_status == 'current') {
			$meta_query[] = array(
				'key' => 'project_end_date',
				'compare' => '>',
				'value' => date("Y-m-d"),
				'type' => 'DATE'
			);
		}
		if ($_GET_project_status == 'phased_out') {
			$meta_query[] = array(
				'key' => 'project_end_date',
				'compare' => '<=',
				'value' => date("Y-m-d"),
				'type' => 'DATE'
			);
			$meta_query[] = array(
				'key' => 'project_end_date',
				'compare' => 'NOT IN',
				'value' => array(''),
				'type' => 'DATE'
			);
		}

		if ($_GET_related_partner) {
			$meta_query[] = array(
				'key' => 'related_partner',
				'value' => $_GET_related_partner,
				'compare' => 'LIKE'
			);
		}
		if ($_GET_related_thematic_area) {
			$meta_query[] = array(
				'key' => 'related_thematic_area',
				'value' => $_GET_related_thematic_area,
				'compare' => 'LIKE'
			);
		}


		if ($_GET_project_location) {
			$query->set('tax_query', $tax_query);
		}
		if ($_GET_related_partner || $_GET_related_thematic_area || $_GET_project_status) {
			$query->set('meta_query', $meta_query);
		}
		return;
	}

	/**
	 * =========================================
	 * vacancy
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && (is_post_type_archive('vacancy') || is_post_type_archive('consultancy'))) {

		// post per pagination
		$post_per_page = -1;
		$query->set('posts_per_page', $post_per_page);

		// meta query
		$meta_query = array(
			'relation' => 'AND',
			array(
				'key' => 'deadline',
				'value' => date('Y-m-d'),
				'compare' => '>=',
				'type' => 'date'
			)
		);

		$query->set('meta_query', $meta_query);

		return;
	}

	/**
	 * =========================================
	 * partner
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('partner')) {
		// post per pagination
		$post_per_page = -1;
		$query->set('posts_per_page', $post_per_page);
		$query->set('orderby', 'name');
		$query->set('order', 'ASC');

		$_GET_S = (isset($_GET["_s"])) ? $_GET["_s"] : '';

		// echo '<pre>';
		// print_r($query);
		// echo '</pre>';
		// die();

		if ($_GET_S) {
			$query->set('s', $_GET_S);
		}

		return;
	}

	/**
	 * =========================================
	 * team
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('team')) {
		// post per pagination
		$post_per_page = -1;
		$query->set('posts_per_page', $post_per_page);
		return;
	}

	/**
	 * =========================================
	 * multimedia
	 * =========================================
	 */
	if (!is_admin() && $query->is_main_query() && (is_post_type_archive('multimedia') || $query->is_tax('multimedia_category'))) {
		// post per pagination
		$post_per_page = -1;
		$query->set('posts_per_page', $post_per_page);
		return;
	}

	/**
	 * =========================================
	 * search
	 * =========================================
	 */
	if (is_search()) {
		// post per pagination
		$post_per_page = 9;
		$query->set('posts_per_page', $post_per_page);
		return;
	}
}
add_action('pre_get_posts', 'filter_main_query', 11);



/**
 * Remove post default post type
 */

add_action('admin_menu', 'remove_default_post_type');

// Remove from the side menu
function remove_default_post_type()
{
	remove_menu_page('edit.php');
}

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

// Remove from the + New > Post link in Admin Bar
function remove_default_post_type_menu_bar($wp_admin_bar)
{
	$wp_admin_bar->remove_node('new-post');
}

//remove from the + New link in Admin Bar

function remove_add_new_post_href_in_admin_bar()
{
	?>
	<script type="text/javascript">
		function remove_add_new_post_href_in_admin_bar() {
			var add_new = document.getElementById('wp-admin-bar-new-content');
			if (!add_new) return;
			var add_new_a = add_new.getElementsByTagName('a')[0];
			if (add_new_a) add_new_a.setAttribute('href', '#!');
		}
		remove_add_new_post_href_in_admin_bar();
	</script>
	<?php
}
add_action('admin_footer', 'remove_add_new_post_href_in_admin_bar');


function remove_frontend_post_href()
{
	if (is_user_logged_in()) {
		add_action('wp_footer', 'remove_add_new_post_href_in_admin_bar');
	}
}
add_action('init', 'remove_frontend_post_href');

// remove from the Quick Draft Dashboard Widget
add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

function remove_draft_widget()
{
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}
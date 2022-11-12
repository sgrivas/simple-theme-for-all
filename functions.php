<?php
/* ==================
Adding stylesheets and javascript files
============== */
function custom_theme_scripts(){
    ///bootstrap CSS
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css');

    ///main style sheet
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    ///javascript files
    wp_enqueue_script('bootstrap-js', get_stylesheet_uri().'/js/bootstrap.min.js');

    ///custom js file
    wp_enqueue_style('custom-js', get_stylesheet_uri().'/js/scripts.js');
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

/* ==================
Adding featured image
============== */
add_theme_support('post-thumbnails');

/* ==================
Custom header image
============== */
$custom_image_header = array(
    'width' => 520,
    'height' => 150,
    'uploads'=> true
);
///Name of functionality, ...
add_theme_support('custom_header', $custom_image_header);

/* ==================
Post Data Information
============== */
function post_data(){
    $archive_year = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day = get_the_time('d');
?>
    <p>Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a><br>Published on: <a href="<?php
    echo get_day_link($archive_year,$archive_month,$archive_day);?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a></p>
<?php
}

/* ==================
Add menus to our theme
============== */
function register_my_menus(){
    register_nav_menus(array(
        'main-menu' => __('Main Menu'),
        'footer-middle' => __('Middle Footer Menu'),
        'footer-right' => __('Right Footer Menu')
    ));
}
add_action('init', 'register_my_menus');

/*===============================
  Pagination Links
=====================================*/
function proPhotographyPagination(){
    global $wp_query;
  
    $big = 999999999; // need an unlikely integer
    $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string
  
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
    ) );
  }

/*===============================
  Creating Widget Areas
=====================================*/
function blank_widgets_init(){
    register_sidebar(array(
        'name' => ('Sidebar Widget'),
        'id' => 'sidebar-widget',
        'description' => 'Area in the sidebar for content',
        'before_widget' => '<div class="sidebar-widget-container">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title'=> '</h2>'
    ));
    register_sidebar(array(
        'name' => ('Right Footer Widget'),
        'id' => 'right-footer-widget',
        'description' => 'Area in the right footer for content',
        'before_widget' => '<div class="right-footer-widget-container">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title'=> '</h2>'
    ));
}

add_action('widgets_init', 'blank_widgets_init');

/*===============================
Register Custom Post Type
=====================================*/
function employeeDirectory() {

	$labels = array(
		'name'                  => _x( 'Employees', 'Post Type General Name', 'dog-world' ),
		'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'dog-world' ),
		'menu_name'             => __( 'Employees', 'dog-world' ),
		'name_admin_bar'        => __( 'Employee', 'dog-world' ),
		'archives'              => __( 'Employee', 'dog-world' ),
		'attributes'            => __( 'Employee Attributes', 'dog-world' ),
		'parent_item_colon'     => __( 'Parent Employee', 'dog-world' ),
		'all_items'             => __( 'All Employee', 'dog-world' ),
		'add_new_item'          => __( 'Add New Employee', 'dog-world' ),
		'add_new'               => __( 'Add New', 'dog-world' ),
		'new_item'              => __( 'New Employee', 'dog-world' ),
		'edit_item'             => __( 'Edit Employee', 'dog-world' ),
		'update_item'           => __( 'Update Employee', 'dog-world' ),
		'view_item'             => __( 'View Employee', 'dog-world' ),
		'view_items'            => __( 'View Employees', 'dog-world' ),
		'search_items'          => __( 'Search Employees', 'dog-world' ),
		'not_found'             => __( 'Not found', 'dog-world' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dog-world' ),
		'featured_image'        => __( 'Headshot', 'dog-world' ),
		'set_featured_image'    => __( 'Set Headshot', 'dog-world' ),
		'remove_featured_image' => __( 'Remove Headshot', 'dog-world' ),
		'use_featured_image'    => __( 'Use as Headshot', 'dog-world' ),
		'insert_into_item'      => __( 'Insert into Employee', 'dog-world' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Employee', 'dog-world' ),
		'items_list'            => __( 'Employees list', 'dog-world' ),
		'items_list_navigation' => __( 'Employees list navigation', 'dog-world' ),
		'filter_items_list'     => __( 'Filter Employees list', 'dog-world' ),
	);
    $rewrite = array(
		'slug'                  => 'employees',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Employee', 'dog-world' ),
		'description'           => __( 'Directory of employees for the company', 'dog-world' ),
		'labels'                => $labels,
        'show_in_rest'          => true, //enable gutenburg
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'employeeDirectory', $args );

}
add_action( 'init', 'employeeDirectory', 0 );

/*===============================
Change excerpt length
=====================================*/
function my_excerpt_length($length){ return 20; } add_filter('excerpt_length', 'my_excerpt_length');
?>




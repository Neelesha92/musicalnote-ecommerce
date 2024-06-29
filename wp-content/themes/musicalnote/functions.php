<?php
/**
 * musicalnote functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package musicalnote
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function musicalnote_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on musicalnote, use a find and replace
		* to change 'musicalnote' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'musicalnote', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'musicalnote' ),
			'menu-2' => esc_html__( 'Secondary', 'musicalnote' ),
			'menu-3' => esc_html__( 'alternative', 'musicalnote' ),

		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'musicalnote_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'musicalnote_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function musicalnote_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'musicalnote_content_width', 640 );
}
add_action( 'after_setup_theme', 'musicalnote_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function musicalnote_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'musicalnote' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'musicalnote' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'musicalnote_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function musicalnote_scripts() {
	wp_enqueue_style( 'musicalnote-style',get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'musicalnote-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'musicalnote-style', 'rtl', 'replace' );
	wp_enqueue_script( 'musicalnote-navigation', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'musicalnote-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'musicalnote_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}




function breadcrumbs(){
	echo '<p>' ,woocommerce_breadcrumb() ,'</p>';
}

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',1);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title',1);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price');
add_action( 'woocommerce_before_single_product', 'breadcrumbs' );
add_action( 'woocommerce_single_product_summary', 'add_author' );
add_action( 'woocommerce_single_product_summary', 'add_categories' );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price');
add_action( 'woocommerce_cart_totals_after_order_total', 'continue_shopping');

function continue_shopping(){

	?>
	<div class="continue"> 
		<a href="#">Continue Shopping</a></div>
	<?php
	
}


function add_author(){
	global $product;
    $author_id = get_the_author($product->get_id()); 
    
    // if ($author_id) {
        // $author_name = get_the_author_meta('display_name', $author_id);
        echo '<p class="add_author"> <span class="created">Created By </span> : ' . $author_id . '</p>';
    // }

}

function add_categories(){
	global $product;
$terms = get_the_terms( $product->ID, 'product_cat' );
foreach ($terms as $term) {
    $product_cat_id = $term->term_id;
    break;
}
 echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', sizeof( get_the_terms( $product->ID, 'product_cat' ) ), 'woocommerce' ) . ' ', '.</span>' ); 

}



add_action( 'woocommerce_single_product_summary', 'product_attribute_dimensions');
function product_attribute_dimensions(){
    global $product;

    $taxonomies = array('pa_artist','pa_genre','pa_time'); 

    foreach($taxonomies as $taxonomy){
        $value = $product->get_attribute( $taxonomy );
        if ( $value ) {
            $label = get_taxonomy( $taxonomy )->labels->singular_name;
    
            echo '<p> <span class="label"> ' . $label . '</span> : ' . $value . ' </p>';
        }
    }
}

add_action( 'woocommerce_single_product_summary', 'custom_before_title',0 );
function custom_before_title() {

    global $product;

    if ( $product->get_sku() ) {
      
		
		echo '<span> SKU : ' . $product->get_sku() .  '</span>';
    }

}


add_action('woocommerce_after_add_to_cart_button','move_to');

function move_to(){
	echo '<a href="#"><button class="favorite" >' ,"Move To Favorite", '</button></a>'; 
}

add_action('woocommerce_after_add_to_cart_button','wish_list');

function wish_list(){
	echo '<a class="add_wishlist" href="#">',"Add to wishlist",'</a>';
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'single_related_products', 20 );

function single_related_products(){
	global $product;
	$product_id=$product->get_id();
	$category= $product->get_category_ids();
	$args = ['post_type' => "product", 'posts_per_page' => 4, 'tax_query' => [['taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $category]]];
	$my_posts = new WP_Query($args);
  	if ($my_posts->have_posts()): ?>
    <section class="feature_items function_feature">
        <div class="container">
            <div class="wrapper_feature">
                <div class="feature_title">
                    <h2>
                       RELATED PRODUCTS
                    </h2>
                </div>
                    <div class="feature_flex single_flex ">
                        <?php while ($my_posts->have_posts()):
                            $my_posts->the_post(); 
							if(get_the_ID()== $product_id){
								continue;
							}
							?>
                            <div class="feature_content" onclick="display('<?php the_permalink(); ?>');">
                                <div class="feature_cover">
                                    <div>
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="like_round">
                                        <img src="<?php echo get_template_directory_uri() ?>/img/like-round.svg" alt="like">
                                    </div>
                                </div>
                                <div class="feature_info">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <span class="author">Created by: <b>
                                            <?php the_author(); ?>
                                        </b> in <b>Lead Sheet</b></span>
                                    <div class="price">$
                                        <?php echo $product->get_price(); ?>
                                    </div>
                                    <div class="cart_btn">
                                        <a class="cart_blue" href="#">
                                            <span class="icon-cart"></span>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();

                        ?>
                    </div>
            </div>
        </div>

    </section>

<?php endif; 
}


add_action( 'woocommerce_single_variation', 'price_calculation');

function price_calculation(){
	?>
<div class="calc_price">
	
    
</div>
<?php
}

add_filter( 'woocommerce_product_tabs', 'conditionaly_removing_product_tabs', 99 );
function conditionaly_removing_product_tabs( $tabs ) {

    global $product;
    $product_id =  $product->get_id();

    $product_cats = array( 'books');

    if( has_term( $product_cats, 'product_cat', $product_id ) ){
        unset( $tabs['reviews'] );  
        unset( $tabs['additional_information'] ); 
    }
    return $tabs;
}


function enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
    // Localize ajax_url
    wp_localize_script(
        'custom-script',
        'MyAjax',
        array(
            'ajax_url' => admin_url('admin-ajax.php')
        )
    );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
function update_cart_item_quantity_ajax()
{
    if (isset($_POST['cart_key']) && isset($_POST['new_quantity'])) {
        $cartKey = sanitize_key($_POST['cart_key']);
        $newQuantity = intval($_POST['new_quantity']);
        // Update the cart item quantity
        WC()->cart->set_quantity($cartKey, $newQuantity);
        WC()->cart->calculate_totals();
        $subtotal = WC()->cart->get_cart_subtotal();
        $total = WC()->cart->get_cart_total();
        wp_send_json_success(
            array(
                'subtotal' => $subtotal,
                'total' => $total
            )
        );
    } else {
        wp_send_json_error();
    }
}
add_action('wp_ajax_update_cart_item_quantity', 'update_cart_item_quantity_ajax');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'update_cart_item_quantity_ajax');
// Remove cart item via AJAX
add_action('wp_ajax_remove_cart_item', 'remove_cart_item_ajax');
add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item_ajax'); // For non-logged in users as well
function remove_cart_item_ajax()
{
    if (isset($_POST['cart_key'])) {
        $cart_key = sanitize_text_field($_POST['cart_key']);
        WC()->cart->remove_cart_item($cart_key);
        $subtotal = WC()->cart->get_cart_subtotal();
        $total = WC()->cart->get_cart_total();
        if (WC()->cart->is_empty()) {
            $test = get_template_directory_uri() . '/woocommerce/cart/cart-empty.php';
        } else {
            $test = 'not_empty';
        }
        wp_send_json_success(
            array(
                'subtotal' => $subtotal,
                'total' => $total,
                'check' => $test
            )
        );
        wp_send_json_success();
    }
    wp_send_json_error();
}


function get_cart_count_ajax() {
	$cart_count = WC()->cart->get_cart_contents_count();
	wp_send_json_success(array('count' => $cart_count));
  }
  add_action('wp_ajax_get_cart_count', 'get_cart_count_ajax');
  add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count_ajax');

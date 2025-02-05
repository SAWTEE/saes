<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: sawtee.com | @sawtee
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

//wp bootstrap navwalker
include 'includes/wp_bootstrap_navwalker.php';

//customizer
include 'includes/customizer.php';

//post types
include "includes/post-types.php";

//social widget
include 'includes/social-widget.php';

//email
include 'includes/email.php';

//email
include 'includes/meta-itenary.php';

//email
include 'includes/custom-breadcrum.php';

//email
include 'includes/pagination.php';

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

	add_image_size('banner', 1024, 650, true); // banner
	add_image_size('organizers', 262, 216, true); // top destination
	add_image_size('partners', 208, 150, true); // top destination
	add_image_size('gallery', 285, 190, true); // top destination
	add_image_size('speaker', 260, 260, true); // top destination
	add_image_size('speaker-inner', 273, 273, true); // top destination

	add_image_size('about', 360, 240, true); // top destination
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('sawtee', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// SWATEE navigation
function sawtee_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load SWATEE scripts (header.php)
function sawtee_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

	    wp_register_script('jquery-local', get_template_directory_uri() . '/js/jquery.js', array(), '1.10.2'); // Custom scripts
	    wp_enqueue_script('jquery-local'); // Enqueue it!
    }
}

// Load SWATEE conditional scripts
function sawtee_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load SWATEE styles
function sawtee_styles()
{
	wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('bootstrap.min'); // Enqueue it!

	wp_register_style('Crimson', 'https://fonts.googleapis.com/css?family=Crimson+Text|Lora', array(), '1.0', 'all');
	wp_enqueue_style('Crimson'); // Enqueue it!

	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0', 'all');
	wp_enqueue_style('font-awesome'); // Enqueue it!

	wp_register_style('owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0', 'all');
	wp_enqueue_style('owl.carousel'); // Enqueue it!

	wp_register_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), '1.0', 'all');
	wp_enqueue_style('prettyPhoto'); // Enqueue it!

	wp_register_style('travelhub', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
	wp_enqueue_style('travelhub'); // Enqueue it!

	wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0', 'all');
	wp_enqueue_style('custom'); // Enqueue it!

	wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all');
	wp_enqueue_style('responsive'); // Enqueue it!
}

function sawtee_footer_scripts()
{
	wp_register_script('bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6'); // Modernizr
	wp_enqueue_script('bootstrap.js'); // Enqueue it!

	wp_register_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1'); // Modernizr
	wp_enqueue_script('owl.carousel.min'); // Enqueue it!

	wp_register_script('jquery.easing.min', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '1'); // Modernizr
	wp_enqueue_script('jquery.easing.min'); // Enqueue it!

	wp_register_script('scrolling-nav', get_template_directory_uri() . '/js/scrolling-nav.js', array(), '1'); // Modernizr
	wp_enqueue_script('scrolling-nav'); // Enqueue it!

	wp_register_script('simple-lightbox', get_template_directory_uri() . '/js/simple-lightbox.js', array(), '1'); // Modernizr
	wp_enqueue_script('simple-lightbox'); // Enqueue it!

	wp_register_script('jquery.prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '1'); // Modernizr
	wp_enqueue_script('jquery.prettyPhoto'); // Enqueue it!

	wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array(), '1'); // Modernizr
	wp_enqueue_script('custom'); // Enqueue it!

}

// Register SWATEE Navigation
function register_sawtee_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'sawtee'), // Main Navigation
        'secondary-menu' => __('Secondary Header Menu', 'sawtee'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'sawtee') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'sawtee'),
        'description' => __('Description for this widget-area...', 'sawtee'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function sawteewp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function sawteewp_index($length) // Create 20 Word Callback for Index page Excerpts, call using sawteewp_excerpt('sawteewp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using sawteewp_excerpt('sawteewp_custom_post');
function sawteewp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function sawteewp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function sawtee_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'sawtee') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function sawtee_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function sawteegravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function sawteecomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'sawtee_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'sawtee_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'sawtee_styles'); // Add Theme Stylesheet
add_action('init', 'register_sawtee_menu'); // Add SWATEE Menu
//add_action('init', 'create_post_type_sawtee'); // Add our SWATEE Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'sawteewp_pagination'); // Add our sawtee Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'sawteegravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'sawtee_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
//add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'sawtee_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

    add_filter('wp_footer', 'sawtee_footer_scripts');

/**
 * Set the size attribute to 'full' in the next gallery shortcode.
 */
function wpse_141896_shortcode_atts_gallery( $out )
{
    remove_filter( current_filter(), __FUNCTION__ );
    $out['size'] = 'full';
    return $out;
}

function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

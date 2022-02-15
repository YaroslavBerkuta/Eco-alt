<?php

/**
 * Eco-alt functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Eco-alt
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eco_alt_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Eco-alt, use a find and replace
		* to change 'eco-alt' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('eco-alt', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'header_menu' => esc_html__('Primary', 'eco-alt'),
            'footer_menu' => esc_html__('Footer', 'eco-alt'),
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
            'eco_alt_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'eco_alt_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eco_alt_content_width()
{
    $GLOBALS['content_width'] = apply_filters('eco_alt_content_width', 640);
}
add_action('after_setup_theme', 'eco_alt_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eco_alt_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'eco-alt'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'eco-alt'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'eco_alt_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function eco_alt_scripts()
{
    /*	wp_enqueue_style( 'eco-alt-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'eco-alt-style', 'rtl', 'replace' );*/

    wp_enqueue_style('eco-alt-mycss', get_template_directory_uri() . "/assets/css/mycss.css", array(), _S_VERSION);
    wp_enqueue_style('eco-alt-style', get_template_directory_uri() . "/assets/css/style.min.css", array(), _S_VERSION);

    //wp_enqueue_script( 'eco-alt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    wp_enqueue_script('eco-alt-main', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('eco-alt-filters', get_template_directory_uri() . '/assets/js/filters.js', array(), _S_VERSION, true);
    // wp_enqueue_script( 'eco-alt-autorefresh', get_template_directory_uri() . '/assets/js/autorefresh.js', array(), _S_VERSION, true );



    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'eco_alt_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}





//product sale percentage
add_filter('woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3);
function add_percentage_to_sale_badge($html, $post, $product)
{

    if ($product->is_type('variable')) {
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach ($prices['price'] as $key => $price) {
            // Only on sale variations
            if ($prices['regular_price'][$key] !== $price) {
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - (floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';
    } elseif ($product->is_type('grouped')) {
        $percentages = array();

        // Get all variation prices
        $children_ids = $product->get_children();

        // Loop through variation prices
        foreach ($children_ids as $child_id) {
            $child_product = wc_get_product($child_id);

            $regular_price = (float) $child_product->get_regular_price();
            $sale_price    = (float) $child_product->get_sale_price();

            if ($sale_price != 0 || !empty($sale_price)) {
                // Calculate and set in the array the percentage for each child on sale
                $percentages[] = round(100 - ($sale_price / $regular_price * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        if ($sale_price != 0 || !empty($sale_price)) {
            $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
        } else {
            return $html;
        }
    }
    return ' <div class="label label-sale"><p>' . $percentage . '</p></div>';
}


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);


//повторне додавання товару в кошик при обнові сторінки
add_action('add_to_cart_redirect', 'resolve_dupes_add_to_cart_redirect');

function resolve_dupes_add_to_cart_redirect($url = false)
{

    // Если другой плагин опередит нас, дайте ему возможность использовать URL.
    if (!empty($url)) {
        return $url;
    }

    // Перенаправление обратно на исходную страницу без параметра «добавить в корзину».
    // Мы добавляем часть «get_bloginfo», чтобы она сохраняла перенаправление на сайты https://.
    return get_bloginfo('wpurl') . add_query_arg(array(), remove_query_arg('add-to-cart'));
}



//register portfolio taxonomy
// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy()
{

    register_taxonomy('objects', array('portfolio'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Категорії',
            'singular_name'     => 'Категорія',
            'search_items'      => 'Знайти категорію',
            'all_items'         => 'Всі категорії',
            'view_item '        => 'Переглянути категорії',
            'parent_item'       => 'Батьківська категорія',
            'parent_item_colon' => 'Батьківська Категорія:',
            'edit_item'         => 'Змінити категорію',
            'update_item'       => 'Оновити категорію',
            'add_new_item'      => 'Додати нову категорію',
            'new_item_name'     => 'Нове ім\'я категорії',
            'menu_name'         => 'Категорії',
        ),
        'description'           => 'Категорії портфоліо', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'hierarchical'          => false,
        'rewrite'               => true,
        'show_in_rest' => true,

    ));
}


//register портволіо
add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type('portfolio', [
        'label'  => null,
        'labels' => [
            'name'               => 'Портфоліо', // основное название для типа записи
            'singular_name'      => 'Портфоліо', // название для одной записи этого типа
            'add_new'            => 'Додати роботу', // для добавления новой записи
            'add_new_item'       => 'Додавання роботи', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редагування роботи', // для редактирования типа записи
            'new_item'           => 'Нова робота', // текст новой записи
            'view_item'          => 'Переглянути роботу', // для просмотра записи этого типа.
            'search_items'       => 'Шукати роботу в портфоліо', // для поиска по этим типам записи
            'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не знайдено в кошику', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Портфоліо', // название меню
        ],
        'description'         => 'Наші роботи в портфоліо',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'thumbnail', 'post-formats', 'excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array('objects'),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => false,
    ]);
}



//Виробник
add_action('init', 'create_taxonomy_vendor');
function create_taxonomy_vendor()
{

    register_taxonomy('vendors', array('product'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Виробники',
            'singular_name'     => 'Виробник',
            'search_items'      => 'Знайти виробника',
            'all_items'         => 'Всі виробники',
            'view_item '        => 'Переглянути виробників',
            'parent_item'       => 'Батьківський виробник',
            'parent_item_colon' => 'Батьківськй вирообник:',
            'edit_item'         => 'Змінити виробника',
            'update_item'       => 'Оновити виробника',
            'add_new_item'      => 'Додати нового виробника',
            'new_item_name'     => 'Нове ім\'я виробника',
            'menu_name'         => 'Виробники',
        ),
        'description'           => 'Виробники', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'hierarchical'          => false,
        'rewrite'               => true,
        'show_in_rest' => true,

    ));
}


//площа приміщення
add_action('init', 'create_taxonomy_area');
function create_taxonomy_area()
{

    register_taxonomy('area', array('product'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Площі',
            'singular_name'     => 'Площа',
            'search_items'      => 'Знайти площу',
            'all_items'         => 'Всі площі',
            'view_item '        => 'Переглянути площі',
            'parent_item'       => 'Батьківська площа',
            'parent_item_colon' => 'Батьківська площа:',
            'edit_item'         => 'Змінити площу',
            'update_item'       => 'Оновити площу',
            'add_new_item'      => 'Додати нову площу',
            'new_item_name'     => 'Нове ім\'я площі',
            'menu_name'         => 'Площі',
        ),
        'description'           => 'Площі', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'hierarchical'          => false,
        'rewrite'               => true,
        'show_in_rest' => true,

    ));
}



//компресор
add_action('init', 'create_taxonomy_compressor');
function create_taxonomy_compressor()
{

    register_taxonomy('compressor', array('product'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Компресори',
            'singular_name'     => 'Компресор',
            'search_items'      => 'Знайти компресор',
            'all_items'         => 'Всі компресори',
            'view_item '        => 'Переглянути компресори',
            'parent_item'       => 'Батьківський компресор',
            'parent_item_colon' => 'Батьківськй компресор:',
            'edit_item'         => 'Змінити компресор',
            'update_item'       => 'Оновити компресор',
            'add_new_item'      => 'Додати новий компресор',
            'new_item_name'     => 'Нове ім\'я компресора',
            'menu_name'         => 'Компресори',
        ),
        'description'           => 'Компресори', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'hierarchical'          => false,
        'rewrite'               => true,
        'show_in_rest' => true,

    ));
}


//режим роботи
add_action('init', 'create_taxonomy_mode');
function create_taxonomy_mode()
{

    register_taxonomy('mode', array('product'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Режими роботи',
            'singular_name'     => 'Режим роботи',
            'search_items'      => 'Знайти режим роботи',
            'all_items'         => 'Всі режими роботи',
            'view_item '        => 'Переглянути режими роботи',
            'parent_item'       => 'Батьківський режим роботи',
            'parent_item_colon' => 'Батьківськй режим роботи:',
            'edit_item'         => 'Змінити режим роботи',
            'update_item'       => 'Оновити режим роботи',
            'add_new_item'      => 'Додати новий режим роботи',
            'new_item_name'     => 'Нове ім\'я режиму роботи',
            'menu_name'         => 'Режими роботи',
        ),
        'description'           => 'Режаит роботи', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'hierarchical'          => false,
        'rewrite'               => true,
        'show_in_rest' => true,

    ));
}



function custom_dequeue()
{
    wp_dequeue_style('full-screen-search');
    wp_dequeue_style('prettyPhoto');
    wp_deregister_style('full-screen-search');
    wp_deregister_style('prettyPhoto');
}
add_action('wp_enqueue_scripts', 'custom_dequeue', 9999);
add_action('wp_head', 'custom_dequeue', 9999);




add_action('woocommerce_before_quantity_input_field', 'eco_alt_quantity_plus', 25);
add_action('woocommerce_after_quantity_input_field', 'eco_alt_quantity_minus', 25);

function eco_alt_quantity_plus()
{
    echo "<button class='plus'><img src='" . get_template_directory_uri() . '/assets/img/plus-circle-  outline.svg' . "' alt=''></button>";
}

function eco_alt_quantity_minus()
{
    echo "<button  class='minus'><img src='" . get_template_directory_uri() . '/assets/img/minus-circle.svg' . "' alt=''></button>";
}

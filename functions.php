<?php
require_once("inc/highlights-custom-post-type.php");

add_action('after_setup_theme', 'setup_rock_theme');

function setup_rock_theme()
{

    /**
     * Adiciona suporte a imagens destacadas
     */
    add_theme_support('post-thumbnails');

    /**
     * Adiciona suporte a logomarca para o site
     */
    add_theme_support('custom-logo');

    /**
     * Adiciona suporte a menus
     */
    register_nav_menus(array('primary' => 'Menu principal'));

    /**
     * Defini um novo tamanho de thumbnail para os destaques
     */
    add_image_size('highlights', 1110, 300, true);
}


add_action('wp_enqueue_scripts', 'rock_scripts');

function rock_scripts()
{
    /**
     * Adiciona um stylesheet ao tema
     */
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:700,900');
    wp_enqueue_style('rock-style', get_stylesheet_directory_uri() . '/css/theme.css');

    wp_enqueue_script('bootstrap-script', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
        array('jquery'));

    /**
     * Adiciona um script ao tema
     */
    # wp_enqueue_script('rock-script', get_stylesheet_directory_uri() . '/js/theme.js');
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function rock_widgets_init()
{

    register_sidebar(array(
        'name'          => 'Barra lateral do blog',
        'id'            => 'sidebar_blog',
        'before_widget' => '<div class="mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));

}

add_action('widgets_init', 'rock_widgets_init');


/**
 * Custom callback for outputting comments
 *
 * @return void
 * @author Keir Whitaker
 */
function bootstrap_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>
    <?php if ($comment->comment_approved == '1') : ?>
    <li class="media">
    <div class="media-left">
        <?php echo get_avatar($comment); ?>
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?php comment_author_link() ?></h4>
        <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a>
        </time>
        <?php comment_text() ?>
    </div>
<?php endif;
}

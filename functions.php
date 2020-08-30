<?php

/**
 * MyFirstTheme's functions and definitions
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (!isset($content_width))
  $content_width = 800; /* pixels */

if (!function_exists('myfirsttheme_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   */
  function myfirsttheme_setup()
  {

    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain('myfirsttheme', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support('automatic-feed-links');

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support('post-thumbnails');

    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus(array(
      'primary'   => __('Primary Menu', 'myfirsttheme'),
      'secondary' => __('Secondary Menu', 'myfirsttheme')
    ));

    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
  }
endif; // myfirsttheme_setup
add_action('after_setup_theme', 'myfirsttheme_setup');

function add_theme_scripts()
{
  //css
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('override', get_template_directory_uri() . './assets/css/override.css');

  //Js files
  wp_enqueue_script('jquery.min', get_template_directory_uri() . './assets/js/vendor/jquery.min.js');
  wp_enqueue_script('popper.min', get_template_directory_uri() . './assets/js/vendor/popper.min.js');
  wp_enqueue_script('bootstrap.min', get_template_directory_uri() . './assets/js/vendor/bootstrap.min.js');
  wp_enqueue_script('functions', get_template_directory_uri() . './assets/js/functions.js');


  wp_enqueue_script('main', get_template_directory_uri() . './assets/js/main.js');

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

/*
 SCRIPT TO GET POST VIEWS COUNT
*/
function wpb_set_post_views($postID)
{
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}
//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* 
    NAVIGATION BAR
*/


function register_my_menus()
{
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'extra-menu' => __('Extra Menu')
    )
  );
}
add_action('init', 'register_my_menus');

/* 
===========
Change how comments are displayed
===========
*/
class medi_walker_comment extends Walker_Comment
{

  protected function comment($comment, $depth, $args)
  {
    if ('div' == $args['style']) {
      $tag       = 'div';
      $add_below = 'comment';
    } else {
      $tag       = 'li';
      $add_below = 'div-comment';
    }

    $commenter          = wp_get_current_commenter();
    $show_pending_links = isset($commenter['comment_author']) && $commenter['comment_author'];

    if ($commenter['comment_author_email']) {
      $moderation_note = __('Your comment is awaiting moderation.');
    } else {
      $moderation_note = __('Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.');
    }
?>
    <<?php echo $tag; ?> <?php comment_class($this->has_children ? 'parent' : '', $comment); ?> id="comment-<?php comment_ID(); ?>">
      <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-author vcard row">
          <div class="col-3 col-md-2 pr-md-0 pr-1" >
            <?php
            if (0 != $args['avatar_size']) {
              echo get_avatar($comment, $args['avatar_size']);
            }
            ?>
          </div>
          <div class="col-9 col-md-10 pl-2 pl-md-0">
            <?php
            $comment_author = get_comment_author_link($comment);

            if ('0' == $comment->comment_approved && !$show_pending_links) {
              $comment_author = get_comment_author($comment);
            }

            printf(
              /* translators: %s: Comment author link. */
              __('%s <span class="says">says:</span>'),
              sprintf('<cite class="fn">%s</cite>', $comment_author)
            );
            ?>
            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                <?php
                /* translators: 1: Comment date, 2: Comment time. */
                printf(__('%1$s at %2$s'), get_comment_date('', $comment), get_comment_time());
                ?>
              </a>
              <?php
              edit_comment_link(__('(Edit)'), '&nbsp;&nbsp;', '');
              ?>
            </div>
            <?php
            comment_text(
              $comment,
              array_merge(
                $args,
                array(
                  'add_below' => $add_below,
                  'depth'     => $depth,
                  'max_depth' => $args['max_depth'],
                  'before'=>'<div class=\'pt-2\'>',
                  'after'=>'</div>',
                )
              )
            );
            ?>
          </div><!-- end of col-9 div where we have our comment body, date and comment author -->
        </div>
        <?php if ('0' == $comment->comment_approved) : ?>
          <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
          <br />
        <?php endif; ?>


        <?php
        comment_reply_link(
          array_merge(
            $args,
            array(
              'add_below' => $add_below,
              'depth'     => $depth,
              'max_depth' => $args['max_depth'],
              'before'    => '<div class="reply d-flex justify-content-end">',
              'after'     => '</div><hr>',
            )
          )
        );
        ?>

        <?php if ('div' != $args['style']) : ?>
        </div>
      <?php endif; ?>
  <?php
  }
}


/*
    FILTERS
*/
// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length($length)
{
  return 25;
}
add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);

function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Remove website field from comment
function website_remove($fields)
{
  if (isset($fields['url']))
    unset($fields['url']);
  return $fields;
}
add_filter('comment_form_default_fields', 'website_remove');

// remove cookie option from comments
remove_action('set_comment_cookies', 'wp_set_comment_cookies');

  ?>
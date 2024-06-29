<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package musicalnote
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
        <section class="top_header">
            <div class="container_head">
                <div class="wrapper_top">
                    <div class="mobile_menu">
                        <div class="hamburger">
                            <span class="icon-menu"></span>
                        </div>
                        <div class="close">
                        </div>

                    </div>
                    <figure class="logo">
					<?php 
                    $image = get_field('header_logo','option');
                    if(  $image  ): 
                    $link=get_field('header_logo_link','option'); ?>
                       <a href="<?php echo esc_url($link['url']);?>"> <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                    <?php endif; ?>
                  
                    </figure>
                    <form class="search-form">
                        <input type="text" placeholder="Search Article Name or Song Title" name="search">
                        <button type="submit"><span class="icon-search"></span></button>
                    </form>
                    <div class="logo">
                    <?php $link = get_field('wishlist','option');
                if ($link): ?>
                    
                        <a   class="wishlist" href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?><span class="icon-heart"></span></a>
                    
                <?php endif; ?>

                
                      

                <?php $link = get_field('cart','option');
                if ($link): ?>
                    
                        <a  class="cart" href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?><span class="icon-cart"></span>
                        <span class="cart-count-placeholder"></span>
                    </a>
                    
                <?php endif; ?>
                
                       

                    </div>
                </div>
            </div>
        </section>
        <section class="lower_header">
            <div class="container_head">
                <nav>
                <?php
                        wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_class' => 'navigation',
                        'container' => '',
                    )
                );
                ?>
                <div class="flags">
                    <figure class="eng">
                    <img src="<?php echo get_template_directory_uri() ?>/img/england.png" alt="england">
                    </figure>
                    <figure class="next_flag">
                    <img src="<?php echo get_template_directory_uri() ?>/img/flag.png" alt="flag">
                    </figure>
                </div>
                   
                </nav>
            </div>

        </section>
    </header>
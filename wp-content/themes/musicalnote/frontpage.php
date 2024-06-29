<?php
/* Template Name: homepage*/
get_header();
?>
<section class="hero_section">
    <div class="container">
        <div class="wrapper_arrow">
            <div class="prev">
                <span class="icon-navigate_before"></span>
            </div>
            <div class="next">
                <span class="icon-navigate_next"></span>
            </div>
            <?php if (have_rows('hero_banner')): ?>
                <div class="wrapper_hero slider">
                    <figure class="slide">
                        <img src="<?php echo get_template_directory_uri() ?>/img/banner1.jpg" alt="banner1">
                        <div class="banner_first">
                            <h3>
                                <?php the_field('first_hero_title') ?>
                            </h3>
                            <p>
                                <?php the_field('check') ?>
                            </p>

                            <?php if (have_rows('first_btn_list')): ?>
                                <div class="btn_flex_one">
                                    <?php while (have_rows('first_btn_list')):
                                        the_row(); ?>

                                        <?php $link = get_sub_field('btn_title');
                                        if ($link): ?>

                                            <div class="btn_banner">
                                                <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                                            </div>

                                        <?php endif; ?>
                                    <?php endwhile; ?>

                                </div>
                            <?php endif; ?>

                            <?php if (have_rows('second_btn_list')): ?>
                                <div class="btn_flex_two">
                                    <?php while (have_rows('second_btn_list')):
                                        the_row(); ?>
                                        <?php $link = get_sub_field('second_btn_title');
                                        if ($link): ?>

                                            <div class="btn_banner_two">
                                                <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                                            </div>

                                        <?php endif; ?>

                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </figure>
                    <figure class="slide">
                        <?php
                        $image = get_field('second_banner_image');
                        if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                        <?php endif; ?>
                      

                        <div class="over_banner">
                            <h3>
                                <?php the_field('second_title') ?>
                            </h3>
                            <p>
                                <?php the_field('second_des') ?>
                            </p>
                        </div>
                    </figure>
                    <?php while (have_rows('hero_banner')):
                        the_row(); ?>
                        <figure class="slide">
                            <?php
                            $image = get_sub_field('hero_image');
                            if ($image):
                                $link = get_sub_field('hero_link'); ?>
                                <a href="<?php echo esc_url($link['url']); ?>"> <img src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                            <?php endif; ?>

                        </figure>
                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
        </div>
    </div>
</section>

<section class="shop_now">
    <div class="container">
        <div class="wrapper_shop_now">
            <div class="lead">
                <h3>
                    <?php the_field('lead_title') ?>
                </h3>
                <?php $link = get_field('shop_link');
                if ($link): ?>
                    <div class="shop_btn">
                        <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                    </div>
                <?php endif; ?>

            </div>
            <div class="books">
                <h3>
                    <?php the_field('book_title') ?>
                </h3>
                <?php $link = get_field('shop_link');
                if ($link): ?>
                    <div class="shop_btn">
                        <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="piano">
                <h3>
                    <?php the_field('piano_title') ?>
                </h3>
                <?php $link = get_field('shop_link');
                if ($link): ?>
                    <div class="shop_btn">
                        <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="notable_idea">
    <div class="container">
        <div class="wrapper_idea">
            <div class="notable_content">
                <h2>
                    <?php the_field('notable_title') ?>
                </h2>
                <p>
                    <?php the_field('notable_description') ?>
                </p>
                <?php $link = get_field('read_more');
                if ($link): ?>
                    <div class="read_btn">
                        <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="new_items">
    <div class="container">
        <div class="wrapper_items">
            <div class="new_title">
                <h2>
                    <?php the_field('new_title') ?>
                </h2>
            </div>
            <div class="arrow">
                <div class="before">
                    <span class="icon-navigate_before"></span>
                </div>
                <div class="after">
                    <span class="icon-navigate_next"></span>
                </div>

                <?php if (have_rows('new_posts')): ?>
                    <div class="items_flex new_slider">
                        <?php while (have_rows('new_posts')):
                            the_row(); ?>
                            <?php
                            $id = get_sub_field('new_item');
                            $product = wc_get_product($id);
                            ?>
                            <div class="content" onclick="display('<?php echo $product->get_permalink(); ?>');">
                                <figure class="cover_image">
                                    <div class="new_cover">
                                        <?php echo $product->get_image(); ?>
                                    </div>
                                    <div class="like_round">
                                        <img src="<?php echo get_template_directory_uri() ?>/img/like-round.svg" alt="like">
                                    </div>
                                </figure>

                                <div class="album_info">
                                    <h3 class="song_title">
                                        <?php echo $product->get_title(); ?>
                                    </h3>
                                    <span class="author">Created by: <b>
                                            <?php ?>
                                        </b> in <b>Lead Sheet</b></span>
                                    <div class="price"> $
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
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>






<?php $args = ['post_type' => "product", 'tax_query' => [['taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'top-selling-items']]];
$my_posts = new WP_Query($args);

if ($my_posts->have_posts()): ?>
    <section class="top_selling">
        <div class="container">
            <div class="wrapper_top_selling">
                <div class="top_title">
                    <h2>
                        <?php the_field('top_selling_titile') ?>
                    </h2>
                </div>
                <div class="top_flex">
                    <?php while ($my_posts->have_posts()):
                        $my_posts->the_post(); ?>
                        <div class="top_content" onclick="display('<?php the_permalink(); ?>');">
                            <div class="top_cover">
                                <div>
                                    <?php the_post_thumbnail(); ?>
                                </div>

                                <div class="like">
                                    <img src="<?php echo get_template_directory_uri() ?>/img/like-round.svg" alt="like">
                                </div>
                            </div>
                            <div class="top_info">
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
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
<?php $args = ['post_type' => "product", 'tax_query' => [['taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'featured-items']]];
$my_posts = new WP_Query($args);

if ($my_posts->have_posts()): ?>
    <section class="feature_items">
        <div class="container">
            <div class="wrapper_feature">
                <div class="feature_title">
                    <h2>
                        <?php the_field('feature_item_title') ?>
                    </h2>
                </div>
                <div class="arrow">
                    <div class="forward">
                        <span class="icon-navigate_before"></span>
                    </div>
                    <div class="backward">
                        <span class="icon-navigate_next"></span>
                    </div>
                    <div class="feature_flex feature_slider" >
                        <?php while ($my_posts->have_posts()):
                            $my_posts->the_post(); ?>
                            <div class="feature_content"onclick="display('<?php the_permalink(); ?>');">
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
        </div>

    </section>

<?php endif; ?>


<section class="collection">
    <div class="container">
        <div class="wrapper">
            <?php if (have_rows('collection')): ?>
                <div class="collection-flex">
                    <?php while (have_rows('collection')):
                        the_row(); ?>
                        <div class="collection_content">
                            <figure class="lag">
                                <?php
                                $image = get_sub_field('collection_image');
                                if ($image):
                                    $link = get_sub_field('collection_link'); ?>
                                    <a href="<?php echo esc_url($link['url']); ?>"> <img src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                                <?php endif; ?>

                            </figure>

                            <div class="over_text">
                                <a href="#">
                                    <h3>
                                        <?php the_sub_field('after_text') ?>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<section class="artists">
    <div class="container">
        <div class="wrapper_artists">
            <div class="artist_title">
                <h2>
                    <?php the_field('feature_artist_title') ?>
                </h2>
            </div>
            <div class="arrow">
                    <div class="aforward">
                        <span class="icon-navigate_before"></span>
                    </div>
                    <div class="abackward">
                        <span class="icon-navigate_next"></span>
                    </div>
            <?php if (have_rows('artist')): ?>
                <div class="artist_flex mySlider">
                    <?php while (have_rows('artist')):
                        the_row(); ?>
                        <div class="artist_content">
                            <figure class="artist_image">
                                <a href="#">
                                    <img src="<?php echo get_sub_field('artist_image') ?>" alt="artist">
                                </a>
                            </figure>
                            <h4>
                                <?php echo get_sub_field('artist_name') ?>
                            </h4>
                            <p>
                                <?php echo get_sub_field('artist_des') ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<section class="have_idea">
    <div class="container">
        <div class="wrapper_have">
            <figure class="idea_image">
                <?php
                $image = get_field('idea_image');
                if ($image): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                <?php endif; ?>
                <!-- <img src="<?php echo get_template_directory_uri() ?>/img/idea.jpg" alt="idea"> -->
            </figure>

            <div class="idea_content">
                <?php if (get_field('idea_title')) { ?>
                    <h4>
                        <?php the_field('idea_title') ?>
                    </h4>
                    <?php
                }
                ?>
                <?php $link = get_field('click_link');
                if ($link): ?>
                    <div class="click_here">
                        <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php
get_footer();
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package musicalnote
 */

?>

<footer>
        
        <section class="call">
            <div class="container">
                <div class="wrapper_call">
				<?php if(get_field('call_title','option')){?> 
                            <p><?php the_field('call_title','option')?> </p>
                            <?php
                        }
                        ?> 
                  
					<?php $link=get_field('contact_btn','option');
                                            if($link): ?>                   
                                            <div class="call_btn">
                                                    <a href="<?php echo esc_url($link['url']) ?>"><?php echo esc_html($link['title']) ?></a>
                                            </div>                      
                                        <?php endif;?> 
                    

                </div>
            </div>
        </section>
        <section class="footer_low">
            <div class="container">
                <div class="wrapper_footer">
                    <div class="first">
                        <figure>
                            <?php 
                                $image = get_field('footer_logo','option');
                                if(  $image  ): 
                                $link=get_field('footer_logo_link','option'); ?>
                                <a href="<?php echo esc_url($link['url']);?>"> <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                            <?php endif; ?>
            
                        </figure>

                       
						<?php if(get_field('footer_description','option')){?> 
                            <p class="footer_para"><?php the_field('footer_description','option')?> </p>
                            <?php
                        }
                        ?> 
                      
                    </div>

                    <div class="customer">
							<?php if(get_field('customer_title','option')){?> 
									<h4><?php the_field('customer_title','option')?> </h4>
									<?php
								}
								?>
					<?php
                        wp_nav_menu(
                    array(
                        'theme_location' => 'menu-2',
                        'menu_class' => 'customer_list',
                        'container' => '',
                    )
                );
                ?>
                    </div>
                    <div class="Account">
					<?php if(get_field('account_title','option')){?> 
                            <h4><?php the_field('account_title','option')?> </h4>
                            <?php
                        }
                        ?>

					<?php
                        wp_nav_menu(
                    array(
                        'theme_location' => 'menu-3',
                        'menu_class' => 'account_list',
                        'container' => '',
                    )
              	  	);
               		 ?>
                  
                    </div>
                    <div class="Follow">
					<?php if(get_field('follow_title','option')){?> 
                            <h4><?php the_field('follow_title','option')?> </h4>
                            <?php
                        }
                        ?>
                    
                        <ul class="icons">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin2"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
    </footer>

<?php wp_footer(); ?>

</body>
</html>

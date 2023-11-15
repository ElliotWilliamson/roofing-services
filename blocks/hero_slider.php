<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function HeroSlider(){
        Block::make( __( 'Hero Slider' ) )
        ->add_fields( array(
            Field::make('complex', 'crb_hero_slides', 'Hero Slider')
            ->add_fields( array( Field::make( 'text', 'slide_heading', 'Main Slide Heading' ), Field::make( 'text', 'slide_text', 'Slide Text' ), Field::make( 'text', 'slide_button_text', 'Slide Button Text' ), Field::make( 'image', 'slide_image', 'Slide Image' )->set_value_type( 'url' ))
       )))
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
                
                <section id="homeFlex" class="color2">
                    <img src="<?php echo get_template_directory_uri() . "/img/slider-movil.jpg"; ?>" alt="pic 1" class="slide-mobile visible-xs" />
                    <div class="flexslider flexFullScreen hidden-xs slider-shadow">
                        <ul class="slides sliderWrapper">
                            <?php foreach ($fields['crb_hero_slides'] as $key => $value) {
                                 $image_id = attachment_url_to_postid( $value['slide_image'] );
                                 $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                ?>
                                <li class="slideN<?php echo $key ?>"> 
                                    <img src="<?php echo $value['slide_image'] ?>" alt="<?php echo $image_alt ?>"/>
                                    <div class="caption <?php echo ($key % 2 == 0 ? 'left' : 'right') ?> hidden-xs">
                                        <div class="element1-1" data-animation="<?php echo ($key % 2 == 0 ? 'fadeInLeftBig' : 'bounceInDown') ?>">
                                            <h1><?php echo $value['slide_heading'];?></h1>
                                        </div>
                                        <div class="element1-2" data-animation="<?php echo ($key % 2 == 0 ? 'fadeInRightBig' : 'bounceInDown') ?>">
                                            <h2><?php echo $value['slide_text'];?></h2>
                                        </div>
                                        <div class="element1-4" data-animation="<?php echo ($key % 2 == 0 ? 'fadeInLeftBig' : 'bounceInDown') ?>">
                                            <a href="contact.php" class="btn btn-sm btn-inverse"><?php echo $value['slide_button_text']; ?>
                                            </a>
                                       </div>
                                    </div>
                                </li>
                            <?php } ?>    
                        </ul>
                    </div>
                </section>
            <?php
        } );
    }
?>
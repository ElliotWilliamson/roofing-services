<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function RibbonItems(){
        Block::make( __( 'Ribbon Items' ) )
        ->add_fields( array(
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
            <?php 
                $services_query = new WP_Query(array(
                    'post_type' => 'services',
                    'orderby' => 'title',
                    'posts_per_page' => 3
                ));
            ?>
            <section id="clients" class="pt30 pb30 texture2">
                <div class="container">
                    <div class="row negative-margin">
            <?php
               if ($services_query->have_posts() ) {
                    while ( $services_query->have_posts() ) {
                       $services_query->the_post(); 
            ?>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="bord-box">
                        <div class="box-bg1" align="center">
                            <div class="bg_opaque">
                                <div class="box-serv-home">
                                    <h3 class="t-Color1"><?php the_title( ); ?></h3>
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <p class="t-Color1"><?php the_field("service_description"); ?></p>
                                            <a href="/services" class="btn btn-xs b_brown-4 btn-inverse">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
                    }
                    wp_reset_postdata();
                ?>
                 </div>
               </div>
           </section>
            <?php

            
       });

       
    }
?>


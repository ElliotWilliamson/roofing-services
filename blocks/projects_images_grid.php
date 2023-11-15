<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function ProjectsImagesGrid(){
        Block::make( __( 'Projects Images Grid' ) )
        ->add_fields( array())->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
       <section id="content">
            <section class="pt30 pb30 texture2"> 
                <div class="container clearfix">
                    <div class="row">
                        <div class="portfolio-items  isotopeWrapper clearfix imgHover" id="3">
                <?php
                    $projects_query = new WP_Query(array(
                        'post_type' => 'projects',
                        'orderby' => 'date',
                        'posts_per_page' => 4
                    ));
                ?>

                <?php
                    if ( $projects_query->have_posts() ) {
                        while ( $projects_query->have_posts() ) {
                            $projects_query->the_post(); 
                            $project_image_url = get_field('main_image_describing_this_project');    
                            $image_id = attachment_url_to_postid( $project_image_url );
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
					<article class="col-sm-3 isotopeItem women">
						<section class="imgWrapper">
							<img alt="<?php echo $image_alt; ?>" src="<?php echo $project_image_url;?>" class="img-responsive imgBorder">
						</section>
						<div class="mediaHover">
							<div class="mask"></div>
							<div class="iconLinks">
								<a href="<?php echo $project_image_url;?>" class="image-link" title="<?php the_title( ); ?>" >
									<i class="icon-search iconRounded iconMedium"></i>
									<span>zoom</span>
								</a> 
							</div>
						</div>
					</article>
                <?php }
                   }
                   wp_reset_postdata();
                ?>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php
       });
    }
?>
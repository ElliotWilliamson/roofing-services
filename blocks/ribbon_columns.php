<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;

    function get_excerpt($string,$length){
        $string = strip_tags($string);
        if (strlen($string) > $length) {
            $stringCut = substr($string, 0, $length);
            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        }
        return $string;
    }

    function RenderRows($array){
        ?>
             <div class="row">
        <?
        foreach ($array as $key => $value) {
           ?>
           
                <div class="col-md-6">
                    <div class="boxIconServices clearfix">
                            <i class="imgServhome"><img src="<?php echo $value['image'] ?>" alt=""></i>
                            <div class="boxContent">
                                <h2><?php echo $value['title'];?></h2>
                                <p><?php echo get_excerpt( $value['description'], 200);?><a class="btn btn-inverse btn-xs" href="/services">read more</a></p>
                            </div>
                    </div>
                </div>
            
           <?
        }
        ?>
             </div>
        <?
    }


    function RibbonColumns(){
        Block::make( __( 'Ribbon Columns' ) )
        ->add_fields( array(
            Field::make('text','title',__( 'Section Title' )),
            Field::make('text','text',__( 'Section text' ))
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>

       <?php
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'orderby' => 'title',
                'posts_per_page' => -1
            ));
       ?>
       	<?php
        $services = array();
        if ($services_query->have_posts() ) {
                while ( $services_query->have_posts() ) {
                    $services_query->the_post(); 
                    $services[] = array(
                        "title" => get_the_title( ),
                        "description" => get_field("service_description"),
                        "image" => get_field("service_image")
                    );
                }
            }
            wp_reset_postdata();
        ?>
       <section class="" id="services">
                <div class="title bgColor1">
                    <h1 class="t-Color1"><?php echo $fields['title']; ?></h1>
                    <h2 class="subTitle t-Color1"><?php echo $fields['text']; ?></h2>
                </div>
                <div class="container pb30 pt30 textColorServ">
                    <?php RenderRows($services); ?>
                </div>
       </section>
        <?php
       });
       
    }
?>
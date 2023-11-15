<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function MediaRow(){
        Block::make( __( 'Media Row' ) )
        ->add_fields( array(
            Field::make('text', 'title', 'Media Row Title'),
            Field::make('rich_text', 'description', 'Media Row Text'),
            Field::make('image', 'image_first', 'Media Row First Image')->set_value_type( 'url' ),
            Field::make('image', 'image_second', 'Media Row Second Image')->set_value_type( 'url' )
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
                <section class="texture2">
                    <div class="container">
                        <div class="row pt30 pb15">
                            <div class="col-md-6 t-Color4">
                                <h2 class="text-shad t-Color2"><?php echo $fields['title'];?></h2>
                                <?php echo $fields['description'];?>
                            </div>
                            <div class="col-md-6">
                                <div class="hidden-xs hidden-sm">
                                    <img src="<?php echo $fields['image_first'] ?>" alt="services" class="img-responsive img1">
                                    <img src="<?php echo $fields['image_second'] ?>" alt="services" class="img-responsive img2">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <?php
       });
    }
?>
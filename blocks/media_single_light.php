<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function MediaSingleLight(){
        Block::make( __( 'Media Single Light' ) )
        ->add_fields( array(
            Field::make('text', 'title', 'Media Single Light Title'),
            Field::make('rich_text', 'content', 'Media Single Light Text'),
            Field::make('image', 'image', 'Media Single Light Image')->set_value_type( 'url' )
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
                <section id="content" class="mt30 pb30">
                    <div class="container">
                        <div class="row mb30">
                            <div class="col-sm-6">
                                <img src="<?php echo $fields['image']; ?>" class="img-responsive" alt="img">
                            </div>
                            <div class="col-sm-6 t-Color4"><br><br>
                                <h2 class="text-shad t-Color3"><?php echo $fields['title'];?></h2>
                                <?php echo $fields['content'];?>
                            </div>
                        </div>
                    </div>
                </section>
        <?php
       });
    }
?>
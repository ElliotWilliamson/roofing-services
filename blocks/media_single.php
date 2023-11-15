<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function MediaSingle(){
        Block::make( __( 'Media Single' ) )
        ->add_fields( array(
            Field::make('text', 'title', 'Media Single Title'),
            Field::make('rich_text', 'content', 'Media Single Content'),
            Field::make('text', 'button_text', 'Media Single Content Button Text')
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
            <section class="bg-3">
                <div class="bg-opacite-50">
                    <div class="bigSect">
                        <div class="container">
                            <div class="row pt30 pb15">
                                <div class="col-md-7">
                                    
                                </div>
                                <div class="col-md-5 t-Color1">
                                    <h2 class="text-shad t-Color1"><?php echo $fields['title']; ?></h2>
                                    <?php echo $fields['content']; ?>
                                    <a class="btn btn-inverse" title="" href="about.php">
                                    <?php echo $fields['button_text']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
       });
    }
?>
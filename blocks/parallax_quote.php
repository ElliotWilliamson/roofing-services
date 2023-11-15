<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function ParallaxQuote(){
        Block::make( __( 'Parallax Quote' ) )
        ->add_fields( array(
            Field::make('text', 'author', 'Quote Author'),
            Field::make('textarea', 'quote', 'Quote Text')
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
                <section class="bg-2" data-stellar-background-ratio="0.5">
                    <div class="bg-opacite">
                        <div class="padding">
                            <div class="maskParent">
                                <div class="paralaxMask"></div>
                                <div class="paralaxText container">
                                    <i class="icon-megaphone "></i>
                                    <blockquote class="bigTitle"><?php echo $fields['quote'];?><br/><small><?php echo $fields['author'];?></small>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <?php
       });
    }
?>
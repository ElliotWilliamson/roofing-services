<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;


    function ParallaxSection(){
        Block::make( __( 'Parallax Section' ) )
        ->add_fields( array(
            Field::make('text', 'title', 'Section Title'),
            Field::make('textarea', 'text', 'Section Paragraph')
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
            <section class="bg-1" data-stellar-background-ratio="0.5">
                <div class="bg-opacite">
                    <div class="padding">
                        <div class="maskParent">
                            <div class="paralaxMask"></div>
                            <div class="paralaxText container">
                                <h2 class="bigTitle t-Color3"><?php echo $fields['title'];?></h2>
                                <p class="t-Color1 font24"><?php echo $fields['text'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
       });
    }
?>
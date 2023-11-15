<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;

    function ColumnsTexts(){
        Block::make( __( 'Columns Texts' ) )
        ->add_fields( array(
            Field::make('complex', 'columns_texts', 'Columns Texts')->add_fields(array(
                Field::make('text', 'column_title', 'Column Title'),
                Field::make('textarea', 'column_content', 'Column Content')
            )),
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
            <section class="texture2">
                <div class="container">
                    <div class="row pb30 pt15">
                        <?php foreach ($fields['columns_texts'] as $key => $value) { ?>
                            <div class="col-md-4">
                                <h3 class="t-Color2"><?php echo $value['column_title']; ?></h3>
                                <p class="t-Color4"><?php echo $value['column_content'];?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php
       });
    }
?>
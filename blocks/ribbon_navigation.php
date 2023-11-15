<?php
    use Carbon_Fields\Field;
    use Carbon_Fields\Block;

    function RibbonNavigation(){
        Block::make( __( 'Ribbon Navigation' ) )
        ->add_fields( array(
       ))->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { ?>
            <?php 
                 $slug = get_post_field( 'post_name', get_post() );
            ?>
            <header class="page-header texture2" itemscope itemtype="http://schema.org/WPHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 align="right" class="t-Color2"><span itemprop="headline">
                                <?php the_title(); ?>
                            </h3>
                        </div>
                        <div class="col-sm-6 hidden-xs">
                            <ul class="t-Color3" id="navTrail" vocab="http://schema.org/" typeof="BreadcrumbList">
                                <li property="itemListElement" typeof="ListItem">
                                    <a href="/" title="Home" property="item" typeof="WebPage"><span property="name">Home</span></a>
                                    <meta property="position" content="1">
                                </li>

                                <?php if ($slug=='landing-page'){?>
                                <li property="itemListElement" typeof="ListItem">
                                    <a href="services.php" title="Landing Page" property="item" typeof="WebPage">
                                    <span property="name">Services</span></a>
                                    <meta property="position" content="2">
                                </li>

                                <?php } elseif ($slug=='blog'){?>
                                <li property="itemListElement" typeof="ListItem">
                                    <a href="blog.php" title="Blog" property="item" typeof="WebPage">
                                    <span property="name">Blog</span></a>
                                    <meta property="position" content="2">
                                </li>
                                <?php }?>


                                <li property="itemListElement" typeof="ListItem">
                                    <span property="item" typeof="WebPage">
                                        <span property="name">
                                            <?php 
                                                the_title( );
                                            ?>
                                        </span>
                                    </span>
                                    <meta property="position" content="<?php if ($slug=='landing-page'||$slug=='blog'){echo "3";}else{echo "2";};?>">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        <?php

       });
    }
?>
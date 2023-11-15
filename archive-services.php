<?php
    get_header();
    $slug = get_post_field( 'post_name', get_post() );
?>
 <header class="page-header texture2" itemscope itemtype="http://schema.org/WPHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 align="right" class="t-Color2"><span itemprop="headline">
                                Services
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
                                            Services
                                        </span>
                                    </span>
                                    <meta property="position" content="<?php if ($slug=='landing-page'||$slug=='blog'){echo "3";}else{echo "2";};?>">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
</header>

<section id="services" itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
	<div class="container pb30 pt30 t-Color4">
         <?php
            while(have_posts(  )){
                the_post(  );
                ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <img src="<?php echo get_field('service_image'); ?> " alt="image services" class="hidden-xs borderImg img-responsive">
                        </div>
                        <div class="col-md-9 col-sm-9"><br><br>
                            <h2 class="t-Color2"><?php the_title( ); ?></h2>
                            <p><?php echo get_field('service_description');?></p>
                        </div>
                    </div><br>
                <?
            }
         ?>
    </div>
</section>
<?php
    get_footer( );
?>
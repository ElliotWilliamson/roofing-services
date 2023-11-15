<?php
    get_header();
    $slug = get_post_field( 'post_name', get_post() );
?>
            <header class="page-header texture2" itemscope itemtype="http://schema.org/WPHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 align="right" class="t-Color2"><span itemprop="headline">
                                Portfolio
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
                                            Portfolio
                                        </span>
                                    </span>
                                    <meta property="position" content="<?php if ($slug=='landing-page'||$slug=='blog'){echo "3";}else{echo "2";};?>">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <section id="content">
		<section class="pt30 pb30"> 
			<div class="container clearfix">
				<div class="row">
					<div class="portfolio-items  isotopeWrapper clearfix imgHover" id="3">
         <?php
            while(have_posts(  )){
                the_post(  );
                ?>
						<article class="col-sm-3 isotopeItem women">
							<section class="imgWrapper">
								<img alt="" src="<?php echo get_field('main_image_describing_this_project') ?>" class="img-responsive imgBorder">
							</section>
							<div class="mediaHover">
								<div class="mask"></div>
								<div class="iconLinks">
									<a href="<?php echo get_field('main_image_describing_this_project') ?>" class="image-link" title="Full width image" >
										<i class="icon-search iconRounded iconMedium"></i>
										<span>zoom</span>
									</a> 
								</div>
							</div>
						</article>
                <?
            }
         ?>
         			</div>
				</div>
			</div>
		</section>
	</section>
</section>
    </div>
</section>
<?php
    get_footer( );
?>
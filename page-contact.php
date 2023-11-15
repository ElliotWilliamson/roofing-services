<?php
    get_header();
    $slug = get_post_field( 'post_name', get_post() );
    $company_name = carbon_get_theme_option('crb_company_name');
    $company_address = carbon_get_theme_option('crb_company_address');
    $company_phone_numbers = carbon_get_theme_option( 'crb_company_phone_numbers' );
    $company_emails = carbon_get_theme_option('crb_company_emails');
    $company_accepted_payments = carbon_get_theme_option('crb_payment_types');
    $company_schedule = carbon_get_theme_option('crb_company_schedule');
    $accepted_payments_message = 'We accept ';
    $company_perks =  carbon_get_theme_option('crb_business_perks');
    $google_map = carbon_get_theme_option("crb_company_map");

    foreach ($company_accepted_payments as $key => $value) {

        if($key != (count($company_accepted_payments) - 1)){
            $accepted_payments_message .= $value['crb_accepted_payment'] . ', ';
        }else{
            $accepted_payments_message .= $value['crb_accepted_payment'];
        }

        
    }

    $accepted_payments_message = substr_replace($accepted_payments_message, ' &', strrpos($accepted_payments_message, ','), 1);
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

<section id="page">
			<section id="content" class="mt30">
				<div class="container t-Color4">

					<div class="row">
						<div class="col-sm-4">
							<h4 class="t-Color2">Contact Info</h4>
							<address>
								<h3 class="t-Color2"><?php echo $company_name;?></h3>
								<p>
									<i class="icon-location"></i>&nbsp;<?php echo $company_address;?><br>
                                    <?php
									foreach ( $company_phone_numbers as $phone_number ) {
								?>
                                    <i class="icon-phone"></i>&nbsp;<a href="<?php echo 'tel:+1'. preg_replace('/\D/', '', $phone_number['phone']);?>" class="t-Color2"><?php echo $phone_number['phone']; ?></a> <br>
								<?php
									}
								?>
                                <?php
									foreach ( $company_emails as $email ) {
								?>
                                  <i class="icon-mail"></i>&nbsp;<a href="mailto:<?php echo $email['crb_company_email'];?>" class="t-Color2"><?php echo $email['crb_company_email'];?></a><br>
								<?php
									}
								?>
								</p>
								<p><i class="icon-credit-card"></i>&nbsp; <?php echo $accepted_payments_message;?><br>
								<i class="icon-wristwatch"></i>&nbsp;<?php echo $company_schedule;?><br>
								
                                <?php
								foreach ( $company_perks as $perk ) {
							?>
                                <i class="icon-flag"></i>&nbsp;<?php  echo $perk['crb_business_perk']; ?><br>
							<?php
								}
							?>
								</p>
																
							</address>
						</div>
						<div class="col-md-8">
							<?php echo do_shortcode('[contact-form-7 id="3696dbf" title="Contact form 1"]') ?>
						</div>
					</div>
				</div>
				<div class="mt30">
                  <iframe src="<?php echo $google_map ?>" class="googlemap" allowfullscreen></iframe>
				</div>
			</section>
		</section>

<?php
    get_footer( );
?>
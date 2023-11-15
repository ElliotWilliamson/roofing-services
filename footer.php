<?php
$the_query = new WP_Query(array(
    'post_type' => 'projects',
    'orderby' => 'date',
    'posts_per_page' => 6
));

$services_query = new WP_Query(array(
    'post_type' => 'services',
    'orderby' => 'title',
    'posts_per_page' => -1
));

$company_name = carbon_get_theme_option('crb_company_name');
$company_address = carbon_get_theme_option('crb_company_address');
$company_phone_numbers = carbon_get_theme_option( 'crb_company_phone_numbers' );
$company_emails = carbon_get_theme_option('crb_company_emails');
$company_accepted_payments = carbon_get_theme_option('crb_payment_types');
$company_schedule = carbon_get_theme_option('crb_company_schedule');
$company_perks =  carbon_get_theme_option('crb_business_perks');

$website_social_media_links = carbon_get_theme_option('crb_company_social_media');
$company_description = carbon_get_theme_option('crb_company_description');
$accepted_payments_message = 'We accept ';
foreach ($company_accepted_payments as $key => $value) {

    if($key != (count($company_accepted_payments) - 1)){
        $accepted_payments_message .= $value['crb_accepted_payment'] . ', ';
    }else{
        $accepted_payments_message .= $value['crb_accepted_payment'];
    }

    
}

$accepted_payments_message = substr_replace($accepted_payments_message, ' &', strrpos($accepted_payments_message, ','), 1);

$slug = get_post_field( 'post_name', get_post() );


?>

<footer id="footerWrapper" class="footer2">
<?php if ($slug !='contact') { ?>
	<section id="mainFooter">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="footerWidget">
						<?php echo $company_description; echo $slug;?>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="footerWidget">
						<h3>Latest Projects</h3>
						<ul class="list-unstyled worksList">
                            <?php
                                if ( $the_query->have_posts() ) {
                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post(); 
                                        $project_image_url = get_field('main_image_describing_this_project');    
                                        $image_id = attachment_url_to_postid( $project_image_url );
                                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                    ?>
                                        <li>
                                            <a href="/projects" class="tips" title="<?php the_title();?>">
                                                <img class="ImgFooter" src="<?php echo $project_image_url ?>" alt="<?php echo $image_alt; ?>">
                                            </a>
                                        </li>
                                    <?php }
                                }
                                wp_reset_postdata();
                            ?>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="footerWidget">

						<h3>Our Services</h3>
						<ul class="list-unstyled iconList">
                            <?php
                                if ($services_query->have_posts() ) {
                                    while ( $services_query->have_posts() ) {
                                            $services_query->the_post(); 
                                        ?>
                                            <li><a href="services.php"><?php the_title(); ?></a></li>
                                        <?php }
                                }
                                wp_reset_postdata();
                            ?>
						</ul>

					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="footerWidget">
						<h3>Contact Info</h3>
						<address>
							
							<p>
								<i class="icon-home"></i>&nbsp;<?php echo $company_address;?> <br>

								<?php
									foreach ( $company_phone_numbers as $phone_number ) {
								?>
                                    <i class="icon-phone"></i>&nbsp;<a href="<?php echo 'tel:+1'. preg_replace('/\D/', '', $phone_number['phone']);?>"><?php echo $phone_number['phone'];?></a> <br>
								<?php
									}
								?>

                                <?php
									foreach ( $company_emails as $email ) {
								?>
                                    <i class="icon-mail"></i>&nbsp;<a href="mailto:<?php echo $email['crb_company_email'];?>"><?php echo $email['crb_company_email'];?></a><br>
								<?php
									}
								?>
							</p>
							<p><i class="icon-credit-card"></i>&nbsp; <?php echo $accepted_payments_message;?><br>
							<i class="icon-wristwatch"></i>&nbsp;<?php echo $company_schedule;?><br>

                            
							<?php
								foreach ( $company_perks as $perk ) {
							?>
                                <i class="icon-flag"></i>&nbsp;<?php echo $perk['crb_business_perk'];?><br>
							<?php
								}
							?>

							</p>
						</address>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

	<section  id="footerRights">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<ul class="socialNetwork">
                    <?php
						$icon_class_name = "";
						$social_name = "";
										
						foreach ( $website_social_media_links as $social_link ) {
							if($social_link['crb_select_social_media'] == 'facebook'){
								$icon_class_name = "icon-facebook-1 bgFacebook ";
								$social_name = "Facebook";
							}else if($social_link['crb_select_social_media'] == 'google_plus'){
								$icon_class_name = "icon-gplus-1 bgGoogle";
								$social_name = "Google+";
							}else if($social_link['crb_select_social_media'] == 'twitter'){
								$icon_class_name = "icon-twitter-bird bgtwitter";
								$social_name = "Twitter";
							}
						?>
                            <li><a href="<?php echo $social_link['crb_social_url'];?>" class="tips" title="follow me on <?php echo $social_name ?>"><i class="<?php echo $icon_class_name ?> iconRounded"></i></a></li>
						<?php
						    }
						?>
					</ul>     
				</div>


				<div class="col-md-12">
					<p>Copyright © <?=date('Y');?> <a href="index.php" target="blank"><?php echo $company_name;?></a> | All rights reserved.</p>
				</div>

			</div>
		</div>
	</section>

</footer>
</body>
</html>
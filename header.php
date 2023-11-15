<!DOCTYPE html>
<html style="margin-top: 0 !important;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php 
		$slug = get_post_field( 'post_name', get_post() ); 
		$company_name = carbon_get_theme_option('crb_company_name');	
	?>

    <title><?php the_title(); ?> - <?php echo $company_name; ?></title>

    <?php
		$company_phone_numbers = carbon_get_theme_option( 'crb_company_phone_numbers' );
		$nav_bar_logo = carbon_get_theme_option('crb_company_logo');
		$company_emails = carbon_get_theme_option('crb_company_emails');
		$website_alert = carbon_get_theme_option('crb_company_alert');
		$website_social_media_links = carbon_get_theme_option('crb_company_social_media');

		$menu_items = wp_get_nav_menu_items(wp_get_nav_menu_object('main')->term_id);
		
        $page_name = 'index.php';
    ?>

    <?php 
        wp_head(  )
    ?>
</head>
<body class="header1">
<div id="globalWrapper">

	<header class="navbar-fixed-top">
			<!-- pre header -->
			<div id="preHeader" class="hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-xs-6">
							<ul class="quickMenu">
								<li><a class="linkLeft t-Color1"><?php echo $website_alert;?></a></li>
								<?php
									foreach ( $company_emails as $email ) {
								?>
									<li><a class="t-Color1" href="mailto:<?php echo $email['crb_company_email'];?>"><?php echo $email['crb_company_email'];?></a></li>
								<?php
									}
								?>
							</ul>
						</div>
						<div class="col-xs-6">
							<div id="contactBloc">
								<ul class="socialNetwork">
									<?php
										$icon_class_name = "";
										$social_name = "";
										
										foreach ( $website_social_media_links as $social_link ) {
											if($social_link['crb_select_social_media'] == 'facebook'){
												$icon_class_name = "icon-facebook-1 ";
												$social_name = "Facebook";
											}else if($social_link['crb_select_social_media'] == 'google_plus'){
												$icon_class_name = "icon-gplus-1";
												$social_name = "Google+";
											}else if($social_link['crb_select_social_media'] == 'twitter'){
												$icon_class_name = "icon-twitter-bird";
												$social_name = "Twitter";
											}
									?>
										<li>
											<a href="<?php echo $social_link['crb_social_url'];?>" class="tips" title="follow me on <?php echo $social_name ?>">
												<i class="<?php  $icon_class_name ?> iconRounded"></i>
											</a>
										</li>
									<?php
										}
									?>
								</ul>


								<?php
									foreach ( $company_phone_numbers as $phone_number ) {
								?>
									<span class="contactPhone"><a class="t-Color1" href="<?php echo 'tel:+1'. preg_replace('/\D/', '', $phone_number['phone']);?>"><i class="icon-mobile"></i><?php echo '1 ' . $phone_number['phone'];?></a></span>
								<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- pre header -->
			<!-- header -->
			<div id="mainHeader" role="banner">
				<div class="container">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/"><img src="<?php echo $nav_bar_logo ?>" alt="<?php echo $company_name;?>"/></a> 
						</div>
						<div class="collapse navbar-collapse" id="mainMenu">
							<ul class="nav navbar-nav pull-right">

								<?php 
									foreach ($menu_items as $key => $value) {
								?>
								
									<li itemprop="name" class="primary"><a itemprop="url" href="<?php echo $value->url ?>" class="firstLevel <?php echo (str_replace($_SERVER['SERVER_NAME'],'',basename($value->url) ) == str_replace('/','',$_SERVER['REQUEST_URI']))?'active':'';?>"><?php echo $value->title; ?></a></li>

									<?php if($key == (count($menu_items) - 1)) { ?>
										<li class="sep"></li>
									<?php } ?>
								<?php } ?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
	    </header>
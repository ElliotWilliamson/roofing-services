<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
require_once("blocks/hero_slider.php");
require_once("blocks/media_row.php");
require_once("blocks/ribbon_items.php");
require_once("blocks/parallax_section.php");
require_once("blocks/parallax_quote.php");
require_once("blocks/ribbon_columns.php");
require_once("blocks/projects_images_grid.php");
require_once("blocks/columns_texts.php");
require_once("blocks/media_single.php");
require_once("blocks/ribbon_navigation.php");
require_once("blocks/media_single_light.php");




add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Website Phone Numbers' ) )
        ->add_fields( array(
            Field::make( 'complex', 'crb_company_phone_numbers', 'Website Phone Numbers' )
            ->add_fields( array(
                Field::make( 'text', 'phone', 'Organization Phone Number' )
                ->set_attribute('pattern','^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$')
                ->set_attribute('placeholder', '(000) 000-0000')
                ->set_help_text('Write the phone number using this format (000) 000-0000')
                ->set_required(true),
            ))
        ),
     );

    Container::make( 'theme_options', __( 'Website Logo' ) )
     ->add_fields( array(
         Field::make( 'image', 'crb_company_logo', 'Website Logo' )->set_value_type( 'url' )));

    Container::make( 'theme_options', __( 'Business Perks' ) )
         ->add_fields( array(
             Field::make( 'complex', 'crb_business_perks', 'What type perks the business offer to customers?' )->add_fields(
                array(Field::make( 'text', 'crb_business_perk', 'Business Perk' ))
             )));


    Container::make( 'theme_options', __( 'Your business information' ) )
         ->add_fields(array(
             Field::make( 'text', 'crb_company_name', 'Business Name' ),
             Field::make( 'textarea', 'crb_company_description', 'Describe briefly your organization' ),
             Field::make( 'text', 'crb_company_schedule', 'Business Schedule' ),
             Field::make( 'text', 'crb_company_address', 'Physical Business Address' ),
             Field::make( 'text', 'crb_company_map', 'Business Main Offices Google Map URL' ),
            Field::make('complex','crb_payment_types', 'Business Accepted Payment Types')
            ->add_fields(array(
                Field::make('text','crb_accepted_payment', 'Payment type name')
            ))));
    
    Container::make( 'theme_options', __( 'Website Emails' ) )
         ->add_fields( array(
             Field::make('complex', 'crb_company_emails', 'Website Emails')
             ->add_fields( array( Field::make( 'text', 'crb_company_email', 'Website Email' )->set_attribute( 'type', 'email')->set_required(true) ))));

             Container::make( 'theme_options', __( 'Website Social Media' ) )
             ->add_fields( array(
                 Field::make('complex', 'crb_company_social_media', 'Website Social Links')
                 ->add_fields( array( 
                    Field::make( 'select', 'crb_select_social_media', __( 'Choose The Social App' ) )
                    ->set_options( array(
                        'facebook' => 'Facebook',
                        'twitter' => 'Twitter',
                        'google_plus' => 'Google Plus'
                    )),
                    Field::make( 'text', 'crb_social_url', 'Social Media Page URL' )
                 ))));

         Container::make( 'theme_options', __( 'Website Alert' ) )
             ->add_fields( array( Field::make( 'text', 'crb_company_alert', 'Website Alert' )));


             Block::make( __( 'Ribbon CTA 1' ) )
             ->add_fields( array(
                 Field::make( 'text', 'main_heading', __( 'CTA 1 Heading' ) ),
                 Field::make( 'text', 'secondary_heading', __( 'CTA 1 Text Content' ) ),
                 Field::make( 'text', 'button_text', __( 'CTA 1 Button Text' ) )
            ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 ?>
                    <section class="color2 pb30 pt30 texture1">  
                        <div class="ctaBox ctaBoxFullwidth">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="t-Color1"><?php echo $fields['main_heading'];?></h2>
                                        <h3 class="t-Color1"><?php echo $fields['secondary_heading'];?></h3>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-lg btn-inverse" title="" href="/contact" target="blank">
                                            <i class="icon-right"></i> <?php echo $fields['button_text']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                 <?php
             } );


             HeroSlider();
             MediaRow();
             RibbonItems();
             ParallaxSection();
             RibbonColumns();
             ParallaxQuote();
             ProjectsImagesGrid();
             ColumnsTexts();
             MediaSingle();
             RibbonNavigation();
             MediaSingleLight();







}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

if(!is_admin(  )){
    wp_enqueue_style("style", get_stylesheet_uri());
    wp_enqueue_script("modernizr_2_6_1_min", get_template_directory_uri(  ) . '/scripts/modernizr-2.6.1.min.js');
    wp_enqueue_script("respond_min_js", get_template_directory_uri(  ) . '/scripts/js-plugin/respond/respond.min.js');
    wp_enqueue_script("jquery_min", get_template_directory_uri(  ) . '/scripts/js-plugin/jquery/1.8.3/jquery.min.js');
    wp_enqueue_script("jquery_ui_min", get_template_directory_uri(  ) . '/scripts/js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js');
    wp_enqueue_script("jquery_easing", get_template_directory_uri(  ) . '/scripts/bootstrap/bootstrap.js');
    wp_enqueue_script("jquery_easing", get_template_directory_uri(  ) . '/scripts/js-plugin/easing/jquery.easing.1.3.js');
    wp_enqueue_script("jquery_easing", get_template_directory_uri(  ) . '/scripts/js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js');
    wp_enqueue_script("jquery_magnific_pupop", get_template_directory_uri(  ) . '/scripts/js-plugin/magnific-popup/jquery.magnific-popup.min.js');
    wp_enqueue_script("jquery-flexslider-min", get_template_directory_uri(  ) . '/scripts/js-plugin/flexslider/jquery.flexslider-min.js');
    wp_enqueue_script("jquery-isotope-min", get_template_directory_uri(  ) . '/scripts/js-plugin/isotope/jquery.isotope.min.js');
    wp_enqueue_script("jquery-isotope-min-sloppy-masonry-min", get_template_directory_uri(  ) . '/scripts/js-plugin/isotope/jquery.isotope.sloppy-masonry.min.js');
    wp_enqueue_script("jquery-form-js", get_template_directory_uri(  ) . '/scripts/js-plugin/neko-contact-ajax-plugin/js/jquery.form.js');
    wp_enqueue_script("jquery-validate-min", get_template_directory_uri(  ) . '/scripts/js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js');
    wp_enqueue_script("jquery-stellar-min", get_template_directory_uri(  ) . '/scripts/js-plugin/parallax/js/jquery.stellar.min.js');
    wp_enqueue_script("jquery-localscroll-1-2-7-min", get_template_directory_uri(  ) . '/scripts/js-plugin/parallax/js/jquery.localscroll-1.2.7-min.js');
    wp_enqueue_script("custom", get_template_directory_uri(  ) . '/scripts/custom.js');
}
?>
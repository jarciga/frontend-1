<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <style type="text/css">
    #pg-1046-0, #pg-1048-0,#pg-1050-0,#pg-1135-0,#pg-1052-0,#pg-1058-0,#pg-1056-0,#pg-1174-0 { border-bottom: 1px solid #000; padding-bottom: 20px; }
    </style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
          
			<div class="row">
				<div class="col-md-2 align-self-center">
					
				<div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
				</div>
				<div class="col-md">
					<?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
				</div>
				<div class="col-lg-auto align-self-center">
					<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" class="field test" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />

</form>
				</div>
			</div>
			
			
			
        </div>
	</header><!-- #masthead -->
     <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>

        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>'); padding-top: 60px;" <?php } ?>>
            
            <div class="container">
              <div class="row">
                <div class="col-md-6 text-left">
                  <h1 style="color: #ffffff; font-size: 32px; font-weight: lighter;">WELCOME TO ALLUP SILICA</h1>
                  <p style="color: #ffffff; font-size: 1rem; text-align: justify;">
                  Allup Silica is a public silica exploration Company, focused on the future development of our silica sand tenements located across a number of exploration project locations in Western Australia. These project sites are located in the South-West, one is in the North-East near Wyndham, with a further two prospective project sites in the Southern Goldfields near Esperance. Some of the early indications are encouraging, and the Company's plan is to work towards achieving a commercial product within industry specifications of the sector we are striving for.  Silica is an essential commodity, especially for the manufacture of photo-voltaic panels (solar) and other vital industrial applications.
                  <br><br>
                  We invite you to learn more about our potential to supply industry with this important resource.
                  <br><br><br>
                  <a href="/about-us" title="About Us" class="btn btn-outline-light pr-5 pl-5" style="border-radius:0; font-weight: bold; width: 170px">ABOUT US</a>
                  <br><br><br>
                  <a href="https://allupsilica.com/company/about-our-values/" title="Our Values" class="btn btn-outline-light" style="border-radius:0; font-weight: bold; width: 170px">OUR VALUES</a>
                  <br><br><br>
                  <a href="https://allupsilica.com/company/our-team/" title="Our Team" class="btn btn-outline-light" style="border-radius:0; font-weight: bold; width: 170px">OUR TEAM</a>
                  
                  </p>

                  <?php

                         global $wpdb;
                         $email= $_POST['email'];
                         if(isset($_POST['submit'])){

                             $datum = $wpdb->get_results("SELECT * FROM email WHERE email= '".$email."'");

                             if($wpdb->num_rows > 0 ) { ?>
                   
                                <script>
                                    jQuery(function($) { 
                                        $('#exampleModalCenter2').modal('show');
                                    });
                                </script>
                   
                             <?php } else { 

                                 $wpdb->insert( 
                                    'email', 
                                    array( 
                                        'email' => $email, 

                                    ), 
                                    array( 
                                        '%s', 
                                        '%d' 
                                    ) 
                                 ); ?>

                        <script>
                            jQuery(function($) { 
                                $('#exampleModalCenter').modal('show');
                            });
                        </script>

                          <?php   
                              
                                
                                $to = "gavin@vorian.com.au,lois.allup@gmail.com";
                                //$to = "ivy@revid.com.au";
                                $subject = "ALLUP EMAIL SUBSCRIPTION NOTIFICATION";
                                $body = '
                                          <p>Someone subscribe to your weekly Brights</p>
                                          <p>' . $email . '</p>
                                          <br><br>
                                          <p>Thank you</p>
                                          <p>allupsand.com</p>

                                ';
                                 
                                $headers = array('Content-Type: text/html; charset=UTF-8');
                                if (wp_mail($to, $subject, $body, $headers)) {
                                  error_log("email has been successfully sent to user whose email is " . $email);
                                } 
                             }
                        }

                        ?>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content text-center email-subscribe-notification">
                                <div>
                                    <img src="http://allupsilica.com/wp-content/uploads/2021/01/check_subscription-1.png">
                                    <p>THANK YOU FOR SUBSCRIBING TO ALLUP BRIGHTS</p>
                                    <div class="readmore text-center mx-auto" data-dismiss="modal">OK</div>
                                </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content text-center email-subscribe-notification">
                                <div>
                                    <div>
                                        <img src="http://allupsilica.com/wp-content/uploads/2021/01/check_subscription-1.png">
                                        <p>YOU HAVE ALREADY SUBSCRIBE</p>
                                        <div class="readmore text-center mx-auto" data-dismiss="modal">OK</div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>


                  <form class="email-subscribe" method="post" style="margin-top:85px; margin-bottom:1.5rem;">
                    <div class="d-flex flex-row">
                      <div class="col-sm-8 p-0">
                        <input type="email" name="email" placeholder="Enter your email address" style="border:1px solid #ccc; padding:10px; font-size:13px; border-radius:0px; width:100%;"></div>
                      <div><input type="submit" value="SUBSCRIBE TO EMAIL ALERTS" class="email-submit" name="submit" style="background: #0099ff"></div>
                    </div>
                  </form>

                </div>


                <div class="col-md-6 text-left" style="padding-left: 250px; padding-top: 15px">
                  <a href="https://allupsilica.com/download-prospectus/" title="Prospectus" class="btn btn-outline-light pr-5" style="border-radius:0; font-weight: bold; width: 170px; padding-left: 2.5rem !important; color: #1b97f1 !important; background-color: #ffffff" target="_blank">PROSPECTUS</a>
                </div>




              </div>
            </div>

        </div>


        <div style="background-color: #efefef;">
          <div class="container panel-layout-none pt-4 pb-4">
            <div class="row panel-grid panel-no-style-none">
              <div class="col-md-6 panel-grid-cell-none">
                <h2 class="p-0 m-0" style="color:#46a7ef; font-size: 36px; font-weight: normal;">THE BRIGHT FORCE IN SILICA</h2>
                <h3 class="p-0 m-0" style="color:#999999; font-size: 30px; font-weight: normal;">Projects. Purity. Ports.</h3>
              </div>
              <div class="col-md-6 panel-grid-cell-none">
                <p class="p-0 m-0">We are focussing our efforts towards the provision of resources for products at the
                  high-quality, high-purity end of the product spectrum. This includes products and panels
                  made with new generation, high technology glass.</p>
              </div>
            </div>
          </div>
        </div>
        

        </div>
    <?php endif; 

     if(is_front_page()) :  ?>
	<div id="content" class="site-content" style="background-color: #ffffff;">
<?php else : ?>

    <div id="page-container-title" class="p-0 m-0" style="background-color:gray;">
        <div class="container">
            <h2 class="m-0 pt-4 pr-0 pb-4 pl-0" style="font-size:32px; color:#fff;">
            <?php
            if (!$pagename && $id > 0) :
                global $wp_query;
                // If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
                $post = $wp_query->get_queried_object();
                $pagename = $post->post_name;
            endif;
            ?>
            </h2>
        </div>
    </div>
  
    <div id="content" class="site-content">
    
<?php endif; ?>
		<div class="container">
			<div class="row">
                <?php endif; ?>
    
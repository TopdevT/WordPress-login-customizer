<?php
/**
 * Plugin Name: WordPress Login Customizer
 * Plugin URI: https://xmedia.nl/
 * Description: Een plugin door Xmedia voor professionals.
 * Version: 1.0.0
 * Author: Thijs Molenaar
 * Author URI: https://xmedia.nl/
 */

// This adds login.php to the header for login stylesheet
function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="wp-content/plugins/xmedia-login-editor/css/style.php"/>';
}
add_action('login_head', 'custom_login');
add_action('init', 'xlogin_post_check');

//  This changes the login title and removes links        
    function custom_title() {
        add_filter( 'login_title', function(){
            return 'Log in bij ' . get_option( "bedrijfsnaam" ) . '';
        } );
        add_filter( 'login_headerurl', function(){ return get_home_url();} );
        add_filter( 'login_headertext', function(){
            return 'Log in bij ' . get_option( "bedrijfsnaam" ) . '';
        } );
        add_filter( 'login_site_html_link', '__return_false' );
        add_filter( 'login_display_language_dropdown', '__return_false' );
    }
    custom_title();

// This adds the Xlogin page and side icon
    function custom_menu() { 
        add_menu_page( 
            'xlogin editor', 
            'XLogin editor', 
            'edit_posts', 
            'xlogin_manager', 
            'xlogin_adminpage', 
            'dashicons-cover-image' 
           );
      }
    add_action('admin_menu', 'custom_menu');
    

function xlogin_post_check(){
    if(!isset($_REQUEST['xlogin_messagesend']) || wp_verify_nonce( $_REQUEST['xlogin_messagesend'], 'xlogin_nonce' ) == false){
        error_log("Verify is false!");
        return;
        echo "Verify denied!";
    }else{
        error_log('Verified!');
    }

    if (!empty($_POST["login_kleur_primary"])) {
        update_option( "login_kleur_primary", $_POST['login_kleur_primary']);   
    } 
    if (!empty($_POST["login_kleur_second"])) {
        update_option( "login_kleur_second", $_POST['login_kleur_second']);   
    } 
    if (!empty($_POST["login_achtergrond"])) {
        update_option( "login_achtergrond", $_POST['login_achtergrond']); 
    } 
    if (!empty($_POST["bedrijfsnaam"])) {
        update_option( "bedrijfsnaam", $_POST['bedrijfsnaam']); 
    }    
    if (!empty($_POST["xlogin_site_logo"])) {
        update_option( "xlogin_site_logo", $_POST['xlogin_site_logo']); 
    }    
}
// This adds the settings on the admin page of Xlogin 

function xlogin_adminpage(){
        echo '<link rel="stylesheet" type="text/css" href="/wp-content/plugins/xmedia-login-editor/css/editor_style.php" />';

        $login_kleur_primary = get_option( "login_kleur_primary" );
        $login_kleur_second = get_option( "login_kleur_second" );
        $login_achtergrond = get_option( "login_achtergrond" );
        $bedrijfsnaam = get_option( "bedrijfsnaam" );
        $xlogin_site_logo = get_option( "xlogin_site_logo" );

        $primary_holder = 'value="' . $login_kleur_primary . '"'; 
        $second_holder = 'value="' . $login_kleur_second . '"'; 
        $banner_holder = 'placeholder="' . $login_achtergrond . '"'; 
        $naam_holder = 'placeholder="' . $bedrijfsnaam . '"'; 
        $xlogin_site_logo_holder = 'placeholder="' . $xlogin_site_logo . '"'; 

        $current_primary = "Uw huidige hoofdkleur is: <b>" . $login_kleur_primary . "</b>";
        $current_kleur_second = "Uw huidige bijkleur/accent is: <b>" . $login_kleur_second . "</b>";
        $current_banner  = " <span class='header_text'><b>Uw banner is:</b></span><div class='banner_preview'></div> ";
        $current_logo  = " <span class='header_text'><b>Uw logo is:</b></span><div class='xlogin_logo_preview'></div> ";
        $nonce_field = wp_nonce_field( 'xlogin_nonce', 'xlogin_messagesend', true, false );
        echo "<div class='background'></div>";
        echo '<div class="login_head"><a href="http://www.github.com/topdevt"><h1>X<span class="second_letter">L</span>ogin editor</h1></a></div>';
        echo '
        <form action="" method="post">
        ' . $nonce_field . '
        <div class="div2">
        <span class="header_text"><b>Hoofdkleur:</b></span> <input type="color" ' . $primary_holder . ' name="login_kleur_primary"> <br>' . $current_primary . '<br>
        </div>
        <div class="div3">
        <span class="header_text"><b>bijkleur:</b></span> <input type="color" ' . $second_holder . ' name="login_kleur_second"><br> ' . $current_kleur_second . '<br>
        </div>
        <div class="div1">
        <span class="header_text"><b>Achtergrond banner:</b></span> <input type="text"' . $banner_holder . ' name="login_achtergrond"><br>' . $current_banner . '<br>
        </div><br><br>
        <div class="div9">
        <span class="header_text"><b>Custom site logo:</b></span> <input type="text"' . $xlogin_site_logo_holder . ' name="xlogin_site_logo"><br>' . $current_logo. '<br>
        </div><br><br>
        <div class="div4">
        <span class="header_text"><b>Bedrijfsnaam:</b></span> <input type="text" ' . $naam_holder . ' name="bedrijfsnaam"><br>' . $bedrijfsnaam . '<br>
        </div>
        <div class="submit_button">
        <input type="submit" value="Opslaan">
        </form>  
        </div>
        ';
        echo "<br><div class='cache_warning'>You might need to clear cache after sumbitting background banner or logo!</div>";
        }
?>

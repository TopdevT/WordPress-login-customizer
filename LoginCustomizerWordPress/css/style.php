<?php

// wp-content/plugins/custom-ads-plugin/styles.php
require ('../../../../wp-blog-header.php');
header("Content-type: text/css; charset: UTF-8");
$login_achtergrond = get_option('login_achtergrond');
$login_kleur_primary = get_option('login_kleur_primary');
$login_kleur_second = get_option('login_kleur_second');
$xlogin_site_logo = get_option( "xlogin_site_logo" );
?>
body.login {
    background-image: url("<?php echo $login_achtergrond ?>");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-color: #fff;
    font-family: "Montserrat", sans-serif;
    font-weight: 400;
    font-size: 14px;
  }
  body.login form {
    border: 0 !important;
    border-radius: 40px 40px 0px 0;
    box-shadow: 0px 20px 30px 0px rgba(0, 0, 0, 0.16);
  }
  body.login form input[type=text], body.login form input[type=password] {
    border-radius: 0;
    border: 0;
    border-bottom: 2px solid <?php echo $login_kleur_second ?>;
  }
  body.login form input[type=submit] {
    background-color: <?php echo $login_kleur_primary ?> !important;
    background-image: none;
    color: #FFFFFF;
    border: 0;
  }
  body.login form ::placeholder {
    font-family: "Montserrat", sans-serif;
    font-size: 14px;
  }
  body.login form .forgetmenot {
    font-size: 13px;
  }
  body.login .dashicons-visibility {
    color: <?php echo $login_kleur_primary ?>;
  }
  body.login .dashicons-hidden {
    color: <?php echo $login_kleur_second ?>;
  }
  body.login h1 {
    width: 100% !important;
  }
  body.login h1 a {
    width: 100% !important;
    background-image: url("<?php echo $xlogin_site_logo ?>") !important;
    transform: scale(2);
  }
  body.login .language-switcher {
    display: none;
  }
  body.login .message {
    border-left: none;
    box-shadow: none;
    text-align: center;
    background-color: unset !important;
  }
  body.login #nav {
    background-color: #fff;
    margin-top: 0;
    width: calc(50% - 15px) !important;
    padding: 0 0 0 15px;
    border-radius: 0px 0px 0px 40px;
    height: 60px !important;
    float: left;
  }
  body.login #backtoblog {
    background-color: #fff;
    margin-top: 0;
    width: calc(50% - 15px) !important;
    padding: 0 15px 0 0;
    border-radius: 0px 0px 40px 0px;
    height: 60px !important;
    float: right;
    text-align: right;
  }
  p#login-message {
    color: grey;
  }
  /*# sourceMappingURL=login.css.map */
<?php

// wp-content/plugins/custom-ads-plugin/styles.php
require ('../../../../wp-blog-header.php');
header("Content-type: text/css; charset: UTF-8");
$banner_holder = get_option('login_achtergrond');
$xlogin_site_logo = get_option( "xlogin_site_logo" );
?>
.background {
    background-image: url(gear.png) !important;
    background-repeat: no-repeat;
    background-size: contain;
    opacity: 2%;
    height: 100%;
    width: 100%;
    position: absolute;
    z-index: -1;
    background-position: bottom right;
}
div#wpbody-content{
  height:850px;
}
.banner_preview{
    background-image:url("<?php echo $banner_holder ?>");
    width: 400px;
    height: 300px;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 10px;
  }

  .login_head h1::first-letter{
    color:#52c1e0 !important;

  }
  .second_letter{
    color:#7aba43 !important;
  }
  .login_head h1{
    color:white;
    font-size:6em;
    text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);
    padding-bottom: 25px;
  }
  a {
    text-decoration: none;
  }
  form {
    display: grid; 
  grid-template-columns: 0.6fr 1.4fr; 
  grid-template-rows: 200px 150px 150px; 
  gap: 0px 20px; 
  grid-template-areas: 
    "div1 div2"
    ". div3"
    "div9 div4"
    "div6 div5"
    "div8 div7"; 
    justify-items: stretch;
    align-items: start;
}
.div1 { grid-area: div1; }
.div2 { grid-area: div2; }
.div3 { grid-area: div3; }
.div4 { grid-area: div4; }
.div5 { grid-area: div5; }
.div6 { grid-area: div6; }
.div7 { grid-area: div7; }
.div8 { grid-area: div8; }
.div9 { grid-area: div9; margin-top:30px;}

input[type="text"]{
  max-width:400px;
}
input[type="submit"]{
  display: flex;
  margin-top:100px
}
.cache_warning {
  color:grey;
    font-size:1.1em;
}
.header_text {
    color:black;
    font-size:1.1em;
  }
  .xlogin_logo_preview{
    background-image:url("<?php echo $xlogin_site_logo ?>");
    width: 176px;
    height: 155px;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 80%;
    margin-top: 10px;
  }
  /*# sourceMappingURL=login.css.map */
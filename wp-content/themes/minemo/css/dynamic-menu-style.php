<?php $preyantechnosys_header_menuarea_height = preyantechnosys_header_menuarea_height(); 
?>
.headerlogo,
.prt-header-icon, 
.prt-header-text-area,
.site-header .preyantechnosys-fbar-btn{
    height: <?php echo esc_attr($header_height); ?>px;
    line-height: <?php echo esc_attr($header_height); ?>px !important;
}


.prt-header-style-infostack .header-widget {
        height: <?php echo esc_attr($header_height) - ($preyantechnosys_header_menuarea_height/2); ?>px;
}
.prt-header-icon.prt-header-social-box a.prt-social-btn-link i,
.prt-header-icons .prt-header-search-link a, 
.prt-header-icons .prt-header-wc-cart-link a {
	color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 1) ;
}
.is_stuck .prt-header-icon.prt-header-social-box a.prt-social-btn-link i,
 
.is_stuck .prt-header-icons .prt-header-wc-cart-link a {
	color: rgba( <?php echo preyantechnosys_hex2rgb($stickymainmenufontcolor); ?> , 1) ;
}
@keyframes menu_sticky {
	0%   {margin-top:-120px;opacity: 0;}
	50%  {margin-top: -64px;opacity: 0;}
	100% {margin-top: 0;opacity: 1;}
}
/**
* Responsive Menu
* ----------------------------------------------------------------------------
*/
@media (max-width: <?php echo esc_attr($breakpoint); ?>px){
	/* Responsive Header bg color */
	<?php if( !empty($responsive_header_bg_custom_color) ) : ?>
	#masthead #site-header.site-header.prt-bgcolor-custom{
		background-color: <?php echo esc_attr($responsive_header_bg_custom_color); ?> !important;
	}
	<?php endif; ?>	
	/*** Header Section ***/
	.site-header-main.prt-wrap{
		margin:0 10px 0 15px;
		width: auto;
		display: block;
		padding-left: 0;
	}
	.prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li > a, .prt-header-style-classic .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a, .prt-headerstyle-classic-overlay .prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a, .prt-headerstyle-classic-overlay .prt-header-overlay .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
	    padding: 15px 0px !important;	
	}
.prt-header-style-infostack .site-header-main.prt-wrap{
		margin:0 0;
	}	
	.prt-header-style-infostack .container-customfull {
    margin: 0 15px;
}
.prt-mmmenu-override-yes.prt-bgcolor-darkgrey #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
       .prt-bgcolor-darkgrey #site-header-menu #site-navigation div.nav-menu > ul{
        	background-color: var(--prt-secondarycolor);
        }   
	.site-header-main.prt-wrap .prt-wrap-cell {
		display: block;		
	}	
    .prt-header-icon{
        padding-right: 0px;
        padding-left: 10px;
        position: relative;
    } 
	.prt-header-icon.prt-header-wc-cart-link{
    	float: right;
    }  
	.prt-header-icon.prt-header-social-box,
	.prt-header-icon.prt-header-search-link{
    	float: left;
    } 

    .prt-headerstyle-classic-overlay .prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a, .prt-headerstyle-classic-overlay .prt-header-overlay .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
	    padding: 15px 10px 15px 10px !important;
	    margin: 0px !important;
    
    }

	.prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li:hover > i, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > i, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > i, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > i {
		background-color: transparent;
	}
	.prt-header-style-classic-highlight .prt-header-text-area,
	.prt-header-icon.prt-header-social-box{
    	display: none;
    } 
    .site-title{
        width: inherit;
    }  
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-megamenu {
    display: none;
}
#site-header-menu #site-navigation .prt-header-icon a, #site-header-menu #site-navigation .preyantechnosys-fbar-btn a {
    font-size: 18px !important;
    padding-left: 0;
    line-height: 26px;
}
.prt-header-style-classic-two .prt-header-icons .prt-header-search-link a i:before {
	font-weight: 700;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-megamenu {
    padding: 20px 15px 0;
    position: relative;
    height: 150px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram .sbi_header_text {
    display: inline-block;
    vertical-align: top;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram svg.sbi_new_logo {
    margin-top: -22px;
    color: #ff0000;
	margin-left: 0 !important;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget:last-child div#sbi_images {
    padding-top: 0 !important;
}
header .mega-menu-instablock #sb_instagram .sb_instagram_header .sbi_header_text.sbi_no_bio h3 {
    padding: 0 0 0 35px !important;
    margin: 0 !important;
    float: none;
    clear: unset;
	color: var(--body-fonts-color);
	transition: all 0.5s ease;
}
	div.prt-titlebar-wrapper {
	    background-attachment: scroll !important;	
	}
	.prt-pageslider-yes .headerlogo .standardlogo {
		display: inline-block;
	}
	.prt-pageslider-yes .headerlogo .borderlogo {
		display: none;
	}
	.site-header-main.prt-wrap.container-fullwide{
		margin: 0 15px 0 20px;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li > i {
		display: none;
	}
	
    /*** Navigation ***/
    .main-navigation {
    	clear: both;
    }    
   	.site-branding,
    #site-header-menu #site-navigation li.mega-menu-megamenu > ul.mega-sub-menu,
    #site-header-menu #site-navigation div.mega-menu-wrap,
	.menu-prt-main-menu-container,
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu,
	#site-header-menu {
		float: none;	
    }
    /*** Responsive Menu ***/    
    .righticon{
        position: absolute;
        right: 0px;
        z-index: 33;
        top: 15px;
        display: block;
    }    
	.righticon i{
		font-size:20px;
		cursor:pointer;
        display:block;
        line-height: 0px;
	} 

	.prt-header-style-classic.prt-header-overlay .prt-stickylogo-yes .stickylogo {
      opacity: 1;
    }
    /*** Default menu box ***/ 
     
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal,
     #site-header-menu #site-navigation div.nav-menu > ul {
		position: absolute;
		padding: 0;
		left: auto;
		right: 0;
		box-shadow: rgb(0 0 0 / 12%) 3px 3px 15px;
		border-top: 0;
		background-color: <?php echo esc_attr($dropmenu_background['color']); ?>;
		z-index: 100;
		width: 100%;
		top: <?php echo esc_attr($header_height); ?>px; 
		transition: all 0.5s ease;
		transform: translateX(100%);
		margin-top: -1px;
	}
	.preyantechnosys-maxmegamenu-active .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal,
    .preyantechnosys-maxmegamenu-active #site-header-menu #site-navigation div.nav-menu > ul{
		position: absolute;
		padding: 10px 20px;
		left: auto;
		right: 0;
		box-shadow: rgb(0 0 0 / 12%) 3px 3px 15px;
		border-top: 0;
		background-color: <?php echo esc_attr($dropmenu_background_responsive['color']); ?>;
		z-index: 100;
		width: 350px;
		top: <?php echo esc_attr($header_height); ?>px; 
		transition: all 0.5s ease;
		transform: translateX(100%);		
    } 
	.preyantechnosys-maxmegamenu-active.mega-menu-preyantechnosys-main-menu-mobile-open .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal , .prt-mmmenu-override-yes #site-header-menu #site-navigation.main-navigation.toggled-on #menu-main-menu,  #site-header-menu #site-navigation.main-navigation.toggled-on div.nav-menu > ul{
		transition: all 0.5s ease;
		transform: translateX(0);
	}
	.mega-menu-preyantechnosys-main-menu-mobile-open .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
		z-index: 99;
	}
	.main-navigation:before, .preyantechnosys-maxmegamenu-active:before {
		content: '';
		position: fixed;
		left: 0;
		top: 0;
		width: 0;
		height: 100%;
		z-index: 99;
		background: rgba( <?php echo preyantechnosys_hex2rgb($dropmenu_background['color']); ?>,0.90);
		-webkit-transform: translateX(-101%);
		-ms-transform: translateX(-101%);
		transform: translateX(-101%);
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transition-delay: 300ms;
		-moz-transition-delay: 300ms;
		-ms-transition-delay: 300ms;
		-o-transition-delay: 300ms;
		transition-delay: 300ms;
	}
	.preyantechnosys-maxmegamenu-active:before, .main-navigation:before {
		background: rgba( <?php echo preyantechnosys_hex2rgb($dropmenu_background_responsive['color']); ?>,0.90);
	}
	.mega-menu-preyantechnosys-main-menu-mobile-open:before, .main-navigation.toggled-on:before {
		opacity: 1;
		width: 100%;
		visibility: visible;
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
	}
	.preyantechnosys-maxmegamenu-active #mega-menu-wrap-preyantechnosys-main-menu .mega-menu-toggle + #mega-menu-preyantechnosys-main-menu {
		display: block;
	}
	.headerlogo img{
		max-height: <?php echo esc_attr($logoMobMaxHeight); ?>px;
	}
    <?php if($headerbg_color=='custom' && !empty($headerbg_customcolor['rgba']) ) : ?>
       	#site-header-menu #site-navigation div.nav-menu > ul,
        #site-header-menu #site-navigation .mega-menu-wrap .mega-menu{
            background-color: <?php  echo esc_attr($headerbg_customcolor['rgba']); ?>;
        } 
	<?php endif; ?>
    <?php if( !empty($dropmenu_background['color']) ): ?>
    	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
        #site-header-menu #site-navigation div.nav-menu > ul{
        	background-color: <?php echo esc_attr($secondarycolor); ?>;
        }    
    <?php endif; ?>      
    #site-header-menu #site-navigation div.nav-menu > ul,
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        overflow: hidden;
        max-height: 0px;
    }
	#site-header-menu #site-navigation div.nav-menu > ul ul ul{
    	max-height: none;
    }    
	#site-header-menu #site-navigation div.nav-menu > ul ul {
		padding-left:15px;
	}
    #site-header-menu #site-navigation div.nav-menu > ul > li{
    	position: relative;
        text-align: left;
    }    
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul{       
        display: block;
        max-height: 10000px;       
    }
    #site-header-menu #site-navigation.toggled-on div.nav-menu > ul ul.open {
    	max-height: 10000px;
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap{
    	position: inherit;
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	width: 100%;
    }   
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-toggle-on > a, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a {
    	background: none !important;
    }
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
    	float: none;
    }
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li{
    	width: 100% !important;
        padding-bottom: 0px;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	padding-left:15px;        
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu a {
    	padding-left: 0px;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a,
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li ul.mega-sub-menu,
    #site-header-menu #site-navigation div.nav-menu > ul ul{
    	background-color: transparent !important;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a,    
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
        display: block;
        padding: 15px 0px;        
        text-decoration: none;
        line-height: 18px;
        height: auto;
        line-height: 18px !important;
    }     
    #site-header-menu #site-navigation div.nav-menu > ul ul a, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item a {
        margin: 0;
        display: block;
        padding: 12px 15px 12px 0px;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li li a:before,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item li.mega-menu-item a:before{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        display: inline-block;
        text-decoration: inherit;
        margin-right: .2em;
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;
        font-size: 13px;
        content: "\f105";
        margin-right: 8px;
        display: none;
    }         
    .prt-mmmenu-override-yes .mega-sub-menu {
     	display: none !important;
    }
    .mega-sub-menu.open, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li .mega-sub-menu .mega-sub-menu {
    	display: block !important;
    }
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li  {
        padding: 0px;
        padding-left: 0px;
    }  
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
    	margin-top: 15px;
		padding-bottom: 10px;
		padding-left: 0;
		padding-right: 0;
    }
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_media_image {
		margin-top: 15px;
	}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_media_gallery {
		margin-top: 10px;
	}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu:first-child > ul.mega-sub-menu > li.mega-menu-item.widget_media_image, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item.widget_media_image {
		margin-top: 0;
	}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a ,
	#site-header-menu #site-navigation div.nav-menu > ul > li > a{
		font-size: <?php echo esc_attr(ceil($mainMenuFontsize)+2); ?>px;
	}
	#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title {
		font-size: <?php echo esc_attr(ceil($mainMenuFontsize)); ?>px;
	}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div {
    padding-left: 15px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget.widget_media_gallery  div {
    padding-left: 0;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget:last-child div {
    padding-left: 0 !important;
}
	#mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu > li.mega-menu-megamenu > ul.mega-sub-menu {
    padding: 10px 15px;
}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div .gallery-item {
    padding-left: 0;
}
.preyantechnosys-maxmegamenu-active #mega-menu-preyantechnosys-main-menu > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, #mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title {
	color: rgba( <?php echo preyantechnosys_hex2rgb($dropmenu_text_responsive_color); ?>,1) !important;
    padding: 5px 0 0 0;
}
.preyantechnosys-maxmegamenu-active .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a , .righticon i,#site-header-menu #site-navigation div.nav-menu > ul > li > a , #site-header-menu #site-navigation div.nav-menu > ul > li a , .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item-has-children a, #site-header-menu #site-navigation div.nav-menu > ul ul > li.menu-item-has-children> a {
	color: <?php echo esc_attr($dropmenu_text_responsive_color); ?> !important;
 } 
	
.preyantechnosys-maxmegamenu-active .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a,
#site-header-menu #site-navigation div.nav-menu > ul ul a, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item > a {
	color: rgba( <?php echo preyantechnosys_hex2rgb($dropmenu_text_responsive_color); ?>,0.6);
 }
 #site-header-menu #site-navigation div.nav-menu > ul ul a,#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu a, #site-header-menu #site-navigation div.nav-menu > ul li.menu-item-has-children > ul li li a {
	color: rgba( <?php echo preyantechnosys_hex2rgb($dropmenu_text_responsive_color); ?>,0.6) !important;
 }
  #site-header-menu #site-navigation div.nav-menu > ul ul a:hover,#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu a:hover, #site-header-menu #site-navigation div.nav-menu > ul li.menu-item-has-children > ul li li a:hover {
  color: <?php echo esc_attr($skincolor); ?> !important;
  }
.preyantechnosys-maxmegamenu-active .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div #sb_instagram h3 {
    color: <?php echo esc_attr($dropmenu_text_responsive_color); ?>;
    padding-top: 0!important;
}
.preyantechnosys-maxmegamenu-active.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div .sbi_header_hashtag_icon , .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link {
	color: <?php echo esc_attr($dropmenu_text_responsive_color); ?>;
}
	#site-header-menu #site-navigation div.nav-menu > ul li, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li {
    border-bottom: 0 !important;
}
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item:first-child > h4.mega-block-title{
    	margin-top: 0px;
    }      
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
   		position: relative;
    }
    #site-header-menu #site-navigation div.nav-menu > ul > li a, 
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
    	display: inline-block;
    } 
	#mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator {
		display: none;
	}
    /*** Defaultmenu ***/
    .prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,   
    .prt-mmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover,
    .prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul  ul > li > a:hover, 
    .prt-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:hover{
    	color: <?php echo esc_attr($skincolor); ?>;
    } 
   <?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($skincolor); ?> !important;
    }
    <?php } ?>
    <?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
     /* Main Menu Active Link Color --------------------------------*/        
    .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,   
    .prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover{
        color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
     }
    <?php } ?> 
	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>      
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul  ul > li > a:hover, 
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:hover{
        color: <?php echo esc_attr($skincolor); ?>;
    }    
    <?php } ?>    
    <?php if( !empty($dropdownmenufont['color']) ): ?>
    #site-header-menu #site-navigation div.nav-menu > ul > li > a,     
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a,    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget,
    .righticon i  {
    	color: rgba( <?php echo preyantechnosys_hex2rgb($dropdownmenufont['color']); ?> , 1);
    } 
    #site-header-menu #site-navigation div.nav-menu > ul li,
  	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li {
    	border-bottom: 0 solid rgba( <?php echo preyantechnosys_hex2rgb($dropdownmenufont['color']); ?> , 0.15);
    }  
    #site-header-menu #site-navigation div.nav-menu > ul li:last-child,
  	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:last-child{
    	border-bottom: none;
    }     
    <?php endif; ?>    
	/* Dynamic main menu color applying to responsive menu link text */   
    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-block-1 .mega-toggle-label-open,
    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-block-1 .mega-toggle-label .mega-toggle-label-closed{
        display: none;
    }    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1{
        margin-top: 5px
    }
    #site-header-menu #site-navigation .mega-menu-toggle .mega-toggle-blocks-right{
        height:28px;
    }
    .menu-toggle i,     
    .prt-header-icons a{
		color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}            
    .menu-toggle span,
    .menu-toggle span:after,
    .menu-toggle span:before{
    	background-color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }	
    #site-header-menu #site-navigation div.nav-menu > ul{
        padding-right: 15px;
        padding-left: 15px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul{
    	list-style: none;
    }	
    .prt-header-icons{
        position: absolute;
        top: 0;
        float: none;
        right: 50px;
        margin-right: 0px;
    }   
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu.open, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{       
        display: block !important;
        height: auto !important; 
		width: 100%;
    }    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu{
        opacity: 1;   
    }    
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul{
        background-image: none !important;      
    }   
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu{
    	margin-top: 0;
    }      
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a.mega-menu-link{
    	background: none;
        background-image: none;
    }    
    .prt-header-overlay .prt-titlebar-wrapper .prt-titlebar-inner-wrapper{
    	padding-top: 0px;
    }  
    #site-header-menu #site-navigation .menu-toggle,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-20); ?>px;
        display: block;
        position: absolute; 
        right: 10px;     
		left: auto;		
        width: 40px;       
        background: none;
        z-index: 99;
        outline: none;
        padding: 0;
        line-height: normal;
    }    
	#site-header-menu #site-navigation .prt-header-icon a, #site-header-menu #site-navigation .preyantechnosys-fbar-btn a {
    font-size: 18px;
}
    .prt-header-invert #site-header-menu #site-navigation .menu-toggle,
    .prt-header-invert .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        right: 0; 
        left: auto;
    }    
    .prt-header-invert .prt-header-icons {
        left: 0;
        right: auto;
    }    
    #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-right{
        float: none;
    }    
    #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1 {
        display: inline-block;
		width: 28px;
        height: 2px;
        background: #182333;
        border-radius:0px;
        transition: 0.3s;
        position: relative;
    }
    #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:before,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before {
        top: 8px;
    }
    #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:after,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after {
        top: -8px;
    }    
    #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:before, 
    #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:after,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after {
        display: inline-block;
		width:28px;
		height: 2px;
        background: #033b4a;
        border-radius:0px;
        transition: 0.3s;
        position: absolute;
        left: 0;
        content: '';
        -webkit-transform-origin: 0.28571rem center;
        transform-origin: 0.28571rem center;
        margin: 0;
    }
    #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars,     
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1 {
        background: transparent;
    }    
    #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars:before,
    #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars:after,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:before, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:after {
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        top: 0;
        width:26px;
    }    
    #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars:before,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:before {
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
    }
    #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars:after,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1:after {
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
    }   
    /*** Responsive icon color( If custom header background color ) ***/      
    /* White color */ 
	.site-header.prt-bgcolor-darkgrey #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:before,
	.site-header.prt-bgcolor-darkgrey #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:after,
	.site-header.prt-bgcolor-darkgrey .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before,
	.site-header.prt-bgcolor-darkgrey .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,
	.site-header.prt-bgcolor-darkgrey #site-header-menu #site-navigation:not(.toggled-on) .menu-toggle .prt-minemo-icon-bars,
    .site-header.prt-bgcolor-skincolor .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.prt-bgcolor-skincolor .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.prt-bgcolor-skincolor .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,  
    .site-header.prt-bgcolor-darkgrey .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.prt-bgcolor-darkgrey .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.prt-bgcolor-darkgrey .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,      
	.prt-responsive-icon-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .prt-responsive-icon-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .prt-responsive-icon-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,
    .prt-responsive-icon-white #site-header-menu #site-navigation:not(.toggled-on) .menu-toggle .prt-minemo-icon-bars,
    .prt-responsive-icon-white #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:before, 
    .prt-responsive-icon-white #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:after{
         background-color: #ffffff;
    }
    .site-header.prt-bgcolor-skincolor .menu-toggle i, 
    .site-header.prt-bgcolor-skincolor .prt-header-icons a,
    .site-header.prt-bgcolor-darkgrey .menu-toggle i, 
    .site-header.prt-bgcolor-darkgrey .prt-header-icons a,     
    .prt-responsive-icon-white .menu-toggle i, 
    .prt-responsive-icon-white .prt-header-icons a {
    	color: #ffffff;
    }      
    /* Dark color */  
    .site-header.prt-bgcolor-white #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars,
    .site-header.prt-bgcolor-white #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:before,
    .site-header.prt-bgcolor-white #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:after,     
    .site-header.prt-bgcolor-grey.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .site-header.prt-bgcolor-grey.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .site-header.prt-bgcolor-grey.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,         
    .prt-bgcolor-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .prt-bgcolor-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .prt-bgcolor-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,        
	.prt-responsive-icon-dark.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1,
    .prt-responsive-icon-dark.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:before, 
    .prt-responsive-icon-dark.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle .mega-toggle-block-1:after,
    .prt-responsive-icon-dark #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars,
    .prt-responsive-icon-dark #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:before, 
    .prt-responsive-icon-dark #site-header-menu #site-navigation .menu-toggle .prt-minemo-icon-bars:after{
         background-color:<?php echo esc_attr($blackish_buttoncolor); ?>;
    }      
    .site-header.prt-bgcolor-grey .menu-toggle i, 
    .site-header.prt-bgcolor-grey .prt-header-icons a,  
    .site-header.prt-bgcolor-white .menu-toggle i, 
    .prt-responsive-icon-dark .menu-toggle i, 
    .prt-responsive-icon-dark .prt-header-icons a {
    	color:<?php echo esc_attr($blackish_buttoncolor); ?>;
    }      
    .prt-responsive-icon-white #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars,
    .prt-responsive-icon-dark #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars,
    .site-header.prt-bgcolor-white #site-header-menu #site-navigation.toggled-on .menu-toggle .prt-minemo-icon-bars,
    .site-header.prt-bgcolor-darkgrey #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.prt-bgcolor-skincolor #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.prt-bgcolor-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .site-header.prt-bgcolor-grey.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .prt-responsive-icon-dark.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1,
    .prt-responsive-icon-white.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open .mega-toggle-block-1{
    	background-color: transparent;
    } 
    /* Display None */

        
    /* prt-header-style-infostack */     
    .prt-header-style-infostack .prt-header-icon.prt-header-btn-w,
    .prt-header-style-infostack .prt-header-widgets-wrapper{
    	display: none;    
    }  
	
	body.preyantechnosys-page-full-width.prt-titlebar-bcrumb-bottom #content .site-main .entry-content > .wpb_row:first-child {
		margin-top: -82px;
	}
    .prt-header-style-infostack.prt-header-overlay .prt-stickable-header-w{        
        top: 0;
    }
    .prt-header-style-infostack .prt-header-top-wrapper .col-sm-4.col-md-3,
    .prt-header-style-infostack .kw-phone{
        display: none;
    }
    .prt-header-style-infostack .site-header-menu{
        display: block;
        position: static;
        top: 0;
        width: 100%;
    }
    .prt-header-style-infostack .prt-header-top-wrapper .col-sm-4.col-md-6{
        padding-left: 0;
    }
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal, 
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul {
        top: 100%;
    }
	.prt-header-style-infostack .site-header-menu {
		left: 0;
	}
    #site-header-menu #site-navigation .menu-toggle,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-16); ?>px;
    }
	.prt-header-style-classic.prt-header-overlay #site-header-menu #site-navigation .menu-toggle {
        top: <?php echo esc_attr(ceil($header_height/2)-8); ?>px;
    }	
	.prt-titlebar-wrapper.prt-breadcrumb-on-bottom .prt-titlebar-main > .container .prt-titlebar-main-inner .entry-title-wrapper,
	.prt-header-style-infostack .prt-titlebar-wrapper.prt-breadcrumb-on-bottom .prt-titlebar-main > .container .prt-titlebar-main-inner .entry-title-wrapper {
	    margin-top: -54px;	
	}
	/* sticky footer bottom margin */	
	body .site-content-wrapper {
		margin-bottom: 0px !important;
	}
	.prt-titlebar-align-left .entry-title-wrapper .entry-title {
		padding-left: 0px;
	}
	.prt-header-style-infostack .prt-top-info-con {
		display:none;
	}
	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
		<?php if( !empty($dropmenu_background['color']) && $dropmenu_background['color']=='#ffffff' && $mainmenu_active_link_color=='custom' && $mainmenu_active_link_custom_color=='#ffffff' ): ?>
		/* Main Menu Active Link Color --------------------------------*/                
		.prt-header-style-infostack .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
		.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-parent > a,
		.prt-header-style-infostack .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
		.prt-header-style-infostack .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
		.prt-header-style-infostack .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
		.prt-header-style-infostack .prt-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
		.prt-header-style-infostack .prt-mmenu-active-color-custom  .prt-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
		.prt-header-style-infostack .prt-mmenu-active-color-custom  .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
		.prt-header-style-infostack .prt-mmenu-active-color-custom  .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
			color: <?php echo esc_attr($skincolor); ?>;
		}
		.prt-header-style-infostack .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:hover,
		.prt-header-style-infostack .prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover {
			color: <?php echo esc_attr($skincolor); ?>;
		}
		<?php endif; ?> 
	<?php } ?>
	.prt-header-style-infostack #site-header-menu .container {
       width: auto;
		display: block;
	}
	#mega-menu-wrap-prt-main-menu #mega-menu-prt-main-menu li.mega-menu-item-has-children.mega-toggle-on > a.mega-menu-link > span.mega-indicator {
		display: none;
	}
	#mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after,
	#mega-menu-wrap-prt-main-menu #mega-menu-prt-main-menu li.mega-menu-item-has-children.mega-toggle-on > a.mega-menu-link > span.mega-indicator:after {
		content:unset;
	}
	.k_flying_searchform_wrapper {
		position: absolute;
		width: 100%;
		z-index: 33;
	}
	.prt-header-style-infostack .prt-box-wrapper .site-header>.container.prt-container-for-header{
		width:unset;
		padding: 0;
	}
	.prt-header-text-area {
		display: none;
	}
	.prt-header-style-classic-three .site-header-main.prt-wrap.container-fullwide {
		margin: 0 0px 0 15px;
	}
	.prt-header-style-classic-three .site-header-main.container-fullwide {
		padding-left: 0;
		padding-right: 0;
	}
	.prt-header-style-classic .prt-header-icons .prt-header-wc-cart-link a, .prt-header-style-classic .prt-header-icons .prt-header-search-link a {
		margin-top: -15px;
	}
	#site-header-menu #site-navigation .prt-header-icon .prt-header-wc-cart-link a {
	    font-size: 40px !important;	
	}
	.prt-header-icons .prt-header-wc-cart-link span.number-cart {
		top: 50%;
		margin-top: -22px;
		left: auto;
		right: 0;
	}
	.prt-header-icons .prt-header-icon.prt-header-wc-cart-link a i,
	.prt-header-icons .prt-header-icon.prt-header-wc-cart-link a i:before,
	.preyantechnosys-fullwide .prt-header-style-classic .prt-header-icons .prt-header-wc-cart-link a{
		height: <?php echo esc_attr($header_height); ?>px;
		line-height:<?php echo esc_attr($header_height); ?>px;
		font-size: 40px !important;
	}
}
@media (min-width: <?php echo esc_attr($breakpoint); ?>px) {
    header:not(.prt-header-overlay) #site-header-menu #site-navigation{
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;
    }
	/* Header full */
    .prt-header-overlay .prt-stickable-header-w{
        position: absolute;
        z-index: 21;
        width: 100%;
        box-shadow: none;
        -khtml-box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
    } 
	.site-header-main.container-full {
		padding: 0 50px;
	}
	.prt-stickable-header.is_stuck{    	 
        box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.06);
    }
    .prt-stickable-header{
        z-index: 12;      
    }
	.prt-header-icon, 
	.prt-header-icons, 
	.prt-header-overlay .prt-header-icons:before,
    .preyantechnosys-fbar-btn,
	.prt-header-text-area,
   	.prt-header-icons .preyantechnosys-fbar-btn a i,
	.headerlogo,  
	#site-header-menu #site-navigation div.nav-menu > ul > li > a, 
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }
    .prt-header-icon{       
        position: relative;
    }
	.prt-header-text-area, 
    #site-header-menu #site-navigation .nav-menu,  
    #site-header-menu, 
    .prt-header-icons, 
    .prt-header-icon,
    #site-header-menu #site-navigation .mega-menu-wrap, 
    .menu-prt-main-menu-container{
    	float: right;
    }
	.navbar{
        vertical-align: top;
    }
    .menu-toggle {
        display: none;
        z-index: 10;	
    }
    .menu-toggle i{
        color:#fff;
        font-size:28px;
    }
    .toggled-on li, 
    .toggled-on .children {
        display: block;
    }		
    #site-header-menu #site-navigation div.mega-menu-wrap{
        clear: none;
        position: inherit;
    }
    #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal{
        position: static !important;       
    }
    #site-header-menu #site-navigation .nav-menu-wrapper > ul {
        margin: 0;
        padding: 0; 
    }
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a{
    	background: none;
    } 
	#site-header-menu #site-navigation div.nav-menu > ul{
    	margin: 0px;
		position: relative;
    }   
	.k_flying_searchform_wrapper {
        top: auto;
        position: absolute;
        width: 100%;
        left: 0;
        right: 0;
        z-index: 11;
    }
	.prt-header-style-infostack .k_flying_searchform_wrapper {
		max-width: 1140px;
		left: 0;
		right: 0;
		margin-left: auto;
		margin-right: auto;
	}	
	.prt-header-style-infostack .prt-stickable-header:not(.is_stuck) .k_flying_searchform_wrapper {
		top:<?php echo (preyantechnosys_header_menuarea_height()); ?>px;	
	}
	.prt-header-style-infostack .prt-stickable-header:not(.is_stuck) .k_flying_searchform_wrapper .container {
		width: 1140px;
	}
	.prt-header-style-infostack .prt-stickable-header.is_stuck .k_flying_searchform_wrapper {
		width: 100%;
		max-width: 100%;
	}
   #site-header-menu #site-navigation div.nav-menu > ul > li,
   .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;
    }  
    #site-header-menu #site-navigation div.nav-menu > ul > li {
        margin: 0 0px 0 0;
        display: inline-block;
        position: relative;
		vertical-align: top;
    }   	
    #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	display: inline-block;	
        margin: 0px;
        padding:  0px 16px 0px 16px;
        text-decoration: none;
        position: relative;
        z-index: 1;            
    }
	 #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{   
        height: <?php echo esc_attr($header_height); ?>px;
        line-height: <?php echo esc_attr($header_height); ?>px !important;        
    }
	    
	.prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .prt-header-style-classic .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
		padding: 0px 13px 0px 13px;
		margin: 0 5px 0 5px;
	}	
	.prt-header-style-classic-two #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .prt-header-style-classic-two .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
		padding: 0px 12px 0px 12px;
		margin: 0;
		background: transparent !important;
	}
	
.prt-header-style-classic .header-info-widget .header-widget-main .header-icon {
    padding: 0 16px 0 0;
    font-size: 40px;
    color: var(--prt-secondarycolor);
}	
.prt-header-style-classic .header-info-widget .header-widget-main .header-icon i {
    display: inline-block;
    vertical-align: top;
    padding-top: <?php echo esc_attr(ceil($header_height/2)-20); ?>px;
	line-height: normal;
}

.prt-header-style-classic .header-info-widget .header-widget-main {
	display: flex;
    padding-right: 40px;
    margin-right: 27px;
    border-right: 1px solid var(--prt-bordercolor);
}
.prt-header-style-classic-two .header-info-widget .header-widget-main {
    border: 0;
    margin: 0;
    padding: 0;
}
.prt-header-style-classic .header-info-widget .header-widget-main .header-content {
    line-height: initial;
	margin-top: <?php echo esc_attr(ceil($header_height/2)-25); ?>px;
}
.prt-header-style-classic .prt-header-text-area .header-info-widget a.prt-vc_general.prt-vc_btn3 {
    font-weight: var(--special-element-fontweight);
    transition: all .5s ease;
}
    #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before{
		opacity: 1;
    }	
	
	.prt-header-style-classic-two #site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
	.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a:before{
		display:none;
	}
	
	.prt-header-text-area {
		padding-left: 33px;
		position: relative;
		z-index: 1;
	}
	.prt-header-text-area .header-info-widget {
		vertical-align: middle;
		display: inline-block;
		text-align: left;
	}
	.prt-header-text-area .header-info-widget h2 {
		font-size:20px;
		line-height:28px;
		margin-bottom:3px;
		font-weight:500;
		color: <?php echo esc_attr($skincolor); ?>;
	}
	.prt-header-text-area .header-info-widget h3 {
		font-size: var(--body-font-size);
		line-height: var(--body-line-height);
		color: var(--prt-secondarycolor);
		margin-bottom: 0px;
	}
	.prt-header-text-area .header-info-widget .header-content a {
    font-size: 13px;
	transition: all .3s ease;
}
	.prt-bgcolor-skincolor .prt-header-text-area .header-info-widget h2,
	.prt-bgcolor-darkgrey .prt-header-text-area .header-info-widget h3,
	.prt-bgcolor-skincolor .prt-header-text-area .header-info-widget h3 {
		color:#fff;
	}
	.prt-header-text-area div.header-info-widget:nth-child(2){
		padding-left:62px;
	}
	
	.preyantechnosys-fullwide .prt-header-style-classic-two .prt-header-text-area {
    padding-right: 40px;
	padding-left: 40px;
    background-color: var(--prt-skincolor);
}

	.preyantechnosys-fullwide .prt-header-style-classic-two .prt-header-icons .prt-header-search-link a {
		background-color: var(--prt-greycolor);
		color: <?php echo esc_attr($secondarycolor); ?>;
		font-size: 15px !important;
		border-left: 1px solid var(--prt-bordercolor);
	}
	.preyantechnosys-fullwide .prt-header-style-classic-two .prt-header-icons .prt-header-search-link a i:before{
		font-weight: 700;
	}

	.prt-header-style-classic.prt-header-overlay .site-header.is_stuck .prt-header-icons .prt-header-search-link a {
		color: #fff;
	}
	.preyantechnosys-fullwide .prt-header-style-classic .prt-search-overlay{
		right: 10px;	
		border-top-color: #fff;
		-webkit-box-shadow: 0px 0px 13px 0px rgba(43, 52, 59, 0.25);
		-moz-box-shadow: 0px 0px 13px 0px rgba(43, 52, 59, 0.25);
		box-shadow: 0px 0px 13px 0px rgba(43, 52, 59, 0.25);
	}
	.preyantechnosys-fullwide .prt-header-style-classic .prt-search-overlay .w-search-form-row:before{
		border-left: 12px solid transparent;
		border-right: 12px solid transparent;
		border-bottom: 12px solid #fff;
		top: -15px;
	}
	
    /*** Defaultmenu ***/ 
    .prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,    
    .prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
    .prt-mmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a{
        color: <?php echo esc_attr($skincolor); ?> ;
    }
	.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
	.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,
	.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
		background-color: #fff;;	
	}	
	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
    	.prt-mmenu-active-color-custom .site-header .social-icons li > a:hover, 
        .prt-mmenu-active-color-custom .prt-header-icons .prt-header-search-link a:hover, 
        .prt-mmenu-active-color-custom .prt-header-icons .prt-header-wc-cart-link a:hover,        
        .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,
    	.prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a{
        	color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?> ;
        }        
		.prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a:before,
		.prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before{
			background-color: <?php echo esc_attr($skincolor); ?> ;
        } 
			
    <?php } ?>
	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>        
    /* Dropdown Menu Active Link Color -------------------------------- */ 
	.prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a, 
	.prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a, 
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a, 
    .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li:hover > a,
    .prt-dmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a, 				
    .prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a{
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
	body #site-header-menu #site-navigation div.nav-menu > ul ul li > a:before, 
	body .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a:before {
		background-color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
	}
    <?php } ?>   
  	
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a,
    .is_stuck.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	 #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a,
    .prt-mmmenu-override-yes #site-header-menu .is_stuck #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    #site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a,
    .prt-mmmenu-override-yes #site-header-menu.is_stuck #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	color: <?php echo esc_attr($stickymainmenufontcolor); ?>;
    }  
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,
	#site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a,    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a{
        background: #fff;
    }
	 .prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu li:hover > a,
	.prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a,    
    .prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item:hover > a{
       background-color: #fff;
    }

	.prt-header-style-infostack .prt-header-menu-bg-color-skincolor .prt-header-icons .prt-header-search-link a,  
	.prt-header-style-infostack .prt-header-menu-bg-color-skincolor .prt-header-icons .prt-header-wc-cart-link a,
	.prt-header-style-infostack .prt-header-menu-bg-color-darkgrey .prt-header-icons .prt-header-search-link a,  
	.prt-header-style-infostack .prt-header-menu-bg-color-darkgrey .prt-header-icons .prt-header-wc-cart-link a{
		border-color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 0.70);
		background-color: transparent;
	}
    .site-header .social-icons li > a:hover,
    .prt-header-icons .prt-header-wc-cart-link a:hover,
    .prt-header-icons .prt-header-search-link a:hover{
    	color: <?php echo esc_attr($skincolor); ?>;
    }
	.prt-header-style-infostack .prt-header-menu-bg-color-skincolor .prt-header-icons .prt-header-search-link a:hover,  
	.prt-header-style-infostack .prt-header-menu-bg-color-skincolor .prt-header-icons .prt-header-wc-cart-link a:hover,
	.prt-header-style-infostack .prt-header-menu-bg-color-darkgrey .prt-header-icons .prt-header-search-link a:hover,  
	.prt-header-style-infostack .prt-header-menu-bg-color-darkgrey .prt-header-icons .prt-header-wc-cart-link a:hover {
		border-color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}
	.prt-header-style-infostack .prt-header-menu-bg-color-skincolor .prt-header-wc-cart-link a span.number-cart{
		background-color:#fff;
		color: <?php echo esc_attr($skincolor); ?> ;
	}
	.prt-header-style-infostack .site-header .prt-header-menu-bg-color-darkgrey .prt-header-wc-cart-link a:hover span.number-cart,
	.prt-header-style-infostack .site-header .prt-sticky-bgcolor-darkgrey.is_stuck .prt-header-wc-cart-link a:hover span.number-cart{
		color:#fff;
		background-color:<?php echo esc_attr($skincolor); ?> ;
	}
	.prt-header-style-infostack .kw-phone{
		position: static;		
		text-transform: uppercase;
        letter-spacing: 1px;
		font-family: var(--special-element-fontfamily);
		font-size: 11px;
		color: #fff;
		padding: 0px 0px 0px 8px;
		height: 60px;
		line-height: 60px;
		float: right;
	}	
	.prt-header-style-infostack .kw-phone a {
		background-color: var(--prt-skincolor);
		padding: 14px 27px;
		border-radius: 10px;
		color: #fff;
		transition: all 0.3s ease 0s;
	}
	.prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li:first-child a {
		margin-left: 0;
	}
	.prt-header-style-infostack .kw-phone a:hover {
		background-color: var(--prt-secondarycolor);
		box-shadow: 7px 7px 0px 0px var(--prt-skincolor);
	}	
	.prt-header-style-infostack .is_stuck .site-header-menu-middle {   
		background-color: transparent;
		margin-top: 0;
	}
	#site-header-menu .is_stuck #site-navigation div.nav-menu > ul > li > a {
		color: #fff;
	}
	.prt-header-style-infostack .site-branding .headerlogo:before {
		content: '';
		height: 30px;
		width: 1px;
		display: block;
		position: absolute;
		background: var(--prt-secondarycolor);
		opacity: 13%;
		right: 0;
		left: auto;
		top: 0;
		bottom: 0;
		margin: auto 0;
	}
	.prt-header-style-infostack .site-branding .headerlogo {
		padding-right: 5px;
		margin-right: 20px;
		position: relative;
	}
    /*** Sub Navigation Section ***/
	.prt-header-style-infostack .prt-topbar-content .prt-align-right {
		position: relative;
	}
	.prt-header-style-infostack .prt-topbar-content .prt-col-wrapper-bg-layer.prt-bg-layer {
		background-color: var(--prt-skincolor);
		margin-right: -500px;
		position: absolute;
		right: 0;
		left: auto;
		height: 80px;
	}
	.prt-header-style-infostack .prt-topbar-content .prt-wrap-cell .top-contact li:before {
		left: 0;
	}
	.prt-header-style-infostack .preyantechnosys-topbar-wrapper.container-full {
		padding-left: 100px;
		padding-right: 100px;
	    height: <?php echo esc_attr(ceil($header_height/2)+30); ?>px;
	}
    header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu,
    header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu,
    header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu{
        left: auto;
        right: 0px !important;
    }
	.prt-headerstyle-classic-highlight header#masthead .prt-header-menu-position-left #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu,
    .prt-headerstyle-classic-highlight header#masthead .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu {
		left:100%;
	}
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu, 
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.sub-menu ul.sub-menu,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.sub-menu ul.sub-menu, 	 	
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.children ul.children, 
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.children ul.children,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.children ul.children,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.children ul.children,
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu,
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu ul.mega-sub-menu,
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu ul.mega-sub-menu{
    	left: -100%;
    }            
    #site-header-menu #site-navigation div.nav-menu > ul ul {
        width: 250px;
        padding:0px 15px;
    }       
    #site-header-menu #site-navigation div.nav-menu > ul ul li > a,    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a {
    	margin: 0;
    	display: inline-block;
    	padding: 8px 0px 8px 0px;
    	position: relative;
    }
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .sbi_photo_wrap a {
		display: block;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul li > a,    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li > a{
       -webkit-transition: all .3s linear;
		transition: all .3s linear;
        border-bottom: 0 solid rgb(0,0,0,.09);
    }
	 
	#mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after,
    #site-header-menu #site-navigation div.nav-menu > ul > li i:before {
		transition: transform .5s cubic-bezier(.19,1,.22,1);
	}
	
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
        padding: 0px;
		overflow: hidden;
    }
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child{
    	border-right: none;
    }          
    #site-header-menu #site-navigation div.nav-menu > ul li:hover > ul {
        visibility: visible;
        opacity: 1;
        filter: alpha(opacity=100);
        top: 100%;
        -webkit-transform: rotateX(0);
        transform: rotateX(0);
    } 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu,
	#site-header-menu #site-navigation div.nav-menu > ul li > ul ul  {
        left: 100%;
		top: 0px!important;      
    }
    #site-header-menu #site-navigation ul ul li {
    	position: relative;
		list-style: none;
		padding:0 25px;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul ul {
    	text-align: left;
        position: absolute;
        visibility: hidden;
        display: block;
        opacity: 0; 
        line-height: 14px;        
        margin: 0;
        list-style: none;
        left: 0;        
        border-radius:0px;
        background-clip: padding-box;
        transition: all .5s ease;
        z-index: 99;
         -webkit-transition: all 0.2s ease-out;
        transition: all 0.5s ease-out;
        -moz-transition: all 0.5s ease-out;
        -ms-transition: all 0.5s ease-out;
        -webkit-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
		padding: 15px 0;
    }
	#mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item a.mega-menu-link:before,
	.prt-mmmenu-override-yes #mega-menu-wrap-prt-main-menu #mega-menu-prt-main-menu li.mega-menu-item a.mega-menu-link:before {
		vertical-align: unset;
	}
	.prt-mmmenu-override-yes #site-header-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after{
		font-size: 12px;
		margin-left: 4px;
		margin-top: 3px;
		opacity: 0.8;
    }
	#mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item-has-children li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator::after {
    margin-top: 1px;
}
	
    /*** Sep Section ***/
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        content: ' ';
        display: block;
        width: 30px;
        height: 1000px;
        right: 0px;
        top: 0;
        position: absolute;
        border-right: 1px solid transparent;
    } 
	.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
    	border-bottom: 0 solid transparent;
    }
	 #site-header-menu #site-navigation div.nav-menu ul ul > li:last-child, 
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li:last-child{
        border-bottom: none !important;
    }
	 .prt-dmenu-sep-grey .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .prt-dmenu-sep-grey #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .prt-dmenu-sep-grey .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .prt-dmenu-sep-grey .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
        border-bottom-color: rgba(0, 0, 0, 0.08);
    }
    .prt-dmenu-sep-grey .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        border-right-color: #f5f5f5;
    } 
    .prt-dmenu-sep-white .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item:after {
        border-right-color: rgba(255,255,255,0.10);
    } 
	.prt-dmenu-sep-white .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    .prt-dmenu-sep-white #site-header-menu #site-navigation div.nav-menu ul ul > li,
    .prt-dmenu-sep-white .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:not(.mega-menu-megamenu) ul.mega-sub-menu > li,
    .prt-dmenu-sep-white .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu ul.mega-sub-menu .mega-menu-item li {
        border-bottom-color: rgba(255, 255, 255, 0.10);
    }
    /*** Sticky Header Height ***/ 
    header .prt-header-highlight-logo .is_stuck #site-header-menu,
    header .is_stuck #site-header-menu #site-navigation,    
    .is_stuck .headerlogo,
    .is_stuck .preyantechnosys-fbar-btn,  
    .is_stuck .prt-header-icon,
    .is_stuck .prt-header-text-area,
    #masthead.not(.prt-header-overlay) .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li,
    #masthead.not(.prt-header-overlay) .is_stuck.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li,    
    .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .is_stuck.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        height: <?php echo esc_attr($header_height_sticky); ?>px ;
        line-height: <?php echo esc_attr($header_height_sticky); ?>px !important;
    }
	
	.prt-header-icons .prt-header-wc-cart-link a:before{
		content: '';
		position: absolute;
		height: 30px;
		width: 1px;
		top: 0;
		bottom: 0;
		left: -15px;
		background-color: #cecece;
		margin: auto 0;
	}
	.site-header.prt-bgcolor-white .prt-header-icons .prt-header-wc-cart-link a:before{
		background-color:rgba(0,0,0,0.08);
	}

	
    /*** Sub Navigation menu ***/ 
	#site-header-menu #site-navigation div.nav-menu > ul li > ul,
    #site-header-menu #site-navigation div.nav-menu > ul > li > ul,
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: auto; 
		right: 0;
		margin-top: 0;
		box-shadow: 0 5px 35px rgba(0 ,0 ,0 , 0.10);
		border-radius:0px;
    }  
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image  > a {
    padding: 0;
}
.preyantechnosys-linkeffect-border .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image > a:before, .preyantechnosys-linkeffect-border #site-header-menu #site-navigation div.nav-menu > ul > li > ul.sub-menu a:before, .preyantechnosys-linkeffect-border .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a:before,
.preyantechnosys-linkeffect-border .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a:before {
	content: '';
    width: 0;
	display: block;
    height: 1px;
    bottom: 6px!important;
    position: absolute;
    left: auto;
    right: 0;
    -webkit-transition: width .6s cubic-bezier(.25,.8,.25,1) 0s;
    transition: width .6s cubic-bezier(.25,.8,.25,1) 0s;
}
<?php if( $dropmenu_active_link_color=='skin' && !empty($dropmenu_active_link_custom_color) ){ ?>
.preyantechnosys-linkeffect-border .prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image > a:before, .preyantechnosys-linkeffect-border .prt-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li > ul.sub-menu a:before, .preyantechnosys-linkeffect-border .prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a:before, .preyantechnosys-linkeffect-border .prt-dmenu-active-color-skin .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a:before  {
	background: <?php echo esc_attr($skincolor);?>
}
<?php } ?>
<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
.preyantechnosys-linkeffect-border .prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image > a:before, .preyantechnosys-linkeffect-border .prt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > ul.sub-menu a:before, .preyantechnosys-linkeffect-border .prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a:before, .preyantechnosys-linkeffect-border .prt-mmenu-active-color-custom .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a:before  {
	background: <?php echo esc_attr($dropmenu_active_link_custom_color);?>
}
<?php } ?>
.preyantechnosys-linkeffect-border .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image > a:before, .preyantechnosys-linkeffect-border #site-header-menu #site-navigation div.nav-menu > ul > li > ul.sub-menu li:hover > a:before, .preyantechnosys-linkeffect-border .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a:hover:before, .preyantechnosys-linkeffect-border .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item > a:hover:before {
    width: 100%;
    left: 0;
    right: auto;
    margin: 0;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item .mega-main-demosul.mega-sub-menu li.widget_media_image > a {
	border: none;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-main-demos > ul.mega-sub-menu > li.mega-menu-item.widget_media_image {
    padding: 0 15px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-megamenu {
    padding: 20px 15px 0;
    position: relative;
	height: 150px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-iconbox {
    position: absolute;
    top: 43%;
    left: 45px;
    right: 45px;
    display: flex;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-featured-mega-wrapper {
    padding-top: 10px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-desc {
    padding-left: 70px;
	color: var(--body-fonts-color);
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-desc p {
	color: var(--body-fonts-color);
	line-height: var(--body-line-height);
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .prt-box-desc a {
    display: inline-block;
    font-weight: var(--button-font-weight);
    color: var(--prt-secondarycolor);
	padding: 0;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-main-demos > ul.mega-sub-menu > li.mega-menu-item.widget_media_image .mega-block-title {
    color:#fff;
    background: var(--prt-secondarycolor);
    text-align: center;
    padding: 7px 5px;
    text-transform: capitalize;
    font-size: 13px;
    position: absolute;
    bottom: -50px;
    left: 15px;
    right: 15px;
    z-index: 2;
	opacity: 0;
	transition: all 0.5s ease;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-main-demos > ul.mega-sub-menu > li.mega-menu-item.widget_media_image:hover .mega-block-title {
    bottom: 0;
	opacity: 1;
	transition: all 0.5s ease;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-main-demos ul.mega-sub-menu li.widget_media_image > a:after {
    content: '\e801';
    display: block;
    font-family: 'prt-minemo-icons';
    height: 30px;
    width: 30px;
    line-height: 30px;
    text-align: center;
    background: var(--prt-skincolor);
    border-radius: 50%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    z-index: 1;
	transition: all 0.5s ease;
	transform: scale(0);
	font-size: 13px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.widget_media_image:hover > a:after {
    transition: all 0.5s ease;
	transform: scale(1);
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item.widget_nav_menu:after {
    border-color: var(--prt-bordercolor);
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-item.widget_nav_menu:last-child:after {
    border-color: transparent;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-withoutpadding > ul.mega-sub-menu {
    padding: 0;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-main-demos > ul.mega-sub-menu {
    padding: 30px 15px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item.widget_media_gallery, .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item.widget_media_image {
    padding-top: 35px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-withoutpadding.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu:nth-child(2):after {
    border: 0;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_media_gallery .gallery-item:last-child {
    padding-bottom: 0;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_media_gallery .gallery-item {
    padding-bottom: 10px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock 
 .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram {
    padding: 0 25px;
	padding-bottom: 35px !important;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram .sb_instagram_header.sbi_medium .sbi_header_text h3 {
    margin: 0 !important;
    padding: 0 !important;
    clear: unset !important;
    float: none;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram .sbi_header_text {
    display: inline-block;
    vertical-align: top;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram .sbi_header_img {
    display: inline-block;
    vertical-align: top;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-instablock .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram svg.sbi_new_logo {
    margin: -1px 7px 0 0;
    color: #ff0000;
}
header .mega-menu-instablock #sb_instagram .sb_instagram_header .sbi_header_text.sbi_no_bio h3 {
    padding: 0 0 0 35px !important;
    margin: 0 !important;
    float: none;
    clear: unset;
	color: var(--body-fonts-color);
	transition: all 0.5s ease;
}
header .mega-menu-instablock #sb_instagram .sb_instagram_header .sbi_header_link:hover .sbi_header_text.sbi_no_bio h3 {
	color: var(--prt-secondarycolor);
	transition: all 0.5s ease;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget #sbi_images {
    margin: 0 -5px;
	padding: 0 !important;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget #sb_instagram.sbi_col_5 #sbi_images .sbi_item {
    width: 14%;
	padding-right: 15px !important;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget .sbi_photo_wrap {
    overflow: hidden;
    border-radius: 5px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div.sb_instagram_header {
    padding: 0 !important;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu a.sbi_header_link {
    padding: 0 0 0 0;
    display: inline-block;
    vertical-align: top;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item.widget_media_image {
    padding-right: 10px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item.widget_media_gallery {
    width: 15.3%;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item:last-child:before {
    content: '';
    display: block;
    height: 1px;
    width: 50%;
    background: var(--prt-bordercolor);
    position: absolute;
    top: 0;
    bottom: auto;
    left: 0;
    right: auto;
    z-index: -1;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-instablock > ul.mega-sub-menu > li.mega-menu-item:last-child {
    margin-top: -1px;
	padding-top: 20px;
}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu{
        padding: 30px 0;
        margin: 0px auto;
        width: calc(100% - 47.5%);  
		box-shadow: 0 2px 10px 0px rgb(0 0 0 / 8%), 0 0 0 rgb(0 0 0 / 8%) inset;		
	}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-fullwidth > ul.mega-sub-menu {
    width: 100%;
} 
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-fullwidth > ul.mega-sub-menu li:last-child {
    padding-right: 25px;
}
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-customwidth > ul.mega-sub-menu {
    width: calc(100% - 41%);
} 
.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-menu-withoutpadding > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu {
    padding: 25px 0 20px;
}  
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child:after {
    	border-right: none;
    }  
    /*** Sticky Sub Navigation menu ***/
    .is_stuck  #site-header-menu #site-navigation div.nav-menu > ul > li > ul, 
    .is_stuck.prt-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: <?php echo esc_attr($header_height_sticky); ?>px;
    } 
    /*** Header height ***/
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle + label{
        top: <?php echo esc_attr(ceil($header_height/2)); ?>px;
    }  
    .site-header-main.container-fullwide{
    	padding-left: 60px;
        padding-right: 60px;
    }    
	.prt-header-overlay .site-header-main.container-fullwide {
		padding-left: 60px;
	}
	/*** Header Icon border ***/
	.prt-header-icons{	
		position: relative;
        height: <?php echo esc_attr($header_height); ?>px;
		padding-left:17px;
		margin-right:0px;
    } 
	.prt-headerstyle-classic-overlay .prt-header-contact-btn-wrapper {
		margin-left:40px;
	}	
	.prt-header-style-classic:not(.prt-header-overlay) .prt-header-icons .prt-header-icon.prt-header-wc-cart-link {
		padding-right: 12px;
	}
	.is_stuck .prt-header-icons{	
		border-left-color: rgba( <?php echo preyantechnosys_hex2rgb($stickymainmenufontcolor); ?> , 0.15) ;
        height: <?php echo esc_attr($header_height_sticky); ?>px;
    }
	.prt-header-icons .prt-header-icon.prt-header-wc-cart-link a i,
	.prt-header-icons .prt-header-icon.prt-header-wc-cart-link a i:before,
	.preyantechnosys-fullwide .prt-header-style-classic .prt-header-icons .prt-header-wc-cart-link a,
	.preyantechnosys-fullwide .prt-header-style-classic .prt-header-icons .prt-header-search-link a{
		height: <?php echo esc_attr($header_height); ?>px;
		line-height:<?php echo esc_attr($header_height); ?>px;
	}
	.preyantechnosys-fullwide .prt-header-style-classic .is_stuck .prt-header-icons .prt-header-wc-cart-link a,
	.preyantechnosys-fullwide .prt-header-style-classic .is_stuck .prt-header-icons .prt-header-search-link a{
		height: <?php echo esc_attr($header_height_sticky); ?>px;
		line-height: <?php echo esc_attr($header_height_sticky); ?>px;
	}
	.prt-header-overlay .prt-header-icons{
		float:right;
	}
	.prt-header-icons:before {
		display: block;
		content: "";
		position: absolute;
		height: 30px;
		width: 1px;
		right: -15px;
		top: 50%;
		margin-top: -14px;
		background-color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> ,0.20) ;
	}
	.is_stuck .prt-header-icons:before {
		background-color: rgba( <?php echo preyantechnosys_hex2rgb($stickymainmenufontcolor); ?> ,0.09) ;	
	}
	/*** Mega menu widget calendar ***/
	#site-header-menu #site-navigation .mega-menu-item-type-widget.widget_calendar caption {
		padding: 0px;
	}
	#site-header-menu #site-navigation .mega-menu-item-type-widget.widget_calendar .calendar_wrap {
		padding-top:10px;
	} 
    /*** Overlay Header ***/    
    .prt-header-overlay .prt-stickable-header-w{
    	background-color: transparent;
    }
    .prt-header-overlay .site-header-menu.prt-bgcolor-grey, 
    .prt-header-overlay .site-header.prt-bgcolor-grey{
    	background-color: rgba(235, 235, 235, 0.38);
    }   
    .prt-header-overlay .site-header-menu.prt-bgcolor-white,
    .prt-header-overlay .site-header.prt-bgcolor-white{
    	background-color: rgba(255, 255, 255, 0.05);
    }
    .prt-header-overlay .site-header-menu.prt-bgcolor-skincolor,
    .prt-header-overlay .site-header.prt-bgcolor-skincolor{
    	background-color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 0.30);
    }    
    .prt-header-overlay .site-header-menu.prt-sticky-bgcolor-darkgrey.is_stuck{
    	background-color: #151515;
    }    
    .prt-header-overlay .site-header-menu.prt-sticky-bgcolor-grey.is_stuck{
    	background-color: #f5f5f5;
    }
    .prt-header-overlay .site-header-menu.prt-sticky-bgcolor-white.is_stuck{
    	background-color: #fff;
    }
    .prt-header-overlay .site-header-menu.prt-sticky-bgcolor-skincolor.is_stuck{
    	background-color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 1);
    } 	
	.prt-header-overlay .site-header.prt-bgcolor-custom:not(.is_stuck):after {
		position: absolute;
		bottom: 0;
		left: 0;
		content: "";
		height: 1px;
		width: 100%;
		background-color: rgba(255,255,255,0.08);
	}
	.prt-topbar-content .prt-wrap-cell .preyantechnosys-social-links-wrapper:before {
    opacity: 0;
}
.prt-header-overlay.prt-header-style-classic2 .site-branding {
    float: left;
}
.prt-header-overlay.prt-header-style-classic2 #site-header.prt-bgcolor-darkgrey {
	background-color: rgba( <?php echo preyantechnosys_hex2rgb($secondarycolor); ?> , 0.60) ;
}
.prt-header-overlay.prt-header-style-classic2 #site-header.is_stuck.prt-bgcolor-darkgrey {
    background-color: var(--prt-secondarycolor);
}
.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a:before {
	opacity: 0;
}
	.prt-header-style-classic-two .prt-header-icons:before,
	.prt-header-style-classic .prt-header-icons:before,
	.prt-header-style-infostack .prt-header-icons:before {
		content:unset;
	}
    /*** ThemetechMount Center Menu ***/ 	
	.prt-header-menu-position-center #site-header-menu{
		float: none;
	}
	.prt-header-menu-position-center #site-header-menu #site-navigation{
		text-align: center;
		width: 100%;
	}    
    .prt-header-menu-position-center #site-header-menu  #site-navigation .nav-menu,
	.prt-header-menu-position-center.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap {		
		float: none;
		right: 0;
		left: 0;
		text-align: center;  		
	}	
	.prt-header-menu-position-center.prt-mmmenu-override-yes  #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {
		position: static !important;
		display: inline-block;
	}
	.prt-header-menu-position-center .site-header-menu.prt-wrap-cell{
		display: block;
	}
	.prt-header-menu-position-center .headerlogo, 
	.prt-header-menu-position-center .prt-header-icon{
		position: relative;
		z-index: 2;
	}
	/*** ThemetechMount Left Menu ***/ 	
	.prt-header-menu-position-left #site-header-menu{
		float: none;
		display: block;
    }
    .prt-header-menu-position-left #site-header-menu #site-navigation .nav-menu,
	.prt-header-menu-position-left #site-header-menu #site-navigation div.mega-menu-wrap {
		float: left;
	}
	.prt-header-menu-position-left .site-branding{	
		padding-right: 5px;
	}	
	/*** ThemetechMount Dropdown widht narrow ***/ 	
	.site-header-main.container-full #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu{		
		max-width: 1200px;
		right: 0;
		left: -15px;
		margin: 0px auto;
	}
	/* Header Social link */ 
    .site-header .preyantechnosys-social-links-wrapper{
    	float: right;
    }
	
	
    .site-header .social-icons {
        padding-top: 0;
        padding-bottom: 0;
    }
    /***  Tm Header Style Infostack ***/   
    .prt-header-style-infostack:not(.prt-header-invert) #site-header-menu #site-navigation .nav-menu{
    	float: left;
		margin-right: 50px;
	}   
    .prt-header-style-infostack  #site-header-menu{
    	float: none;
    }
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li{
        vertical-align: top;
    }
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a { 
		padding: 0;
		margin: 0px 13px 0px 13px;
    } 	
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a:before, 
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before{
        display: none;   
    }
	.prt-header-style-infostack .prt-header-top-wrapper .site-branding{
		float:left;
		text-align:left; 
		display:block;
		position: relative;
		z-index: 10;
	}
	.prt-header-style-infostack .prt-header-top-wrapper .headerlogo {
		position: relative;
	}
    .prt-header-style-infostack .site-header-menu .is_stuck .tprt-custombutton:after {
        content: unset;
    }
    .prt-header-style-infostack #site-header-menu #site-navigation div.mega-menu-wrap{
    	float: left;
    }    
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
    	top: auto;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
    }  
    .prt-header-style-infostack .header-content-main .header-content,
    .prt-header-style-infostack .header-content-main .header-icon{
        display: table-cell;
        vertical-align: middle;
    }
    .prt-header-style-infostack .prt-vc_icon_element {
        margin-bottom: 0px;
    }    
    .prt-header-style-infostack .prt-bgcolor-grey .header-content-main .header-content,
    .prt-header-style-infostack .prt-bgcolor-white .header-content-main .header-content{
    	color: rgba(0, 0, 0, 0.8);
    }       
    .prt-header-style-infostack .prt-bgcolor-skincolor .header-content-main .header-content,
    .prt-header-style-infostack .prt-bgcolor-darkgrey .header-content-main .header-content {
        color: rgba( 255,255,255,0.7);
    } 
    .prt-header-style-infostack .prt-bgcolor-skincolor .prt-vc_icon_element.prt-vc_icon_element-outer .prt-vc_icon_element-inner,
    .prt-header-style-infostack .prt-bgcolor-darkgrey .prt-vc_icon_element.prt-vc_icon_element-outer .prt-vc_icon_element-inner{	
    	color: #fff;
    }      
    header.prt-header-style-infostack .site-header:after{
        display: none;       
	}
	.prt-header-style-infostack .prt-header-icons span:only-child:not(.prt-minemo-icon-search) {
		margin-right: -10px;
	}
	.prt-header-style-infostack .prt-bgcolor-skincolor .prt-header-icons a,
	.prt-header-style-infostack .prt-bgcolor-darkgrey .prt-header-icons a,
	.prt-header-style-infostack .prt-bgcolor-skincolor .prt-header-icons,
	.prt-header-style-infostack .prt-bgcolor-darkgrey .prt-header-icons {
		color:#fff;
	}	
    .prt-header-style-infostack .preyantechnosys-fbar-btn.animated {
        -webkit-transform: translateX(0px);
        -ms-transform: translateX(0px);
        transform: translateX(0px);
    }   
    .prt-header-style-infostack .prt-header-icon.prt-header-btn-w{
        padding-right: 0px;
        display: block;
        text-align: center;
        color: #fff;        
        width: auto;
    }
    .prt-header-style-infostack #site-header-menu #site-navigation .prt-header-icon.prt-header-btn-w a{
        color: #fff; 
        font-size: 14px;
        padding: 0px 35px;
        display: block;
        letter-spacing: 1px;      
        background-color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 1);
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }    
    .prt-header-style-infostack #site-header-menu.prt-bgcolor-skincolor #site-navigation .prt-header-icon.prt-header-btn-w a{
    	background-color: rgba(0, 0, 0, 0.19);
    }
    .prt-header-style-infostack #site-header-menu.prt-bgcolor-skincolor #site-navigation .prt-header-icon.prt-header-btn-w a:hover{
    	background-color: rgba(0, 0, 0, 0.40);
    }    
    .prt-header-style-infostack #site-header-menu #site-navigation .prt-header-icon.prt-header-btn-w a:hover{
        background-color: rgba( <?php echo preyantechnosys_hex2rgb($skincolor); ?> , 0.80);
    }
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,      
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    .prt-header-style-infostack .kw-phone .prt-header-icon, 
    .prt-header-style-infostack .kw-phone .prt-header-icons,	
     header.prt-header-style-infostack #site-header-menu #site-navigation,
    .prt-header-style-infostack .kw-phone .preyantechnosys-fbar-btn{
        height: <?php echo esc_attr($preyantechnosys_header_menuarea_height); ?>px;
        line-height: <?php echo esc_attr($preyantechnosys_header_menuarea_height); ?>px !important;
    }
	
    .prt-header-style-infostack #site-header-menu #site-navigation div.mega-menu-wrap{
        position: static;
    }
    .prt-header-style-infostack .prt-stickable-header-w{
        height: auto !important;
    }
	.preyantechnosys-fullwide .prt-header-style-infostack .prt-stickable-header-w{
        position: initial;
		margin-right: 100px;
		margin-left: 100px;
		padding: 0 50px;
    }
	.preyantechnosys-fullwide .prt-header-style-infostack .prt-stickable-header.is_stuck  .prt-stickable-header-w {
		margin: 0;
		padding: 0 150px;
	}	
    .prt-header-style-infostack #site-header-menu {
		float: none;
		position: absolute;
		width: 100%;
		bottom: -35px !important;
		z-index: 10;
	}
	.prt-header-style-infostack .prt-top-info-con,
    .prt-header-style-infostack .prt-top-info-con > ul:not(.social-icons) {
        height: <?php echo esc_attr($header_height) - ($preyantechnosys_header_menuarea_height/2); ?>px;
    }
	.prt-header-style-infostack .kw-phone{
		height: <?php echo esc_attr($preyantechnosys_header_menuarea_height); ?>px;
		line-height: <?php echo esc_attr($preyantechnosys_header_menuarea_height); ?>px;
	}
	.prt-header-style-infostack .headerlogo .site-title {
		text-align: left;
	}
    .prt-header-style-infostack .site-branding{
        float: left;
    }
	.prt-header-style-infostack.prt-header-overlay .site-header .prt-stickable-header.prt-header-menu-bg-color-custom:not(.is_stuck),
	.prt-header-style-infostack .site-header .prt-stickable-header.prt-header-menu-bg-color-white:not(.is_stuck) {	
		border-top: 0 solid #ededed;	
	}
	.prt-header-style-infostack .prt-topbar-content .prt-align-right .top-contact li span {
		font-weight: var(--special-element-fontweight);
		font-family: var(--special-element-fontfamily);
	}
	.prt-header-style-infostack .prt-topbar-content .prt-align-right li {
    padding-left: 25px;
    padding-right: 25px;
}
	.prt-header-style-infostack .prt-topbar-content .prt-wrap-cell .top-contact li:last-child {
    padding-right: 0;
}
.prt-header-style-infostack .prt-topbar-content .prt-col-wrapper-bg-layer.prt-bg-layer:before {
	display: none;
}
    .prt-header-style-infostack .is_stuck .site-header-menu-middle{
        padding: 0px;
		box-shadow: none;
    }
	.prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul ul {
	    background-clip: unset;	
	}
	.prt-header-style-infostack .is_stuck.prt-sticky-bgcolor-custom .prt-container-for-header .prt-sticky-bgcolor-custom{
        background-color: transparent !important;
    }
    .prt-header-style-infostack.prt-header-overlay .site-header{
        position: absolute;
        width: 100%;        
    } 
	.prt-header-style-infostack.prt-header-overlay .site-header{ 
		z-index: 9;	
    }  	
    .prt-header-style-infostack.prt-header-overlay .site-branding,
    .prt-header-style-infostack.prt-header-overlay .prt-header-widgets-wrapper{
        position: relative;     
        z-index: 1;
    }
    .prt-header-style-infostack.prt-header-overlay .prt-titlebar-wrapper{
        z-index: 0;
    }
	.prt-header-style-infostack .prt-header-menu-bg-color-skincolor .kw-phone .tprt-custombutton a {
		margin-left:0px;
	}
	.prt-header-style-infostack .kw-phone .tprt-custombutton a {
    border: 0;
	margin: 0;
	    color: var(--body-fonts-color);
}
	.prt-header-style-infostack #site-header-menu #site-navigation .kw-phone .preyantechnosys-social-links-wrapper .social-icons li {
    padding: 0;
	float: left;
}
.prt-header-style-infostack .kw-phone .social-icons li > a {
    height: 40px;
    width: 40px;
    line-height: 40px;
	color: var(--prt-whitecolor);
}
.prt-header-style-infostack .kw-phone .social-icons li > a i {
    font-size: 15px;
	margin: 0;
    padding: 0;
}
.prt-header-style-infostack .kw-phone .top-contact li span {
    font-weight: var(--special-element-fontweight);
    font-family: var(--special-element-fontfamily);
}
 .prt-header-style-infostack .kw-phone .top-contact {
	 height: <?php echo esc_html($header_height); ?>px;
	 line-height: <?php echo esc_html($header_height); ?>px;
 }
 .prt-header-style-infostack .site-header .kw-phone  .preyantechnosys-social-links-wrapper {
    margin-top: 30px;
}
	.prt-header-style-infostack #site-header-menu #site-navigation div.mega-menu-wrap > ul > li:after,
	.prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li:after {
		
		position: absolute;
		height: 100%;
		width: 1px;
		left: 0px;
		top: 50%;
		-khtml-transform: translateX(0%) translateY(-50%);
		-moz-transform: translateX(0%) translateY(-50%);
		-ms-transform: translateX(0%) translateY(-50%);
		-o-transform: translateX(0%) translateY(-50%);
		transform: translateX(0%) translateY(-50%);
		background-color: rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 0.07);
		display: inline-block;
	}
	.prt-header-style-infostack #site-header-menu .is_stuck  #site-navigation div.mega-menu-wrap > ul > li:after,
	.prt-header-style-infostack #site-header-menu .is_stuck  #site-navigation div.nav-menu > ul > li:after {
		background-color: rgba( <?php echo preyantechnosys_hex2rgb($stickymainmenufontcolor); ?> , 0.07);
	}
	#site-header-menu #site-navigation div.mega-menu-wrap > ul > li:last-child:after,
    #site-header-menu #site-navigation div.nav-menu > ul > li:last-child:after{
        display: none;
    }
	.prt-header-style-classic-highlight .prt-header-icons::before,
	.prt-header-style-infostack .kw-phone .prt-header-icons:last-child:after {
		content:none;
	}	  
    .prt-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a:before,
    .prt-header-style-infostack .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a:before{
        width: 15px;
        opacity:1;
    }  
	.prt-header-style-infostack .prt-top-info-con > .header-widget:after {
		content: "";
		height: 50px;
		width: 1px;
		background-color: rgba(0, 0, 0, 0.06);
		display: block;
		position: absolute;
		right: 0px;
		top: 30px;
	}
	.prt-header-style-infostack .prt-top-info-con > .header-widget:last-child:after {
		content:none;
	}
	.prt-header-style-infostack .prt-titlebar-wrapper.prt-breadcrumb-on-bottom .prt-titlebar-main > .container .prt-titlebar-main-inner .entry-title-wrapper {
	    margin-top: -14px;	
	}
	.prt-header-style-infostack .prt-header-menu-bg-color-custom .prt-header-icons .prt-header-search-link a,
	.prt-header-style-infostack .prt-sticky-bgcolor-custom .prt-header-icons .prt-header-search-link a,
	.prt-header-style-infostack .prt-sticky-bgcolor-custom .prt-header-icons .prt-header-wc-cart-link a,
	.prt-header-style-infostack .prt-header-menu-bg-color-custom .prt-header-icons .prt-header-wc-cart-link a {
		color: rgba(2,13,38,1);
	}
    /* Right to Left Dropdown menu */          
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li > a:before {
        content: '\E83A';    
        left: auto;
        right: -14px;   
        -webkit-transition: right .2s ease-in-out;
        -moz-transition: right .2s ease-in-out;
        transition: right .2s ease-in-out;
	}    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-menu-megamenu.mega-align-bottom-right ul.mega-sub-menu li.menu-item > a{
    	text-align: right;
    }    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu li.mega-menu-item:after {
        right: auto;
        left: 12px;
        position: absolute;
        border-right: none;
        border-left: 1px solid rgba(255,255,255,0.08);
    }  
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu > li.mega-menu-item > h4.mega-block-title {
        text-align: right;
    }    
   .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu.mega-align-bottom-right > ul.mega-sub-menu > li.mega-menu-item:first-child:after {
    	border-left: none;
	}    
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu ul.mega-sub-menu{
        background-image: none !important;      
    }    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-menu-megamenu.mega-align-bottom-right ul.mega-sub-menu li.menu-item:hover > a,    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li.mega-menu-item:hover > a {
    	padding-left: 0px;
        padding-right: 20px;
	}
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu li:hover > a:before {
        left: auto;
        right: 0px;
	}    
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-align-bottom-right ul.mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
        padding-left: 15px;
        text-align: right;
    }    
    /* Header sticky animation */  
    .site-header.is_stuck {
        position: fixed;
        width:100%;
        top:0;    
        z-index: 999;
        margin:0;
        animation-name: menu_sticky;
        -webkit-box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.17);
        -moz-box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.17);
        box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.17);
        padding: 0;
    }    
    #site-header-menu #site-navigation div.nav-menu > ul > li ul li.page_item_has_children > a:after, 
    #site-header-menu #site-navigation div.nav-menu > ul > li ul li.menu-item-has-children > a:after{
		font-family: "FontAwesome";
		font-style: normal;
		font-weight: normal;
		display: inline-block;
		text-decoration: inherit;
		text-align: center;
		opacity: 1;
		font-variant: normal;
		text-transform: none;
		font-size: 16px;
		content: "\f105";
		position: absolute;
		background-color: transparent;
		right: -20px;
		top:12px;
		margin: 0;
    }    
    .prt-header-icons .preyantechnosys-fbar-btn,
    .prt-header-icons .prt-header-icon{
        margin-left: 7px;
    }
	.prt-header-icons .prt-header-icon.prt-header-wc-cart-link {
		padding-left:15px;
	}
	.prt-header-style-infostack .kw-phone .prt-header-icons .prt-header-wc-cart-link {
		margin-right: 0px;
		margin-left: 15px;
		padding-left: 10px;
		border-left: 1px solid rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 0.07);
	}
	.prt-header-style-infostack .is_stuck .kw-phone .prt-header-icons .prt-header-wc-cart-link {
		border-color: rgba( <?php echo preyantechnosys_hex2rgb($stickymainmenufontcolor); ?> , 0.07);
	}
     /*** Tm-Header-Invert ***/ 
    .prt-header-style-classic.prt-header-invert .container-fullwide #site-header-menu{
        margin-left:20px;
    }
    .prt-header-invert .site-header-main.container-fullwide{
        padding-right: 30px;
        padding-left: 0px;
    }     
    .prt-header-invert #site-header-menu{
        float: left;
    }
    .prt-header-invert .site-branding{
        float:right;    
    } 
    .prt-header-invert .prt-header-icons {        
        float: left;
        border-left: none;
        padding-right: 0px;
        padding-left: 0px;
        margin-left: 0px;
        margin-right: 0px;
    }
    .prt-header-invert .site-header .preyantechnosys-social-links-wrapper{
        padding-right: 0;
        padding-left: 0px;
    } 
    .prt-header-invert .prt-header-search-link,
    .prt-header-invert .prt-header-wc-cart-link{
        float: left;
        padding-left: 0;        
    }
    .prt-header-invert #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {        
        text-align: right;
    }    
    .prt-header-invert #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .prt-header-invert #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item {
        float: right;      
    }    
    .prt-header-invert .prt-header-top-wrapper.container-fullwide{
        padding-right: 15px;
    }
    .prt-header-invert .prt-header-icon, 
    .prt-header-invert .preyantechnosys-fbar-btn {
        margin-right: 20px;
        margin-left: 0px;
    }
    .prt-header-style-infostack.prt-header-invert .prt-header-widgets-wrapper {
        float: left;
    }    
    .prt-header-style-infostack.prt-header-invert .prt-header-widgets-wrapper .header-widget {
        padding-right: 24px;
        padding-left: 0;
    }    
    .prt-header-style-infostack.prt-header-invert .preyantechnosys-fbar-btn{        
        border-left: 1px solid rgba( <?php echo preyantechnosys_hex2rgb($mainMenuFontColor); ?> , 0.09) ;
        left: 0;
        float: left;
    }   
    .prt-header-style-infostack.prt-header-invert .prt-header-icon, 
    .prt-header-style-infostack.prt-header-invert .preyantechnosys-fbar-btn {
        margin-right: 0px;
        margin-left: 0px;
    }
    .prt-header-style-infostack:not(.prt-header-invert) .prt-header-top-wrapper.container-fullwide{
        padding-left: 15px;
        padding-right: 15px;
    }       
    .prt-header-style-classic .prt-header-highlight-logo .headerlogo{
        position: relative;
    }
    .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item-has-children > a.mega-menu-link:after{
        font-size: 10px;
		margin-left: 3px;
		margin-top: 3px;
		margin-top: 3px;
		opacity: 0.3;
    }
	.prt-header-style-infostack .site-header.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li, 
    .prt-header-style-infostack .site-header.is_stuck .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap    ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,      
    .prt-header-style-infostack .site-header.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
    .prt-header-style-infostack .site-header.is_stuck .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    .prt-header-style-infostack .site-header.is_stuck .kw-phone .prt-header-icon, 
    .prt-header-style-infostack .site-header.is_stuck .kw-phone .prt-header-icons,	
     header.prt-header-style-infostack .site-header.is_stuck #site-header-menu #site-navigation,
    .prt-header-style-infostack .site-header.is_stuck .kw-phone .preyantechnosys-fbar-btn,
	.prt-header-style-infostack .site-header.is_stuck .headerlogo {
		 height: <?php echo esc_attr($header_height_sticky); ?>px ;
        line-height: <?php echo esc_attr($header_height_sticky); ?>px !important;
	}

		
	.prt-titlebar-wrapper.prt-breadcrumb-on-bottom .prt-titlebar .entry-title-wrapper {
		margin-top: -50px;
	}
	#site-header-menu #site-navigation .prt-header-icon a.prt-social-btn-link {
		font-size: 18px;
	}
	#site-header-menu #site-navigation .prt-header-icon.prt-header-social-box {
	    width: 50px;
		text-align: center;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li i {
		position: relative;
		font-size: 13px;
		transition: all 500ms ease;
		display: inline-block;
		top: 0;
		left: -18px;

	}
	#site-header-menu #site-navigation div.nav-menu > ul > li i:before {
    margin: 0;
    text-align: right;
}

   .prt-header-overlay .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li i {
     color: #fff;
    
    }
	/*** Themetechmount Classic Box ***/
	.prt-header-style-classic-box .site-header:not(.is_stuck) .container{
        padding: 0;       
    }
	.prt-header-style-classic-box .site-header:not(.is_stuck) .site-branding{
        padding-left: 20px;
    }  
    .prt-header-style-classic-box .site-header:not(.is_stuck) #site-header-menu{
        padding-right: 20px;
    }
    .prt-header-style-classic-box.prt-header-invert #site-header-menu{
        padding-left: 20px;
        padding-right: 0px;
    }
    .prt-header-style-classic-box.prt-header-overlay .site-header:not(.is_stuck){
    	background-color: transparent !important;
    }    
    .prt-header-style-classic-box.prt-header-overlay .site-header:not(.is_stuck) .container-fullwide{
        margin: 30px;
    }    
    .preyantechnosys-fullwide .prt-header-style-classic-box.prt-header-overlay .site-header .site-branding{
    	padding-left: 20px;
    }
    .preyantechnosys-fullwide .prt-header-style-classic-box.prt-header-overlay .site-header .site-header-menu{
    	padding-right: 20px;
    } 
	.prt-header-style-classic-box.prt-header-overlay .preyantechnosys-topbar-wrapper {
		padding:4px 0px 47px;
	}
	.prt-header-style-classic-box.prt-header-overlay .site-header:not(.is_stuck) > .prt-container-for-header {
		box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);	
	}
	.prt-header-style-classic-box.prt-header-overlay .prt-stickable-header-w {
	  top: <?php echo esc_html( ($header_height/2) + 9 ); ?>px;
	}
	.prt-header-style-classic-box.prt-header-overlay .prt-titlebar-wrapper .prt-titlebar-inner-wrapper .prt-titlebar-main{
		padding-top:<?php echo esc_html( ($header_height/2) + 9 ); ?>px;
	}
	.prt-header-menu-position-center #site-header-menu #site-navigation div.nav-menu > ul,
	.prt-header-menu-position-center.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {
		position: static !important;
		display: inline-block;
	}	
	.prt-header-style-classic-box.prt-header-overlay .prt-header-icons {
		float: right;
	}
	.prt-header-style-classic-box.prt-header-overlay .prt-header-text-area {
		padding-left: 10px;
	}
	.prt-header-style-classic-box .prt-container-for-topbar {
		padding: 0;
	}
	.prt-header-style-classic2.prt-header-overlay .site-header.prt-bgcolor-custom:not(.is_stuck):after {
		content:unset;
	}
	.prt-header-style-classic2.prt-header-overlay .site-header.prt-bgcolor-custom:not(.is_stuck) {
		display: block;
		overflow: hidden;
		border-bottom:1px solid rgba(255,255,255,0.20);
	}
	.prt-header-style-classic2.prt-header-overlay #site-header-menu #site-navigation > .nav-menu {
		margin-right: 15px;
	}
	.prt-header-overlay.prt-header-style-classic2 .site-header-main.container-fullwide {
		padding-left:100px;
		padding-right:100px;
	}
	.prt-header-overlay.prt-header-style-classic2 .preyantechnosys-topbar-wrapper.container-full {
		padding-left: 100px;
		padding-right: 100px;
	}
	.prt-header-overlay.prt-header-style-classic2 .preyantechnosys-topbar-wrapper.prt-bgcolor-darkgrey {
		opacity: 90%;
	}
	.prt-headerstyle-toplogo .header-info-widget a {
		color: #fff;
	}
	.prt-headerstyle-toplogo .info-widget-content h2 {
		font-size: 14px;
		line-height: 24px;
		color: #fff;
		font-weight: 400;
	}
	.prt-headerstyle-toplogo .info-widget-content .prt-left-texts h1 {
		font-size: 20px;
		font-weight: 600;
		color: #fff;		
	}
	.prt-headerstyle-toplogo .info-widget-content h1 {
		font-size: 14px;
		line-height: 25px;
		color: #fff;
	}
	span.prt-left-texts {
		display: flex;
	}
	.info-widget-content {
		display: flex;
	}
	.prt-headerstyle-toplogo .widget-right , .prt-headerstyle-toplogo .widget-left {
		padding-top: 30px;
	}
	.prt-headerstyle-toplogo .kw-phone {
		position: absolute;
		top: -10px;
	}
	.site-header .preyantechnosys-social-links-wrapper {    
		padding-left: 13px;
	}
	.prt-headerstyle-toplogo .social-icons li {
		display: inline-block !important;
		padding-left: 0px;
		width: 30px;
		border: none;
		height: 30px;
		margin-right: 4px;
	}
	.prt-headerstyle-toplogo .prt-stickable-header-w {
		position: absolute;
		width: 100%;
		z-index: 21;
		height: auto !important;
	}
	.prt-headerstyle-toplogo .prt-header-text-area .header-info-widget a {
		background-color: var(--prt-skincolor-bg);
		padding: 15px 24px 15px 24px;
	}
	.prt-headerstyle-toplogo header.prt-header-overlay #site-header {
		position: absolute;
		right: 0;
		left: 0;
		width: 100%;
		z-index: 9;
	}
	.prt-headerstyle-toplogo .site-header-menu-middle {
		position: relative;
	}
	.prt-headerstyle-toplogo .prt-header-text-area {
		padding-left: 24px;
		position: absolute;
		z-index: 1;
		right: 0;
		top: 0;
	}
	.prt-headerstyle-toplogo .prt-stickable-header.is_stuck {
		background-color: var(--prt-secondary-bg);		
	}
	.prt-headerstyle-toplogo .prt-header-icons .prt-header-icon {
		margin-left: 0;
	}
	.prt-headerstyle-toplogo .prt-header-icons {		
		padding-left: 0;
	}
	.prt-headerstyle-toplogo .prt-header-icons:before {
		right: -14px;
		left: auto;
		top: 45px;
	}
	.prt-headerstyle-toplogo .social-icons li > a {
		color: #fff;
		border: 1px solid rgba(255 ,255, 255 , 0.20);
		width: 30px;
		height: 30px;
		line-height: 30px;
		font-size: 15px;
	}
	.widget-right h1 {
		padding-right: 10px;
	}
	.prt-headerstyle-toplogo .prt-header-overlay .site-header.prt-bgcolor-custom:not(.is_stuck):after {
		display: none;
	}
	.prt-menu-border {
		padding-right: 30px;
	}
	.prt-menu-border:after {
		display: block;
		content: "";
		position: absolute;
		height: 28px;
		width: 1px;
		right: 12px;
		top: 50%;
		margin-top: -14px;
		background-color: rgba( 255,255,255 ,0.09);
	}
	.prt-headerstyle-toplogo .widget-right .info-widget-content i {
		color: var(--prt-skincolor-text);
		padding-right: 4px;
	}
	.prt-headerstyle-toplogo header #site-header-menu #site-navigation {
		height: 69px;
		line-height: 69px !important;
	}
	.prt-headerstyle-toplogo .prt-stickable-header .container.prt-container-for-header {
		border-bottom: 1px solid rgba(255, 255, 255 , 0.20);
		width: 1400px !important;
		padding: 0;
	}
	.prt-headerstyle-toplogo .prt-header-text-area .header-info-widget {
		margin-top: -32px;
	}
	.prt-headerstyle-toplogo #site-header-menu #site-navigation div.nav-menu > ul > li,
	.prt-headerstyle-toplogo #site-header-menu #site-navigation div.nav-menu > ul > li > a {
		height: 67px;
		line-height: 67px !important;
	}
	.prt-headerstyle-toplogo .widget-right .info-widget-content {
		float: right;
	}
	.prt-headerstyle-toplogo .prt-header-top-wrapper .col-sm-4 {
		padding: 0;
	}
	.prt-headerstyle-toplogo .site-header .social-icons li > a:hover i {
		color: #fff;
	}
	.prt-headerstyle-classic-overlay .prt-header-button {
		display: inline-block;
	}
	.prt-headerstyle-classic-overlay .prt-topbar {
		padding: 0px;
		height: 50px;
	}
	.prt-headerstyle-classic-overlay span.prt-text-white i,
	.prt-headerstyle-classic-overlay span.prt-text-white {
		color: #fff;
	}
	.prt-headerstyle-classic-overlay .prt-header-overlay .site-header-main.container-fullwide {
		padding-left: 70px;
		padding-right: 70px;
	}
	.prt-headerstyle-classic-overlay .home-link {
		background-color: var(--prt-skincolor-bg);
	}
	.prt-headerstyle-classic-overlay .prt-header-overlay .prt-bgcolor-darkgrey .preyantechnosys-topbar-inner {
		border-bottom: 0 solid transparent !important;
	}
	
	.prt-headerstyle-classic-overlay .prt-topbar i {
		color: var(--prt-skincolor-text);
	}
	.prt-headerstyle-classic-overlay .prt-wrap-cell.prt-align-left {
		font-size: 18px;
		line-height: 50px;
		
	}
	.prt-headerstyle-classic-overlay span.prt-text-white {
		padding-left: 10px;
	}
	.prt-headerstyle-classic-overlay .header-info-widget .top-contact li,
	.prt-headerstyle-classic-overlay ul.top-contact li {
		font-size: 14px;
		color: rgba(255 ,255, 255 , 0.50);
	}
	.prt-headerstyle-classic-overlay .top-contact i {
		color: var(--prt-skincolor-text);
	}
	.prt-headerstyle-classic-overlay .top-contact span.prt-text-white-right {
		color: #fff;
		font-weight: 600;
		padding-right: 9px;
	}
	.prt-headerstyle-classic-overlay li.prt-text-white {
		color: #fff !important;
	}
	.prt-headerstyle-classic-overlay .top-contact ul {
		margin: 26px 0 16px 0;
	}
	.prt-headerstyle-toplogo .prt-header-menu-position-left #site-header-menu #site-navigation .nav-menu {
		float: none;
		right: 0;
		left: 0;
		text-align: center;
	}
	.prt-headerstyle-classic-overlay ul.polylang_langswitcher {
		position: absolute;
		top: 100%;
		left: auto;
		right: 0;
		z-index: 1000;
		display: none;
		float: left;
		min-width: max-content;
		padding: 15px 20px;
		margin: 2px 0 0;
		font-size: 14px;
		text-align: left;
		list-style: none;
		background-color: #ffffff;
		-webkit-background-clip: padding-box;
		background-clip: padding-box;
		-webkit-box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 10%);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
		box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 10%);
	}
	.prt-headerstyle-classic-overlay .prt-topbar-content .language-title {
		cursor: pointer;
		padding-left: 30px;
	}
	.prt-headerstyle-classic-overlay ul.polylang_langswitcher a {
		color: var(--body-fonts-color);
	}
	
	.prt-header-style-classic .prt-bgcolor-darkgrey #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, .prt-header-style-classic .prt-bgcolor-darkgrey #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a, .prt-header-style-classic #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a {
		background: transparent;
	}
	.preyantechnosys-fullwide #site-header-menu #site-navigation div.nav-menu > ul li:nth-last-child(4) > ul ul {
		right: 100%;
		left: auto;
	}
	.prt-header-style-infostack .prt-titlebar-wrapper  .prt-titlebar-inner-wrapper {
		padding-top: 55px;
	}
	header#masthead #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu {
		left: -128%;
	}
	.prt-headerstyle-classic-overlay .site-description {
		
		font-size: var(--body-font-size);
		line-height: inherit;
		margin: 0;
		color: rgba(255,255,255,0.45);
		width: 100%;
		margin-left: 35px;
		font-family: var(--body-font-family);
		position: relative;
	}
	.prt-headerstyle-classic-overlay .headerlogo.preyantechnosys-logotype-text {
		display: flex;
	}
	.prt-header-style-classic.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a {
		background: transparent;
	}
	.prt-header-style-classic-three .site-title {
		position: relative;
		padding-right:40px;
	}

	.prt-header-style-classic.prt-header-overlay .site-header.is_stuck .prt-header-text-area .header-info-widget a:not(:hover) {
		color: #fff;
	}

	.prt-header-style-classic.prt-header-overlay .site-header.is_stuck .prt-header-contact-btn-wrapper a {
		 background-color: var(--prt-skincolor);
	}

	.prt-header-style-classic.prt-header-overlay .site-header.is_stuck .prt-header-contact-btn-wrapper a:hover {
		 background-color: var(--prt-whitecolor);
		 color:var(--prt-secondarycolor);
	}

	.prt-header-style-classic-three .site-title:before {
		content: "";
		position: absolute;
		height: 60%;
		width: 1px;
		background-color: rgba( 38,48,69,0.09);
		top: 20%;
		right: 0;
		display: block;
	}
	.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu {
		margin-left: 20px;
	}
	.prt-header-style-classic-three .preyantechnosys-social-links-wrapper {
		float: left;
	}
	.prt-header-style-classic-three .prt-quick-call {
		display: inline-block;
		float: right;
	}
	.prt-header-style-classic-three .prt-quick-call h5 {
		display: inline-block;
	}
	.prt-header-style-classic-three .prt-quick-call img {
		padding-right:10px;
	}
	header#masthead.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu,
	header#masthead.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.sub-menu ul.sub-menu,
	header#masthead.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.sub-menu ul.sub-menu,
	header#masthead.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.children ul.children,
	header#masthead.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastthird ul.children ul.children,
	header#masthead.prt-header-style-classic-three .prt-header-menu-position-left #site-header-menu #site-navigation div.nav-menu > ul li.lastfourth ul.children ul.children {
		left: 100%;
	}
	.prt-header-style-classic-three .site-header-main.container-fullwide {
		padding-left: 100px;
		padding-right: 100px;
	}
	.prt-header-style-classic-three .site-branding {
		padding-right:30px;
		float: left;
	}
	.prt-header-style-classic-three #site-header-menu #site-navigation div.nav-menu > ul > li > a:before, 
	.prt-header-style-classic-three .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before {
		top: 0px;
		height: 2px;
		bottom: 0;
		margin-bottom: 30px;
		width: calc(100% - 30px) !important;
	}
	.prt-header-style-classic .prt-header-icons .prt-header-search-link {
		margin-right: 10px;
	}
	.prt-headerstyle-infostack .prt-sboxtop-info-con1 {
		position: relative;
	}
	.prt-headerstyle-infostack .site-header .preyantechnosys-social-links-wrapper {
		position: absolute;
		right: 0;
		top: -70px;
	}
	.prt-headerstyle-infostack span.prt-sc-logo.prt-sc-logo-type-image {		
		margin-top: -32px;
	}
	.prt-headerstyle-infostack .prt-sboxtop-info-con1 .social-icons li > a {
		font-family:var(--special-element-fontfamily);
		font-size: 10px;
		line-height: normal;
		color: #fff;
		text-transform: uppercase;
		width: auto;
		margin-right: 24px;
		transition: all 0.3s ease 0s;
	}
	.prt-headerstyle-infostack .prt-sboxtop-info-con1 .social-icons li > a i {
		font-size: 0;
	}
	.prt-headerstyle-infostack .prt-sboxtop-info-con1 .social-icons li > a {
		border: 0;
	}
	.prt-headerstyle-infostack .prt-sboxtop-info-con span.prt-text {
		padding-right: 13px;
	}
	.prt-header-style-infostack .site-header-menu-middle {
		position: relative;
		box-shadow: 0 5px 35px rgb(0 0 0 / 10%);
		padding: 0px 40px;
		background-color: yellow;
		margin-top: -40px;
		border-radius: 10px;
	}
	.prt-header-style-infostack .prt-stickable-wrapper {
		height: auto !important;
	}
	.prt-header-style-infostack .top-contact a.prt-whitecolor {
		color: var(--prt-whitecolor);
	}
	.prt-headerstyle-infostack .prt-sboxtop-info-con a {
		color: inherit;
	}
	.prt-headerstyle-classic-overlay .prt-mmenu-active-color-skin .site-header.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a {
		color: #fff !important;
	}
	.prt-headerstyle-classic-overlay .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu {
		padding: 100px 20px;    
		position: absolute;
		top: 14px;
		left: -434px;
		z-index: -1;
		background-color: var(--prt-skincolor);
		border-radius: 10px;
		width: 380px;
	}
	.prt-headerstyle-classic-overlay span.righticon {
		display: none;
	}
	.prt-headerstyle-classic-overlay .site-title {    
		padding-right: 30px;
	}
	.prt-headerstyle-classic-overlay .prt-header-style-classic .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
		padding: 17px 26px;
		margin: 0 5px 0 5px;
		background-color: var(--prt-skincolor);
		display: inline;
		border-radius: 10px;
	}
	.prt-headerstyle-classic-overlay #mega-menu-wrap-preyantechnosys-main-menu #mega-menu-preyantechnosys-main-menu li.mega-menu-item-has-children > a.mega-menu-link > span.mega-indicator:after {
		content: unset;
	}
	.prt-headerstyle-classic-overlay .prt-header-style-classic .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover {
		background-color: var(--prt-secondarycolor);
	}
	.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item {
		padding: 0px 0 0 27px;		
	}
	.menu-toggle.burgermenu {
		display: block;
		height: auto;
		width: auto;
		text-align: center;
		font-size: 12px;
		text-transform: uppercase;
		transition: all 0.2s ease;
		padding: <?php echo esc_attr(ceil($header_height/2)-6); ?>px 0;
		background-color: transparent;
		position: relative;
	}
	.preyantechnosys-burgermenu-yes .prt-header-overlay #site-header-menu #site-navigation > .nav-menu {
		position: absolute;
		transition: opacity .35s linear;
		top: 15px;
		left: 10px;
		float: none;
		background-color: var(--prt-skincolor);
		z-index: 1;
		text-align: left;
		transform: translateY(3%);
		overflow: hidden;
		width: 0;
		border-radius: 10px;
		height: 0;
	}
	.prt-headerstyle-classic-overlay .prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a {
		color:  var(--prt-whitecolor) !important;
	}
	.toggled-on span.prt-burgermeu {
		background-color: var(--prt-secondarycolor);
	}
	span.prt-burgermeu {
		background-color: var(--prt-skincolor);
		padding: 10px 26px;
		border-radius: 10px;
		letter-spacing: 1px;
	}
	.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation.toggled-on > .nav-menu {
		transform: translateY(0);
		width: 380px;
		height: max-content;
		opacity: 1;
		filter: alpha(opacity=100);
		-webkit-transform: rotateX(0);
		transform: rotateX(0);
	}
	.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation > .nav-menu {
		position: relative;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		float: none;
		background: rgb(0 0 0 / 97%);
		z-index: 9;
		text-align: center;
		transform: translateY(100%);
		transition: all 0.5s ease;
		overflow: hidden;
		overflow-y: scroll;
	}
	.burgermenu.menu-toggle i.close-icon {
		z-index: 10;
		font-size: 12px;
		transform: scale(0);
		transition: all 0.5s ease;
		opacity: 0;
	}
	
	.toggled-on .burgermenu.menu-toggle i.close-icon {
		transform: scale(1);
	}
	.prt-headerstyle-classic-overlay #site-header-menu #site-navigation div.nav-menu > ul {    
		padding:65px 20px 20px 20px;
	}
	.prt-headerstyle-classic-overlay #site-header-menu #site-navigation div.nav-menu > ul > li {    
		display: block;    
	}
	.prt-headerstyle-classic-overlay .preyantechnosys-linkeffect-border #site-header-menu #site-navigation div.nav-menu > ul > li > ul.sub-menu li:hover > a:before {
		width: 0;
	}
	.prt-headerstyle-classic-overlay .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li> a,
	.prt-headerstyle-classic-overlay .prt-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a {
		background-color: transparent;
	}
	span.prt-link a {
		color: var(--prt-skincolor);
	}
	span.prt-link {
		font-size: 12px;
		font-family: var(--special-element-fontfamily);
		color: var(--prt-skincolor);
		border-bottom: 2px solid;
		margin-right: 17px;
	}
	.prt-headerstyle-classic-overlay .prt-header-overlay .social-icons li > a:hover {
		color: #fff;
	}
	.prt-headerstyle-classic-overlay .prt-header-overlay .social-icons li > a {
		width: 38px;
		height: 38px;
		line-height: 38px;    
		border-radius: 50%;
		border: 2px solid rgba(255, 255, 255 , 0.20);
		transition: all 0.3s ease 0s;
	}
	.prt-headerstyle-classic-overlay .prt-header-text-area .header-info-widget {
		color: rgba(255, 255, 255 , 0.80);
	}
	#masthead.not(.prt-header-overlay) .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li,
	#masthead.not(.prt-header-overlay) .is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a {
		line-height: 50px !important;
		height:50px;
	}
	.prt-headerstyle-classic-overlay #site-header-menu #site-navigation div.nav-menu > ul li:hover > ul {
		top: 100%;
		background-color: transparent;
		
		box-shadow: unset;
	}
	.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation div.nav-menu > ul ul {
		position: static;
		transform: unset;
		display: block;
		opacity: 1;
		visibility: hidden;
		background: transparent;
		text-align: center;
		padding-bottom: 0;
		margin: 0;
		width: auto;
		text-align: left;
		box-shadow: unset;
		border: none;
		padding: 0px;
	}
	
	#masthead.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul ul {
		opacity: 1;
		position: static;
	   visibility: visible;
		display: block;
		transform: unset;
	}
	.prt-header-style-classic2.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
	.prt-header-style-classic2.prt-header-overlay .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	.prt-header-style-classic.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a, 
	.prt-header-style-classic.prt-header-overlay .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
		margin: 8px 5px 8px 5px;
	}
	
	 #masthead.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li > a,
	.prt-mmmenu-override-yes #masthead.prt-header-overlay #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{   
		height:unset;
		line-height:unset !important;        
	}
	#masthead.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li,
	#masthead.prt-header-overlay .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
		height:unset;
		line-height:unset !important;
	} 
	.prt-header-style-classic2 .menu-toggle.burgermenu {
		margin: 0 auto;
		left: -30px;
		top: 5px;	
	}
	.preyantechnosys-burgermenu-yes.prt-headerstyle-classic-overlay2 .prt-header-overlay #site-header-menu #site-navigation > .nav-menu {
		right: 0;
		left: 0;
		margin: 0 auto;
	}
	.prt-headerstyle-classic-overlay2 #site-header-menu #site-navigation ul ul li {
		padding: 0 30px;
	}
	.prt-headerstyle-classic-overlay:not(.prt-headerstyle-classic-overlay2) .menu-toggle i{
	    display: none;	
	}
	.preyantechnosys-burgermenu-yes .prt-header-style-classic2.prt-header-overlay #site-header-menu #site-navigation > .nav-menu {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		float: none;
		background: rgb(0 0 0 / 97%);
		z-index: 9;
		text-align: center;
		transform: translateY(-100%);
		transition: all 0.5s ease;
		overflow: hidden;
		overflow-y: scroll;
	}
	.preyantechnosys-burgermenu-yes .prt-header-style-classic2.prt-header-overlay #site-header-menu #site-navigation.toggled-on > .nav-menu {
		transform: translateY(0);
		transition: all 0.5s ease;
	}
	.prt-header-style-classic2 .toggled-on i.flaticon-open,
	.prt-header-style-classic2 .burgermenu .flaticon-close,
	.prt-header-style-classic2 span.prt-burgermeu {
		display: none;
		transition: all 2s linear;
	}
	.prt-header-style-classic2 .toggled-on i.flaticon-close {
		display: block;
	 transition: opacity 200ms, display 200ms;
	}
	.preyantechnosys-burgermenu-yes .prt-header-style-classic2.prt-header-overlay #site-header-menu #site-navigation > .nav-menu{
		border-top: 1px solid rgba(255 255 255 / 0.2);
		padding-top:110px;
	}
	.prt-headerstyle-classic-overlay .prt-header-style-classic2 #site-header-menu #site-navigation div.nav-menu > ul {
		padding: 60px 0px 30px 0px;
	}
	.prt-header-style-classic2 .menu-toggle i {
		font-size: 34px;
	}
	.prt-headerstyle-classic-overlay2.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation > .nav-menu {
		width: 100%;
		height:100%;
	}
	.prt-header-style-classic2 .hitarea {
    cursor: pointer;
    float: right;
    height: 20px;
    position: absolute;
    right:-25px;
    top: 0;
    width: 20px;
    z-index: 7;
    text-align: center;
    padding: 0 1px;
    line-height: 20px;
    color: #ffffff;
}

.prt-headerstyle-classic-overlay.preyantechnosys-burgermenu-yes .prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li {
    display: block;
}
.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation div.nav-menu > ul > li, .preyantechnosys-burgermenu-yes.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item, .preyantechnosys-burgermenu-yes #site-header-menu #site-navigation div.nav-menu > ul > li > a, .preyantechnosys-burgermenu-yes.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a {
    height: auto;
    line-height: initial !important;
}
.prt-header-style-classic2 .preyantechnosys-burgermenu-yes #site-header-menu #site-navigation div.nav-menu > ul > li > a:before, .preyantechnosys-burgermenu-yes .prt-header-style-classic .prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:before {
    content: unset;
}
.prt-header-style-classic2 .prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a:before {
	background: var(--prt-skincolor);
}
.prt-header-style-classic2 .preyantechnosys-burgermenu-yes #site-header-menu #site-navigation div.nav-menu > ul ul {
    position: static;
    transform: unset;
    display: block;
    opacity: 1;
    visibility: visible;
    background: transparent;
    text-align: center;
    padding-bottom: 0;
    margin: 0;
    width: auto;
	text-align: left;
	box-shadow: unset;
}
.collapsable-hitarea:before {
    font-family: 'FontAwesome';
    content: "\f077";
    font-size: 16px;
}
.expandable-hitarea:before {
    content: "\f078";
    font-family: "FontAwesome";
    right: 0;
    font-size: 16px;
}
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > .hitarea, 
.prt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > .hitarea {
    color: var(--prt-skincolor);
    transition: all 0.5s ease;
}
.preyantechnosys-burgermenu-yes .prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul > li .hitarea {
    top: 11px;
}
.prt-headerstyle-classic-overlay2 #masthead.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul ul {
    padding: 15px 0 0 0;
   }
   .prt-headerstyle-classic-overlay2.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation div.nav-menu > ul > li, .prt-headerstyle-classic-overlay2.preyantechnosys-burgermenu-yes.prt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item {
		margin-bottom: 20px;
	}
	.prt-headerstyle-classic-overlay2 #site-header-menu #site-navigation ul ul li:last-child {
		padding-bottom: 0px;
	}
}


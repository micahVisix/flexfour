<?php 
global $objCustomer;
global $objCart;
?>
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package opsv3
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php

        $_REQUEST['url1'] = $wp_query->query_vars['url1'];
        $_REQUEST['url2'] = $wp_query->query_vars['url2'];
        $_REQUEST['url3'] = $wp_query->query_vars['url3'];
        $_REQUEST['url4'] = $wp_query->query_vars['url4'];
        $_REQUEST['url5'] = $wp_query->query_vars['url5'];

        if(SEOLINK_CAT == strtolower($wp_query->post->post_name)):

        include_once OPS_PATH."catalogue_meta.php";

        else:?>

        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

        <?php endif;?>
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="nav__blocker nav__hidden"></div>

        <!--<div class="mobileNav">
            <div class="mobileNav__close mobileNav__row">
                <span><i class="fas fa-times"></i> Close</span>
            </div>

            <a href="index.html" class="mobileNav__row">
                <span>Home</span>
            </a>


            <span class="mobileNav__row mobileNav__row--dropdownLabel">
                <span>Find your amazing</span>
                <i class="fas fa-chevron-down"></i>
                <div class="mobileNav__row--dropdown">
                    <a href="exhibiting.html">I'm Exhibiting</a>
                    <a href="printed.html">I need something Printed</a>
                    <a href="graphics.html">I need printed signs &amp; graphics</a>
                    <a href="event.html">I’m organising an event</a>
                    <a href="design-style.html">I need some branding or design</a>
                    <a href="vehicle.html">I need vehicle graphics</a>
                    <a href="after-a-website.html">I'm after a new website</a>
                    <a href="starting.html">I'm Starting up</a>
                </div>
            </span>

            <a href="about.html" class="mobileNav__row">
                <span>About</span>
            </a>

            <a href="case-studies.html" class="mobileNav__row">
                <span>Case Studies</span>
            </a>

            <a href="sectors.html" class="mobileNav__row">
                <span>Sectors</span>
            </a>

            <a href="latest.html" class="mobileNav__row">
                <span>Latests</span>
            </a>

            <a href="contact.html" class="mobileNav__row">
                <span>Contact</span>
            </a>

            <a href="#" class="mobileNav__row">
                <button type="button" class="c2--btn white-text green--btn">Visit Print Shop</button>
            </a>

        </div>-->

        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'opsv3' ); ?></a>

            <header id="masthead" class="site-header">
                <!-- MAIN HEADER -->
                <div class="w-row header-no-padding">

                    <?php
                    $StrTel = get_theme_mod('telephone_textbox');
                    $StrEmail = get_theme_mod('email_textbox');
                    ?>

                    <div class="row sub__header">
                        <div class="w-container">
                            <div class="w-col w-col-6 w-col-medium-12 w-col-small-12 w-col-tiny-12">
                                <ul class="sub__header__menu">
                                    <li>
                                        <?php if($StrTel):?>
                                        <div class="phone">
                                            <a title="Telephone, Give us a ring!" href="tel:<?php echo $StrTel;?>">
                                                <i class="fa fa-phone" aria-hidden="true"></i><span >&nbsp;&nbsp;<?php echo $StrTel ;?></span>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </li>
                                    <li>
                                        <?php if($StrEmail):?>
                                        <div class="email">
                                            <a title="Email Us" href="mailto:<?php echo $StrEmail;?>">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i><span >&nbsp;&nbsp;<?php echo $StrEmail ;?></span>
                                            </a>
                                        </div>
                                        <?php endif;?>
                                    </li>
                                </ul>
                            </div>

                            <div class="w-col w-col-6 w-col-medium-12 w-col-small-12 w-col-tiny-12">
                                <!-- ACCOUNT/CHECKOUT LINKS-->
                                <div class="account_links">
                                    <div class="account_login">
                                        <?php if ($objCustomer->CheckLogin()) { ?>
                                        <a class="account_link tool-tip" title="My Account" href="<?= site_url(); ?>/my-account/">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <a class="account_link tool-tip" href="<?= site_url() ?>/my-account/?logoff" title="Log Out">
                                            <i class="fa fa-sign-in"></i>
                                        </a>
                                        <?php } else { ?>
                                        <a class="account_link tool-tip" href="<?= site_url(); ?>/my-account/" title="Log In">
                                            <i class="fa fa-user"></i> <!-- Log In-->
                                        </a>
                                        <?php } ?>
                                    </div>
                                    <a class="account_link cart_link tool-tip" href="<?= site_url(); ?>/checkout/" title="View Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="value">
                                            <?= (isset($cartOptions['basket-text'])?$cartOptions['basket-text']:'&pound;');?>
                                            <span class="cart-total"><?php echo number_format($objCart->SubTotal, 2, '.', '');?></span>
                                        </span>
                                    </a>
                                    <div class="account_link search_link tool-tip" title="Search">
                                        <form action="<?= site_url() ?>" method="get" class="searchform" name="search-form">
                                            <input type="text"  name="s" id="desktopsearch"/>
                                            <input type="submit" id="headersearchbutton">
                                        </form>
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="sidebar--menu--container">
                    <div class="sidebar__wrapper">
                        <ul class="sidebar__menu">
                            <li>
                                <a href="<?php echo site_url()?>" title="Home">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </a>
                            </li>

                            <?php
                                    $options = array(
                                    'echo' => false,
                                    'container' => '',
                                    'menu' => 'Menu 1',
                                );
                                              $menu = wp_nav_menu($options);
                                              //Get rid of the UL wrapper
                                              echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
                            ?>

                        </ul>

                    </div>
                </div>

                <div class="row main__menu_row">
                    <div class="wrapper main__menu__wrapper">
                        <div class="sml-c9 med-c4 center white-text">
                            <div class="row two--menu--option">
                                <div class="sml-c3 only--mobile">
                                    <span id="show--mobile--menu">
                                        <i class="fas fa-bars white-text"></i>
                                    </span>
                                </div>
                                <div class="sml-c9 med-c12">
                                    <a class="white-text hide--mobile" id="amazing--menu">
                                        Find your products
                                       <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>

                                    <div id="amazing--menu--container" class="sub__menu hide--mobile products_menu_container">
                                        <div class="products_menu">
                                            <?php
                                            $navOptions['ul-class'] = 'products_menu_list';
                                            include OPS_PATH . "menus/menu-ul-basic-megamenu.php";
                                            ?>			                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sml-c3 med-c4 center logo__container">
                            <a href="<?php echo site_url() ?>" class="logo">
                            </a>
                        </div>
                        <div class="sml-c12 med-c4 hide--mobile">
                            <div class="row overflow--menu">
                                <div class="sml-c9">
                                    <a href="https://c2.group" target="_blank" class="c2--btn dark-red-text">Visit C2 Website</a>
                                </div>
                                <div id="sidebar--btn--wrapper" class="sml-c3 center">
                                    <a id="sidebar--btn">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

    

                <!-- MOBILE MENU BUTTON -->

                <div class="mobile_toggle">
                    <i class="mobile_button fa fa-bars"></i>
                </div>

            </header><!-- #masthead -->

            <!-- MOBILE MENU -->
            <nav id="mobile_nav" class="notvisible">
                <i class="mobile_button fa fa-close"></i>
                <div class="mobile_icons">
                    <div id="cart-head">
                        <!--This one for my account link. always show as will act as login--> 

                        <!--Mark, make the next one only show if customer is logged in-->
                        <a href="<?php echo site_url(); ?>/checkout/cart/">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <?php if ($objCustomer->CheckLogin()) { ?>
                        <a href="<?php echo site_url(); ?>/my-account/">
                            <i class="fa fa-cog"></i>
                        </a>
                        <a href="<?= site_url() ?>/my-account/?logoff">
                            <i class="fa fa-sign-in"></i>
                        </a>
                        <?php } else { ?>
                        <a href="<?= site_url(); ?>/my-account/">
                            <i class="fa sign-in"></i>
                        </a>
                        <?php } ?>

                        <div class="phone">
                            <a href="tel:<?php echo get_theme_mod('telephone_textbox');?>">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="email">
                            <a href="mailto:<?php echo get_theme_mod('email_textbox');?>">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <i class="fa fa-search searchicon" id="mobile_searchicon"></i>
                    </div>
                </div>
                <form action="/" method="get" class="search_form" id="search_form" name="search-form">
                    <input class="search_field" id="Search" name="s" placeholder="Find a product" value="<?php the_search_query(); ?>" required="required" type="text">
                    <input class="searchicon" type="submit" value="search">
                </form>
                <?php wp_nav_menu( array( 'menu' => 'Mobile Menu','container' => '', 'menu_id' => 'mobile_menu') ); ?>
            </nav>

            <!-- BEGIN CONTENT -->

            <div id="content" class="site-content">

var subMenuBtn = $('#amazing--menu'),
    subMenuContainer = $('.sub__menu'),
    navBlocker = $(".nav__blocker"),
    sideBarMenuContainer = $('#sidebar--menu--container'),
    sidebarMenuBtn = $('#sidebar--btn'),
    mobileNav = $('.mobileNav'),
    mobileOpen = false,
    navTopHeader = $('#header .sub__header'),
    nav = $('#header'),
    lastScrollDistance = 0,
    mainNavBar = $('.main__menu__wrapper'),
    menuOpenCount = 0;

$( document ).ready(function() {


    /*======================================================
  EQUAL HEIGHTS
  ========================================================*/
    $(window).load(function() {
        equalheight('.single_solution');
        equalheight('.listing-product-text');
        equalheight('.w-col .funnel');
        equalheight('.listing-category-text .listing-category-shortdesc');
    });


    $(window).resize(function(){
        equalheight('.single_solution');
        equalheight('.listing-product-text');
        equalheight('.w-col .funnel');
        equalheight('.listing-category-text .listing-category-shortdesc');
    });

    /*======================================================
 COOL HEADER CONTACT BUTTON
  ========================================================*/
    $('.phone').hover(function() {
        $(this).find('span').toggleClass('show');
    });

    $('.email').hover(function() {
        $(this).find('span').toggleClass('show');
    });

    navBlocker.on('click', function(){
        toggleSubMenu(false);
        toggleSidebar(false);
        toggleNavBlocker(false);
    });

    subMenuBtn.on('click', function(){
        toggleSubMenu();
        toggleSidebar(false);
        toggleNavBlocker();
    });

    sidebarMenuBtn.on('click', function(){
        toggleSidebar();
        toggleSubMenu(false);
        toggleNavBlocker();
    });




    /* END OF FILE*/
});

function toggleSubMenu(toggle) {
    subMenuContainer.toggleClass('sub__menu__open', toggle);
    subMenuBtn.toggleClass('sub__menu__showing', toggle);
}

function toggleSidebar(toggle) {
    sideBarMenuContainer.toggleClass('sidebar--menu--active', toggle);
    sidebarMenuBtn.toggleClass('sidebar--active', toggle);
}

function toggleNavBlocker(toggle) {

    // if currently blocked
    if (!navBlocker.hasClass('nav__hidden')) {

        // don't close if one of the menus is open
        if (subMenuContainer.hasClass('sub__menu__open') || sideBarMenuContainer.hasClass('sidebar--menu--active')) {
            toggle = false;
        } else {
            toggle = true;
        }
    }

    navBlocker.toggleClass('nav__hidden', toggle);
}

function toggleMobileMenu(toggle) {
    if (typeof toggle === 'undefined') {
        toggle = !mobileOpen;
    }

    if (toggle) {
        mobileNav.addClass('mobileNav--active');
        $('body').addClass('no-scroll');
    } else {
        mobileNav.removeClass('mobileNav--active');
        $('body').removeClass('no-scroll');
    }

    mobileOpen = toggle;
}

$(document).on('mobileMenuToggle', function(e) {
    toggleMobileMenu(e.toggle);
});

$('#show--mobile--menu').click(function(e) {
    $.event.trigger({
        type: 'mobileMenuToggle',
        toggle: true
    });
});

mobileNav.find('> .mobileNav__row:not(.mobileNav__row--dropdownLabel)').click(function(e) {
    var navRow = $(this);

    $.event.trigger({
        type: 'mobileMenuToggle',
        toggle: false
    });
});

// Handle mobile nav dropdowns
mobileNav.find('.mobileNav__row--dropdownLabel').click(function() {
    var currentDropdownLabel = $(this)
    var currentDropdown = currentDropdownLabel.find('.mobileNav__row--dropdown')

    mobileNav.find('.mobileNav__row--dropdown').each(function() {
        var dropdown = $(this)
        var dropdownLabel = dropdown.parent('.mobileNav__row--dropdownLabel')

        if (dropdown.is(currentDropdown)) {
            currentDropdown.slideToggle(200, function() {})
            currentDropdownLabel.toggleClass('mobileNav__row--dropdownLabel--active')
        } else if(dropdownLabel.hasClass('mobileNav__row--dropdownLabel--active')) {
            dropdown.slideToggle(200, function() {})
            dropdownLabel.toggleClass('mobileNav__row--dropdownLabel--active')
        }
    });
});

function calculateNavHide() {
    var scroll = $(window).scrollTop(),
        mainMenuRow = $('.main__menu_row');

    if($(window).width() > 767) {

        if (scroll > lastScrollDistance && $(window).scrollTop() > 500){
            navTopHeader.toggleClass('top__header__toggle', true);
            mainMenuRow.toggleClass('move__up__main__menu', true);
            sideBarMenuContainer.toggleClass('sidebar--move--up', true);
        } else {
            navTopHeader.toggleClass('top__header__toggle', false);
            mainMenuRow.toggleClass('move__up__main__menu', false);
            sideBarMenuContainer.toggleClass('sidebar--move--up', false);
        }

    }

    lastScrollDistance = scroll;

}
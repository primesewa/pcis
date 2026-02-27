/**
 * Premium Navigation & Header Interactions
 * 
 * Handles mobile navigation, search functionality, scroll effects,
 * and premium UI interactions for the header.
 */

(function () {
    'use strict';

    // ========================================================================
    // SCROLL EFFECTS - Sticky Shrink Behavior
    // ========================================================================
    const siteHeader = document.getElementById('siteHeader');
    
    if (siteHeader) {
        let lastScrollY = window.scrollY;
        
        const handleScroll = () => {
            const scrollY = window.scrollY;
            
            // Add 'scrolled' class when scrolled down > 100px
            if (scrollY > 100) {
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.classList.remove('scrolled');
            }
            lastScrollY = scrollY;
        };

        window.addEventListener('scroll', () => {
            window.requestAnimationFrame(handleScroll);
        }, { passive: true });
    }

    // ========================================================================
    // MOBILE NAVIGATION TOGGLE
    // ========================================================================
    const siteNavigation = document.getElementById('site-navigation');
    const menuToggle = document.querySelector('.menu-toggle'); // Button is now in logo-band

    if (!siteNavigation || !menuToggle) {
        return;
    }

    // Toggle mobile menu
    menuToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        
        const isExpanded = siteNavigation.classList.contains('toggled');
        
        siteNavigation.classList.toggle('toggled');
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        
        // Toggle hamburger state
        if (!isExpanded) {
            menuToggle.classList.add('toggled');
        } else {
            menuToggle.classList.remove('toggled');
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (event) {
        const isClickInsideNav = siteNavigation.contains(event.target);
        const isClickOnButton = menuToggle.contains(event.target);
        
        if (!isClickInsideNav && !isClickOnButton && siteNavigation.classList.contains('toggled')) {
            siteNavigation.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // Close menu on ESC key
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && siteNavigation.classList.contains('toggled')) {
            siteNavigation.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // ========================================================================
    // SUBMENU TOGGLE FOR MOBILE
    // ========================================================================
    // Note: WP standard class is .menu-item-has-children
    const menuItemsWithChildren = siteNavigation.querySelectorAll('.menu-item-has-children');

    menuItemsWithChildren.forEach(function (menuItem) {
        const link = menuItem.querySelector('a');
        if (!link) {
            return;
        }

        // Add click handler for mobile submenu toggle
        link.addEventListener('click', function (e) {
            // Only toggle on mobile (check width match CSS breakpoint)
            if (window.innerWidth <= 991) {
                const submenu = menuItem.querySelector('.sub-menu');
                
                if (submenu) {
                    e.preventDefault();
                    e.stopPropagation(); // Prevent closing the menu
                    
                    const isCurrentlyOpen = menuItem.classList.contains('toggled-on');

                    // Close any other open submenus at the same level
                    menuItemsWithChildren.forEach(function (item) {
                        if (item !== menuItem) {
                            item.classList.remove('toggled-on');
                            const itemLink = item.querySelector('a');
                            if (itemLink) {
                                itemLink.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });

                    // Toggle the clicked submenu
                    if (isCurrentlyOpen) {
                        menuItem.classList.remove('toggled-on');
                        link.setAttribute('aria-expanded', 'false');
                    } else {
                        menuItem.classList.add('toggled-on');
                        link.setAttribute('aria-expanded', 'true');
                    }
                }
            }
        });
    });

    // ========================================================================
    // SEARCH TOGGLE (Inline Search doesn't utilize toggle currently, 
    // but if we add mobile search expander later, we can place it here)
    // ========================================================================

})();

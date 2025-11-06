/**
 * Navigation scripts
 * Handles mobile menu toggle and keyboard navigation
 */

(function() {
    'use strict';

    // Mobile menu toggle
    var menuToggle = document.querySelector('.menu-toggle');
    var navigation = document.querySelector('.main-navigation');

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            var expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
            menuToggle.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('toggled');
        });
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!navigation || !menuToggle) {
            return;
        }

        var isClickInsideMenu = navigation.contains(event.target);
        var isClickOnToggle = menuToggle.contains(event.target);

        if (!isClickInsideMenu && !isClickOnToggle && navigation.classList.contains('toggled')) {
            navigation.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(event) {
        if (!navigation || !menuToggle) {
            return;
        }

        if (event.key === 'Escape' && navigation.classList.contains('toggled')) {
            navigation.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.focus();
        }
    });

    // Handle keyboard navigation for menu items
    var menuItems = document.querySelectorAll('.main-navigation a');
    var menuItemsArray = Array.prototype.slice.call(menuItems);

    menuItemsArray.forEach(function(item, index) {
        item.addEventListener('keydown', function(event) {
            var currentItem = menuItemsArray[index];
            var previousItem = menuItemsArray[index - 1];
            var nextItem = menuItemsArray[index + 1];

            // Arrow down - focus next item
            if (event.key === 'ArrowDown' && nextItem) {
                event.preventDefault();
                nextItem.focus();
            }

            // Arrow up - focus previous item
            if (event.key === 'ArrowUp' && previousItem) {
                event.preventDefault();
                previousItem.focus();
            }

            // Home - focus first item
            if (event.key === 'Home') {
                event.preventDefault();
                menuItemsArray[0].focus();
            }

            // End - focus last item
            if (event.key === 'End') {
                event.preventDefault();
                menuItemsArray[menuItemsArray.length - 1].focus();
            }
        });
    });

    // Smooth scroll for anchor links
    var anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            var href = this.getAttribute('href');

            // Skip if it's just '#'
            if (href === '#') {
                return;
            }

            var target = document.querySelector(href);

            if (target) {
                event.preventDefault();

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Update focus for accessibility
                target.focus();

                // Update URL without jumping
                if (history.pushState) {
                    history.pushState(null, null, href);
                }
            }
        });
    });

})();

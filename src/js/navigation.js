const topNavigation = document.getElementById('site-navigation-top');
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

/**
 * -------------------------------------------------------------------------------------------------------
 * PRIMARY Navigation
 * -------------------------------------------------------------------------------------------------------
 */
(function(topNavigation) {

	// Return early if the navigation don't exist.
	if (!topNavigation) {
		return;
	}

	const mobileMenuButton = topNavigation.getElementsByClassName('menu-toggle')[0];

	// Return early if the button don't exist.
	if ('undefined' === typeof mobileMenuButton) {
		return;
	}

	const menu = topNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		mobileMenuButton.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	mobileMenuButton.addEventListener('click', function() {
		topNavigation.classList.toggle('toggled');

		if (mobileMenuButton.getAttribute('aria-expanded') === 'true') {
			mobileMenuButton.setAttribute('aria-expanded', 'false');
		} else {
			mobileMenuButton.setAttribute('aria-expanded', 'true');
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function(event) {
		const isClickInside = topNavigation.contains(event.target);

		if (!isClickInside) {
			topNavigation.classList.remove('toggled');
			mobileMenuButton.setAttribute('aria-expanded', 'false');
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName('a');

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for (const link of linksWithChildren) {
		link.addEventListener('touchstart', toggleFocus, false);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus(event) {
		if (event.type === 'focus' || event.type === 'blur') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}
				self = self.parentNode;
			}
		}

		if (event.type === 'touchstart') {
			const menuItem = this.parentNode;
			event.preventDefault(event);
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}
}(topNavigation));

/**
 * -------------------------------------------------------------------------------------------------------
 * SECONDARY Slide Out Menu Navigation
 * -------------------------------------------------------------------------------------------------------
 */
(function(topNavigation) {

	// Return early if the navigation don't exist.
	if (!topNavigation) {
		return;
	}

	const secondaryButton = topNavigation.getElementsByClassName('secondary-menu-toggle')[0];

	// Return early if the button don't exist.
	if ('undefined' === typeof secondaryButton) {
		return;
	}

	const secondaryMenu = topNavigation.getElementsByTagName('ul')[1];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof secondaryMenu) {
		secondaryButton.style.display = 'none';
		return;
	}

	if (!secondaryMenu.classList.contains('nav-menu')) {
		secondaryMenu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	secondaryButton.addEventListener('click', function() {
		topNavigation.classList.toggle('toggled');

		if (secondaryButton.getAttribute('aria-expanded') === 'true') {
			secondaryButton.setAttribute('aria-expanded', 'false');
		} else {
			secondaryButton.setAttribute('aria-expanded', 'true');
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function(event) {
		const isClickInside = topNavigation.contains(event.target);

		if (!isClickInside) {
			topNavigation.classList.remove('toggled');
			secondaryButton.setAttribute('aria-expanded', 'false');
		}
	});

	// Get all the link elements within the menu.
	const secondaryLinks = secondaryMenu.getElementsByTagName('a');

	// Get all the link elements with children within the menu.
	const secondaryLinksWithChildren = secondaryMenu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of secondaryLinks) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for (const link of secondaryLinksWithChildren) {
		link.addEventListener('touchstart', toggleFocus, false);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus(event) {
		if (event.type === 'focus' || event.type === 'blur') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}
				self = self.parentNode;
			}
		}

		if (event.type === 'touchstart') {
			const menuItem = this.parentNode;
			event.preventDefault();
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}
}(topNavigation));

/*--- Custom Nav JS ----*/
(function($) {

	const $topNav = $('#site-navigation-top');

	$('#primary-nav-toggle').on('click', function(e) {
		let $button = $(this);
		$('body').toggleClass('menu-open')
		let expanded = $button.attr('aria-expanded') == "true";
		$button.next('.menu-main-menu-container').prop('hidden', !expanded);
	});

	// $('.submenu-toggle').on('click', function(e) {
	$('.submenu-dropdown-button').on('click', function(e) {
		let $button = $(this);
		// $('body').toggleClass('menu-open')
		let expanded = $button.attr('aria-expanded') == "true";
		$button.attr('aria-expanded', !expanded);
		// $button.next('.menu-main-menu-container').prop('hidden', !expanded);
		$button.parent('.menu-item').siblings().find('button').attr('aria-expanded', 'false');
	});
	
	let $mainNavTopParentItems = $("#primary-menu > .menu-item-has-children");

	// Hovering top level parent links and buttons
	// don't need to worry about aria-expanded, this is only for mouse users
	$mainNavTopParentItems.on("focusout", function hideSubMenu(e) {
		if (window.matchMedia("(min-width: 981px)").matches) {
			let thisButton = $(this).children(".submenu-dropdown-button")[0];
			if (e.currentTarget.contains(e.relatedTarget) == false && e.relatedTarget != thisButton && $(thisButton).attr("aria-expanded") == "true") {
				// let $subMenu = $(this).children(".sub-menu");
				$(thisButton).attr("aria-expanded", "false");
				// $subMenu.stop(true, true).slideToggle(300);
			}
		}
	});

	let closeMenu = function($toggleButton, focusButton = false) {
		$toggleButton.attr('aria-expanded', false);
		$toggleButton.next('.menu-main-menu-container').prop('hidden', true);
		$('body').removeClass('menu-open');
		if (focusButton) {
			$toggleButton.focus();
		}
		return this;
	}

	$topNav.on('keyup', function(e) {
		const ESC = 27;
		let $toggleButton = $(this).find('#primary-nav-toggle');
		let expanded = $toggleButton.attr('aria-expanded') == 'true';
		if (!expanded) {
			return;
		}
		if (e.keyCode == ESC) {
			closeMenu($toggleButton, true);
		}
	});

	$topNav.find('#primary-menu').on('focusout', function(e) {
		let $navButton = $topNav.find('#primary-nav-toggle');
		if ($navButton.attr('aria-expanded') == "false") {
			return;
		}
		if ($(e.relatedTarget).parent().hasClass('menu-item') == false) {
			closeMenu($navButton, false);
		}
	});
})(jQuery);
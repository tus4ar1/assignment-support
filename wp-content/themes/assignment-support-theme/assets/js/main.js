( function () {
	'use strict';

	const toggle = document.querySelector( '.menu-toggle' );
	const navigation = document.querySelector( '.primary-navigation' );

	if ( ! toggle || ! navigation ) {
		return;
	}

	const closeMenu = function () {
		toggle.setAttribute( 'aria-expanded', 'false' );
		navigation.classList.remove( 'is-open' );
		document.body.classList.remove( 'nav-open' );
	};

	toggle.addEventListener( 'click', function () {
		const isOpen = toggle.getAttribute( 'aria-expanded' ) === 'true';
		toggle.setAttribute( 'aria-expanded', String( ! isOpen ) );
		navigation.classList.toggle( 'is-open', ! isOpen );
		document.body.classList.toggle( 'nav-open', ! isOpen );
	} );

	navigation.addEventListener( 'click', function ( event ) {
		if ( event.target.closest( 'a' ) ) {
			closeMenu();
		}
	} );

	document.addEventListener( 'keydown', function ( event ) {
		if ( event.key === 'Escape' ) {
			closeMenu();
			toggle.focus();
		}
	} );
}() );

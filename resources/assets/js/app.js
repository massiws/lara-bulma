
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


document.addEventListener('DOMContentLoaded', function () {
    /*
     * Show Navbar on ham-click (on mobile)
     */
    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                // Get the target from the "data-target" attribute
                var target = $el.dataset.target;
                var $target = document.getElementById(target);
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }

    /*
     * Sidebar menu: show/hide menu names on sidebar hover.
     */
    var $sidebarMenu = document.getElementById('sidebar-menu');
    if ($sidebarMenu !== null) {
        // Expand sidebar on mouse enter.
        $sidebarMenu.addEventListener('mouseenter', function(event) {
            $sidebarMenu.querySelectorAll('.text-label').forEach(function(el){
                el.classList.remove('is-hidden');
            });
        });
        // Collapse sidebar on mouse leave.
        $sidebarMenu.addEventListener('mouseleave', function(event) {
            $sidebarMenu.querySelectorAll('.text-label').forEach(function(el){
                el.classList.add('is-hidden');
            });
        });
    }

    /**
     * File Input button.
     *
     * Original idea: "Styling & Customizing File Inputs the Smart Way",
     * by Osvaldas Valutis, www.osvaldas.info
     * Available for use under the MIT License
     *
     * @see https://tympanus.net/codrops/2015/09/15/styling-customizing-file-inputs-smart-way/
     */
    var $inputs = document.querySelectorAll( '.file-input' );
    Array.prototype.forEach.call( $inputs, function( input ) {
        var label    = input.nextElementSibling.querySelector( '.file-label' );
        var labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e ) {
            var fileName = e.target.value.split( '\\' ).pop();
            label.innerHTML = (fileName) ? fileName : labelVal;
            let img = this.parentElement.parentElement.previousElementSibling.querySelector('.image img');
            img.src = '';
            img.alt = 'Save, please!';
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function() { input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function() { input.classList.remove( 'has-focus' ); });
    });

});

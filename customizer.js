( function( $ ) {

    wp.customize( 'nav_color', function( value ) {
        value.bind( function( newval ) {
            function is_bright() {
                let threshold = 130;

                let bigint = parseInt(newval.replace("#",''), 16);
                let r = (bigint >> 16) & 255;
                let g = (bigint >> 8) & 255;
                let b = bigint & 255;
                
                let brightness = Math.sqrt(
                    Math.pow(r,2)*0.241
                    + Math.pow(g,2)*0.691
                    + Math.pow(b,2)*0.068
                );

                return brightness > threshold;
            }
            $( 'nav.navbar' )
                .css( 'background-color', newval )
                .removeClass( 'navbar-dark navbar-light' )
                .addClass( is_bright() ? 'navbar-light' : 'navbar-dark' );
        } );
    } );

} )( jQuery );
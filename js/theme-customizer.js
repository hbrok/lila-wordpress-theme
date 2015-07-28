( function( $ ) {

    // Front page round icon.
    wp.customize( 'lila_front_page_image', function( value ) {
        value.bind( function( to ) {
            $( '.front-page-avatar' ).css( 'background-image', 'url(' + to + ')' );
        } );
    } );

    // Front page speech bubble.
    wp.customize( 'lila_front_page_speech_bubble', function( value ) {
        value.bind( function( to ) {
            $( '.front-page-speech-bubble' ).html( to );
        } );
    } );

    // Front page text under speech bubble.
    wp.customize( 'lila_front_page_blurb', function( value ) {
        value.bind( function( to ) {
            $( '.front-page-blurb' ).html( to );
        } );
    } );

    // Footer colophon.
    wp.customize( 'lila_colophon', function( value ) {
        value.bind( function( to ) {
            $( 'footer .colophon' ).html( to );
        } );
    } );

} )( jQuery );
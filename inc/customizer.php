<?php
function lila_customize_register( $wp_customize ) {
   // Add Front Page Header section to customizer.
    $wp_customize->add_section( 'lila_front_page', array(
            'title' => 'Front Page Header',
            'description' => 'Options for the front page.',
            'priority' => 35,
        )
    );

    // Add round icon scheme setting and control.
    $wp_customize->add_setting( 'lila_front_page_image', array(
        'type' => 'theme_mod',
        'default' => get_template_directory_uri() . '/images/icon.jpg',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,
        'lila_front_page_image', array(
            'label'    => 'Round Icon Image',
            'description' => 'Square image will look best.',
            'settings' => 'lila_front_page_image',
            'section'  => 'lila_front_page',
    ) ) );

    // Add speech bubble text setting and control.
    $wp_customize->add_setting( 'lila_front_page_speech_bubble', array(
        'type' => 'theme_mod', // default value
        'default' => 'Hello!',
        'transport' => 'postMessage',
        'sanitize_callback' => 'lila_sanitize_text',
    ) );

    $wp_customize->add_control( 'lila_front_page_speech_bubble', array(
        'type' => 'text',
        'default' => 'Speech!',
        'priority' => 10,
        'section' => 'lila_front_page',
        'label' => __( 'Speech Bubble', 'lila' ),
        'active_callback' => 'is_front_page',
        'settings' => 'lila_front_page_speech_bubble',
    ) );

    // Add text blurb setting and control.
    $wp_customize->add_setting( 'lila_front_page_blurb', array(
        'type' => 'theme_mod', // default value
        'default' => 'I\'m sure you have interesting stuff to say. You should probably put that stuff here.',
        'transport' => 'postMessage',
        'sanitize_callback' => 'lila_sanitize_text',
    ) );

    $wp_customize->add_control( 'lila_front_page_blurb', array(
        'type' => 'textarea',
        'priority' => 15,
        'section' => 'lila_front_page',
        'label' => __( 'Blurb', 'lila'  ),
        'description' => __( 'Text under the speech bubble.', 'lila'  ),
        'active_callback' => 'is_front_page',
        'settings' => 'lila_front_page_blurb',
    ) );

    // Add footer section to customizer.
    $wp_customize->add_section( 'lila_footer', array(
            'title' => 'Footer',
            'description' => 'Options for the footer.',
            'priority' => 45,
        )
    );

    // Add colophon setting and control.
    $wp_customize->add_setting( 'lila_colophon', array(
        'type' => 'theme_mod', // default value
        'default' => '&copy; Your Stuff Here',
        'transport' => 'postMessage',
        'sanitize_callback' => 'lila_sanitize_text',
    ) );

    $wp_customize->add_control( 'lila_colophon', array(
        'priority' => 5,
        'section' => 'lila_footer',
        'label' => __( 'Colophon', 'lila'  ),
        'settings' => 'lila_colophon',
    ) );
}
add_action( 'customize_register', 'lila_customize_register' );


function lila_customizer_css() {
    ?>
    <style type="text/css">
        .front-page-avatar {
            background-image: url( <?php echo get_theme_mod( 'lila_front_page_image', '' ); ?> );
        }
    </style>
    <?php
}
add_action( 'wp_head', 'lila_customizer_css' );

/**
 * JS handlers to make the Customizer preview reload changes asynchronously.
 */
function lila_customizer_live_preview()
{
    wp_enqueue_script( 'lila-themecustomizer', get_template_directory_uri() .'/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'lila_customizer_live_preview' );

function lila_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
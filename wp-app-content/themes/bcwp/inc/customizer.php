<?php
/**
 * bcwp Theme Customizer
 *
 * @package bcwp
 */


function bcwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel         = 'bcwp_header_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '9';
    $wp_customize->get_section( 'title_tagline' )->title        = __('Site branding', 'bcwp');
    $wp_customize->get_section( 'title_tagline' )->panel        = 'bcwp_header_panel';
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );

    class bcwp_Theme_Info extends WP_Customize_Control {
        public $type = 'info';
        public function render_content() {
        }
    }

    //___General___//
    $wp_customize->add_section(
        'bcwp_general',
        array(
            'title' => __('General', 'bcwp'),
            'priority' => 9,
        )
    );
    //Favicon Upload
    $wp_customize->add_setting(
        'site_favicon',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'bcwp' ),
               'type'           => 'image',
               'section'        => 'bcwp_general',
               'settings'       => 'site_favicon',
               'priority' => 10,
            )
        )
    );
    //___Header area___//
    $wp_customize->add_panel( 'bcwp_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'bcwp'),
    ) );
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',

        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'bcwp' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'settings'       => 'site_logo',
               'priority'       => 11,
            )
        )
    );
    //Logo size
    $wp_customize->add_setting(
        'logo_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '200',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'logo_size', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'title_tagline',
        'label'       => __('Logo size', 'bcwp'),
        'description' => __('Max-width for the logo. Default 200px', 'bcwp'),
        'input_attrs' => array(
            'min'   => 50,
            'max'   => 600,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //Logo style
    $wp_customize->add_setting(
        'logo_style',
        array(
            'default'           => 'hide-title',
            'sanitize_callback' => 'bcwp_sanitize_logo_style',
        )
    );
    $wp_customize->add_control(
        'logo_style',
        array(
            'type'          => 'radio',
            'label'         => __('Logo style', 'bcwp'),
            'description'   => __('This option applies only if you are using a logo', 'bcwp'),
            'section'       => 'title_tagline',
            'priority'      => 13,
            'choices'       => array(
                'hide-title'  => __( 'Only logo', 'bcwp' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'bcwp' ),
            ),
        )
    );
    //Padding
    $wp_customize->add_setting(
        'branding_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '75',
        )       
    );
    $wp_customize->add_control( 'branding_padding', array(
        'type'        => 'number',
        'priority'    => 14,
        'section'     => 'title_tagline',
        'label'       => __('Site branding padding', 'bcwp'),
        'description' => __('Top&amp;bottom padding for the branding (logo, site title, description). Default: 75px', 'bcwp'),
        'input_attrs' => array(
            'min'   => 20,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );

    //___Menu___//
    $wp_customize->add_section(
        'bcwp_menu',
        array(
            'title'    => __('Menu position', 'bcwp'),
            'priority' => 13,
            'panel'    => 'bcwp_header_panel', 
        )
    );
    //Menu position
    $wp_customize->add_setting(
        'menu_position',
        array(
            'default'           => 'below',
            'sanitize_callback' => 'bcwp_sanitize_menu_position',
        )
    );
    $wp_customize->add_control(
        'menu_position',
        array(
            'type'          => 'radio',
            'label'         => __('Menu position', 'bcwp'),
            'section'       => 'bcwp_menu',
            'priority'      => 15,
            'choices'       => array(
                'above'  => __( 'Above site title/description', 'bcwp' ),
                'below'  => __( 'Below site title/description', 'bcwp' ),
            ),
        )
    );



    //___Banner type___//
    $wp_customize->add_section(
        'bcwp_banner',
        array(
            'title'    => __('Banner type', 'bcwp'),
            'priority' => 11,
            'panel'    => 'bcwp_header_panel', 
        )
    );
    //Banner type
    $wp_customize->add_setting(
        'banner_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'bcwp_sanitize_banner',
        )
    );
    $wp_customize->add_control(
        'banner_type',
        array(
            'type'          => 'radio',
            'label'         => __('Banner type', 'bcwp'),
            'section'       => 'bcwp_banner',
            'priority'      => 16,
            'choices'       => array(
                'image'    => __( 'Header image', 'bcwp' ),
                'slider'   => __( 'MetaSlider (requires the MetaSlider plugin)', 'bcwp' ),
                'nothing'  => __( 'Nothing', 'bcwp' ),
            ),
        )
    );
    //Hide banner
    $wp_customize->add_setting(
        'hide_banner',
        array(
            'sanitize_callback' => 'bcwp_sanitize_checkbox',
            'default' => 0,     
        )   
    );
    $wp_customize->add_control(
        'hide_banner',
        array(
            'type' => 'checkbox',
            'label' => __('Show the banner only on the homepage?', 'bcwp'),
            'section' => 'bcwp_banner',
            'priority' => 17,
        )
    );     
    //Meta shortcode
    $wp_customize->add_setting(
        'metaslider_shortcode',
        array(
            'default' => '',
            'sanitize_callback' => 'bcwp_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'metaslider_shortcode',
        array(
            'label' => __( 'MetaSlider shortcode', 'bcwp' ),
            'description'       => __( 'Add the shortcode for the MetaSlider plugin here', 'bcwp' ),
            'section' => 'bcwp_banner',
            'type' => 'text',
            'priority' => 18
        )
    );


    //Header image
    $wp_customize->add_setting(
        'header_img_height',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '300',
        )       
    );
    $wp_customize->add_control( 'header_img_height', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'header_image',
        'label'       => __('Header image height', 'bcwp'),
        'input_attrs' => array(
            'min'   => 50,
            'max'   => 650,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Header image <1024
    $wp_customize->add_setting(
        'header_img_height_1024',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '300',
        )       
    );
    $wp_customize->add_control( 'header_img_height_1024', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'header_image',
        'label'       => __('Header image height < 1024px', 'bcwp'),
        'description' => __('Set your header image height for screen widths smaller than 1024px', 'bcwp'),        
        'input_attrs' => array(
            'min'   => 50,
            'max'   => 650,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Hide scroll arrow
    $wp_customize->add_setting(
		'hide_scroll',
		array(
			'sanitize_callback' => 'bcwp_sanitize_checkbox',
			'default' => 0,     
		)   
    );
    $wp_customize->add_control(
		'hide_scroll',
		array(
			'type' => 'checkbox',
			'label' => __('Hide the animated scroll arrow from the header image?', 'bcwp'),
			'section' => 'header_image',
			'priority' => 21,
		)
    );    

    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'bcwp'),
            'priority' => 13,
        )
    );
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 10,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'bcwp'),
        'description' => __('Choose your excerpt length. Default: 55 words', 'bcwp'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );   
    //Hide meta
    $wp_customize->add_setting(
      'meta_index',
      array(
        'sanitize_callback' => 'bcwp_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'meta_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide date/author/archives on index?', 'bcwp'),
        'section' => 'blog_options',
        'priority' => 11,
      )
    );
    $wp_customize->add_setting(
      'meta_singles',
      array(
        'sanitize_callback' => 'bcwp_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'meta_singles',
      array(
        'type' => 'checkbox',
        'label' => __('Hide date/author/archives on single posts?', 'bcwp'),
        'section' => 'blog_options',
        'priority' => 12,
      )
    );
    $wp_customize->add_setting(
      'hide_sidebar_index',
      array(
        'sanitize_callback' => 'bcwp_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_sidebar_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide the sidebar on index?', 'bcwp'),
        'section' => 'blog_options',
        'priority' => 13,
      )
    );
    $wp_customize->add_setting(
      'hide_sidebar_single',
      array(
        'sanitize_callback' => 'bcwp_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_sidebar_single',
      array(
        'type' => 'checkbox',
        'label' => __('Hide the sidebar on single posts and pages?', 'bcwp'),
        'section' => 'blog_options',
        'priority' => 13,
      )
    );
    //Full content posts
    $wp_customize->add_setting(
      'full_content',
      array(
        'sanitize_callback' => 'bcwp_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content',
        array(
            'type' => 'checkbox',
            'label' => __('Display the full content of your posts on index?', 'bcwp'),
            'section' => 'blog_options',
            'priority' => 14,
        )
    ); 
    //Index images
    $wp_customize->add_setting(
        'index_feat_image',
        array(
            'sanitize_callback' => 'bcwp_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'index_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Hide featured images on index, archives?', 'bcwp'),
            'section' => 'blog_options',
            'priority' => 15,
        )
    );
    //Post images
    $wp_customize->add_setting(
        'post_feat_image',
        array(
            'sanitize_callback' => 'bcwp_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'post_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Hide featured images on single posts?', 'bcwp'),
            'section' => 'blog_options',
            'priority' => 16,
        )
    );

    //___Colors___//
    //Primary color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#618EBA',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'bcwp'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 12
            )
        )
    );
    //Social background
    $wp_customize->add_setting(
        'social_bg',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'social_bg',
            array(
                'label'         => __('Social area background', 'bcwp'),
                'section'       => 'colors',
                'settings'      => 'social_bg',
                'priority'      => 13
            )
        )
    );
    //Social color
    $wp_customize->add_setting(
        'social_color',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'social_color',
            array(
                'label'         => __('Social icons', 'bcwp'),
                'section'       => 'colors',
                'settings'      => 'social_color',
                'priority'      => 14
            )
        )
    );
    //Branding wrapper
    $wp_customize->add_setting(
        'branding_bg',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'branding_bg',
            array(
                'label'         => __('Branding background', 'bcwp'),
                'section'       => 'colors',
                'settings'      => 'branding_bg',
                'priority'      => 15
            )
        )
    );
    //Menu
    $wp_customize->add_setting(
        'menu_bg',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg',
            array(
                'label'         => __('Menu background', 'bcwp'),
                'section'       => 'colors',
                'settings'      => 'menu_bg',
                'priority'      => 16
            )
        )
    );
    //Menu items
    $wp_customize->add_setting(
        'menu_color',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color',
            array(
                'label'         => __('Menu items', 'bcwp'),
                'section'       => 'colors',
                'settings'      => 'menu_color',
                'priority'      => 17
            )
        )
    );
    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'bcwp'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 18
            )
        )
    );
    //Site desc
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'bcwp'),
                'section' => 'colors',
                'priority' => 19
            )
        )
    );
    //Entry titles
    $wp_customize->add_setting(
        'entry_titles',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'entry_titles',
            array(
                'label' => __('Entry titles', 'bcwp'),
                'section' => 'colors',
                'priority' => 20
            )
        )
    );  
    //Entry meta
    $wp_customize->add_setting(
        'entry_meta',
        array(
            'default'           => '#9d9d9d',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'entry_meta',
            array(
                'label' => __('Entry meta', 'bcwp'),
                'section' => 'colors',
                'priority' => 21
            )
        )
    );    
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#4c4c4c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'bcwp'),
                'section' => 'colors',
                'settings' => 'body_text_color',
                'priority' => 22
            )
        )
    ); 
    //Footer
    $wp_customize->add_setting(
        'footer_bg',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg',
            array(
                'label' => __('Footer background', 'bcwp'),
                'section' => 'colors',
                'settings' => 'footer_bg',
                'priority' => 23
            )
        )
    );
    //___Fonts___//
    $wp_customize->add_section(
        'bcwp_fonts',
        array(
            'title' => __('Fonts', 'bcwp'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: flyfreemedia.com/documentation/bcwp', 'bcwp'),
        )
    );
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Noto+Serif:400,700,400italic,700italic',
            'sanitize_callback' => 'bcwp_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Body font name/style/sets', 'bcwp' ),
            'section' => 'bcwp_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Noto Serif\', serif',
            'sanitize_callback' => 'bcwp_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Body font family', 'bcwp' ),
            'section' => 'bcwp_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );   
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Playfair+Display:400,700',
            'sanitize_callback' => 'bcwp_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Headings font name/style/sets', 'bcwp' ),
            'section' => 'bcwp_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Playfair Display\', serif',
            'sanitize_callback' => 'bcwp_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Headings font family', 'bcwp' ),
            'section' => 'bcwp_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '62',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'bcwp_fonts',
        'label'       => __('Site title', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) ); 
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'bcwp_fonts',
        'label'       => __('Site description', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );         
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '38',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'bcwp_fonts',
        'label'       => __('H1 font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'bcwp_fonts',
        'label'       => __('H2 font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'bcwp_fonts',
        'label'       => __('H3 font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'bcwp_fonts',
        'label'       => __('H4 font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'bcwp_fonts',
        'label'       => __('H5 font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'bcwp_fonts',
        'label'       => __('H6 font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '15',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'bcwp_fonts',
        'label'       => __('Body font size', 'bcwp'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) ); 

    //___Theme info___//
    $wp_customize->add_section(
        'bcwp_extensions',
        array(
            'title' => __('Theme extensions', 'bcwp'),
            'priority' => 99,
            'description' => __('Extensions for bcwp can be found ', 'bcwp') . '<a target="_blank" href="http://flyfreemedia.com/bcwp/extensions">' . __('here', 'bcwp') . '</a>',
        )
    );
    $wp_customize->add_setting('bcwp_theme_ext', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new bcwp_Theme_Info( $wp_customize, 'extensions', array(
        'section' => 'bcwp_extensions',
        'settings' => 'bcwp_theme_ext',
        'priority' => 10
        ) )
    );  

}
add_action( 'customize_register', 'bcwp_customize_register' );

/**
 * Sanitize
 */
//Text
function bcwp_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Logo style
function bcwp_sanitize_logo_style( $input ) {
    $valid = array(
                'hide-title'  => __( 'Only logo', 'bcwp' ),
                'show-title'  => __( 'Logo plus site title&amp;description', 'bcwp' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
// Menu position
function bcwp_sanitize_menu_position( $input ) {
    $valid = array(
                'above'  => __( 'Above site title/description', 'bcwp' ),
                'below'  => __( 'Below site title/description', 'bcwp' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// Banner type
function bcwp_sanitize_banner( $input ) {
    $valid = array(
                'image'    => __( 'Header image', 'bcwp' ),
                'slider'   => __( 'MetaSlider (requires the MetaSlider plugin)', 'bcwp' ),
                'nothing'  => __( 'Nothing', 'bcwp' ),
            );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//Checkboxes
function bcwp_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bcwp_customize_preview_js() {
	wp_enqueue_script( 'bcwp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bcwp_customize_preview_js' );

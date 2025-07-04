<?php
if (!function_exists('meu_tema_setup')) :
    function meu_tema_setup() {
        // Suporte para traduções
        load_theme_textdomain('meu-tema', get_template_directory() . '/languages');
        
        // Suporte para thumbnails
        add_theme_support('post-thumbnails');
        
        // Suporte para menus
        register_nav_menus(array(
            'primary' => __('Menu Principal', 'meu-tema'),
        ));
        
        // Suporte para HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        
        // Suporte para título automático
        add_theme_support('title-tag');
    }
endif;
add_action('after_setup_theme', 'meu_tema_setup');

// Registrar estilos e scripts
function meu_tema_scripts() {
    // Estilo principal
    wp_enqueue_style('meu-tema-style', get_stylesheet_uri());
    
    // Scripts (descomente se necessário)
    wp_enqueue_script('meu-tema-script', get_template_directory_uri() . '/scripts.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'meu_tema_scripts');


function add_csp_header() {
$csp = "default-src 'self'; "; 
$csp .= "script-src 'self' ; "; 
$csp .= "style-src 'self' ; "; 
$csp .= "img-src 'self' data: https: https://compras.sp.gov.br https://saopaulo.sp.gov.br"; 
$csp .= "font-src 'self' https://saopaulo.sp.gov.br; "; 
$csp .= "connect-src 'self'; "; 
$csp .= "frame-src 'none';"; 
header("Content-Security-Policy: $csp");
}
add_action('send_headers', 'add_csp_header');
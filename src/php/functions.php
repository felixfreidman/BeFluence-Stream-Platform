<?php
/**
 * QQ Theme functions and definitions
 *
 */
function qq_theme_support()
{
    wp_enqueue_style("style.min.css", 'all');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 9999);
    add_image_size('twentytwenty-fullscreen', 1980, 9999);
    add_theme_support('title-tag');
}

add_action("after_setup_theme", "qq_theme_support");

// Настройка для админки

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Основные настройки',
        'menu_title' => 'Настройки сайта',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}

// Register Styles and Scripts

function qq_register_styles()
{

    wp_enqueue_style('main-style-css', get_stylesheet_uri() . "/main.min.css");
}

add_action('wp_enqueue_scripts', 'qq_register_styles');

function qq_register_scripts()
{
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.min.js');
}

add_action('wp_enqueue_scripts', 'qq_register_scripts');

// AJAX и отправка писем

function ajax_form_scripts()
{
    $translation_array = array(
        'ajax_url' => admin_url('admin-ajax.php'),
    );
    wp_localize_script('main', 'cpm_object', $translation_array);
}

add_action('wp_enqueue_scripts', 'ajax_form_scripts');
function ajax_form()
{
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $company = $_REQUEST['company'];
    $area = $_REQUEST['area'];
    $response = '';
    $thm = 'Заявка на демо-доступ';
    $thm = "=?utf-8?b?" . base64_encode($thm) . "?=";
    $msg = "Имя: " . $name . "<br />
    Телефон: " . $phone . "<br />
    Название компании: " . $company . "<br />
    Область деятельности: " . $area . "<br />";
    $mail_to = get_field("email_to", 'option');

    $headers = "Content-Type: text/html; charset=utf-8\n";
    $headers .= 'От: Кукушки.Посадка' . "\r\n";

// Отправляем почтовое сообщение

    if (mail($mail_to, $thm, $msg, $headers)) {
        $response = '<div class="applied-screen" id="appliedForm">
<div class="form-close" id="closeAppliedForm"><span class="cross-one"> </span><span class="cross-two"></span>
</div><img class="applied-icon"
    src="http://qq.bezrealtora.ru/wp-content/themes/qq/assets/images/content/main_applied.png"
alt="Form Applied">
<div class="applied-header">Заявка успешно отправлена!</div>
<div class="applied-subheader"> Мы свяжемся с вами в ближайшее время!
    По всем интересующим вопросам вы можете позвонить нам по телефону <a href="tel:+74951864203">+7 (495)
        186-42-03</a></div>
<div class="form-button form-button--form" id="closeAppliedFormButton">Вернуться на сайт</div>
</div>';
    } else {
        $response = 'Ошибка при отправке';
    }

// Сообщение о результате отправки почты

    if (defined('DOING_AJAX') && DOING_AJAX) {
        echo $response;
        wp_die();
    }
}

add_action('wp_ajax_nopriv_ajax_form', 'ajax_form');
add_action('wp_ajax_ajax_form', 'ajax_form');
<?php

/**
 * functions to load posts via javascript / WP Rest API instead of traditional loading of posts via php
 */

if (!defined("ABSPATH")) {
    exit;
}

define("PLUGIN_BOILERPLATE_REST_SCRIPT", "plugin-boilerplate-rest-enqueue-script");

function plugin_boilerplate_rest_enqueue_scripts()
{
    wp_register_script(PLUGIN_BOILERPLATE_REST_SCRIPT, plugin_dir_url(__DIR__) . "public/js/scripts.js", array("jquery"), null);

    wp_localize_script(PLUGIN_BOILERPLATE_REST_SCRIPT,
        "wprest",
        array(
            "root" => esc_url_raw(rest_url()),
        )
    );

    wp_enqueue_script(PLUGIN_BOILERPLATE_REST_SCRIPT);
}

add_action("wp_enqueue_scripts", "plugin_boilerplate_rest_enqueue_scripts");

function plugin_boilerplate_rest_async_defer_script($tag, $handle)
{
    if ($handle == PLUGIN_BOILERPLATE_REST_SCRIPT) {
        return str_replace(" src", " defer=\"defer\" asyc=\"async\" src", $tag);
    }

    return $tag;
}

add_filter("script_loader_tag", "plugin_boilerplate_rest_async_defer_script", 10, 2);

function plugin_boilerplate_render_plugin()
{
    ob_start();
    require_once plugin_dir_path(__FILE__) . "view.php";
    $output = ob_get_clean();

    return $output;
}

add_shortcode("pluginboilerplate", "plugin_boilerplate_render_plugin");
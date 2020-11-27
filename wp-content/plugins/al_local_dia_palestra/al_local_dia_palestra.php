<?php
/*
 * Plugin Name: Cadastral Local e Data da Palestra
 * Description: Plugin para Cadastar o Local e data da Palestra realizada pela Alura
 * Version: 1.0.0
 * Author: Robison Luiz Fernandes
 */

if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path(__FILE__) . '/includes/al_local_dia_palestra_settings.php';
require_once plugin_dir_path(__FILE__) . '/includes/al_local_dia_palestra_shortcode.php';
require_once plugin_dir_path(__FILE__) . '/includes/al_local_dia_palestra_scripts.php';
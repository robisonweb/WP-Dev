<?php

function alura_intercambios_registrando_post_customizado(){
    register_post_type('destinos',
        array(
            'labels'=> array('name'=>'Destinos',
            'public'=> true,
            'menu_position'=> 0,
            'supports'=> array('title','editor','thumbnail'),
            'menu_icon'=>'dashicons-admin-site'

            )
        )
    );
}
add_action('init','alura_intercambios_registrando_po
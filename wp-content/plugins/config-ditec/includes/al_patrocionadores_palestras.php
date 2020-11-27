<?php

use ElementorPro\Modules\GlobalWidget\Documents\Widget;

add_action('widgets_init','al_pat_registra_widget')

function al_pat_registra_widget(){
    register_widget(widget:'PratocinadoresAlura');
}
class PratocinadoresAlura extends WP_Widget{
    public function __construct()
    {  
        parent::__construct(
            'al_patrocinadores_palestras_widget',
            'Patrocinadores Palestras',
            array('description' => 'Selecione os patrocinadores da palestra')
        );

        
    }
    public function form($instance)
    {
        ?>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('caelum') ?>"
                   name="<?= $this->get_field_name('caelum') ?>"
                   value="1">
            <label for="<?= $this->get_field_id('caelum') ?>">Caelum</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('casa_do_codigo')?>"
                   name="<?= $this->get_field_name('casa_do_codigo') ?>"
                   value="1">
            <label for="<?= $this->get_field_id('casa_do_codigo')?>">Casa do Código</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('hipsters')?>"
                   name="<?= $this->get_field_name('hipsters') ?>"
                   value="1">
            <label for="<?= $this->get_field_id('hipsters')?>">Hipsters</label>
        </p>
        <?php
    }
}
/*
<?php

class PatrocinadoresAlura extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'al_patrocinadores_palestras_widget',
            'Patrocinadores Palestras',
            array('description' => 'Selecione os patrocinadores da palestra')
        );
    }

    public function form($instance)
    {
        ?>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('caelum') ?>"
                   name="<?= $this->get_field_name('caelum') ?>"
                   value="1">
            <label for="<?= $this->get_field_id('caelum') ?>">Caelum</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('casa_do_codigo')?>"
                   name="<?= $this->get_field_name('casa_do_codigo') ?>"
                   value="1">
            <label for="<?= $this->get_field_id('casa_do_codigo')?>">Casa do Código</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('hipsters')?>"
                   name="<?= $this->get_field_name('hipsters') ?>"
                   value="1">
            <label for="<?= $this->get_field_id('hipsters')?>">Hipsters</label>
        </p>
        <?php
    }
}
*/
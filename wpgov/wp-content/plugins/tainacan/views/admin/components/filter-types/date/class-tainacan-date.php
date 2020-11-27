<?php

namespace Tainacan\Filter_Types;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Class TainacanFilterType
 */
class Date extends Filter_Type {

    function __construct(){
        $this->set_name( __('Date', 'tainacan') );
        $this->set_supported_types(['date']);
        $this->set_component('tainacan-filter-date');
        // $this->set_form_component('tainacan-filter-form-date');
        $this->set_use_max_options(false);
        // $this->set_default_options([
        //     'type' => 'day'
        // ]);
        $this->set_preview_template('
            <div>
                <div>
                    <div class="date-filter-container">
                        <div class="dropdown is-active">
                            <div role="button" class="dropdown-trigger">
                                <button class="button is-white">
                                    <span class="icon is-small">
                                        <i>=</i>
                                    </span>
                                    <span class="icon">
                                        <i class="tainacan-icon tainacan-icon-20px tainacan-icon-arrowdown"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="background" style="display: none;"></div>
                            <div class="dropdown-menu" style="display: none;">
                                <div role="list" class="dropdown-content">
                                    <a class="dropdown-item is-active">=&nbsp; ' . __('Equal', 'tainacan') .'</a>
                                    <a class="dropdown-item">≠&nbsp; '. __('Not equal', 'tainacan') .'</a>
                                    <a class="dropdown-item">&gt;&nbsp; '. __('After', 'tainacan') .'</a>
                                    <a class="dropdown-item">≥&nbsp; '. __('After (inclusive)', 'tainacan') .'</a>
                                    <a class="dropdown-item">&lt;&nbsp; '. __('Before', 'tainacan') .'</a>
                                    <a class="dropdown-item">≤&nbsp;  '. __('Before (inclusive)', 'tainacan') .'</a>
                                </div>
                            </div>
                        </div>
                        <div class="datepicker control is-small">
                            <div class="dropdown is-bottom-left is-mobile-modal">
                                <div role="button" class="dropdown-trigger">
                                    <div class="control has-icons-left is-small is-clearfix">
                                        <input type="text" autocomplete="off" placeholder=" '. __('Select a date', 'tainacan') .'" class="input is-small">
                                        <span class="icon is-left is-small"><i class="mdi mdi-calendar-today"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');
    }

    // /**
    //  * @inheritdoc
    //  */
    // public function get_form_labels(){
    //     return [
    //         'type' => [
    //             'title' => __( 'Type', 'tainacan' ),
    //             'description' => __( 'The type of the date picker, may be for day, month or year.', 'tainacan' ),
    //         ]
    //     ];
    // }
}
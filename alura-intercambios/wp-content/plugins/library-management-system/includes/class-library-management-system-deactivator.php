<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://onlinewebtutorhub.blogspot.in/
 * @since      1.0.0
 *
 * @package    Library_Management_System
 * @subpackage Library_Management_System/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Library_Management_System
 * @subpackage Library_Management_System/includes
 * @author     Online Web Tutor <onlinewebtutorhub@gmail.com>
 */
class Library_Management_System_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    private $table_activator;

    public function __construct($activator)
    {
        $this->table_activator = $activator;
    }

    public function deactivate()
    {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_country());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_branch());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_category());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_user_type());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_publishers());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_authors());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_books());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_teachers_staff());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_students());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_book_issue());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_book_return());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_book_late_fine());
        $wpdb->query("DROP TABLE IF EXISTS " . $this->table_activator->owt_library_tbl_country_currency());
    }

}

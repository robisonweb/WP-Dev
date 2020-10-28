<?php
/**
 * The file that defines File System class
 *
 * Themify_Filesystem class provide instance of Filesystem Api to do some file operation.
 * Based on WP_Filesystem the class method will remain same.
 * 
 *
 * @package    Themify
 * @subpackage Filesystem
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Themify_Filesystem' ) ) {

	/**
	 * The Themify_Filesystem class.
	 *
	 * This is used to initialize WP_Filesytem Api instance
	 * check for filesytem method and return correct filesystem method
	 *
	 * @package    Themify
	 * @subpackage Filesystem
	 * @author     Themify
	 */
	class Themify_Filesystem {

		/**
		 * Instance of WP_Filesytem api class.
		 * 
		 * @access public
		 * @var $execute Store the instance of WP_Filesystem class being used.
		 */
		public $execute = null;

		/**
		 * Class constructor.
		 * 
		 * @access public
		 */
		private function __construct() {
			$this->initialize();
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return    object    A single instance of this class.
		 */
		public static function get_instance() {
		    static $instance=null;
		    if($instance===null){
			$instance=new self;
		    }
		    return $instance;
		}

		/**
		 * Initialize filesystem method.
		 */
		private function initialize() {
			if(!defined( 'FS_METHOD' )){
			    define( 'FS_METHOD','direct');
			}
			// Load WP Filesystem
			if ( ! function_exists('WP_Filesystem') ) {
			    require_once ABSPATH . 'wp-admin/includes/file.php';
			}
			WP_Filesystem();
			global $wp_filesystem;
			if(is_a($wp_filesystem,'WP_Filesystem_Direct')){
			    $this->execute = $wp_filesystem;
			}
			else{
			     $this->execute = self::load_direct();
			}
		}

		/**
		 * Initialize Filesystem direct method.
		 */
		private static function load_direct() {
			require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
			require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';
			return new WP_Filesystem_Direct( array() );
		}
		
		public static function get_file_content($file,$check=false){
		    static $site_url=null;
		    if($site_url===null){
				$site_url=rtrim(site_url(),'/').'/';
		    }
			$upload_dir = themify_upload_dir();
		    if(strpos($file,$site_url)!==false || strpos($file,$upload_dir['baseurl'])!==false){
				$dir = strpos($file,$upload_dir['baseurl'])!==false?str_replace( $upload_dir['baseurl'], $upload_dir['basedir'], $file ): str_replace($site_url,dirname(WP_CONTENT_DIR).'/',$file);
				unset($upload_dir);
				$dir =strtok($dir,'?');
		    }
		    else{
				return null;
		    }
		    if($check===true){
				return self::is_readable($dir);
		    }
		    $data=self::get_contents($dir);
		    return !empty($data)?$data:null;
		}
		
		public static function is_dir($dir){
		    return is_dir($dir);
		}
		
		public static function is_file($file){
		    return is_file($file);
		}
		
		public static function is_readable($dir){
		    return is_readable($dir);
		}
		
		public static function is_writable($dir){
		    return is_writable($dir);
		}
		
		public static function exists($file){
		    return file_exists($file);
		}
		
		public static function size($file){
		    return filesize($file);
		}
		
		public static function delete($dir,$type=false){
		    if($type!=='f' && self::is_dir($dir)){
			$dirHandle = opendir($dir);
			if(empty($dirHandle)){
				return false;
			}
			$sep=DIRECTORY_SEPARATOR;
			while(false!==($f = readdir($dirHandle))){	
				if($f!=='.' && $f!=='..'){
				    $item = rtrim($dir,$sep) . $sep . $f;
				    if(self::is_dir($item)){
					    self::delete($item);
				    }
				    elseif(self::is_file($item) || is_link($item)){
					    unlink($item);
				    }
				}
			}
			closedir($dirHandle);
			$dirHandle=null;
			return rmdir($dir); 
		    }
		    elseif(self::is_file($dir) || is_link($dir)){
			return unlink($dir);
		    }
		    return true;
		}
		
		public static function put_contents($file,$contents, $mode=false){
		    $instance=self::get_instance();
		    if($mode===false){
			$mode=FS_CHMOD_FILE;
		    }
		    return $instance->execute->put_contents($file,$contents, $mode);
		}
		
		public static function get_contents($file){
			return file_get_contents($file);
		}
		
	}
	
}

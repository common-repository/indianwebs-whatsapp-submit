<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       lawebdelpoble.com
 * @since      1.0.0
 *
 * @package    Whats_submit
 * @subpackage Whats_submit/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Whats_submit
 * @subpackage Whats_submit/public
 * @author     Joan Medrano <joanmedranofoz@gmail.com>
 */
class Whats_submit_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Whats_submit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whats_submit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/whats_submit-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Whats_submit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Whats_submit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/whats_submit-public.js', array( 'jquery' ), $this->version, false );

	}

	function display_icon() { 

		//Consultem totes les opcions
		
		$options = get_option( 'iw_ws_settings' );
		$iw_ws_num = $options['iw_ws_num'];
		//Comprova si hi ha numero de telefon
		if ($iw_ws_num != ""){
	
			$iw_ws_msg = $options['iw_ws_message'];
			$iw_ws_only_mob = $options['iw_ws_only_mob'];
			$iw_ws_set_hours_start = $options['iw_ws_set_hours_start'];
			$iw_ws_set_hours_final = $options['iw_ws_set_hours_final'];
			$iw_ws_set_hours_start_2 = $options['iw_ws_set_hours_start_2'];
			$iw_ws_set_hours_final_2 = $options['iw_ws_set_hours_final_2'];
			$iw_ws_position_on_screen = $options['iw_ws_position_on_screen'];
			$iw_ws_call_to_action = $options['iw_ws_call_to_action'];
	
			//Comprovar si l'opció de només mostrar en movils esta activa
	
			if ($iw_ws_only_mob == 1){
				$mobileShow = "mobileShow";
			}
	
			if ($iw_ws_msg === ""){
				$iw_ws_link = "https://wa.me/$iw_ws_num";
			}
			else{
				$iw_ws_link = "https://wa.me/$iw_ws_num?text=$iw_ws_msg";
			}
	
			//Comprovar si l'opció de al franja d'horaris esta activa (S'ha de pulir)
	
			$iw_ws_actual_date = date('H:i', current_time( 'timestamp', 0 ));
			if ($iw_ws_set_hours_start != "" && $iw_ws_set_hours_final != ""){
				if ($iw_ws_actual_date>=$iw_ws_set_hours_start && $iw_ws_actual_date<=$iw_ws_set_hours_final) {
					$disable_button = "";
					}
				else {
					$disable_button = 'onclick="return false;" style="opacity: 0.3;"';
				}
				}
			if ($iw_ws_set_hours_start_2 != "" && $iw_ws_set_hours_final_2 != ""){
				if ($iw_ws_actual_date>=$iw_ws_set_hours_start_2 && $iw_ws_actual_date<=$iw_ws_set_hours_final_2) {
					$disable_button = "";
					}
				else {
					$disable_button = 'onclick="return false;" style="opacity: 0.3;"';
				}
				}
	
			if ($iw_ws_position_on_screen == 1){
				$iw_ws_position = 'left';
			}
			elseif ($iw_ws_position_on_screen == 2){
				$iw_ws_position = 'right';
			}
	
			?>
			<link rel="stylesheet" type="text/css" href="/wp-content/plugins/indianwebs-whats-submit/public/css/whats_submit-public.css">
			<div class="<?php echo $mobileShow; ?>">
				<a <?php echo $disable_button; ?>href="<?php echo $iw_ws_link; ?>"><img class="whatsapp-icon-<?php echo $iw_ws_position; ?>" src="/wp-content/plugins/indianwebs-whats-submit/public/images/whatsapp-icon-1.svg" alt="Whatsapp icon"></a>
			<?php if ($iw_ws_call_to_action != "" & $disable_button == ""){ ?>
				<div id="iw-ws-call-to-action-<?php echo $iw_ws_position; ?>"><div id="iw-ws-call-to-action-inner"><?php echo $iw_ws_call_to_action; ?></div></div>
			<?php } ?>
			</div>
			<?php
		}
	}

}

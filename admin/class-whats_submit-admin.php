<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       lawebdelpoble.com
 * @since      1.0.0
 *
 * @package    Whats_submit
 * @subpackage Whats_submit/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Whats_submit
 * @subpackage Whats_submit/admin
 * @author     Joan Medrano <joanmedranofoz@gmail.com>
 */
class Whats_submit_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/whats_submit-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/whats_submit-admin.js', array( 'jquery' ), $this->version, false );

	}

    //Create menu page

    function whatsubmin_menu(){
        //add_menu_page('WhatSubmit', 'WhatSubmit','administrator', 'whatsubmit.php', 'whatsubmit_action', plugins_url('indianwebslogo.png', __FILE__));
        
        $page_title = 'WhatSubmit';
        $menu_title = 'WhatSubmit';
        $capability = 'edit_posts';
        $menu_slug = 'whatsubmit';
        $function = array( $this, 'whatsubmit_action' );
        $icon_url = plugins_url('/images/indianwebslogo.png', __FILE__);
        $position = 99;
    
        add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    }
    
    //Declarate options
    
    function iw_ws_settings_init(  ) { 
    
        register_setting( 'generalPage', 'iw_ws_settings' );
    
        add_settings_section(
            'iw_ws_generalPage_section', 
            __( '', 'whatsubmit' ), 
            'iw_ws_settings_section_callback', 
            'generalPage'
        );
    
        add_settings_field( 
            'iw_ws_num', 
            __( 'Número de teléfono', 'whatsubmit' ), 
            array( $this, 'iw_ws_num_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_only_mob', 
            __( 'Mostrar en móvil', 'whatsubmit' ), 
            array( $this, 'iw_ws_only_mob_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_call_to_action', 
            __( 'Llamada a la acción', 'whatsubmit' ), 
            array( $this, 'iw_ws_call_to_action_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_message', 
            __( 'Mensaje', 'whatsubmit' ), 
            array( $this, 'iw_ws_message_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_position_on_screen', 
            __( 'Posición en la pantalla', 'whatsubmit' ), 
            array( $this, 'iw_ws_position_on_screen_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
    
    //SELECT HOURS
    
        add_settings_field( 
            'iw_ws_set_hours', 
            __( 'Establecer horas', 'whatsubmit' ), 
            array( $this, 'iw_ws_set_hours_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_hours_start', 
            array( $this, 'iw_ws_set_hours_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_hours_final', 
            array( $this, 'iw_ws_set_hours_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_hours_start_2', 
            array( $this, 'iw_ws_set_hours_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_hours_final_2', 
            array( $this, 'iw_ws_set_hours_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
    //SELECT DAYS OF THE WEEK
    /*
        add_settings_field( 
            'iw_ws_set_days', 
            __( 'Set days', 'whatsubmit' ), 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );   
    
        add_settings_field( 
            'iw_ws_set_day_mon', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_day_tue', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_day_wed', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_day_thu', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_day_fri', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_day_sat', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    
        add_settings_field( 
            'iw_ws_set_day_sun', 
            array( $this, 'iw_ws_set_days_render' ), 
            'generalPage', 
            'iw_ws_generalPage_section' 
        );
    */
    }

    //Display options

    function iw_ws_num_render(  ) { 

        $options = get_option( 'iw_ws_settings' );
        ?>
        <input type='text' name='iw_ws_settings[iw_ws_num]' value='<?php echo $options['iw_ws_num']; ?>' placeholder='+34'>
        <p class="description">Teléfono de contacto. <strong>El botón no se mostrará si está vacío.</strong></p>
	<p class="description">Añadir el prefijo para un funcionamiento correcto.</p>
        <?php
    
    }

    function iw_ws_only_mob_render(  ) { 

        $options = get_option( 'iw_ws_settings' );
        ?>
        <input type='checkbox' name='iw_ws_settings[iw_ws_only_mob]' <?php checked( $options['iw_ws_only_mob'], 1 ); ?> value='1'> Mostrar el botón sólo en el móvil.

        <?php

    }

    function iw_ws_call_to_action_render(  ) { 

        $options = get_option( 'iw_ws_settings' );
        ?>
        <textarea placeholder='Hola 👋
    ¿Como puedo ayudarte?' cols='40' rows='3' name='iw_ws_settings[iw_ws_call_to_action]'><?php echo $options['iw_ws_call_to_action'];?></textarea>
        <p class="description"><strong>Opcional.</strong> Texto para llamar la atención del usuario a contactar a través de WhatsApp.</p>
        <p>Puedes usar estilos de formato como en WhatsApp: _<em>italics</em>_ *<strong>bold</strong>* ~<del>strikethrough</del>~</p>
        <?php

    }

    function iw_ws_message_render(  ) { 

        $options = get_option( 'iw_ws_settings' );
        ?>
        <textarea placeholder='Hola. Necesito más información sobre esta página.' cols='40' rows='3' name='iw_ws_settings[iw_ws_message]'><?php echo $options['iw_ws_message']; ?></textarea>
        <p class="description"><strong>Opcional.</strong> Mensaje predeterminado para iniciar la conversación.</p>
        <?php

    }

    function iw_ws_position_on_screen_render(  ) { 

        $options = get_option( 'iw_ws_settings' );
        ?>
        <select name='iw_ws_settings[iw_ws_position_on_screen]'>
            <option value='2' <?php selected( $options['iw_ws_position_on_screen'], 2 ); ?>>Derecha</option>
            <option value='1' <?php selected( $options['iw_ws_position_on_screen'], 1 ); ?>>Izquierda</option>
        </select>

    <?php

    }

    function iw_ws_set_hours_render(  ) { 

        $options = get_option( 'iw_ws_settings' );
        ?>
        <input type='time' name='iw_ws_settings[iw_ws_set_hours_start]' value='<?php echo $options['iw_ws_set_hours_start']; ?>'>
        -- <input type='time' name='iw_ws_settings[iw_ws_set_hours_final]' value='<?php echo $options['iw_ws_set_hours_final']; ?>'>
        y
        <input type='time' name='iw_ws_settings[iw_ws_set_hours_start_2]' value='<?php echo $options['iw_ws_set_hours_start_2']; ?>'>
        -- <input type='time' name='iw_ws_settings[iw_ws_set_hours_final_2]' value='<?php echo $options ['iw_ws_set_hours_final_2']; ?>'>
        <p class="description"><strong>Opcional.</strong> Seleccione una hora para limitar el envío de mensajes.</p>
        <p class="description">Si el campo está <strong>vacío</strong>, su valor será <strong>0.</strong></p>
        <p class="description"><strong>Ejemplo: </strong>de <strong>9:00</strong> a <strong>14:00</strong> y de <strong>16:00</strong> a <strong>19:00.</strong></p>
        <p class="description">Hora actual: <strong><?php echo date( 'd-m-Y H:i', current_time( 'timestamp', 0 ) );?></strong></p>
        <?php

    }
    /*
    function iw_ws_set_days_render(  ){

        $options = get_option( 'iw_ws_settings' );
        ?>
        <ul>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_mon]' <?php checked( $options['iw_ws_set_days_mon'], 1 ); ?> value='1' id="weekday-mon" class="weekday" />Monday</li>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_tue]' <?php checked( $options['iw_ws_set_days_tue'], 1 ); ?> value='1' id="weekday-tue" class="weekday" />Tuesday</li>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_wed]' <?php checked( $options['iw_ws_set_days_wed'], 1 ); ?> value='1' id="weekday-wed" class="weekday" />Wednesday</li>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_thu]' <?php checked( $options['iw_ws_set_days_thu'], 1 ); ?> value='1' id="weekday-thu" class="weekday" />Thursday</li>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_fri]' <?php checked( $options['iw_ws_set_days_fri'], 1 ); ?> value='1' id="weekday-fri" class="weekday" />Friday</li>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_sat]' <?php checked( $options['iw_ws_set_days_sat'], 1 ); ?> value='1' id="weekday-sat" class="weekday" />Saturday</li>
            <li><input type="checkbox" name='iw_ws_settings[iw_ws_set_days_sun]' <?php checked( $options['iw_ws_set_days_sun'], 1 ); ?> value='1' id="weekday-sun" class="weekday" />Sunday</li>
        </ul>
        <?php
    }*/

    //CallBack Section

    function iw_ws_settings_section_callback(  ) { 

        echo __( 'Desde aquí puede configurar las opciones del botón de WhatsApp.', 'whatsubmit' );

    }

    function whatsubmit_action(){
    
        if( isset( $_GET[ 'tab' ] ) ) {  
            $active_tab = $_GET[ 'tab' ];  
        } else {
            $active_tab = 'welcome';
        }
    
    ?>
    
    <div class="wrap">
    
    <div class="wrap about-wrap full-width-layout">
    
              <h1>WhatSubmit</h1>
              <h3 style="margin-top: -5px; color:#32373c;">por <a href="https://indianwebs.com" target="_blank">IndianWebs</a></h3>
    
              <p class="about-text">¡Gracias por instalar el plugin WhatSubmit! Hacemos todo lo posible para ofrecer a nuestros usuarios la mejor experiencia de uso.</p>
    
              <p class="about-text">
                <a href="https://indianwebs.com" target="_blank">Visita nuestra página</a>
              </p>
    
              <a href="https://indianwebs.com" target="_blank"><div style="
                   background: url(/wp-content/plugins/indianwebs-whats-submit/admin/images/logoindianwebsgrande.png) no-repeat;
                   background-size: 130px 130px;
                   margin: 5px 0 0;
                   padding-top: 120px;
                   height: 40px;
                   width: 140px;
                   position: absolute;
                   top: 0;
                   right: 0;">
                   </div></a>
            </div>
    
    <div class="wrap about-wrap full-width-layout">
        <h2 class="nav-tab-wrapper">  
            <a href="?page=whatsubmit&tab=welcome" class="nav-tab <?php echo $active_tab == 'welcome' ? 'nav-tab-active' : ''; ?>">Bienvenido</a>  
            <a href="?page=whatsubmit&tab=button" class="nav-tab <?php echo $active_tab == 'button' ? 'nav-tab-active' : ''; ?>">Botón</a>
            <!--<a href="?page=whatsubmit&tab=style" class="nav-tab <?php echo $active_tab == 'style' ? 'nav-tab-active' : ''; ?>">Estilo</a>-->  
        </h2>
    </div>
    
    <div>
    <form method="post" action="options.php">
    <?php
    
    if( $active_tab == 'welcome' ) {  
    ?>
    
    <div class="wrap about-wrap full-width-layout">
            <div class="two-col">
      <div>
          <h2 style="margin: 0px; text-align: left;">Novedades de la versión <span style="font-size: 20px;color: #555;">v1.0.0</span></h2>
          <p>
          En la primera versión hemos creado las funciones básicas del plugin:
          </p>
          <ul>
              <li><strong>Número de teléfono</strong> - El icono soló se mostrara si se ha establecido un número de teléfono.</li>
              <li><strong>Mostrar soló en móviles</strong> - Al activar esta opción, el icono de WhatsApp soló se mostrara en dispositivos móviles.</li>
              <li><strong>Llamada a l'acción</strong> - El mensaje que se introduzca se mostrara como un <strong>tooltip</strong> permanente al lado del icono.</li>
              <li><strong>Mensaje</strong> - Si se introduce un mensaje, este sera predefinido para todos los que quieran usar el botón de Whatsapp.</li>
              <li><strong>Posición en pantalla</strong> - Se puede elegir la posición donde se mostrara el botón (Derecha o Izquierda).</li>
              <li><strong>Establecer horario</strong> - Puedes establecer un horario de uso del botón, cuando este fuera del horario establecido, el botón se mostrara con una opacidad i no podrá ser usado.</li>
        </ul>      
    
        <hr>
        <div>
          <h3>Soporte</h3>
          <p>
          Si encuentras algún error solicitamos que nos informes para poder arreglarlo en futuras versiones. Si tienes dudas sobre el plugin.</p>
          <a style="background-color: #f88f2c;color: #ffffff;text-decoration: none;padding: 10px 30px;border-radius: 30px;margin: 10px 0 0 0;display: inline-block;" target="_blank" href="mailto:info@indianwebs.com">Contacta</a>
        </div>
      </div>
    </div>      </div>
    
    <?php
        
    
    } elseif( $active_tab == 'button' )  {
    ?>
    <div class="wrap about-wrap full-width-layout">
    <?php
    
        settings_fields( 'generalPage' );
        do_settings_sections( 'generalPage' );
        submit_button(); 
    ?>
    </div>
    <?php
    }
    /*
    elseif( $active_tab == 'style' )  {
        ?>
        <div class="wrap about-wrap full-width-layout">
        <?php
        
            echo "Hola";
        ?>
    </div>
    <?php
    }*/
    ?>
    </form>
    </div>
    </div>
    <?php
    }


}

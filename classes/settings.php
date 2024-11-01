<?php

/**
 * @since 0.1.0 this class has controlled all of the plugin settings
 */

	class simplemodal_settings{

        public function __construct( &$core ){
        	$this->core = &$core;
        	$this->db = $this->core->db;
        	$this->ui = $this->core->ui;
        	add_action( 'admin_menu'                                , array( $this, 'admin_init' ) );
        }

        function admin_init(){
			add_options_page( 'Simple Modal', 'Simple Modal', 'edit_plugins', 'simplemodal--settings', array( $this, 'settings_page' ) );
			register_setting( 'simplemodal-settings-group', 'modal-height--small' );
			register_setting( 'simplemodal-settings-group', 'modal-width--small' );
			register_setting( 'simplemodal-settings-group', 'modal-height--medium' );
			register_setting( 'simplemodal-settings-group', 'modal-width--medium' );
			register_setting( 'simplemodal-settings-group', 'modal-height--large' );
			register_setting( 'simplemodal-settings-group', 'modal-width--large' );
			register_setting( 'simplemodal-settings-group', 'modal-height--xlarge' );
			register_setting( 'simplemodal-settings-group', 'modal-width--xlarge' );
        }

		function settings_page(){

		    //header
		    $data['header_text']        = '<h2>Simple Modal Settings</h2>';

		    $post_types                 = get_post_types( array( 'public' => true ), 'object' );

		    $modal_small[]              = array( 'sublabel'      => 'Height',
		    	                                 'name'          => 'modal-height--small',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-height--small') );
		    $modal_small[]              = array( 'sublabel'      => 'Width',
		    	                                 'name'          => 'modal-width--small',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-width--small') );
			$overall['fields'][]        = $this->ui->generate_form_table_line( 'Small', 'MULTIPLE_TEXTS', $modal_small );

		    $modal_medium[]             = array( 'sublabel'      => 'Height',
		    	                                 'name'          => 'modal-height--medium',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-height--medium') );
		    $modal_medium[]             = array( 'sublabel'      => 'Width',
		    	                                 'name'          => 'modal-width--medium',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-width--medium') );
		    $overall['fields'][]        = $this->ui->generate_form_table_line( 'Medium', 'MULTIPLE_TEXTS', $modal_medium );

		    $modal_large[]              = array( 'sublabel'      => 'Height',
		    	                                 'name'          => 'modal-height--large',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-height--large') );
		    $modal_large[]              = array( 'sublabel'      => 'Width',
		    	                                 'name'          => 'modal-width--large',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-width--large') );
		    $overall['fields'][]        = $this->ui->generate_form_table_line( 'Large', 'MULTIPLE_TEXTS', $modal_large );

		    $modal_xlarge[]             = array( 'sublabel'      => 'Height',
		    	                                 'name'          => 'modal-height--xlarge',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-height--xlarge') );
		    $modal_xlarge[]              = array( 'sublabel'      => 'Width',
		    	                                 'name'          => 'modal-width--xlarge',
		    	                                 'class'		 => 'small',
                                                 'current_value' => get_option('modal-width--xlarge') );
		    $overall['fields'][]        = $this->ui->generate_form_table_line( 'Extra Large', 'MULTIPLE_TEXTS', $modal_xlarge );

		    //external files
		    wp_enqueue_style( 'sm-styles', plugins_url().'/simple-modal/css/admin-general.css' );

		    //call the view
		    require_once SIMPLEMODAL_DIR . '/views/settings.php';

		}


   }


/* End of file */
/* Location: ./post-access-controller/classes/settings.php */
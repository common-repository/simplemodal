<?php

/**
 * @since 0.1.0 all of the interaction for the modal post type is contained in this class
 */

	class simplemodal_post_type{

        public function __construct( &$core ){
        	$this->core = &$core;
        	$this->db = $this->core->db;
        	$this->ui = $this->core->ui;

        	//this class is being instantiated on the 'init' action which is when we'd normally want to register things
        	//so rather than hook it to another action (since we can't hook it to 'init' since that will have already happened when this class is instantiated)
        	//we just call the function here and that's pretty much like it was hooked originally on the 'init' action itself
        	$this->create_simplemodal_post_type();

        	//add the meta box to the modal edit post page
        	add_action( 'add_meta_boxes'                                 , array( $this, 'meta_boxes' )                  , 10, 2 );
        }

		function create_simplemodal_post_type() {
		    register_post_type( 'simplemodal',
		        array(
		            'labels' => array(
		                'name'          => __( 'Modals' ),
		                'singular_name' => __( 'Modal' ),
		                'add_new_item'  => __( 'Create Modal' ),
		                'edit_item'     => __( 'Edit Modal' )
		            ),
		            'description'           => 'Content for modal windows linked to from other posts or pages',
		            'public'                => true,
		            'exclude_from_search'   => true,
		            'supports'              => array( 'title', 'editor' ),
		            'menu_icon'				=> 'dashicons-nametag',
		            'menu_position'         => 2
		        )
		    );
		    flush_rewrite_rules();
		}

		function meta_boxes( $post_type, $post ) {

		    //add the box
		    if( $post_type == 'simplemodal' ):

		        //get the post type object for label, etc.
		        $post_type_obj = get_post_type_object( $post_type );

		        //add the box
		        add_meta_box(
		            'simplemodal-meta-box',                                         //id
		            __( 'Options' ),                                                //label
		            array( $this, 'meta_box' ),                                     //function
		            $post_type,                                                     //type
		            'side',                                                      //placement
		            'default'                                                        //priority
		        );

		    endif;

		}

		function meta_box( $post ){

			//the "sizes" drop down generated from the UI loading
		    $sizes = new SimpleModalUI();
		    $sizes->type = "select";
		    $sizes->current_value = get_post_meta( $post->ID, 'simplemodal_size', true );
		    $sizes->name = 'simplemodal_size';
		    $sizes->id = 'simplemodal_size';
		    $sizes->label = 'Size';
		    $sizes->options['simplemodal-small'] = 'Small';
		    $sizes->options['simplemodal-medium'] = 'Medium';
		    $sizes->options['simplemodal-large'] = 'Large';
		    $sizes->options['simplemodal-xlarge'] = 'Extra Large';

		    //external files
		    wp_enqueue_style( 'sm-styles', plugins_url().'/simple-modal/css/admin-general.css' );

			//call the view
		    include_once SIMPLEMODAL_DIR . '/views/simplemodal_post_type/meta_box.php';

		}


   }

/* End of file */
/* Location: ./simple-modal/classes/simplemodal_post_type.php */
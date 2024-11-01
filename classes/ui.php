<?php

	//this class (as opposed to the older one that follows it) is instantiated for each UI element rather than housing common UI-generating functions
	class SimpleModalUI{

		public $type;
		public $current_value;
		public $name;
		public $id;
		public $label;
		public $row_class;
		public $values = array();

        public function display( $view = null ){
        	$func_name = 'display_'.$this->type;

        	switch( $view ):
        		case "form-table-row":
		    		$return  = '<tr class="'.$this->row_class.'">';
		    		$return .= '<th>'.$this->label.'</th>';
		    		$return .= '<td>'.$this->$func_name().'</td>';
		    		$return .= '</tr>';
        			break;
        		default:
        			$return = $this->$func_name();
        			break;
        	endswitch;

    		echo $return;

        }

        private function display_text(){
    		return sprintf( '<input type="text" name="%s" class="%s" value="%s">', $this->name, $this->class, $this->current_value );
        }

    	private function display_select(){
    		foreach( $this->options as $value => $label ):
    			$option_str .= "<option value='$value'";
    			if( $value == $this->current_value ):
    				$option_str .= ' selected';
    			endif;
    			$option_str .= ">$label</option>";
    		endforeach;

    		return sprintf( '<select name="%s" class="%s" id="%s">%s</select>', $this->name, $this->class, $this->id, $option_str );
    	}

    	private function display_rowselect(){
    		foreach( $this->data as $modal ):
    			$row_str .= sprintf( '<li data-display-value="%s" data-value="%s"><span class="%s">%s</span><span class="%s">%s</span></li>', post_permalink( $modal->ID ), $modal->ID, $this->label_class, $modal->post_title, $this->meta_class, $modal->post_date );
    		endforeach;

    		return sprintf( '<ul class="%s">%s</ul>', $this->wrapper_class, $row_str );
    	}

	}

    class simplemodal_ui{

    	public function generate_form_table_line( $field_label, $field_type, $field_args ){

    		$function = '_form_input_'.$field_type;
    		$field_code = $this->$function( $field_args );

    		$return  = '<tr>';
    		$return .= '<th>'.$field_label.'</th>';
    		$return .= '<td class="'.$field_class.'">'.$field_code.'</td>';
    		$return .= '</tr>';
    		return $return;
    	}

    	private function _form_input_text( $args ){
    		extract( $args );
    		$return = "<input type='text' name='$name' class='$class' value='$current_value' />";
    		return $return;
    	}

    	private function _form_input_multiple_texts( $args ){
    		$return = '';
    		foreach( $args as $text_args ):
    			$return .= '<div class="simplemodal-form-subitem"><label>'.$text_args['sublabel'].'</label>'.$this->_form_input_text( $text_args ).'</div>';
    		endforeach;
    		return $return;
    	}

    	private function _form_input_textarea( $args ){
    		extract( $args );
    		$return = "<textarea name='$name' class='$class'>$current_value</textarea>";
    		return $return;
    	}

    	private function _form_input_drop_down( $args ){
    		extract( $args );
    		$return  = "<select name='$name' class='$class' id='$id'>";
    		foreach( $values as $value => $label ):
    			$return .= "<option value='$value'";
    			if( $value == $current_value ):
    				$return .= ' selected';
    			endif;
    			$return .= ">$label</option>";
    		endforeach;
    		$return .= '</select>';

    		return $return;
    	}

    	private function _form_input_checkbox( $args ){

    		extract( $args );

    		$return = '';

			foreach( $options as $option ):
				$return .= "<div><label for='$name-".$option['value']."'>";
				if( $option['selected'] == 'Y' ):
					$checked = ' checked';
				else:
					$checked = '';
				endif;
				$return .= "<input type='checkbox' name='".$name."[]' id='$name-".$option['value']."' value='".$option['value']."' style='width: auto' $checked>";
				$return .= $option['label']."</label></div>";
			endforeach;

			return $return;

    	}

        private function _form_input_checkbox_well( $args ){

            extract( $args );

            $return = '<div class="postaccesscontroller-checkbox-well">';

            foreach( $options as $option ):
                $return .= "<label for='$name-".$option['value']."'>";
                if( $option['selected'] == 'Y' ):
                    $checked = ' checked';
                else:
                    $checked = '';
                endif;
                $return .= "<input type='checkbox' name='".$name."[]' id='$name-".$option['value']."' value='".$option['value']."' $checked>";
                $return .= $option['label']."</label>";
            endforeach;

            $return .= '</div>';

            return $return;

        }

    }

/* End of file */
/* Location: ./simple-modal/classes/ui.php */
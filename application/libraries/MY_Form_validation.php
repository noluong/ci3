<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY Form Validation Class
 *
 * @package
 * @subpackage Libraries
 * @category Validation
 * @link
 */
class MY_Form_validation extends CI_Form_validation {

	private $_added_rules = [];

    /**
     * Constructor
     */
    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }

   /**
     *
     * @param string $group
     * @param array $data
     * @return bool|void
     */
    public function run($group = '', array $data = [])
    {
        if(!$data && !$this->_added_rules) parent::run($group);
        if(!$data) $data = $this->_added_rules;

        // Do we even have any data to process?  Mm?
        $validation_array = empty($this->validation_data) ? $_POST : $this->validation_data;
        if (count($validation_array) === 0)
        {
            return FALSE;
        }

        // Does the _field_data array containing the validation rules exist?
        // If not, we look to see if they were assigned via a config file
        if (count($this->_field_data) === 0)
        {
            // No validation rules?  We're done...
            if (count($this->_config_rules) === 0)
            {
                return FALSE;
            }

            if (empty($group))
            {
                // Is there a validation rule for the particular URI being accessed?
                $group = trim($this->CI->uri->ruri_string(), '/');
                isset($this->_config_rules[$group]) OR $group = $this->CI->router->class.'/'.$this->CI->router->method;
            }

            $this->set_rules(isset($this->_config_rules[$group]) ? $this->_config_rules[$group] : $this->_config_rules);

            // Were we able to set the rules correctly?
            if (count($this->_field_data) === 0)
            {
                log_message('debug', 'Unable to find validation rules');
                return FALSE;
            }
        }

        // Load the language file containing error messages
        $this->CI->lang->load('form_validation');
        
        // Cycle through the rules for each field and match the corresponding $validation_data item
        foreach ($this->_field_data as $field => $row)
        {
            // Fetch the data from the validation_data array item and cache it in the _field_data array.
            // Depending on whether the field name is an array or a string will determine where we get it from.
            if ($row['is_array'] === TRUE)
            {
                $this->_field_data[$field]['postdata'] = $this->_reduce_array($validation_array, $row['keys']);
            }
            elseif (isset($validation_array[$field]) && $validation_array[$field] !== '')
            {
                $this->_field_data[$field]['postdata'] = $validation_array[$field];
            }

        }

        // Execute validation rules
        // Note: A second foreach (for now) is required in order to avoid false-positives
        //   for rules like 'matches', which correlate to other validation fields.
        foreach ($this->_field_data as $field => $row)
        {
            // Don't try to validate if we have no rules set
            // if (empty($row['rules']))
            // {
            //     continue;
            // }
            $rules = $row['rules'];
            if (isset($data[$field]) AND $data[$field] != "")
            {
                $added_rules = explode('||', $data[$field], 2);
                if(isset($added_rules[1]))
                {
                    $rules = array_merge(explode('|', $added_rules[0]), $row['rules'], explode('|', $added_rules[1]));
                }
                else
                {
                    $rules = array_merge($row['rules'], explode('|',$added_rules[0]));
                }
            }

            $rules = array_filter($rules);
         
            $this->_execute($row, array_unique($rules), $this->_field_data[$field]['postdata']);
        }

        // Did we end up with any errors?
        $total_errors = count($this->_error_array);
        if ($total_errors > 0)
        {
            $this->_safe_form_data = TRUE;
        }

        // Now we need to re-set the POST data with the new, processed data
        $this->_reset_post_array();

        return ($total_errors === 0);
    }


	public function add_rules(array $rules)
	{
		if(!$this->_added_rules) {
			$this->_added_rules = $rules;
			return $this;
		}

		foreach($rules as  $field => $validate ) {
			if(isset($this->_added_rules[$field])) {
				$this->_added_rules[$field] .= '|'.$validate;
			}else {
				$this->_added_rules[$field] = $validate;
			}
		}


		return $this;
	}

	/**
     * check_password allow alpha-numeric and special characters ! " # $ % & ' ( ) * + , \ -. / : ; < = > ? @ [ ] ^ _ ` { | } 
     *
     * @param  $str
     */
    public function valid_password($str){
        if (!preg_match("/^[[:alnum:][:punct:]]*$/", $str)){
            return FALSE;
        }
        return TRUE;
    }//END _check_password()


    /**
    * Kiểm tra URL
    * 
    * @param mixed $str
    */
    public function valid_url($str){
        $length = mb_strlen($str);
        $width = mb_strwidth($str);
        if($width > $length){
            return FALSE;
        }
        $pattern = "/^(http|https):\/\/((www\.)?|www\.)[a-z0-9]+(?:[-.][a-z0-9]+)*\.[a-z]{2,5}(?::[0-9]{1,5})?(?:\/\S*)?$/i";
        if (!preg_match($pattern, $str))
        {
            return FALSE;
        }
        return TRUE;
    }
}

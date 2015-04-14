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
		// Does the _field_data array containing the validation rules exist?
		// If not, we look to see if they were assigned via a config file
		if (count($this->_field_data) == 0)
		{
			// No validation rules?  We're done...
			if (count($this->_config_rules) == 0)
			{
				return FALSE;
			}

			// Is there a validation rule for the particular URI being accessed?
			$uri = ($group == '') ? trim($this->CI->uri->ruri_string(), '/') : $group;

			if ($uri != '' AND isset($this->_config_rules[$uri]))
			{
				$this->set_rules($this->_config_rules[$uri]);
			}
			else
			{
				$this->set_rules($this->_config_rules);
			}

			// We're we able to set the rules correctly?
			if (count($this->_field_data) == 0)
			{
				log_message('debug', "Unable to find validation rules");
				return FALSE;
			}
		}

		// Load the language file containing error messages
		$this->CI->lang->load('form_validation');

		// Cycle through the rules for each field, match the
		// corresponding $_POST item and test for errors
		foreach ($this->_field_data as $field => $row)
		{
			// Fetch the data from the corresponding $_POST array and cache it in the _field_data array.
			// Depending on whether the field name is an array or a string will determine where we get it from.

			$rules = explode('|', $row['rules']);
			if ($row['is_array'] == TRUE)
			{
				$this->_field_data[$field]['postdata'] = $this->_reduce_array($_POST, $row['keys']);
			}
			else
			{
				if (isset($_POST[$field]) AND $_POST[$field] != "")
				{
					$this->_field_data[$field]['postdata'] = $_POST[$field];
				}

				if (isset($data[$field]) AND $data[$field] != "")
				{
					$added_rules = explode('||', $data[$field], 2);
					if(isset($added_rules[1]))
					{
						$rules = array_merge(explode('|', $added_rules[0]), $rules, explode('|', $added_rules[1]));
					}
					else
					{
						$rules = array_merge($rules, explode('|',$added_rules[0]));
					}
				}
			}
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

		// No errors, validation passes!
		if ($total_errors == 0)
		{
			return TRUE;
		}

		// Validation fails
		return FALSE;
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

	public function form_data()
	{
		$field_data = [];

		if($this->_field_data) {
			$field_data = array_map(function($row) {
				return preg_replace('#\[\]$#', '', $row);
			}, array_keys($this->_field_data));
		}

		return array_intersect_key(get_instance()->input->post(), array_flip($field_data));
	}

}

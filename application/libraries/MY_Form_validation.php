<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * MY Form Validation Class for Japanese
 *
 * @package
 * @subpackage Libraries
 * @category Validation
 * @author Copyright (c) 2011, AIDREAM.
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
     * YYYY-MM-DD
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function ymd($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $tmp = explode('-', $str);
        if (count($tmp) != 3) {
            return false;
        }
        $tmp = array_map('intval', $tmp);
        return ( ! checkdate($tmp[1], $tmp[2], $tmp[0])) ? FALSE : TRUE;
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

}

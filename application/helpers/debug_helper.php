<?php

if ( ! function_exists( 'd' ) ) {
  // dBug wrapper ( see:http://dbug.ospinto.com)
  function d( $data )
  {
  	if(!isset($_SERVER["REMOTE_ADDR"])){
  		print_r($data);
  	}else{
	    ob_start();
	    new dBug($data);
	    $output = ob_get_contents(); 
	    ob_end_clean();
	    echo $output;
  	}
  }
}

if ( ! function_exists( 'dd' ) ) {
	// dBug wrapper ( see:http://dbug.ospinto.com)
	function dd( $data )
	{
		d($data);
		exit();
	}
}

/**
 * Format a variable using print_r func.
 */
if ( ! function_exists( 'p' ) ) {
	function p( $data = '' )
	{
		if($data === '') $data = 'test';
		echo('<pre>'.print_r($data, true).'</pre>');
	}
}

/**
 * p function with exit func.
 */
if ( ! function_exists( 'pp' ) ) {
	function pp( $data = '' )
	{
		if($data === '') $data = 'test';
		echo('<pre>'.print_r($data, true).'</pre>');
		exit;
	}
}


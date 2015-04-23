<?php

/**
 * enhash
 *
 */
function enhash($str)
{
	$hash = password_hash($str, PASSWORD_DEFAULT);
	return $hash;
}

/**
 * check_hash
 *
 */
function check_hash($password, $hash)
{
	$bool = password_verify($password, $hash);
	return $bool;
}

function reset_password_code($email)
{
	$hash = hash('SHA256', uniqid(mt_rand(0, 9999).$email, true));

	return $hash;
}
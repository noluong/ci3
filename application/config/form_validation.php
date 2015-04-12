<?php

$config = [

	/*
	 *  admin category page
	 */
	"admin_category_edit" => [
		[
			'field' => 'category[name]',
			'label' => 'Category name',
			'rules' => 'required|max_length[50]'
		],
	],

	/*
	 *  admin user search
	 */
	"admin_user_search" => [
		[
			'field' => 'keyword',
			'label' => 'Keyword',
			'rules' => 'trim|xss_clean'
		],
	],

	/*
	 *  admin login
	 */
	"admin_login" => [
		[
			'field' => 'admin_mail_address',
			'label' => 'Email',
			'rules' => 'trim|required|xss_clean'
		],[
			'field' => 'admin_password',
			'label' => 'Password',
			'rules' => 'trim|required'
		],
	],
];

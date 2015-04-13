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
			'rules' => 'trim'
		],
	],

	/*
	 *  admin user
	 */
	"admin_user" => [
		[
			'field' => 'mail_address',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|max_length[255]'
		],[
			'field' => 'password',
			'label' => 'Password',
			'rules' => ''
		],[
			'field' => 'password_confirm',
			'label' => 'Password confirm',
			'rules' => ''
		],[
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[25]'
		],
	],

	/*
	 *  admin login
	 */
	"admin_login" => [
		[
			'field' => 'admin_mail_address',
			'label' => 'Email',
			'rules' => 'trim|required'
		],[
			'field' => 'admin_password',
			'label' => 'Password',
			'rules' => 'trim|required'
		],
	],
];

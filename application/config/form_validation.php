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
			'field' => 'user[mail_address]',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|max_length[255]'
		],[
			'field' => 'user[password]',
			'label' => 'Password',
			'rules' => ''
		],[
			'field' => 'password_confirm',
			'label' => 'Password confirm',
			'rules' => ''
		],[
			'field' => 'user[name]',
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

	/*
	 *  admin news
	 */
	"admin_news" => [
		[
			'field' => 'news[category_id]',
			'label' => 'Category',
			'rules' => 'trim|numeric',
		],[
			'field' => 'news[title]',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[60]',
		],[
			'field' => 'news[summary]',
			'label' => 'Summary',
			'rules' => 'trim|max_length[255]',
		],[
			'field' => 'news[content]',
			'label' => 'Content',
			'rules' => 'trim|required',
		],[
			'field' => 'news[keywords]',
			'label' => 'Keywords',
			'rules' => 'trim|required|max_length[160]',
		],[
			'field' => 'news[description]',
			'label' => 'Description',
			'rules' => 'trim|required|max_length[160]',
		],[
			'field' => 'news[priority]',
			'label' => 'Priority',
			'rules' => 'trim|numeric',
		],
	],

	/*
	 *  admin setting
	 */
	"admin_setting" => [
		[
			'field' => 'setting[title]',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[60]',
		],[
			'field' => 'setting[keywords]',
			'label' => 'Keywords',
			'rules' => 'trim|required|max_length[160]',
		],[
			'field' => 'setting[description]',
			'label' => 'Description',
			'rules' => 'trim|required|max_length[160]',
		],[
			'field' => 'setting[company_name]',
			'label' => 'Company name',
			'rules' => 'trim|required|max_length[255]',
		],[
			'field' => 'setting[email]',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|max_length[255]',
		],[
			'field' => 'setting[phone]',
			'label' => 'Phone',
			'rules' => 'trim|required|numeric',
		],[
			'field' => 'setting[hotline]',
			'label' => 'Hotline',
			'rules' => 'trim|required|numeric',
		],[
			'field' => 'setting[address]',
			'label' => 'Address',
			'rules' => 'trim|required|max_length[255]',
		],[
			'field' => 'setting[map]',
			'label' => 'Google maps',
			'rules' => 'trim|required|max_length[255]',
		],
	],

	/*
	 *  admin news
	 */
	"admin_slider" => [
		[
			'field' => 'slider[link]',
			'label' => 'Link',
			'rules' => 'trim|valid_url',
		],[
			'field' => 'news[priority]',
			'label' => 'Priority',
			'rules' => 'trim|numeric',
		],
	],

	/*
	 *  contact
	 */
	"contact" => [
		[
			'field' => 'contact[name]',
			'label' => 'Tên của bạn',
			'rules' => 'trim|required|max_length[255]',
		],[
			'field' => 'contact[phone]',
			'label' => 'Điện thoại',
			'rules' => 'trim|required|numeric',
		],[
			'field' => 'contact[email]',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|max_length[255]',
		],[
			'field' => 'contact[address]',
			'label' => 'Địa chỉ',
			'rules' => 'trim|max_length[255]',
		],[
			'field' => 'contact[type]',
			'label' => 'Chương trình vay',
			'rules' => 'trim|max_length[255]',
		],[
			'field' => 'contact[subject]',
			'label' => 'Tiêu đề',
			'rules' => 'trim|required|max_length[255]',
		],[
			'field' => 'contact[content]',
			'label' => 'Nội dung',
			'rules' => 'trim|required|max_length[1000]',
		],
	],
];

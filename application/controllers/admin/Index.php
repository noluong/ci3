<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	MY_Model
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class Index extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$this->load->library('google');
		
		$client_id = '27918520926-hne7n27s002atii9s8oudg1mrp1ltiv3.apps.googleusercontent.com'; //Client ID
		$service_account_name = '27918520926-hne7n27s002atii9s8oudg1mrp1ltiv3@developer.gserviceaccount.com'; //Email Address
   		$key_file_location = BASEPATH . '../application/third_party/google-api-client/vaytienmat-abeca0a21c35.p12'; //key.p12

		$client = new Google_Client();
		$client->setApplicationName("ApplicationName"); //Cái này không quan trọng lắm, bạn có thể đặt tùy ý.
		$analytics = new Google_Service_Analytics($client);
		 
		if ($this->session->userdata('service_token')) {
			$client->setAccessToken($_SESSION['service_token']);
		}
		
		//Đọc nội dung từ file key và xác thực tài khoản GA
		$key = file_get_contents($key_file_location);
		$cred = new Google_Auth_AssertionCredentials(
			$service_account_name,
			array('https://www.googleapis.com/auth/analytics'),
			$key,
			'notasecret'
		);

		$client->setAssertionCredentials($cred);
		if($client->getAuth()->isAccessTokenExpired()) {
			$client->getAuth()->refreshTokenWithAssertion($cred);
		}
		$this->session->set_userdata('service_token', $client->getAccessToken());

		$profileId = "ga:101313505";

		//lấy kết quả
		$metrics = "ga:visits,ga:pageviews";
		//Lấy giá trị theo giờ
		 $optParams = array("dimensions" => "ga:hour");
		//Ở đây mình chỉ muốn hiển thị dữ liệu ngày hôm nay thôi, nên mình sẽ đặt
		//thuộc tính là today -> today nhé.
		 $stats = $analytics->data_ga->get($profileId, 'today', 'today', $metrics, $optParams);
		//Vì lấy nhiều dữ liệu nên mình sẽ lấy mảng rows trong kết quả trả về.
		$data['stats'] = $stats['rows'];

		$this->load->view('admin/index', $data);

	}
}

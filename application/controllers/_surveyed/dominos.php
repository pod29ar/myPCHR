<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dominos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->agent->is_mobile())
			redirect(base_url('notices'), 'refresh');
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['cartprice'] = $this->session->userdata('cartprice');
		$this->data['order'] = $this->data_model->get_orders();
		$this->data['opted'] = $this->session->userdata('opted');
	}

	function index()
	{
		$this->data['title'] = BASE_TITLE;
		$this->data['description'] = BASE_TITLE.' - The expert of pizza delivery!';
		$this->data['js_dir'] = 'partial/homejs';
		$this->data['css_dir'] = 'partial/homecss';
		$this->data['view'] = 'home/before_login';
		$this->load->view('layout/default', $this->data);
	}

	function login()
	{
		$this->data['title'] = BASE_TITLE.' - Sign In';
		$this->data['description'] = 'Sign in to '.BASE_TITLE.' - The expert of pizza delivery!';
		$this->data['js_dir'] = 'partial/logregjs';
		$this->data['css_dir'] = 'partial/logregcss';
		$this->data['view'] = 'home/login';
		$this->load->view('layout/default', $this->data);
	}

	function registration()
	{
		// register initial time
		$this->data_model->registering_time('register', 'personal info', 0);

		$this->data['title'] = BASE_TITLE.' - Register';
		$this->data['description'] = 'Register as a new customer at '.BASE_TITLE;
		$this->data['js_dir'] = 'partial/logregjs';
		$this->data['css_dir'] = 'partial/logregcss';
		$this->data['view'] = 'home/register';

		$this->data['email'] = $this->session->userdata('email');
		$this->data['fname'] = $this->session->userdata('fname');
		$this->data['lname'] = $this->session->userdata('lname');

		$this->load->view('layout/default', $this->data);
	}

	function deltake()
	{
		$preOrder = $this->session->userdata('order0');
		// register initial time
		$this->data_model->registering_time('begin order', 'select order details', 0);

		$this->data['title'] = BASE_TITLE.' - Order Method';
		$this->data['description'] = 'Select the order method between delivery and take away';
		$this->data['js_dir'] = 'partial/deltakejs';
		$this->data['css_dir'] = 'partial/deltakecss';
		$this->data['view'] = 'misc/delivery_takeaway';

		$this->data['delDate'] = $this->data_model->delivery_date();
		$this->data['delTime'] = $this->data_model->delivery_time();

		$this->data['addresses'] = $this->data_model->get_address_data();
		$this->data['contact'] = $this->session->userdata('contact');
		if ( ! empty($preOrder)) $this->data['btn_order'] = 'Checkout';
		else $this->data['btn_order'] = 'Begin Ordering';

		$this->load->view('layout/default', $this->data);
	}

	function select_menu()
	{
		if ($this->session->userdata('username') == '')
			redirect('signin');
		$this->data['title'] = "Domino's Pizza - Select Menu";
		$this->data['description'] = "Select Your Menu";
		$this->data['js_dir'] = 'partial/homejs';
		$this->data['css_dir'] = 'partial/homecss';
		$this->data['view'] = 'home/after_login';
		$this->load->view('layout/default', $this->data);
	}

	function my_cart()
	{
		$this->data['delDate'] = $this->data_model->delivery_date();
		$this->data['delTime'] = $this->data_model->delivery_time();

		$this->data['add_on'] = FALSE;
		$this->data['order'] = $this->data_model->get_orders();
		$this->data['cart'] = $this->data_model->retrieve_cart();
		$this->data['calculated'] = $this->session->userdata('calculated');
		$this->data['popper'] = $this->session->userdata('popper');
		/*echo $this->data['popper'];
		exit;*/

		$this->data['title'] = BASE_TITLE.' - My Cart';
		$this->data['description'] = 'Confirm the order and make payment';
		$this->data['js_dir'] = 'partial/cartjs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'misc/my_cart';
		$this->load->view('layout/cart', $this->data);
	}

	function confirmation()
	{
		if ($this->session->userdata('username') == '')
			redirect('signin');

		$this->data['delDate'] = $this->data_model->delivery_date();
		$this->data['delTime'] = $this->data_model->delivery_time();
		$this->data['order'] = $this->data_model->get_orders();

		$this->data['title'] = BASE_TITLE.' - Order Confirmation';
		$this->data['description'] = 'Confirm the order and make payment';
		$this->data['js_dir'] = 'partial/confjs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'misc/confirmation';
		$this->load->view('layout/cart', $this->data);
	}

	function gps_tracker()
	{
		if ($this->session->userdata('username') == '')
			redirect('signin');

		$this->data['title'] = BASE_TITLE.' - GPS Tracker';
		$this->data['description'] = 'Track your pizza now!';
		$this->data['js_dir'] = 'partial/trackerjs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'misc/gps_tracker';
		$this->load->view('layout/tracker', $this->data);
	}

	function stores()
	{
		$this->data['title'] = BASE_TITLE.' - Store location';
		$this->data['description'] = "Find your nearest Domino's Store";
		$this->load->view('dominos/stores', $this->data);
	}

	function profile()
	{
		$basicData = $this->data_model->get_basic_data();
		foreach ($basicData as $key => $value):
			$this->data[$key] = $value;
		endforeach;
		$this->data['addresses'] = $this->data_model->get_address_data();
		$this->data['title'] =  BASE_TITLE.' - User Profile';
		$this->data['description'] =  'User profile update';
		$this->load->view('home/profile_view', $this->data);
	}

}

/* End of file dominos.php */
/* Location: ./application/controller/dominos.php */
/* By: Taufan Arsyad */

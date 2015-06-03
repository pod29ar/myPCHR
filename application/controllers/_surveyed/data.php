<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->lang->load('myform');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['cartprice'] = $this->session->userdata('cartprice');
	}

	function registration()
	{
		/*
		$formConfig = array(
			array('field' => 'user',        'label' => 'lang:username',    'rules' => BASIC_RULES.'|alpha_numeric'),
			array('field' => 'email',       'label' => 'lang:email',       'rules' => BASIC_RULES.'|valid_email'),
			array('field' => 'password',    'label' => 'lang:password',    'rules' => BASIC_RULES),
			array('field' => 'passconf',    'label' => 'lang:passconf',    'rules' => BASIC_RULES.'|matches[password]'),
			array('field' => 'fName',       'label' => 'lang:firstname',   'rules' => BASIC_RULES.'|alpha'),
			array('field' => 'lName',       'label' => 'lang:lastname',    'rules' => BASIC_RULES.'|alpha'),
			array('field' => 'mobile',      'label' => 'lang:contact',     'rules' => BASIC_RULES),
			array('field' => 'home',        'label' => 'lang:contact',     'rules' => 'trim|xss_clean'),
			array('field' => 'office',      'label' => 'lang:contact',     'rules' => 'trim|xss_clean'),
			array('field' => 'addrNick',    'label' => 'lang:addrnick',    'rules' => BASIC_RULES),
			array('field' => 'addrState',   'label' => 'lang:addrstate',   'rules' => BASIC_RULES),
			array('field' => 'addrCity',    'label' => 'lang:addrcity',    'rules' => BASIC_RULES),
			array('field' => 'postcode',    'label' => 'lang:postcode',    'rules' => BASIC_RULES.'|integer'),
			array('field' => 'suburb',      'label' => 'lang:suburb',      'rules' => BASIC_RULES),
			array('field' => 'addrStreet',  'label' => 'lang:addrstreet',  'rules' => BASIC_RULES),
			array('field' => 'addrComplex', 'label' => 'lang:addrcomplex', 'rules' => 'trim|xss_clean'),
			array('field' => 'addrType',    'label' => 'lang:addrtype',    'rules' => BASIC_RULES),
			array('field' => 'addrBuild',   'label' => 'lang:addrbuild',   'rules' => BASIC_RULES),
			array('field' => 'addrBlock',   'label' => 'lang:addrblock',   'rules' => 'trim|xss_clean')
			);
		$this->form_validation->set_rules($formConfig);
		if ($this->form_validation->run()):
		*/
			// $this->data_model->registering($this->input->post());
			$this->data_model->registering('');
			$this->data_model->registering_time('register', 'address info', 1);
			redirect('begin-order');
		/*
		else:
			$this->data['title'] = BASE_TITLE.' - Register';
			$this->data['description'] = 'Register as a new customer at '.BASE_TITLE;
			$this->data['js_dir'] = 'partial/logregjs';
			$this->data['css_dir'] = 'partial/logregcss';
			$this->data['view'] = 'home/register';

			$this->data['email'] = $this->session->userdata('email');
			$this->data['fname'] = $this->session->userdata('fname');
			$this->data['lname'] = $this->session->userdata('lname');

			$this->load->view('layout/default', $this->data);
		endif;
		*/
	}

	function reg_facebook()
	{
		$this->data['title'] = BASE_TITLE.' - Register';
		$this->data['description'] = 'Register as a new customer at '.BASE_TITLE;
		$this->data['js_dir'] = 'partial/logregjs';
		$this->data['css_dir'] = 'partial/logregcss';
		$this->data['view'] = 'home/register';

		$this->data['email'] = $this->session->userdata('email');
		$this->data['fname'] = $this->session->userdata('fname');
		$this->data['lname'] = $this->session->userdata('lname');

		$this->data['fbData'] = array(
			'anonymous',
			'anon@test.com',
			'John',
			'Smith'
			);

		$this->load->view('layout/default', $this->data);
	}

	function login()
	{
		/*
		$formConfig = array(
			array('field' => 'name', 'label' => 'lang:username', 'rules' => BASIC_RULES.'|alpha_numeric'),
			array('field' => 'pass', 'label' => 'lang:password', 'rules' => BASIC_RULES)
			);
		$this->form_validation->set_rules($formConfig);
		if ($this->form_validation->run()):
		*/
			$name = 'johnsmith'; // $this->input->post('name');
			$pass = 'pass1234';  // $this->input->post('pass');
			$this->data_model->logging_in($name, $pass);
			redirect('begin-order');
		/*
		else:
			$this->data['title'] = BASE_TITLE.' - Sign In';
			$this->data['description'] = 'Sign in to '.BASE_TITLE.' - The expert of pizza delivery!';
			$this->data['js_dir'] = 'partial/logregjs';
			$this->data['css_dir'] = 'partial/logregcss';
			$this->data['view'] = 'home/login';
			$this->load->view('layout/default', $this->data);
		endif;
		*/
	}

	function delivery_take()
	{
		$preOrder = $this->session->userdata('order0');
		$formConfig = array(
			array('field' => 'addrNick',  'label' => 'lang:addrnick',  'rules' => BASIC_RULES),
			array('field' => 'orderTime', 'label' => 'lang:ordertime', 'rules' => BASIC_RULES),
			array('field' => 'orderDate', 'label' => 'lang:orderdate', 'rules' => BASIC_RULES)
			);
		$this->form_validation->set_rules($formConfig);
		if ($this->form_validation->run()):
			$this->data_model->selecting_address($this->input->post());
			$this->data_model->registering_time('begin order', 'select order details', 1);
			if ( ! empty($preOrder)):
				redirect('confirmation');
			else:
				switch ($this->session->userdata('opted')) {
					case 'modular':
						redirect('menu');
						break;

					case 'longform':
						redirect('longform');
						break;
					
					default:
						redirect('menu');
						break;
				}
			endif;
		else:
			$this->data['title'] = BASE_TITLE.' - Order Method';
			$this->data['description'] = 'Select the order method between delivery and take away';
			$this->data['js_dir'] = 'partial/deltakejs';
			$this->data['css_dir'] = 'partial/deltakecss';
			$this->data['view'] = 'misc/delivery_takeaway';

			$this->data['delDate'] = $this->data_model->delivery_date();
			$this->data['delTime'] = $this->data_model->delivery_time();

			$this->data['addresses'] = $this->data_model->get_address_data();
			$this->data['contact'] = $this->session->userdata('contact');
			$this->data['preOrder'] = $this->session->userdata('order0');
			if ( ! empty($preOrder)) $this->data['btn_order'] = 'Checkout';
			else $this->data['btn_order'] = 'Begin Ordering';

			$this->load->view('layout/default', $this->data);
		endif;
	}

	function order_destroyer()
	{
		$resp = $this->data_model->destroying_order();
		echo json_encode($resp);
	}

	function get_user_address()
	{
		$resp = array('status' => 'error',
			'message' => 'Address ID is empty');
		$this->form_validation->set_rules('id', 'address id', BASIC_RULES);
		if ($this->form_validation->run()):
			$id = $this->input->post('id');
			$resp = $this->data_model->get_particular_address($id);
		endif;
		echo json_encode($resp);
	}

	// new controllers
	function load_menu($type, $size, $desc)
	{
		$this->data['opted'] = $this->session->userdata('opted');
		$this->data['menu'] = $this->data_model->loading_menu($type, $size, $desc);
		$this->data['topping'] = $this->data_model->loading_menu('topping', 'all', 'all'); // type, size, desc
		$this->data['page_menu_active'] = $type;
		$this->data['add_on'] = FALSE;
		$this->data['lightbox'] = FALSE;
		$this->load->view('menu/menu_view', $this->data);
	}

	function load_item()
	{
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$result = $this->data_model->loading_item($name, $type);
		echo json_encode($result);
	}

	function load_crust()
	{
		$size = $this->input->post('size');
		if ( ! empty($size))
			$result = $this->data_model->loading_menu('crust', $size, 'all');
		else
			$result = '';
		echo json_encode($result);
	}

	function load_pizza()
	{
		$this->data['opted'] = $this->session->userdata('opted');
		$this->data['page_menu_active'] = 'pizza';
		$this->data['menu'] = $this->data_model->loading_pizza();
		$this->data['topping'] = $this->data_model->loading_menu('topping', 'all', 'all'); // type, size, desc
		$this->data['add_on'] = FALSE;
		$this->data['lightbox'] = TRUE;
		$this->load->view('partial/_pizza_menu', $this->data);
	}

	function ordered()
	{
		$this->form_validation->set_rules('orders', 'orders json', BASIC_RULES)
			->set_rules('flag', 'orders json', BASIC_RULES);
		if ($this->form_validation->run()):
			$orders = $this->input->post('orders');
			$flag = $this->input->post('flag');
			$resp = $this->data_model->store_orders($orders, $flag);
			$this->data_model->registering_time('meal', 'select deal', 1);
		else:
			$resp = array('message' => 'error!');
		endif;
		echo json_encode($resp);
	}

	function signout()
	{
		$opted = $this->session->userdata('opted');
		$this->data_model->signing_out();
		redirect(base_url($opted), 'refresh');
	}

	function destroyer()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	function check_user()
	{
		$rules = array(
			array( 'field' => 'code', 'label' => 'User Code',            'rules' => 'trim|required|xss_clean' ),
			array( 'field' => 'tnc',  'label' => 'Terms and Conditions', 'rules' => 'required' ),
			);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()):
			$code = $this->input->post('code');
			$check = $this->data_model->checking_user($code);
			if ($check == TRUE)
				redirect(base_url('survey/survey_one'), 'refresh');
			else
				redirect(base_url('survey'), 'refresh');
		else:
			$this->data['title'] = "Domino's Pizza - Pizza Delivery Expert";
			$this->data['description'] = "Pizza Delivery Expert";
			$this->data['js_dir'] = 'partial/nonejs';
			$this->data['css_dir'] = 'partial/nonecss';
			$this->data['view'] = 'misc/survey_nil';
			$this->load->view('layout/surveys', $this->data);
		endif;
	}

	function survey_option($option = '')
	{
		$unset = array(
			'username' => '',
			'email'    => '',
			'password' => '',
			'fname'    => '',
			'lname'    => ''
			);
		$this->session->unset_userdata($unset);
		$this->session->set_userdata(array('opted' => $option));
		if ($option == 'modular')
			redirect(base_url('modular'), 'refresh');
		elseif ($option == 'longform')
			redirect(base_url('longform'), 'refresh');
	}

	function register_time()
	{
		$response = array('status' => 'error!');
		$rules = array(
			array('field' => 'page', 'label' => 'Page Slug',      'rules' => BASIC_RULES),
			array('field' => 'step', 'label' => 'Step Name',      'rules' => BASIC_RULES),
			array('field' => 'flag', 'label' => 'Start/End Flag', 'rules' => BASIC_RULES),
			);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()):
			$page = $this->input->post('page');
			$step = $this->input->post('step');
			$flag = $this->input->post('flag');
			$response = $this->data_model->registering_time($page, $step, $flag);
		endif;
		return $response;
	}

	function remove_item()
	{
		$response = array('status' => 'error');
		$rules = array(
			array('field' => 'trip', 'label' => 'order number', 'rules' => BASIC_RULES),
			);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()):
			$trip     = $this->input->post('trip');
			$response = $this->data_model->removing_item($trip);
		endif;
		echo json_encode($response);
	}

	function popped()
	{
		if ( $this->session->userdata('popper') == null OR
			$this->session->userdata('popper') == '' OR
			$this->session->userdata('popper') == '0')
			$this->session->set_userdata(array('popper' => 1));
		echo json_encode(array('status' => $this->session->userdata('popper')));
	}

}

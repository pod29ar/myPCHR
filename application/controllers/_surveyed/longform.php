<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Longform extends CI_Controller {

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
		$this->data['title'] = "Domino's Pizza - Pizza Delivery Expert";
		$this->data['description'] = "Pizza Delivery Expert";
		$this->data['js_dir'] = 'partial/longjs';
		$this->data['css_dir'] = 'partial/longcss';
		$this->data['view'] = 'home/after_login_long';

		$this->data['meal'] = $this->data_model->loading_menu('meal', 'all', 'all');
		$this->data['order'] = $this->data_model->get_orders();

		$this->data['page_menu_active'] = 'pizza';
		$this->data['alacarte_title'] = 'ABOUT OUR PIZZA';
		$this->data['menu'] = $this->data_model->loading_menu('pizza', 'all', 'all'); // type, size, desc
		$this->data['topping'] = $this->data_model->loading_menu('topping', 'all', 'all'); // type, size, desc
		$this->data['page_menu'] = array(
			array(
				'name' => 'PIZZA',
				'url' => 'menu/alacarte/pizza'
				),
			array(
				'name' => 'SIDE ORDER',
				'url' => 'menu/alacarte/side_order'
				),
			array(
				'name' => 'BEVERAGE',
				'url' => 'menu/alacarte/beverage'
				),
			array(
				'name' => 'CONDIMENT',
				'url' => 'menu/alacarte/condiment'
				)
			);
		$this->data['add_on'] = FALSE;
		$this->data['lightbox'] = FALSE;

		$this->load->view('layout/longform', $this->data);
	}

}
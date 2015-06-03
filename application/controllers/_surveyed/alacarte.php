<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alacarte extends CI_Controller {

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
		// if ($this->session->userdata('username') == '')
		// 	redirect('signin');
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
	}

	function index($item = '')
	{
		$this->data['title'] = BASE_TITLE.' - A La Carte Order';
		$this->data['description'] = 'Order by A La Carte, choose your pizza, sides, and beverages';
		$this->data['js_dir'] = 'partial/alacartejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'menu/alacartes';
		$this->data['alacarte_title'] = 'ABOUT OUR PIZZA';

		$this->data['page_menu_active'] = 'pizza';
		$this->data['menu'] = $this->data_model->loading_menu('pizza', 'all', 'all'); // type, size, desc
		$this->data['topping'] = $this->data_model->loading_menu('topping', 'all', 'all'); // type, size, desc

		$this->data['item'] = rawurldecode($item);

		$this->load->view('layout/default', $this->data);
	}

	function load_menu()
	{
		$this->form_validation->set_rules('menu', 'menu selected', BASIC_RULES);
		if ($this->form_validation->run()):
			$menu = strtolower($this->input->post('menu'));
			$page_menu_active = $menu;

			$this->data['page_menu_active'] = $menu;
			$this->data['menu'] = $this->data_model->loading_menu($menu, 'all', 'all'); // type, size, desc
			$this->data['topping'] = $this->data_model->loading_menu('topping', 'all', 'all'); // type, size, desc
			
			$this->load->view('menu/menu_view', $this->data);
		else:
			$resp = array(
				'status' => 'failed',
				'message' => 'provided input is invalid'
				);
			echo json_encode($resp);
		endif;
	}

	function side_order($item = '')
	{
		$this->data['title'] = BASE_TITLE.' - Side Orders';
		$this->data['description'] = 'Select your sides to complete the pizza';	
		$this->data['js_dir'] = 'partial/alacartejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'menu/alacartes';
		$this->data['alacarte_title'] = 'SIDE ORDER';
		
		$this->data['page_menu_active'] = 'side';
		$this->data['menu'] = $this->data_model->loading_menu('side', 'all', 'all'); // type, size, desc

		$this->data['item'] = rawurldecode($item);

		$this->load->view('layout/default', $this->data);
	}

	function beverage($item = '')
	{
		$this->data['title'] = BASE_TITLE.' - Beverages';
		$this->data['description'] = 'Add beverages for the perfect meal of the day';
		$this->data['js_dir'] = 'partial/alacartejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'menu/alacartes';
		$this->data['alacarte_title'] = 'BEVERAGE';
		
		$this->data['page_menu_active'] = 'beverage';
		$this->data['menu'] = $this->data_model->loading_menu('beverage', 'all', 'all'); // type, size, desc

		$this->data['item'] = rawurldecode($item);

		$this->load->view('layout/default', $this->data);
	}

	function condiment($item = '')
	{
		$this->data['title'] = BASE_TITLE.' - Condiment';
		$this->data['description'] = 'Add condiment for the perfect meal of the day';
		$this->data['js_dir'] = 'partial/alacartejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'menu/alacartes';
		$this->data['alacarte_title'] = 'CONDIMENT';
		
		$this->data['page_menu_active'] = 'condiment';
		$this->data['menu'] = $this->data_model->loading_menu('condiment', 'all', 'all'); // type, size, desc

		$this->data['item'] = rawurldecode($item);

		$this->load->view('layout/default', $this->data);
	}

	/*function order_confirmation()
	{
		$this->data['title'] = BASE_TITLE.' - Order Confirmation';
		$this->data['description'] = 'Confirm the order and make payment';
		$this->load->view('menu/order_confirmation', $this->data);
	}*/

}

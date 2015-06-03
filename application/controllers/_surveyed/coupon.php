<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon extends CI_Controller {

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

		$this->data['page_menu'] = array(
			array(
				'name' => 'COUPONS',
				'url' => 'menu/coupon/'
				),
			array(
				'name' => 'EXPRESS CARD',
				'url' => 'menu/express_card'
				)
			);
		$this->data['add_on'] = FALSE;
	}

	function index()
	{
		$this->data['title'] = BASE_TITLE;
		$this->data['description'] = BASE_TITLE.' - The expert of pizza delivery!';
		$this->data['js_dir'] = 'partial/couponjs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'menu/coupon';

		$this->data['active_view'] = 'coupon_enter';
		$this->data['coupon_title'] = 'COUPONS';
		$this->data['page_menu_active'] = 'coupons';
		$this->load->view('layout/default', $this->data);
	}

	function get_coupon()
	{
		$this->form_validation->set_rules('code', 'required');
		if ($this->form_validation->run()):
			$this->data['title'] = BASE_TITLE;
			$this->data['description'] = BASE_TITLE.' - The expert of pizza delivery!';
			$this->data['js_dir'] = 'partial/couponjs';
			$this->data['css_dir'] = 'partial/nonecss';
			$this->data['view'] = 'menu/coupon';

			$this->data['active_view'] = 'coupon_value';
			$this->data['coupon_title'] = 'COUPONS';
			$this->data['page_menu_active'] = 'coupons';
			$this->load->view('layout/default', $this->data);
		else:
			$this->session->set_flashdata(
				'status',
				'<p class="alert alert-danger alert-dismissable">'.'
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
				'Invalid Coupon</p>'
				);
			redirect('coupon', $this->data);
		endif;
	}

	function express_card()
	{
		$this->form_validation->set_rules('code', 'required');
		if ($this->form_validation->run()):
			$this->data['code'] = $this->input->post('code');
			if ($this->data['code'] != '123456789'):
				$this->session->set_flashdata(
					'status',
					'<p class="alert alert-danger alert-dismissable">'.'
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
					'Invalid Coupon</p>'
					);
			endif;
		endif;
		$this->data['title'] = BASE_TITLE." - Redeem Coupon";
		$this->data['description'] = "Use your Express Card at ".BASE_TITLE.
		" - The expert of pizza delivery!";
		$this->load->view('menu/express_card', $this->data);
	}

}

/*
	End of file coupon.php (controller)
	Location: application/controllers/coupon.php
	By: Bazli
*/

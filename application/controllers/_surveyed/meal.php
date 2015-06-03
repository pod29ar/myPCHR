<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->agent->is_mobile())
			redirect(base_url('notices'), 'refresh');
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['cartprice'] = $this->session->userdata('cartprice');
		$this->load->model('data_model');
		$this->data['opted'] = $this->session->userdata('opted');
	}

	function index($meal = '')
	{
		$this->data['title'] = BASE_TITLE." - Meals";
		$this->data['description'] = BASE_TITLE." - Meal Deal";
		$this->data['js_dir'] = 'partial/mealjs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'menu/meals';

		$this->data['meal'] = $this->data_model->loading_menu('meal', 'all', 'all');
		$this->data['order'] = $this->data_model->get_orders();
		if ( ! empty( $meal ) ):
			$meal = explode('-', $meal);
			$meal = $meal[0] . ' ' . $meal[1];
			$meal = ucwords($meal);
			$this->data['pre_selected'] =  $meal;
		endif;

		$this->load->view('layout/mealset', $this->data);
	}

}

/*
	End of file meal.php (controller)
	Location: application/controllers/meal.php
	Originally by: Bazli
	Revamped by: Taufan
*/

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->agent->is_mobile())
			redirect(base_url('notices'), 'refresh');
		$this->data['title'] = "Domino's Pizza - Pizza Delivery Expert";
		$this->data['description'] = "Pizza Delivery Expert";
	}

	function index()
	{
		if ( $this->session->userdata('ghost') != '' )
			redirect(base_url('scenario-one'), 'refresh');
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'misc/survey_nil';
		$this->load->view('layout/surveys', $this->data);
	}

	// begin questioning
	function survey_one()
	{
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['survey'] = '1';
		$this->data['counter'] = 7;
		$this->data['progress'] = 'P1';
		$this->data['link'] = base_url('scenario-one');
		$this->data['view'] = 'misc/survey_container';
		$this->load->view('layout/surveys', $this->data);
	}

	function hijack_one()
	{
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['link'] = base_url('begin-longform');
		$this->data['view'] = 'misc/survey_scenario';
		$this->data['part'] = '1';
		$this->data['progress'] = 'P2';
		$this->load->view('layout/surveys', $this->data);
	}

	// gps tracker auto redirect here
	function survey_two()
	{
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		// remove data
		$this->data_model->signing_out();
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['survey'] = '3';
		$this->data['counter'] = 46;
		$this->data['progress'] = 'P3';
		$this->data['link'] = base_url('scenario-two');
		$this->data['view'] = 'misc/survey_container';
		$this->load->view('layout/surveys', $this->data);
	}

	function hijack_two()
	{
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['link'] = base_url('begin-modular');
		$this->data['view'] = 'misc/survey_scenario';
		$this->data['part'] = '2';
		$this->data['progress'] = 'P4';
		$this->load->view('layout/surveys', $this->data);
	}

	// gps tracker auto redirect here
	function survey_three()
	{
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		// remove data
		$this->data_model->signing_out();
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['survey'] = '2';
		$this->data['counter'] = 46;
		$this->data['progress'] = 'P5';
		$this->data['link'] = base_url('survey-end');
		$this->data['view'] = 'misc/survey_container';
		$this->load->view('layout/surveys', $this->data);
	}

	// comparing the two designs
	function survey_four()
	{
		if ( $this->session->userdata('ghost') == '' )
			redirect(base_url(), 'refresh');
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['survey'] = '4';
		$this->data['progress'] = 'P6';
		$this->data['view'] = 'misc/survey_container';
		$this->load->view('layout/surveys', $this->data);
	}

	function crazy_clown()
	{
		echo "a";
		echo "b";
		echo "c";
		echo "d";
	}

}

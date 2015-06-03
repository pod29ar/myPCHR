<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notices extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->data['title'] = 'Survey Warning';
		$this->data['description'] = 'No access from mobile devices';
		$this->data['js_dir'] = 'partial/nonejs';
		$this->data['css_dir'] = 'partial/nonecss';
		$this->data['view'] = 'misc/no_mobile';
		$this->load->view('layout/empty', $this->data);
	}

}

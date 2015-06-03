<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ($this->agent->is_mobile())
            redirect(base_url('notices'), 'refresh');
        $this->data['username'] = 'John';
        $this->data['cartprice'] = '0.0';
        $this->data['order'] = $this->data_model->get_orders();
        // $this->data['opted'] = $this->session->userdata('opted');
    }

    function index()
    {
        $this->data['title'] = "Domino's Pizza - Pizza Delivery Expert";
        $this->data['desc']  = "Pizza Delivery Expert";
        $this->data['page_menu_active'] = 'pizza';
        $this->data['alacarte_title']   = 'OUR PIZZA';

        // old content
        $this->data['order']     = $this->data_model->get_orders();
        $this->data['page_menu'] = array(
            array(
                'name'      => 'PIZZA',
                'url'       => 'menu/alacarte/pizza',
                'add_class' => 'dm-plug'
                ),
            array(
                'name'      => 'SIDE ORDER',
                'url'       => 'menu/alacarte/side_order',
                'add_class' => 'dm-plug'
                ),
            array(
                'name'      => 'BEVERAGE',
                'url'       => 'menu/alacarte/beverage',
                'add_class' => 'dm-plug'
                ),
            array(
                'name'      => 'CONDIMENT',
                'url'       => 'menu/alacarte/condiment',
                'add_class' => 'dm-plug'
                )
            );
        $this->data['add_on'] = FALSE;
        $this->data['lightbox'] = FALSE;

        // new content
        $bigMenu = array(
            'crust' => $this->data_model->loading_menu('crust', 'all','all'), // type, size, desc
            'meals' => $this->data_model->loading_menu('meal', 'all', 'all'),
            'menu'  => array(
                'pizza'     => $this->data_model->loading_menu('pizza',     'all', 'all'),
                'topping'   => $this->data_model->loading_menu('topping',   'all', 'all'),
                'side'      => $this->data_model->loading_menu('side',      'all', 'all'),
                'beverage'  => $this->data_model->loading_menu('beverage',  'all', 'all'),
                'condiment' => $this->data_model->loading_menu('condiment', 'all', 'all'),
                )
            );
        $bigMenu = json_encode($bigMenu);

        // echo '<pre>';
        // print_r($bigMenu);
        // echo '<pre>';
        // exit;

        // views and assets
        $this->data['css']  = array(
            base_url('assets/css/plugs/bookblock.css'),
            base_url('assets/css/dominos.css')
            );
        $this->data['js']   = array(
            base_url('assets/js/plugs/jquery.carouFredSel-6.2.1-packed.js'),
            base_url('assets/js/plugs/jquery.bookblock.min.js'),
            base_url('assets/js/new-prod/landing.js'),
            );
        $this->data['inlinejs'] = "var bigMenu = $bigMenu;";
        $this->data['view'] = 'pages/landing';
        $this->load->view('master', $this->data);
    }

}
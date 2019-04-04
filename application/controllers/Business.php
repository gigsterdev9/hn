<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Business extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('ion_auth');
        $this->load->model('entities_model');
        $this->load->model('products_model');
        $this->load->model('news_model');
        $this->load->model('reviews_model');
        $this->load->library('pagination');
        
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        
        //debug
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {

        $data['businesses'] = $this->entities_model->get_all_biz(0,5);
        if (empty($data['businesses'])) {
            show_404();
        }
        $data['title'] = 'Business';
        $this->load->view('templates/header', $data);
        $this->load->view('business/index', $data);
        $this->load->view('templates/footer');

    }

    public function view($slug = NULL) {

        /*
        $data['visitor'] = $this->visitors_model->get_visitor_by_id($id);
        if (empty($data['visitor'])) {
            show_404();
        }
        $data['visits'] = $this->visits_model->get_visits_by_visitor_id($id);
        $data['tracker'] = $this->tracker_model->get_activities($id, 'visitors');
        
        $this->load->view('templates/header', $data);
        $this->load->view('visitors/view', $data);
        $this->load->view('templates/footer');
        */
        $data['biz'] = $this->entities_model->get_entity_by_slug($slug);
        if (empty($data['biz'])) {
            show_404();
        }
        $data['products'] = $this->products_model->get_prods_by_entity($data['biz']['entity_id']);
        $data['news'] = $this->news_model->get_news_by_entity($data['biz']['entity_id']);
        $data['reviews'] = $this->reviews_model->get_reviews_by_entity($data['biz']['entity_id']);

        //echo '<pre>'; print_r($data); echo '</pre>';

        $this->load->view('templates/header', $data);
        $this->load->view('business/view', $data);
        $this->load->view('templates/footer');

    }


}
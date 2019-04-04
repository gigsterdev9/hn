<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Business extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('ion_auth');
        $this->load->model('entities_model');
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

    public function view($id = NULL) {

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
        

        $this->load->view('templates/header', $data);
        $this->load->view('business/view', $data);
        $this->load->view('templates/footer');

    }


}
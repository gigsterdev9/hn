<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Government extends CI_Controller {
    
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

        $data['agencies'] = $this->entities_model->get_all_agencies(0,5);
        if (empty($data['agencies'])) {
            show_404();
        }
        $data['title'] = 'Government';
        $this->load->view('templates/header', $data);
        $this->load->view('government/index', $data);
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
        $data['agency'] = $this->entities_model->get_entity_by_slug($slug);
        if (empty($data['agency'])) {
            show_404();
        }
        $data['programs'] = $this->products_model->get_prods_by_entity($data['agency']['entity_id']);
        $data['news'] = $this->news_model->get_news_by_entity($data['agency']['entity_id']);
        $data['reviews'] = $this->reviews_model->get_reviews_by_entity($data['agency']['entity_id']);

        //echo '<pre>'; print_r($data); echo '</pre>';

        $this->load->view('templates/header', $data);
        $this->load->view('government/view', $data);
        $this->load->view('templates/footer');

    }

    public function add() {
        /*$allowed_groups = array('admin','encoder');
        if (!$this->ion_auth->in_group($allowed_groups)) {
            show_404();
        }
        */

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'New entry';

        //validation rules
        $this->form_validation->set_rules('entity_name', 'Entity Name', 'required');
        $this->form_validation->set_rules('entity_type', 'Type', 'required');
        //$this->form_validation->set_rules('entity_user', 'Designated User', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('government/add');
            $this->load->view('templates/footer');

        }
        else {
            
            //check entry dupe

            //create slug
            $this->load->helper('url');
            if ($this->input->post('entity_alias') != NULL ) {
                $slug = url_title($this->input->post('entity_alias'), 'dash', TRUE);
            }
            else{
                //entity name cannot be null since it has a required validation rule
                $slug = url_title($this->input->post('entity_name'), 'dash', TRUE);
            }   


            //check slug dupe

            //finalize data
            $data = array(
                'entity_name' => $this->input->post('entity_name'),
                'entity_alias' => $this->input->post('entity_alias'),
                'entity_type' => $this->input->post('entity_type'),
                'entity_slug' => $slug,
                'entity_desc' => $this->input->post('entity_desc'),
                'entity_logo_filename' => $this->input->post('entity_logo_filename'),
                'entity_parent' => $this->input->post('entity_parent'),
                'entity_user' => $this->input->post('entity_user'),
                'entity_exec' => $this->input->post('entity_exec'),
                'entity_hq' => $this->input->post('entity_hq'),
                'entity_website' => $this->input->post('entity_website'),
                'entity_remarks' => $this->input->post('entity_remarks'),
                'trash' => 0
            );

            //execute insert
            $new_agency_id = $this->entities_model->set_entity($data);
            
            //audit trail
            //$this->tracker_model->log_event('visitor_id', $new_visitor_id, 'created', '');
            
            $data['title'] = 'New entry';
            $data['alert_success'] = 'Entry successful.';
            
            $this->load->view('templates/header', $data);
            $this->load->view('government/add');
            $this->load->view('templates/footer');
        }
    }


}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() {
			parent::__construct();
			$this->load->helper('url');
            $this->load->library('ion_auth');
            
            if (!$this->ion_auth->logged_in()) {
                redirect('auth/login');
            }
            
            if ($this->ion_auth->in_group('wwf')) {
                redirect('/photoid');
            }
            
            if ($this->ion_auth->in_group('partner')) {
                redirect('/photoid/latest');
            }
            //$this->output->enable_profiler(TRUE);	
            
    }
		
    public function view($page = 'dashboard') {

        	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
				show_404();
		    }
			
			$this->load->helper('email');
					
		    if ($page == 'dashboard') {

                /* charts section *
                /* age grouping *
                $data['below_18'] = $this->visitors_model->filter_visitors(0, 0, 'age', '18', 'below');
                $data['a19_25'] = $this->visitors_model->filter_visitors(0, 0, 'age', '19 and 25', 'between');
                $data['a26_35'] = $this->visitors_model->filter_visitors(0, 0, 'age', '26 and 35', 'between');
                $data['a36_50'] = $this->visitors_model->filter_visitors(0, 0, 'age', '36 and 50', 'between');
                $data['above_50'] = $this->visitors_model->filter_visitors(0, 0, 'age', '50', 'above');
                //echo '<pre>'; print_r($data); echo '</pre>';

                /* local/foreign *
                $data['local_visitors'] = $this->visitors_model->search_visitors(0, 0, 'nationality = "Filipino"');
                $data['foreign_visitors'] = $this->visitors_model->search_visitors(0, 0, 'nationality != "Filipino"');

                /* visitors per month *
                $data['v_jan'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 1 and year(visit_date) = year(curdate())"));
                $data['v_feb'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 2 and year(visit_date) = year(curdate())"));
                $data['v_mar'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 3 and year(visit_date) = year(curdate())"));
                $data['v_apr'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 4 and year(visit_date) = year(curdate())"));
                $data['v_may'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 5 and year(visit_date) = year(curdate())"));
                $data['v_jun'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 6 and year(visit_date) = year(curdate())"));
                $data['v_jul'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 7 and year(visit_date) = year(curdate())"));
                $data['v_aug'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 8 and year(visit_date) = year(curdate())"));
                $data['v_sep'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 9 and year(visit_date) = year(curdate())"));
                $data['v_oct'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 10 and year(visit_date) = year(curdate())"));
                $data['v_nov'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 11 and year(visit_date) = year(curdate())"));
                $data['v_dec'] = count($this->visits_model->search_visits(0, 0, "month(visit_date) = 12 and year(visit_date) = year(curdate())"));

                /* revenue per month */
                

                /* summaries section *
                /* today *
                $data['today']['total_visits'] = $this->visits_model->search_visits(0, 0, "visit_date = curdate()");

                /* this week *
                $data['week']['total_visits'] = $this->visits_model->search_visits(0, 0, "week(visit_date) = week(curdate()) and year(visit_date) = year(curdate())");

                /* this month *
                $data['month']['total_visits'] = $this->visits_model->search_visits(0, 0, "month(visit_date) = month(curdate()) and year(visit_date) = year(curdate())");

                /* this year *
                $data['year']['total_visits'] = $this->visits_model->search_visits(0, 0, "year(visit_date) = year(curdate())");

                /* ws photoid season data *
                $data['ws_pid'] = $this->photoid_model->get_most_recent_report();
                //echo '<pre>'; print_r($data['ws_pid']); echo '</pre>';

                /* figures section *
                $data['total_visitors'] =  $this->visitors_model->record_count();
                $data['total_visits'] =  $this->visits_model->record_count();

                /* updates section *
                $data['latest_visitors'] = $this->visitors_model->get_visitors(9, 0, 'DESC');
                $data['recent_visits'] = $this->visits_model->get_visits(9, 0, 'DESC');

                /* new partner entries notice *
                $data['partner_entries'] = $this->visitors_model->partner_entries_count();
                
                */
            }
            
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);

		    
		    //$this->output->enable_profiler(TRUE);
    }
        
        
}

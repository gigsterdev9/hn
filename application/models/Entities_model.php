<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class entities_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('entities');
    }

    public function get_all_agencies($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('entities');
		$this->db->where('entity_type = 0 and trash = 0');
		$this->db->order_by('entity_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_all_biz($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('entities');
		$this->db->where('entity_type = 1 and trash = 0');
		$this->db->order_by('entity_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_all_ind($limit = 0, $start = 0) {
		
		$this->db->select("*");
		$this->db->from('entities');
		$this->db->where('entity_type = 2 and trash = 0');
		$this->db->order_by('entity_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }

	public function get_entity_by_id($id = FALSE, $include_trashed = TRUE) {
		if ($id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('entities');
		if ($include_trashed === TRUE) {
			$this->db->where("entity_id = '$id'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("entity_id = '$id' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
    
    public function get_entity_by_slug($slug = FALSE, $include_trashed = TRUE) {
		if ($slug === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('entities');
		if ($include_trashed === TRUE) {
			$this->db->where("entity_slug = '$slug'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("entity_slug = '$slug' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}

	public function set_entity($data = NULL) { //new entry
        echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'entity_name' => $this->input->post('entity_name'),
                    'entity_alias' => $this->input->post('entity_alias'),
                    'entity_type' => $this->input->post('entity_type'),
                    'entity_slug' => $this->input->post('entity_slug'),
                    'entity_desc' => $this->input->post('entity_desc'),
                    'entity_user' => $this->input->post('entity_user'),
                    'trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('entities', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	public function update_entity($id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($id == NULL) {
            $id = $this->input->post('entity_id');
        }
        
        if ($data == NULL) {
            $data = array(
                'entity_name' => $this->input->post('entity_name'),
                'entity_alias' => $this->input->post('entity_alias'),
                'entity_type' => $this->input->post('entity_type'),
                'entity_slug' => $this->input->post('entity_slug'),
                'entity_desc' => $this->input->post('entity_desc'),
                'entity_user' => $this->input->post('entity_user'),
                'trash' => $this->input->post('trash')
            );
        }
		
		$this->db->where('entity_id', $id);
		$this->db->update('entities', $data);
		
		return;
	}

}

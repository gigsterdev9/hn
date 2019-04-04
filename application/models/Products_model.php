<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class products_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('entity_products');
    }

    public function get_prods_by_entity($entity_id = FALSE, $limit = 0, $start = 0) {
        if ($entity_id === FALSE) {
			return 0;
        }
        //echo $entity_id; die();

		$this->db->select("*");
		$this->db->from('entity_products');
		$this->db->where("entity_id = '$entity_id' and trash = 0");
		$this->db->order_by('prod_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_prod_by_id($prod_id = FALSE, $include_trashed = TRUE) {
		if ($prod_id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('entity_products');
		if ($include_trashed === TRUE) {
			$this->db->where("prod_id = '$prod_id'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("prod_id = '$prod_id' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
    
    public function get_prod_by_slug($slug = FALSE, $include_trashed = TRUE) {
		if ($slug === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('entity_products');
		if ($include_trashed === TRUE) {
			$this->db->where("prod_slug = '$slug'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("prod_slug = '$slug' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}

	public function set_prod($data = NULL) { //new entry
        echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'entity_id' => $this->input->post('entity_name'),
                    'prod_name' => $this->input->post('entity_alias'),
                    'prod_alias' => $this->input->post('entity_type'),
                    'prod_desc' => $this->input->post('entity_slug'),
                    'date_created' => $this->input->post('entity_desc'),
                    'prod_slug' => $this->input->post('entity_user'),
                    'prod_remarks' => $this->input->post('prod_remarks'),
                    'trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('entity_products', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	public function update_prod($prod_id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($prod_id == NULL) {
            $prod_id = $this->input->post('prod_id');
        }
        
        if ($data == NULL) {
            $data = array(
                    'entity_id' => $this->input->post('entity_name'),
                    'prod_name' => $this->input->post('entity_alias'),
                    'prod_alias' => $this->input->post('entity_type'),
                    'prod_desc' => $this->input->post('entity_slug'),
                    'date_created' => $this->input->post('entity_desc'),
                    'prod_slug' => $this->input->post('entity_user'),
                    'prod_remarks' => $this->input->post('prod_remarks'),
                    'trash' => $this->input->post('trash')
            );
        }
		
		$this->db->where('prod_id', $id);
		$this->db->update('entity_products', $data);
		
		return;
	}

}

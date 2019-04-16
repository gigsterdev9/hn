<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reviews_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('reviews');
    }

    public function get_reviews_by_entity($entity_id = FALSE, $limit = 0, $start = 0) {
        if ($entity_id === FALSE) {
			return 0;
        }
        //echo $entity_id; die();

		$this->db->select("*");
        $this->db->from('reviews as a');
        $this->db->join('users as b', 'b.id = a.reviewer');
		$this->db->where("target = '$entity_id' and trash = 0");
		$this->db->order_by('review_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_review_by_id($review_id = FALSE, $include_trashed = TRUE) {
		if ($review_id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
        $this->db->from('reviews');
        $this->db->join('users as b', 'b.id = a.reviewer');
		if ($include_trashed === TRUE) {
			$this->db->where("review_id = '$review_id'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("review_id = '$review_id' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
    
    public function set_review($data = NULL) { //new entry
        echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'review_type' => $this->input->post('review_type'),
                    'reviewer' => $this->input->post('reviewer'),
                    'target' => $this->input->post('target'),
                    'review_created' => $this->input->post('review_created'),
                    'review_stars' => $this->input->post('review_stars'),
                    'review_comment' => $this->input->post('review_comment'),
                    'trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('reviews', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	public function update_review($review_id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($review_id == NULL) {
            $review_id = $this->input->post('review_id');
        }
        
        if ($data == NULL) {
            $data = array(
                    'review_type' => $this->input->post('review_type'),
                    'reviewer' => $this->input->post('reviewer'),
                    'target' => $this->input->post('target'),
                    'review_created' => $this->input->post('review_created'),
                    'review_stars' => $this->input->post('review_stars'),
                    'review_comment' => $this->input->post('review_comment'),
                    'trash' => $this->input->post('trash')
            );
        }
		
		$this->db->where('review_id', $id);
		$this->db->update('reviews', $data);
		
		return;
	}

}

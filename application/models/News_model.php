<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
        
    public function record_count() {
		$this->db->where('trash = 0');
        return $this->db->count_all_results('entity_news');
    }

    public function get_news_by_entity($entity_id = FALSE, $limit = 0, $start = 0) {
        if ($entity_id === FALSE) {
			return 0;
        }
        //echo $entity_id; die();

		$this->db->select("*");
		$this->db->from('entity_news');
		$this->db->where("entity_id = '$entity_id' and trash = 0");
		$this->db->order_by('news_id', 'ASC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		return $query->result_array();

    }
    
    public function get_news_by_id($news_id = FALSE, $include_trashed = TRUE) {
		if ($news_id === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('entity_news');
		if ($include_trashed === TRUE) {
			$this->db->where("news_id = '$news_id'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("news_id = '$news_id' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}
    
    public function get_news_by_slug($slug = FALSE, $include_trashed = TRUE) {
		if ($slug === FALSE) {
			return 0;
		}
		
		$this->db->select("*");
		$this->db->from('entity_news');
		if ($include_trashed === TRUE) {
			$this->db->where("news_slug = '$slug'"); //omit trash flag = 0 to be able to 'undo' trash action one last time
		}
		else{
			$this->db->where("news_slug = '$slug' and trash = 0"); 
		}
		$query = $this->db->get();		

		return $query->row_array();
	}

	public function set_news($data = NULL) { //new entry
        echo '<pre>'; print_r($_POST); echo '</pre>'; die();
        $this->load->helper('url');
		
		if ($data == NULL) {
			$data = array(
                    'entity_id' => $this->input->post('entity_id'),
                    'news_title' => $this->input->post('news_title'),
                    'news_content' => $this->input->post('news_content'),
                    'publish_date' => $this->input->post('publish_date'),
                    'date_created' => $this->input->post('date_created'),
                    'news_slug' => $this->input->post('news_slug'),
                    'news_remarks' => $this->input->post('news_remarks'),
                    'trash' => 0
			);
		}
		//insert new entry
		$this->db->insert('entity_news', $data);
		$report_id = $this->db->insert_id();
		
		return $report_id;
	}
	
	public function update_news($news_id = NULL, $data = NULL) {
		//echo '<pre>'; print_r($_POST); echo '</pre>'; die();
		$this->load->helper('url');
        
        if ($news_id == NULL) {
            $news_id = $this->input->post('news_id');
        }
        
        if ($data == NULL) {
            $data = array(
                    'entity_id' => $this->input->post('entity_id'),
                    'news_title' => $this->input->post('news_title'),
                    'news_content' => $this->input->post('news_content'),
                    'publish_date' => $this->input->post('publish_date'),
                    'date_created' => $this->input->post('date_created'),
                    'news_slug' => $this->input->post('news_slug'),
                    'news_remarks' => $this->input->post('news_remarks'),
                    'trash' => $this->input->post('trash')
            );
        }
		
		$this->db->where('news_id', $id);
		$this->db->update('entity_news', $data);
		
		return;
	}

}

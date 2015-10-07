<?php
class content extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }	

    public function news_record($category, $language) {
	if($category){
		$this->db->where('category', $category);
	}
	if($language == 'ge'){
		$this->db->where('ena', 1);
	} else {
		$this->db->where('ena', 2);
	}
		$query = $this->db->get("news");
        return $query->num_rows();
    }    

	public function news($category, $language, $limit, $start) {
        $this->db->order_by('id', 'desc');
	    $this->db->limit($limit, $start);
		if($category){
			$this->db->where('category', $category);
		}
		if($language == 'ge'){
			$this->db->where('ena', 1);
		} else {
			$this->db->where('ena', 2);
		}
        $query = $this->db->get("news");
 
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        return false;
   }
   
	public function popNews($language, $limit){
		$this->db->order_by('view', 'desc');
	    $this->db->limit($limit);
		if($language == 'ge'){
			$this->db->where('ena', 1);
		} else {
			$this->db->where('ena', 2);
		}
        $query = $this->db->get("news");
 
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        return false;
   }   
   
	public function newsView($category, $language, $slug){
	    $this->db->limit(1);
		if($language == 'ge'){
			$this->db->where('ena', 1);
		} else {
			$this->db->where('ena', 2);
		}
			$this->db->where('slug', $slug);
			$this->db->where('category', $category);
			$query = $this->db->get("news");
 
        if ($query->num_rows() > 0) {
          $data = array();
		  foreach($query->result() as  $info){
					
					if($language == 'ge'){
					$data[] = $info->sataurige;
					$data[] = $info->agwerage;
				} else {
					$data[] = $info->sataurien;
					$data[] = $info->agweraen;
				}
					$data[] = $info->id;
					$data[] = $info->seotitle;
					$data[] = $info->poster;
					$data[] = $info->slug;
					$data[] = $info->seoKeys;
					$data[] = $info->seoDescr;
					$data[] = $info->category;
					$data[] = $info->view;
		  }
					return $data; 
        }
        return false;
   }
 }
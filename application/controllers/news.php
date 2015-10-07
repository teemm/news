<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class news extends MY_Controller {

          public function index($category = null)
    {	
			$category = intval($category);
			if (!$category){
				$category = 0;
			}
			
	
		$this->data['category'] = $category;
		$language = $this->data['language'];
		$config = array();
        $config["base_url"] = base_url("$language/news/index/$category/");
        $config["total_rows"] = $this->content->news_record($category, $language);
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->data["news"] = $this->content->news($category, $language, $config["per_page"], $page);
        $this->data["links"] = $this->pagination->create_links();
			
		if($category == 1){	$this->data['title'] =  lang('politika').' - '.$this->data['title']; $this->data['description'] .=  ' - '.lang('politika'); }		
		if($category == 2){	$this->data['title'] =  lang('sazogadoeba').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('sazogadoeba'); }		
		if($category == 3){	$this->data['title'] =  lang('kriminali').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('kriminali'); }		
		if($category == 4){	$this->data['title'] =  lang('samxedro').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('samxedro'); }		
		if($category == 5){	$this->data['title'] =  lang('sporti').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('sporti'); }		
		if($category == 6){	$this->data['title'] =  lang('ekonomika').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('ekonomika'); }		
		if($category == 7){	$this->data['title'] =  lang('socmedia').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('socmedia'); }			
		if($category == 8){	$this->data['title'] =  lang('finance').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('finance'); }			
		if($category == 9){	$this->data['title'] =  lang('tech').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('tech'); }		
		if($category == 10){	$this->data['title'] =  lang('moda').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('moda'); }		
		if($category == 11){	$this->data['title'] =  lang('culture').' - '.$this->data['title'];  $this->data['description'] .=  ' - '.lang('culture'); }	
				
			
			
			
			$this->load->view('common/header', $this->data);    	
			$this->load->view('home/left', $this->data);      		
			$this->load->view('home/right', $this->data);      		
			$this->load->view('common/footer');
			
	}
		
          public function view($category = null, $slug = null)
    {	
			
			$category = intval($category);
			$this->data['category'] = $category;
			$language = $this->data['language'];
			$this->data["newsInfo"] = $this->content->newsView($category, $language, $slug);
			if (!$slug || !$category || !$this->data['newsInfo']){
				 show_404();
			}
			
			$this->load->view('common/header', $this->data);    	
			$this->load->view('home/leftNewsView', $this->data);      		
			$this->load->view('home/right', $this->data);      		
			$this->load->view('common/footer');
			
	}
}
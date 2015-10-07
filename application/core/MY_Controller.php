<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class MY_Controller extends CI_Controller {

	

		public $data = array();

	

	public function __construct(){

		

		parent::__construct();		

		
		if(!$this->uri->segment(1)){
			redirect(base_url('ge'));
		}
		
		$this->data['language'] = $language = $this->lang->lang();
		$this->data['popNews'] = $this->content->popNews($this->data['language'], 5);
		
		if($language == 'ge'){
			$this->data['title'] = "ახალი ამბები | axali ambebi";
			$this->data['description'] = "ყველა ახალი ამბავი ერთ საიტზე";
		} else {		
			$this->data['title'] = "news | articles";			
			$this->data['description'] = "All news on one site";
		}
		
		$this->data['keywords'] = "ახალი ამბები, axali ambebi, news, articles, breaking news, latest news, world news, daily news";

	

	}

	

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pages extends MY_Controller {

		public function index(){
			redirect (base_url($this->data['language']));
		}

          public function about()
    {		
			$title = $this->data['title'];
			$this->data['title'] = lang('aboutus').' - '.$title;
			$this->data['description'] = $this->data['description'].' - '.lang('aboutus');
			
			$this->data['category'] = 0;
			$this->load->view('common/header', $this->data);    	
			$this->load->view('about/left', $this->data);      		
			$this->load->view('home/right', $this->data);      		
			$this->load->view('common/footer');
			
	}
	
          public function contact()
    {			
			$title = $this->data['title'];
			$this->data['title'] = lang('contact').' - '.$title;
			$this->data['description'] = $this->data['description'].' - '.$this->data['title'];
			
			$this->data['category'] = 0;
			$this->load->view('common/header', $this->data);    	
			$this->load->view('contact/left', $this->data);      		
			$this->load->view('home/right', $this->data);      		
			$this->load->view('common/footer');
			
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class admin extends CI_Controller {

public function __construct() {
parent:: __construct();

$this->db->from('users');
$this->db->where('level','1');
// $this->db->where('ip',$_SERVER['REMOTE_ADDR']);
$query = $this->db->get(); 
if ($query->num_rows()==0){
redirect(base_url(),'refresh');
exit();
}

}

    function logged_in()
    {
      if ($this->session->userdata('level')==1){
        return true;
	}else {
		$this->load->view('admin/header');
		$this->load->view('admin/login');
		$this->load->view('admin/footer');	
		}
    }

	function index()	
	{
	  if ($this->logged_in())
        {		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/news');
		$this->load->view('admin/footer');	
        }
}	


function checking(){
		if ($this->logged_in()){
			$val = $this->input->post('val');
			$which = $this->input->post('which');
			$id = $this->input->post('id');

			if($id){
				$shemowmeba = mysql_query("select id from news where $which = '$val' and id != '$id' limit 1 ");
			}else {
			$shemowmeba = mysql_query("select id from news where $which = '$val' limit 1 ");
		}
		if(mysql_num_rows($shemowmeba)>0){
					die(json_encode(array(			
						"code" => 0
						)));	
		} else{
					die(json_encode(array(			
						"code" => 1
						)));			
		}


			}
		}
				
	
				function addadmin()
	{
		if ($this->logged_in()){				
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
 
                                $rules = array(
 
                                         
												"name" => array(
                                                                "field" => "name",
                                                                "label" => "name",
                                                                "rules" => "required"
                                                        ),
												"lastname" => array(
                                                                "field" => "lastname",
                                                                "label" => "lastname",
                                                                "rules" => "required"
                                                        ),
                                                "password" => array(
                                                                "field" => "password",
                                                                "label" => "Password",
                                                                "rules" => "required"
                                                        ),
                                                "pass_conf" => array(
                                                                "field" => "pass_conf",
                                                                "label" => "Repeat Password",
                                                                "rules" => "required|matches[password]"
                                                        ),
                                              
                                                "email" => array(
                                                                "field" => "email",
                                                                "label" => "E-Mail Address",
                                                                "rules" => "required|valid_email|callback_email_is_taken"
                                                        )
 
                                        );
										$this->form_validation->set_message('required', 'ველის შევსება აუცილებელია');
										$this->form_validation->set_message('valid_email', 'შეიყვანეთ სწორი მაილი');
                                $this->form_validation->set_rules($rules);
                                                        if( $this->form_validation->run() != true ) {
                                        $this->load->view("admin/adduser"); 
                                } else {
                                       
                                        $form = array();
                                 
                                        $form['name'] = $this->input->post("name");
                                        $form['lastname'] = $this->input->post("lastname");
                                        $form['password'] = md5($this->input->post("password"));
                                        $form['email']    = $this->input->post("email");
                                 
                                        if( self::createUser($form['name'], $form['lastname'], $form['password'], $form['email']) == true) {
                                       
                                       redirect (base_url('ge/admin/admins'));
                                      
                                        } else {
                                                echo "ვერ დარეგისტრირდა!";
                                        }
                                }
				$this->load->view('admin/footer');
				
		}
	}
	
	     function createUser( $name, $lastname, $pass, $email )
                         {		 
						 
                                $query = "
                                        INSERT INTO `users`
                                        (`name`,`lastname`,`password`,`email`,`level`)
                                        VALUES (?,?,?,?,1)
                                ";
 
                                $arg   = array(self::protect($name), self::protect($lastname), self::protect($pass), $email);
                               
                                if( $this->db->query($query, $arg) == true )
                                {
                                        return TRUE; 
                                } else {
                                        return FALSE;
                                }
 
                         }

						 function userdelete()
	{
			if ($this->logged_in()){						 
$this->db->delete('users', array('id' => $this->uri->segment(4) )); 
header('Location: '.base_url().'ge/admin/admins');			
		}
	}

				function editadmin()
	{
		if ($this->logged_in()){
				
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
 
                                $rules = array(
												"name" => array(
                                                                "field" => "name",
                                                                "label" => "name",
                                                                "rules" => "required|max_length[20]|min_length[1]|callback_name_is_taken"
                                                        ),
												"lastname" => array(
                                                                "field" => "lastname",
                                                                "label" => "lastname",
                                                                "rules" => "required|max_length[30]|min_length[2]|callback_lastname_is_taken"
                                                        ),
												"id" => array(
                                                                "field" => "id",
                                                                "label" => "id",
                                                                "rules" => "required"
                                                        ),
                                                "email" => array(
                                                                "field" => "email",
                                                                "label" => "E-Mail Address",
                                                                "rules" => "required|valid_email"
                                                        )
 
                                        );
										$this->form_validation->set_message('required', 'ველის შევსება აუცილებელია');
										$this->form_validation->set_message('valid_email', 'შეიყვანეთ სწორი მაილი');
										$this->form_validation->set_rules($rules);
                                        if( $this->form_validation->run() != true ) {
										$data['idim']=$this->input->post("id");
										$this->load->view("admin/edituser",$data); 
										
                                } else {
                                       
                                        $form = array();
                                        $form['name'] = $this->input->post("name");
                                        $form['lastname'] = $this->input->post("lastname");
                                        $form['pass'] = $this->input->post("password");
                                        $form['id']    = $this->input->post("id");
                                        $form['email']    = $this->input->post("email");
										
										if ($form['pass']==''){
									$query = $this->db->get_where('users', array("id"=>$form['id']));
									foreach($query->result() as $data)

			                                      {
                                          $password = $data->password; 
										  $form['pass'] = $password;
										  }
											} else {	$form['pass']=md5($form['pass']); }										  
                                 
                                        if( self::updateuser($form['name'], $form['lastname'], $form['pass'], $form['email'], $form['id']) == true) {
                                       
                                       redirect (base_url('ge/admin/admins'));
                                      
                                        } else {
                                                echo "ვერ დარეგისტრირდა!";
                                        }
                                }
				$this->load->view('admin/footer');
				
		}
	}


	
	
	     function updateuser($name, $lastname, $pass, $email, $id)
                         {
 $arg   = array( 'name'=>$name, 'lastname'=>$lastname, 'password'=>$pass,  'email'=>$email);
       if( $this->db->update('users', $arg, array ('id' => $id)) == true )
                                {
                                        return TRUE; 
                                } else {
                                        return FALSE;
                                }
                         }
						 
						 
						   function protect( $str ) {
                                return mysql_real_escape_string($str);
                        }


function news()	
	{	
	  if ($this->logged_in())
        {		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/news');
		$this->load->view('admin/footer');	
        }
}	
	
			function addnews()
	{
		if ($this->logged_in()){
				
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
 
                                $rules = array(
 
                                         
												"languageChoose" => array(
                                                                "field" => "languageChoose",
                                                                "label" => "languageChoose",
                                                                "rules" => "required"
                                                        )
											 
                                        );
										$this->form_validation->set_message('required', 'ველის შევსება აუცილებელია');
                                $this->form_validation->set_rules($rules);
                               if( $this->form_validation->run() != true ) {
                                        $this->load->view("admin/addnews"); 
                                } else {
                                       
                                        $form = array();                                 
                                        $form['sataurige'] = $this->input->post("sataurige");					              
                                        $form['agwerage'] = $this->input->post("agwerage");	
                                        $form['sataurien'] = $this->input->post("sataurien");					              
                                        $form['agweraen'] = $this->input->post("agweraen");						              
                                        $form['ena'] = $this->input->post("languageChoose");						              
                                        $form['seoTitle'] = $this->input->post("seoTitle");						              
                                        $form['seoKey'] = $this->input->post("seoKey");						              
                                        $form['seoDescr'] = $this->input->post("seoDescr");						              
                                        $form['newsCategory'] = $this->input->post("newsCategory");						              
                                        $form['poster'] = $this->input->post("poster");						              
                                 
					
								 
								 
								 
								 
								 
                                        if( self::createNews($form['sataurige'], $form['agwerage'], $form['sataurien'], $form['agweraen'], $form['ena'], $form['seoTitle'], $form['seoKey'], $form['seoDescr'], $form['newsCategory'], $form['poster']) == true) {
                       
					   redirect (base_url('ge/admin/news'));
                                      
                                        } else {
                                                echo "ვერ!";
                                        }
                                }
				$this->load->view('admin/footer');
				
		}
	}
	
	
		   function createNews( $sataurige, $agwerage, $sataurien, $agweraen, $ena, $seotitle, $seokey, $seodescr, $category, $poster )
                         {
						 
						 $posters = '';
						 if($poster){
							$count = count($poster);
							for($i=0; $i<$count; $i++){
								$posters .= $poster[$i].',';
							}
						 }
						 
						 $userid = $this->session->userdata('userid');
                                $query = "
                                        INSERT INTO `news`
                                        (`sataurige`,`agwerage`,`sataurien`,`agweraen`,`ena`,`seotitle`,`seoKeys`,`seoDescr`,`userid`,`date`,`category`,`slug`,`poster`)
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
                                ";
		if($ena == 1){
			$slug = $sataurige;
		} else {
			$slug = $sataurien;
		}
		$slug = mine_url($slug);
		$slug = self::create_unique_slug($slug, 'news');
								
                                $arg = array($sataurige, $agwerage, $sataurien, $agweraen, $ena, $seotitle, $seokey, $seodescr, $userid, date('d/m/Y'), $category, $slug, $posters );
                               
                                if( $this->db->query($query, $arg) == true )
                                {
                                        return TRUE; 
                                } else {
                                        return FALSE;
                                }
 
                         }
	
				function newsdel($id)
	{
			if ($this->logged_in()){						 
		
			$gamotana = mysql_query("select poster from news where id = '$id' ");
			$mysql_poster = mysql_fetch_row($gamotana);
			if($mysql_poster[0]){
					$big= explode('.',$mysql_poster[0]);
					$big = $big[0].'_FULLSIZE.'.$big[1];
					@unlink('pictures/'.$mysql_poster[0]);
					@unlink('pictures/'.$big);
			}
			
				$this->db->delete('news', array('id' => $id )); 
				header('Location: '.base_url().'ge/admin/news');			
		}
	}


	
			function login ()
	{   														 $rules = array(

																"email" => array(

                                                                "field" => "email",

                                                                "label" => "Email",

                                                                "rules" => "required|trim"

                                                        ),

                                                "password" => array(

                                                                "field" => "password",

                                                                "label" => "Password",

                                                                "rules" => "required"

                                                        )

                                        );

										$this->form_validation->set_message('required', 'ველის შევსება აუცილებელია');

										

                                $this->form_validation->set_rules($rules);

								

                        if( $this->form_validation->run() != true )

                        {
	   die(json_encode(array(						"code" => 0,
													"text" => "ყველა ველის შევსება სავალდებულოა"
											   )));
                        } else {


                                $input = $this->input->post("email");             

                                $password = md5($this->input->post("password")); 
                                $this->load->helper("email");
								 $sql = "SELECT * FROM `users` WHERE `email` like '%".mysql_real_escape_string(addslashes(strip_tags($input)))."%' ";
                                $sql = $this->db->query($sql) or die(mysql_error());

                                if( $sql->num_rows() > 0 )
                                {

                                        foreach($sql->result() as $data)

                                        {
                                                $chemiid= $data->id;
                                                $db_password = $data->password;
												$db_email    = $data->email;
                                                $name        = $data->name;
                                                $level       = (int)$data->level;
                                        }
                                        if( $password == $db_password )

                                        {

                                                $this->session->set_userdata("logged_in", true);
												$this->session->set_userdata("userid", $chemiid);
												$this->session->set_userdata("email", $db_email);
												$this->session->set_userdata("level", $level);
												$this->session->set_userdata("name", $name);
												$this->session->set_flashdata("notification", "წარმატებული შესვლა $db_email");
											
												   die(json_encode(array(
													"code" => 1,
													"text" => "წარმატებული შესვლა",
													"user" => $db_email
											   )));
												} else {
                                         	   die(json_encode(array(
													"code" => 3,
													"text" => "პაროლი არასწორია"
											   )));
                                        }

                                } else {
         	   die(json_encode(array(
													"code" => 2,
													"text" => "მეილი არასწორია"
											   )));
	}
        }
	}
	
	
	
	
				function newsedit()
	{
		if ($this->logged_in()){
				
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
 
                                $rules = array(
												"id" => array(
                                                                "field" => "id",
                                                                "label" => "id",
                                                                "rules" => "required"
                                                        )
 
                                        );
										$this->form_validation->set_message('required', 'ველის შევსება აუცილებელია');
										$this->form_validation->set_rules($rules);
                                        if( $this->form_validation->run() != true ) {
										$data['idim']=$this->input->post("id");
										$this->load->view("admin/newsedit",$data); 
										
                                } else {
                                       
										$sataurige = $this->input->post("sataurige");					              
                                        $agwerage = $this->input->post("agwerage");	
                                        $sataurien = $this->input->post("sataurien");					              
                                        $agweraen = $this->input->post("agweraen");						              
                                        $ena = $this->input->post("languageChoose");						              
                                        $seoTitle = $this->input->post("seoTitle");						              
                                        $seoKey = $this->input->post("seoKey");						              
                                        $seoDescr = $this->input->post("seoDescr");						              
                                        $newsCategory = $this->input->post("newsCategory");													
                                        $id = $this->input->post("id");							              
                                        $poster = $this->input->post("poster");		

						 $posters = '';
						 if($poster){
							$count = count($poster);
							for($i=0; $i<$count; $i++){
								$posters .= $poster[$i].',';
							}
						 }		
                                 
		$arg   = array( 'sataurige'=>$sataurige, 'sataurien'=>$sataurien, 'agwerage'=>$agwerage, 'agweraen'=>$agweraen, 'seotitle'=>$seoTitle, 'seoKeys'=>$seoKey, 'seoDescr'=>$seoDescr, 'ena'=>$ena, 'category'=>$newsCategory, 'poster'=>$posters );
       if( $this->db->update('news', $arg, array ('id' => $id)) == true )
                                {
                                           redirect (base_url('ge/admin/news'));
                                } else {
                                        echo "ვერ დარეგისტრირდა!";
                                }
								 
                                 
                                }
				$this->load->view('admin/footer');
				
		}
	}


	
	
	
		
	function create_unique_slug($string,$table,$field='slug',$key=NULL,$value=NULL)
{
    $t =& get_instance();
    $slug = url_title($string);
    $slug = mb_strtolower($slug);
    $i = 0;
    $params = array ();
    $params[$field] = $slug;
 
    if($key)$params["$key !="] = $value;
 
    while ($t->db->where($params)->get($table)->num_rows())
    {  
        if (!preg_match ('/-{1}[0-9]+$/', $slug ))
            $slug .= '-' . ++$i;
        else
            $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
         
        $params [$field] = $slug;
    }  
    return $slug;  
}
	
	
	
	
	
		function admins()
	{
		if ($this->logged_in()){
			
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('admin/user');
			$this->load->view('admin/footer');
		}
	}
		
	 function email_is_taken( $input ) {
 
                                $query = "SELECT * FROM `users` WHERE `email` = ?";
                                $arg   = array( $input );
                                $exec  = $this->db->query($query, $arg) or die(mysql_error());
 
                                if( $exec->num_rows() > 0 )
                                {
                                        $this->form_validation->set_message('email_is_taken', ' email-ი <b> '.$input.' </b> დაკავებულია!');
                                        return FALSE;
                                } else {
                                        return TRUE;
                                }
                        }
						
				function logout(){
		                   $unset_sessions = array(
                                                "logged_in" => false,
												"userid" => "",
                                                "email" => "",
                                                "ip" => "",
                                                "level" => 0
                                        );

                                $this->session->unset_userdata($unset_sessions);
                                $this->session->set_flashdata("notification", "გახვედი!");
                                redirect(base_url());
	}
}
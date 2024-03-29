<?php
  class Users extends CI_Controller
  {
      /**
       * Register people.
       **/
      public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('food_model');
	
	
    }
    public function index()
	{
        $data['title'] = 'Home';
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 0 && strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0) {

                $data['new'] = $this->food_model->get_request();

            }
        }

        $this->load->view('templates/header', $data);
		$this->load->view('pages/home.php',$data);
	}
     
      public function login()
      {
          $data['title'] = 'Log In';

          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');

          if ($this->form_validation->run() === false) {
              $this->load->view('templates/header');
              $this->load->view('users/login', $data);
              $this->load->view('templates/footer');
        
          } else {
              // Logged In
              $email = $this->input->post('email');
              $password = md5($this->input->post('password'));

              // Getting user_id
              $user_id = $this->user_model->login($email, $password);

              // User type
              $user_type = $this->user_model->get_user_type($user_id);

              // Vegan or not ?
              $user_vegan = $this->user_model->get_user_vegan($user_id);

              // name
              $name = $this->user_model->get_user_name($user_id);

              $status = $this->user_model->get_status($user_id);

              if ($user_id) {
             $user_data = [
            'user_id'    => $user_id,
            'email'      => $email,
            'logged_in'  => true,
            'user_type'  => $user_type,
            'user_vegan' => $user_vegan,
            'name'       => $name,
            'status'     => $status,
          ];
          
          if($status == 0){
            $this->session->set_flashdata('not_accepted','This admin is not yet accepted');
            redirect('users/login');
        }else{
            $this->session->set_userdata($user_data);
            if($this->session->userdata('user_type')==0 && strcmp($this->session->userdata('email'),'superadmin@gmail.com') != 0){
                redirect('foods/restaurant_menu');
            }
            redirect('foods/index');
        }  
              } else {
                  $this->session->set_flashdata('login_failed', 'Email/Password is wrong.');
                  redirect('users/login');
              }
          }
      }

      /**
       * Logout functionality.
       **/
      public function logout()
      {

      // Unset user data
          $this->session->unset_userdata('logged_in');
          $this->session->unset_userdata('user_id');
          $this->session->unset_userdata('email');
          $this->session->unset_userdata('user_type');
          $this->session->unset_userdata('user_vegan');
          $this->session->unset_userdata('name');
          $this->session->unset_userdata('status');

          redirect(base_url());
      }
      public function register()
      {
          $data['title'] = 'Sign Up';

          // Validation of form
          $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('Birth','Birth','required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

          if ($this->form_validation->run() === false) {
              $this->load->view('templates/header');
              $this->load->view('users/register', $data);
              $this->load->view('templates/footer');
          } else {
              // Password encryption

              $encrypt_password = md5($this->input->post('password'));

              $email = $this->input->post('email');
              $sql_check = $this->db->query("SELECT email FROM users where email='$email'");
              $check = $sql_check->num_rows();
            if($check==0){
              $this->user_model->register($encrypt_password);

              // Flash message
              $this->session->set_flashdata('user_registered', 'Yeah ! You are now registered.');

              redirect('users/login');
            }else{
                $this->session->set_flashdata('double_email', 'Sorry email has already used');

                redirect('users/register');
            }
          }
      }

      public function register_restaurant()
      {
          $data['title'] = 'Sign Up - Restaurant';

          // Form validation
          $this->form_validation->set_rules('name', 'Name', 'required');
          $this->form_validation->set_rules('Birth','Birth','required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
          $this->form_validation->set_rules('cv', 'CV', 'callback_validate_cv');

          if ($this->form_validation->run() === false) {
              $this->load->view('templates/header');
              $this->load->view('users/register_restaurant', $data);
              $this->load->view('templates/footer');
          } else {
              // Password Encryption
              $encrypt_password = md5($this->input->post('password'));

              $email = $this->input->post('email');
              $sql_check = $this->db->query("SELECT email FROM users where email='$email'");
              $check = $sql_check->num_rows();
            if($check==0){

              $this->user_model->register_restaurant($encrypt_password);

              // Flash Message
              $this->session->set_flashdata('user_registered', 'Yeah ! You are now registered.');

              redirect('users/login');
            }else{
                $this->session->set_flashdata('double_email', 'Sorry email has already used');

                redirect('users/register_restaurant');
            }
          }
      }

      public function validate_cv(){
		$config = array(
			'allowed_types'=>'pdf',
			'upload_path'=> 'assets/images'
			);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('cv'))
			{
				$this->form_validation->set_message('validate_cv',$this->upload->display_errors());
				return false;
			} else {
				return true;
			}
    }
    
      public function profile()
      {
        if(strcmp($this->session->userdata('email'),'superadmin@gmail.com') != 0)
        {
        $data['title'] = "Profile's";
        $data['profile'] = $this->user_model->get_username($this->session->userdata('user_id'));

        $this->load->view('templates/header');
        $this->load->view('pages/profile', $data);
        $this->load->view('templates/footer');
      }else{
          redirect(base_url());
      }
    }
      public function profile_u()
      {
        $data['title'] = "Profile's";
        $data['profile'] = $this->user_model->get_username($this->session->userdata('user_id'));

        $this->load->view('templates/header');
        $this->load->view('pages/profile_u', $data);
        $this->load->view('templates/footer');
      }

      public function update_user()
      {
        if($this->session->userdata('user_id')){
            if($this->session->userdata('user_type')==0){
                
        $id   = $_GET['id'];
      
        //Form Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $pass = $this->input->post('pass');

        if($this->form_validation->run() != FALSE && $pass == null){
            $where = array(
                'id' => $this->input->post('id'),
            );        

            if($_FILES['image']['name']!=null){

            $values = array(
                
                'name' => $this->input->post('name'),
           
                'image'   => "assets/images/".$_FILES['image']['name']

            );

            move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);
        }else{
                $values = array(
                  
                    'name' => $this->input->post('name'),
      
                );

            }
    

            $this->user_model->update_user($where,$values);
            redirect('users/profile');
        
        
    }else if($this->form_validation->run() != FALSE && $pass != null)
    {

        $where = array(
            'id' => $this->input->post('id'),
        );        

        if($_FILES['image']['name']!=null){

        $values = array(
            
            'name' => $this->input->post('name'),
            'password' => md5($this->input->post('pass')),
            'image'   => "assets/images/".$_FILES['image']['name']

        );

        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);
    }else{
            $values = array(
              
                'name' => $this->input->post('name'),
                'password' => md5($this->input->post('pass'))
  
            );

        }


        $this->user_model->update_user($where,$values);
        redirect('users/profile');

    }
            $this->load->view('templates/header');
            $this->load->view('pages/profile', $data);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url());
        }

        }else{
            redirect(base_url());
        }

    }
    
    public function update_user_u()
    {
        if($this->session->userdata('user_id')){
            if($this->session->userdata('user_type')==1){
                
        $id   = $_GET['id'];
      
        //Form Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $pass = $this->input->post('pass');

        if($this->form_validation->run() != FALSE && $pass == null){
            $where = array(
                'id' => $this->input->post('id'),
            );        

            if($_FILES['image']['name']!=null){

            $values = array(
                
                'name' => $this->input->post('name'),
           
                'image'   => "assets/images/".$_FILES['image']['name']

            );

            move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);
        }else{
                $values = array(
                  
                    'name' => $this->input->post('name'),

      
                );

            }
    

            $this->user_model->update_user($where,$values);
            redirect('users/profile_u');
        
        
    }else if($this->form_validation->run() != FALSE && $pass != null)
    {

        $where = array(
            'id' => $this->input->post('id'),
        );        

        if($_FILES['image']['name']!=null){

        $values = array(
            
            'name' => $this->input->post('name'),
            'password' => md5($this->input->post('pass')),
            'image'   => "assets/images/".$_FILES['image']['name']

        );

        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);
    }else{
            $values = array(
              
                'name' => $this->input->post('name'),
                'password' => md5($this->input->post('pass'))
  
            );

        }


        $this->user_model->update_user($where,$values);
        redirect('users/profile_u');

    }
            $this->load->view('templates/header');
            $this->load->view('pages/profile_u', $data);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url());
        }

        }else{
            redirect(base_url());
        }

    }


  public function new_admin()
  {
      if($this->session->userdata('user_id')){
        if($this->session->userdata('user_type') == 0){
            if(strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0){

                $data['users'] = $this->user_model->get_user_req();
                $data['new'] = $this->food_model->get_request();
                $data['title'] = 'New Admin';

                $this->load->view('templates/header', $data);
                $this->load->view('pages/new_admin', $data);
                $this->load->view('templates/footer');

            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
      }else{
          redirect(base_url());
      }
  }

  public function accept_admin()
  {
    if($this->session->userdata('user_id')){
        if($this->session->userdata('user_type') == 0){
            if(strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0){

                $id = $_GET['id'];

                $values = array(
                    'status' => 1
                );

                $this->user_model->acc_user_req($id, $values);

                $data['users'] = $this->user_model->get_user_req();
                $data['new'] = $this->food_model->get_request();
                $data['title'] = 'New Admin';

                $this->load->view('templates/header', $data);
                $this->load->view('pages/new_admin', $data);
                $this->load->view('templates/footer');

            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }else{
        redirect(base_url());
    }
  }

  public function delete_user()
  {
    if($this->session->userdata('user_id')){
        if($this->session->userdata('user_type') == 0){
            if(strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0){

                $id = $_GET['id'];

                $this->user_model->delete($id);

                $data['users'] = $this->user_model->get_user_req();
                $data['new'] = $this->food_model->get_request();
                $data['title'] = 'New Admin';

                $this->load->view('templates/header', $data);
                $this->load->view('pages/new_admin', $data);
                $this->load->view('templates/footer');

            }else{
                redirect(base_url());
            }
        }else{
            redirect(base_url());
        }
    }else{
        redirect(base_url());
    }
  }

  public function view_cv()
  {
      if($this->session->userdata('user_id')){
        if(strcmp($this->session->userdata('email'),'superadmin@gmail.com')==0){
            $id = $_GET['id'];
            $data['admin'] = $this->user_model->user_info($id);
            $data['title'] = "New CV ".$data['admin'][0]['name'];
            $data['new'] = $this->food_model->get_request();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/view_cv', $data);
            $this->load->view('templates/footer');

            }
        else{
            redirect(base_url());
            } 
      }else{
          redirect(base_url());
      }
  }


}

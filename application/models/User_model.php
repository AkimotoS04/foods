<?php
  class User_model extends CI_Model
  {
      /**
       * Extracting user type.
       **/
      public function get_user_type($user_id)
      {
          $this->db->where('id', $user_id);
          $result = $this->db->get('users');
          if ($result->num_rows() == 1) {
              return $result->row(0)->type;
          } else {
              return false;
          }
      }

      /**
       * Extracting name.
       **/
      public function get_user_name($user_id)
      {
          $this->db->where('id', $user_id);
          $result = $this->db->get('users');
          if ($result->num_rows() == 1) {
              return $result->row(0)->name;
          } else {
              return false;
          }
      }
      
      public function get_username($user_id)
      {
        $query = $this->db->query("SELECT * FROM users WHERE id = "."'"."$user_id"."'");
        return $query->result_array();
      }
      public function update_user($user_id,$values){
        $this->db->where('id',$user_id['id']);
		$this->db->update('users',$values);
    }

      /**
       * Extracting user nature.( veg or non-veg ).
       **/
      public function get_user_vegan($user_id)
      {
          $this->db->where('id', $user_id);
          $result = $this->db->get('users');
          if ($result->num_rows() == 1) {
              return $result->row(0)->vegan;
          } else {
              return false;
          }
      }

      /**
       * Login functionality.
       **/
      public function login($email, $password)
      {
          $this->db->where('email', $email);
          $this->db->where('password', $password);
          $result = $this->db->get('users');
          if ($result->num_rows() == 1) {
              return $result->row(0)->id;
          } else {
              return false;
          }
      }

      /**
       * Register functionality for people.
       **/
      public function register($encrypt_password)
      {
          // User data in form of array
          $data = [
        'name'     => $this->input->post('name'),
        'Birth'    => $this->input->post('Birth'),
        'email'    => $this->input->post('email'),
        'password' => $encrypt_password,
        'type'     => true,
        'vegan'    => $this->input->post('vegan'),
      ];
          //Insert User
          return $this->db->insert('users', $data);


      }

      /**
       * Register functionality for restaurants.
       **/
      public function register_restaurant($encrypt_password)
      {
          // User data in form of array
          $data = [
        'name'     => $this->input->post('name'),
        'email'    => $this->input->post('email'),
        'Birth'    => $this->input->post('Birth'),
        'password' => $encrypt_password,
        'type'     => false,
      ];

          //Insert User
          return $this->db->insert('users', $data);
      }
  }

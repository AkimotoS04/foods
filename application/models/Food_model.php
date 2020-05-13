<?php

class Food_model extends CI_Model
{
    /**
     * Constructer to load database.
     **/
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Add menu feature for restaurants :).
     **/
    public function add_menu()
    {
        if($_FILES['image']['name']!=null){
        $data = [
      'name'    => $this->input->post('name'),
      'stock'   => $this->input->post('stock'),
      'price'   => $this->input->post('price'),
      'user_id' => $this->session->userdata('user_id'),
      'veg'     => $this->input->post('veg'),
      'image'   => "assets/images/".$_FILES['image']['name']
    ];

    $ket = move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);
        
    return $this->db->insert('foods', $data);
    }else{
        $data = [
            'name'    => $this->input->post('name'),
            'stock'   => $this->input->post('stock'),
            'price'   => $this->input->post('price'),
            'user_id' => $this->session->userdata('user_id'),
            'veg'     => $this->input->post('veg'),
            'image'   => "assets/images/default.png"
          ];
          
          return $this->db->insert('foods', $data);
    }

    }

    /**
     * Add to cart for users.
     **/
    public function add_to_cart($restaurant_id, $people_id, $food_id)
    {
        $data = [
      'people_id'     => $people_id,
      'food_id'       => $food_id,
      'restaurant_id' => $restaurant_id,
    ];

        return $this->db->insert('cart', $data);
    }

    /**
     * Delete a food from cart after ordering through it.
     **/
    public function delete_food_from_cart($restaurant_id, $people_id, $food_id)
    {
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->where('people_id', $people_id);
        $this->db->where('food_id', $food_id);
        $this->db->limit(1);
        $this->db->delete('cart');
    }
    public function delete_menu($food_id){
        $this->db->where('id', $food_id);
        $this->db->delete('foods');
    }
    public function update_menu($food_id,$values){
        $this->db->where('id',$food_id['id']);
		$this->db->update('foods',$values);
    }
    public function get_food_name_1($food_id)
    {
        $query = $this->db->query("SELECT * FROM foods WHERE id = "."'"."$food_id"."'");
        return $query->result_array();
    }
    public function get_food_name($food_id)
    {
        $query = $this->db->where('id', $food_id);
        $result = $this->db->get('foods');
        if ($result->num_rows() == 1) {
            return $result->row(0)->name;
        } else {
            return false;
        }
    }

    public function get_stock($food_id)
    {
        $query = $this->db->query("SELECT * FROM foods WHERE id = "."'"."$food_id"."'");
        return $query->result_array();
    }

    public function get_cart_foods($user_id)
    {
        $query = $this->db->where('people_id', $user_id);
        $result = $this->db->get('cart');

        return $result->result_array();
    }
    public function get_history($user_id)
    {
        $query = $this->db->where('people_id', $user_id);
        $result = $this->db->get('orders');

        return $result->result_array();
    }

    /**
     * Extracting emails.
     **/
    public function get_email($user_id)
    {
        $query = $this->db->where('id', $user_id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->email;
        } else {
            return false;
        }
    }
    

    /**
     * Extracting all foods.
     **/
    public function get_foods()
    {
        $query = $this->db->get('foods');

        return $query->result_array();
    }

    /**
     * Extracting specified foods.
     */
    public function search_foods($cari)
    {
        $query = $this->db->query("SELECT * FROM foods WHERE name like "."'%"."$cari"."%'");
 		return $query->result_array();
    }

    public function get_foods_restaurant($restaurant_id)
    {
        $query = $this->db->query("SELECT * FROM foods WHERE user_id = "."'"."$restaurant_id"."'");
 			return $query->result_array();
  
    }
    /**
     * Sorting price..
     */
    public function sort_food(){
        $query = $this->db->query("SELECT * FROM foods Order by price");
 		return $query->result_array();
    }

    /**
     * Extracting restaurant_id.
     **/
    public function get_restaurant_id($food_id)
    {
        $query = $this->db->where('id', $food_id);
        $result = $this->db->get('foods');
        if ($result->num_rows() == 1) {
            return $result->row(0)->user_id;
        } else {
            return false;
        }
    }

    /**
     * Extracting restaurant name.
     **/
    public function get_restaurant_name($restaurant_id)
    {
        $query = $this->db->where('id', $restaurant_id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->name;
        } else {
            return false;
        }
    }

    /**
     * Extracting name.
     **/
    public function get_name($user_id)
    {
        $query = $this->db->where('id', $user_id);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->name;
        } else {
            return false;
        }
    }

    
    public function get_orders($user_id)
    {
        $query = $this->db->where('restaurant_id', $user_id);
        $result = $this->db->get('orders');

        return $result->result_array();
    }

    /**
     * Order food functionality for users.
     **/
    public function order_food($restaurant_id, $people_id, $food_id)
    {
        $data = [
      'people_id'     => $people_id,
      'restaurant_id' => $restaurant_id,
      'food_id'       => $food_id,
    ];

        return $this->db->insert('orders', $data);
    }

    public function minus_stock($food_id,$values)
    {
        $this->db->where('id',$food_id['id']);
		$this->db->update('foods',$values);
    }
}

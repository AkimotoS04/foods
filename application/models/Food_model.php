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
      'description'   => $this->input->post('description'),
      'price'   => $this->input->post('price'),
      'user_id' => $this->session->userdata('user_id'),
      'veg'     => $this->input->post('veg'),
      'status'  => 1,
      'image'   => "assets/images/".$_FILES['image']['name']
    ];

    $ket = move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);
        
    return $this->db->insert('foods', $data);
    }else{
        $data = [
            'name'    => $this->input->post('name'),
            'stock'   => $this->input->post('stock'),
            'description'   => $this->input->post('description'),
            'price'   => $this->input->post('price'),
            'user_id' => $this->session->userdata('user_id'),
            'veg'     => $this->input->post('veg'),
            'status'  => 1,
            'image'   => "assets/images/default.png"
          ];
          
          return $this->db->insert('foods', $data);
    }

    }

    /**
     * Add to cart for users.
     **/
    public function add_to_cart($restaurant_id, $people_id, $food_id, $jumlah)
    {
        $data = [
      'people_id'     => $people_id,
      'food_id'       => $food_id,
      'restaurant_id' => $restaurant_id,
      'jumlah' => $jumlah,
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
    public function delete_menu($id, $value){
        $this->db->where('id', $id);
        $this->db->update('foods', $value);
   
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

    public function get_cart($cart_id)
    {
        $query = $this->db->query("SELECT * FROM cart WHERE id = "."'"."$cart_id"."'");
        return $query->result_array();
    }

    public function delete_cart($cart_id)
    {
        $query = $this->db->where('id', $cart_id);
        $result = $this->db->delete('cart');
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
        $this->db->select('orders.id AS id, users.name AS Resto, foods.name AS Makanan, orders.rating as Rate, jumlah, foods.price as Price');
        $this->db->where('people_id', $user_id);
        $this->db->join('foods', 'foods.id = orders.food_id');
        $this->db->join('users', 'users.id = orders.restaurant_id');
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

    public function get_jumlah($order_id)
    {
        $query = $this->db->where('id', $order_id);
        $result = $this->db->get('orders');
        if ($result->num_rows() == 1) {
            return $result->row(0)->jumlah;
        } else {
            return false;
        }
    }

    public function get_jumlah_cart($order_id)
    {
        $query = $this->db->where('id', $order_id);
        $result = $this->db->get('cart');
        if ($result->num_rows() == 1) {
            return $result->row(0)->jumlah;
        } else {
            return false;
        }
    }

    public function get_price_cart($food_id)
    {
        $query = $this->db->where('id', $food_id);
        $result = $this->db->get('foods');
        if ($result->num_rows() == 1) {
            return $result->row(0)->price;
        } else {
            return false;
        }
    }

    

    /**
     * Extracting all foods.
     **/
    public function get_foods()
    {
        $query = $this->db->where('status',1);
        $result = $this->db->get('foods');

        return $result->result_array();
    }

    /**
     * Extracting specified foods.
     */
    public function search_foods($cari)
    {
        $this->db->select('*');
        $this->db->from('foods');
        $this->db->like('name',$cari);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_foods_restaurant($restaurant_id)
    {
        $query = $this->db->query("SELECT * FROM foods WHERE status = 1 and user_id = "."'"."$restaurant_id"."'");
 			return $query->result_array();
  
    }
    /**
     * Sorting price..
     */
    public function sort_food(){
        $query = $this->db->query("SELECT * FROM foods where status = 1 Order by price");
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
    public function order_food($restaurant_id, $people_id, $food_id, $jumlah, $rating)
    {
        $data = [
      'people_id'     => $people_id,
      'restaurant_id' => $restaurant_id,
      'food_id'       => $food_id,
      'jumlah'        => $jumlah,
      'rating'        => $rating
    ];

        return $this->db->insert('orders', $data);
    }

    public function minus_stock($food_id,$values)
    {
        $this->db->where('id',$food_id);
		$this->db->update('foods',$values);
    }

    /* Statistik */
    public function get_stats($restaurant_id)
    {
        $this->db->select('name, price');
        $this->db->select_sum('jumlah');
        $this->db->where('restaurant_id', $restaurant_id);
        $this->db->join('foods', 'foods.id = orders.food_id');
        $this->db->group_by('food_id');
        $out = $this->db->get('orders');
        return $out->result_array();
    }

    public function get_stats_admin()
    {
        $this->db->select('users.name AS Resto, foods.name AS Food Name, price');
        $this->db->select_sum('jumlah');
        $this->db->join('foods', 'foods.id = orders.food_id');
        $this->db->join('users', 'users.id = orders.restaurant_id');
        $this->db->group_by('restaurant_id');
        $out = $this->db->get('orders');
        return $out->result_array();
    }
    /* END Statistik */

    /*Cari foods category*/
    public function filter_food()
    {
        $query = $this->db->query("SELECT * FROM foods WHERE veg = 1 and status = 1");
        return $query->result_array();
    }


    /*Cari drinks category */
    public function filter_drink()
    {
        $query = $this->db->query("SELECT * FROM foods WHERE veg = 0 and status = 1");
        return $query->result_array();
    }

    public function give_rating($order_id, $rating){
        $this->db->query("UPDATE orders
        SET rating=$rating
        WHERE id=$order_id");        
    }

    public function get_rating($id)
    {
        $this->db->select_avg('rating');
        $this->db->where('food_id', $id);  
        $result = $this->db->get('orders');

      //  return $result->result_array();
        if ($result->num_rows() == 1) {
            return $result->row(0)->rating;
        } else {
            return false;
        }
    }

    public function get_request(){
        $this->db->select('count(*) AS Req');
        $this->db->where('status', 0);
        $out = $this->db->get('users');
        return $out->result_array();
    }

    public function get_id_order($order_id){
        $query = $this->db->where('id',$order_id);
        $result = $this->db->get('orders');

        return $result->result_array();
    }

    public function get_user_acceptance($id)
    {
        $query = $this->db->where('id',$id);
        $result = $this->db->get('foods');

        return $result->result_array();
    }

    public function view_details($id)
    {
        $query = $this->db->where('id',$id);
        $result = $this->db->get('foods');

        return $result->result_array();
    }
}

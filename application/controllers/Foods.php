<?php

class Foods extends CI_Controller
{
    /**
     * Main foods page which containes all
     * all available foods.
     **/
    public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->load->model('food_model');
        $this->load->library('form_validation');
        $config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'required',
				'errors' => array(
					'required' => '*You must provide a string !',
				),
			),
		);
		$this->form_validation->set_rules($config);
	
    }
    public function index()
    {
        $data['title'] = 'All Foods Available';
        $data['foods'] = $this->food_model->get_foods();

        // Extracting name of restaurants for corresponding foods
        $data['rnames'] = [];
        for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
            $name = $this->food_model->get_name($data['foods'][$x]['user_id']);
            array_push($data['rnames'], $name);
        }

        $this->load->view('templates/header');
        $this->load->view('foods/index', $data);
        $this->load->view('templates/footer');

    }

    public function restaurant_menu()
    {
        if($this->session->userdata('user_type')==0){
        $data['title'] = $this->food_model->get_restaurant_name($this->session->userdata('user_id'));
        $data['foods'] = $this->food_model->get_foods_restaurant($this->session->userdata('user_id'));

        // Extracting name of restaurants for corresponding foods
        $data['rnames'] = [];
        for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                $name = $this->food_model->get_name($data['foods'][$x]['user_id']);
                array_push($data['rnames'], $name);        
        }
    }else{
        redirect(base_url());
    }

        $this->load->view('templates/header');
        $this->load->view('foods/restaurant_menu', $data);
        $this->load->view('templates/footer');

    }
    public function delete_menu(){
        if($this->session->userdata('user_id')){
            if($this->session->userdata('user_type')==0){
        $id   = $_GET['id'];
        $this->food_model->delete_menu($id);
        $data['title'] = $this->food_model->get_restaurant_name($this->session->userdata('user_id'));
        $data['foods'] = $this->food_model->get_foods_restaurant($this->session->userdata('user_id'));

        // Extracting name of restaurants for corresponding foods
        $data['rnames'] = [];
        for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                $name = $this->food_model->get_name($data['foods'][$x]['user_id']);
                array_push($data['rnames'], $name);        
        }
        $this->load->view('templates/header');
        $this->load->view('foods/restaurant_menu', $data);
        $this->load->view('templates/footer');

        }
        else{
            redirect(base_url());
        }
    }
        else{
            redirect(base_url());
        }



    }
    public function update_menu(){
        if($this->session->userdata('user_id')){
            if($this->session->userdata('user_type')==0){
        $id   = $_GET['id'];
        $data['foods'] = $this->food_model->get_food_name_1($id);
        $data['title'] = 'Update Menu';

        //Form Validation
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('stock','Stock','required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if($this->form_validation->run() != FALSE){
            $where = array(
				'id' => $this->input->post('id'),
            );
            
            if($_FILES['image']['name']!=null){

            $values = array(
                
                'name' => $this->input->post('name'),
                'veg' => $this->input->post('veg'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'image'   => "assets/images/".$_FILES['image']['name']

            );

            $ket = move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/".$_FILES['image']['name']);

            $this->food_model->update_menu($where,$values);
            redirect('foods/index');

            }else{
                $values = array(
                
                    'name' => $this->input->post('name'),
                    'veg' => $this->input->post('veg'),
                    'price' => $this->input->post('price'),
                    'stock' => $this->input->post('stock')
    
                );

                $this->food_model->update_menu($where,$values);
                redirect('foods/index');
            }
        }
      
        $this->load->view('templates/header');
        $this->load->view('foods/update_menu', $data);
        $this->load->view('templates/footer');
    }else{
        redirect(base_url());
    }

    }else{
        redirect(base_url());
    }

    }

    public function add_menu()
    {
        $data['title'] = 'Add Menu';
        // Backend validation to check only restaurant should access add menu section.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 0) {

        // Form validation
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('stock','Stock','required');
                $this->form_validation->set_rules('price', 'Price', 'required');

                if ($this->form_validation->run() === false) {
                    $this->load->view('templates/header');
                    $this->load->view('foods/add_menu', $data);
                    $this->load->view('templates/footer');
                } else {
                    $this->food_model->add_menu();

                    redirect('foods/index');
                }
            } else {
                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * Order food as a user.
     **/
    public function add_to_cart()
    {

    // Validation to check only users should add food to cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {

                $food_id = $this->input->post('id');
                $jumlah = $this->input->post('qty');

                //CEK STOK
                $data['foods'] = $this->food_model->get_stock($food_id);
                foreach($data['foods'] as $upd){

                
                if($upd['stock'] > 0){
                $people_id = $this->session->userdata('user_id');

                $restaurant_id = $this->food_model->get_restaurant_id($food_id);


                $this->food_model->add_to_cart($restaurant_id, $people_id, $food_id, $jumlah);

                // Flash message
                $this->session->set_flashdata('added_to_cart', 'Food added to cart' );

                redirect('foods/index');
                }
                else{
                    $this->session->set_flashdata('cart_failed','Sorry this food is unavailable at current moment');

                    redirect('foods/index');
                }
            }
            } else {
                $this->session->set_flashdata('add_cart_failed', 'Sorry, only user may add to cart.');

                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * Order food from cart.
     **/
    public function order_cart($food_id)
    {

    // Validation to check only users should order food from cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $restaurant_id = $this->food_model->get_restaurant_id($food_id);

                $people_id = $this->session->userdata('user_id');

                $this->food_model->order_food($restaurant_id, $people_id, $food_id);

                $this->food_model->delete_food_from_cart($restaurant_id, $people_id, $food_id);

                $data['foods'] = $this->food_model->get_stock($food_id);
                foreach($data['foods'] as $upd){
                    $upd['stock'] = $upd['stock'] - 1;
                }

                $this->food_model->minus_stock($food_id,$upd);

                // Flash message
                $this->session->set_flashdata('food_ordered', 'Your food is ordered.');

                redirect('foods/index');
            } else {
                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * Order food as a user.
     **/
    public function order_food($food_id)
    {

    // Validation to check only users should order food.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $restaurant_id = $this->food_model->get_restaurant_id($food_id);

                $people_id = $this->session->userdata('user_id');

                $this->food_model->order_food($restaurant_id, $people_id, $food_id);

                // Flash message
                $this->session->set_flashdata('food_ordered', 'Your food is ordered.');

                redirect('foods/index');
            } else {
                $this->session->set_flashdata('order_failed', 'Sorry, only user may order.');

                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * View cart for users.
     **/
    public function view_cart()
    {
        $data['title'] = 'Cart';
        // Validation to check only users should view cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $user_id = $this->session->userdata('user_id');

                $data['foods'] = $this->food_model->get_cart_foods($user_id);

                // Extracting name of foods
                $data['fname'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_food_name($data['foods'][$x]['food_id']);
                    array_push($data['fname'], $name);
                }

                // Extracting name of restaurants
                $data['rname'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_restaurant_name($data['foods'][$x]['restaurant_id']);
                    array_push($data['rname'], $name);
                }

                $data['jumlah'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_jumlah_cart($data['foods'][$x]['id']);
                    array_push($data['jumlah'], $name);
                }

                $data['price'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_price_cart($data['foods'][$x]['food_id']);
                    array_push($data['price'], $name);
                }

                $this->load->view('templates/header');
                $this->load->view('foods/view_cart', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    /**
     * View orders for restaurants.
     **/
    public function view_orders()
    {
        $data['title'] = 'Orders';
        // Backend validation to check only restaurant should access view_orders section.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 0) {
                $user_id = $this->session->userdata('user_id');

                $data['orders'] = $this->food_model->get_orders($user_id);

                // Extracting name of users who ordered
                $data['uname'] = [];
                for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
                    $name = $this->food_model->get_name($data['orders'][$x]['people_id']);
                    array_push($data['uname'], $name);
                }

                // Extracting email of user who ordered
                $data['email'] = [];
                for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
                    $name = $this->food_model->get_email($data['orders'][$x]['people_id']);
                    array_push($data['email'], $name);
                }

                $data['food'] = [];
                for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
                    $name = $this->food_model->get_food_name($data['orders'][$x]['food_id']);
                    array_push($data['food'], $name);
                }

                $data['jumlah'] = [];
                for ($x = 0; $x <= count($data['orders']) - 1; $x++) {
                    $name = $this->food_model->get_jumlah($data['orders'][$x]['id']);
                    array_push($data['jumlah'], $name);
                }

                $this->load->view('templates/header');
                $this->load->view('foods/view_orders', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    public function cari(){
        $data['title'] = 'Search Result';
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $data['foods'] = $this->food_model->search_foods($cari);

            // Extracting name of restaurants for corresponding foods
            $data['rnames'] = [];
            for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                $name = $this->food_model->get_name($data['foods'][$x]['user_id']);
                array_push($data['rnames'], $name);
            }
            
        }
        $this->load->view('templates/header');
        $this->load->view('foods/index', $data);
        $this->load->view('templates/footer');
    }

    public function view_history()
    {
        $data['title'] = 'History';
        // Validation to check only users should view cart.
        if ($this->session->userdata('user_type') != null) {
            if ($this->session->userdata('user_type') == 1) {
                $user_id = $this->session->userdata('user_id');

                $data['foods'] = $this->food_model->get_history($user_id);

                // Extracting name of foods
                $data['fname'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_food_name($data['foods'][$x]['food_id']);
                    array_push($data['fname'], $name);
                }

                // Extracting name of restaurants
                $data['rname'] = [];
                for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
                    $name = $this->food_model->get_restaurant_name($data['foods'][$x]['restaurant_id']);
                    array_push($data['rname'], $name);
                }

                $this->load->view('templates/header');
                $this->load->view('foods/view_history', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('foods/index');
            }
        } else {
            redirect('users/login');
        }
    }

    public function sort(){
        $data['title'] = 'Cheapest Foods';
        $data['foods'] = $this->food_model->sort_food();

        // Extracting name of restaurants for corresponding foods
        $data['rnames'] = [];
        for ($x = 0; $x <= count($data['foods']) - 1; $x++) {
            $name = $this->food_model->get_name($data['foods'][$x]['user_id']);
            array_push($data['rnames'], $name);
        }

        $this->load->view('templates/header');
        $this->load->view('foods/sort', $data);
        $this->load->view('templates/footer');
    }
}
?>
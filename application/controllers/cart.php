<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cart extends CI_Controller { // Our Cart class extends the Controller class

    function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
       // $this->_is_logged_in();
    }

    function index() {
        $data['main_content'] = 'carrito';
        $estado= $this->_is_logged_in();    // categoria tambien tendra esta funcion, pero por ahora index solo
        $data['barra_estado'] = $estado;
        $data['contenido'] = $this->cart_model->retrieve_products(); // Retrieve an array with all products
        $data['title'] = '.:. Restaurant Bonifacio .:. ';
        $this->load->view('includes/template', $data);
// print_r($data['productos']);
    }



    function categoria($tipo)

{
       $data['main_content'] = 'carrito';
    $data['contenido'] = $this->cart_model->menu_products($tipo); // Retrieve an array with all products
  $data['title']='.:. Restaurant Bonifacio .:. ';
   $this->load->view('includes/template',$data);
// print_r($data['productos']);

}

    function empty_cart() {
        $this->cart->destroy();
        redirect('cart');
    }

    function add_cart_item() {
        if ($this->cart_model->validate_add_cart_item() == TRUE) {
            // Check if user has javascript enabled
            if ($this->input->get('ajax') != '1') {
                redirect('cart'); // If javascript is not enabled, reload the page with new data
            } else {
                echo 'true'; // If javascript is enabled, return true, so the cart gets updated
            }
        }
    }

    

    function show_cart() {
        $this->load->view('cart');
    }

    function update_cart() {
        $this->cart_model->validate_update_cart();
        redirect('cart');
    }

    function insertar() {       //  le tengo que pasar para
        $this->cart_model->subir();
        // redirect('cart');
        $this->cart->destroy();  // lo puedo colocar en otra funcion privada
        $this->_cart_enviado();
    }

// VER TODOS LOS PEDIDOS, VER CARRITO ULTIMO. TENGO EL ID EN LA SESSION. 
// POR UNA CONSULTA SQL, PODRE SABER LA ULTIMA POR FECHA MENOR QUE FUE INGRESADA, ESA MUESTRO, EN PANTALLA





    function _cart_enviado() {

        // variable session ficticia...

               $data['main_content'] = 'carrito';
        $data['contenido'] = $this->cart_model->retrieve_products(); // Retrieve an array with all products
        $data['title'] = '.:. Restaurant Bonifacio .:. ';
        $this->load->view('includes/template', $data);
    
        
        
    }



    

function _is_logged_in(){   //  este funcion verifica si hay sesion iniciada del usuario, despues se haran cosas, si es asi.

$is_logged_in = $this->session->userdata('is_logged_in');
if(!isset($is_logged_in) || $is_logged_in != true )
{  
return false;   //return false;
}
else
{
return true;   //return true;
}
}











}


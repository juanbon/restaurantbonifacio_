<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('email');
        $this->_restriccion();
    }

    function login() {
        $data['main_content'] = 'users/login';
        $data['contenido'] = ''; // Retrieve an array with all products
        $data['title'] = '.:. Restaurant Bonifacio .:.Logueo de usuario';
        $this->load->view('includes/template', $data);
    }

    function register() {
        $data['main_content'] = 'users/signup';
        $data['title'] = '.:. Restaurant Bonifacio .:.Registro de usuario';
        $this->load->view('includes/template', $data);
    }

    function signup() {

    }

    function _restriccion() {   //  este funcion verifica si hay sesion iniciada del usuario, despues se haran cosas, si es asi.
        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {
            redirect(cart);   //return false;
        }
    }

    function _is_logged_in() {   //  este funcion verifica si hay sesion iniciada del usuario, despues se haran cosas, si es asi.
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            return false;   //return false;
        } else {
            return true;   //return true;
        }
    }

    function verify_login() {

    }

    function create_account() {
        $this->form_validation->set_rules('name', 'nombre', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', ' usuario', 'trim|required|callback__users_check|min_length[3]');
        $this->form_validation->set_rules('email', 'direccion de email', 'trim|required|valid_email|callback__email_check');
        $this->form_validation->set_rules('password', 'contrase&ntilde;a', 'trim|required|md5');
        $this->form_validation->set_rules('re_password', 'confirmar contrase&ntilde;a', 'trim|required|matches[password]|md5');
        $this->form_validation->set_rules('tel', 'telefono', 'trim|required|numeric|min_length[7]');
        $this->form_validation->set_rules('date', 'fecha de nacimiento', 'trim|required|valid_date');
        $this->form_validation->set_rules('sexo', 'sexo', 'callback__sexo');
        $this->form_validation->set_rules('calle', 'calle', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|min_length[5]|numeric');
        $this->form_validation->set_rules('comentario', 'comentario', 'trim|required|min_length[3]');





        $this->form_validation->set_message('valid_date', 'fecha invalida');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('_email_check', 'El email %s ya existe');
        $this->form_validation->set_message('_users_check', 'El usuario se encuentra registrado');
        $this->form_validation->set_message('matches', 'Las contrase&ntilde;as no coinciden');
        $this->form_validation->set_message('min_length', 'El campo %s es muy corto');
        $this->form_validation->set_message('_sexo', 'Debe seleccionar un sexo');
        $this->form_validation->set_message('numeric', 'El campo %s debe contener numeros');




        if ($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $tel = $this->input->post('tel');
            $date = $this->input->post('date');
            $sexo = $this->input->post('sexo');
            $calle = $this->input->post('calle');
            $direccion = $this->input->post('direccion');
            $comentario = $this->input->post('comentario');

            $insert= $this->Users_Model->insert_user($name,$username,$email,$password,$tel,$date,$sexo,$calle,$direccion,$comentario);


        }
    }

    function _sexo($sexo) {
        if ($sexo == 0)
            return false;
    }

    function _email_check($email) {
        return $this->Users_Model->email_check($email);
    }

    function _users_check($username) {
        return $this->Users_Model->username_check($username);
    }



    function username_check_ajax(){

     //   echo $this->input->get('nombre_usuario');
     if ($this->input->is_ajax_request()){
         $username=$this->input->get('nombre_usuario');
             if($this->Users_Model->username_check($username))
             {
                 echo "true";
             }
             else
             {
                echo "false";
             }

     }
     else{

         echo "acceso denegado";
     }

    }



    
}

?>

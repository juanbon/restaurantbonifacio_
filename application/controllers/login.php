<?php



class Login extends CI_Controller{


    function  __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        
    }

function index(){
     $data['title']='formulario de registro';
    $data['main_content']='login';
    $this->load->view('includes/template',$data);

}

function logued(){

$this->form_validation->set_rules('username', 'Nombre de usuario', 'required|trim|min_length[5]|callback__verificar_usuario');
$this->form_validation->set_rules('pass', 'contraseña', 'required|md5');
$this->form_validation->set_message('required', 'este campo es requerido');
$this->form_validation->set_message('min_length', 'El campo debe contener mas de 5 caracteres');
$this->form_validation->set_message('_verificar_usuario', 'El usuario ya se encuentra');

if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
		   echo	$this->input->post('username');
		}


    }




function _verificar_usuario($value){

if($value ==  'hola5')
    {
    return false;
    }
else
{
   return true;
}



}


}
?>

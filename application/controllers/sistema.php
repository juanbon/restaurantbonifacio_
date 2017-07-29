<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sistema extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('sistema_model');
        //   $this->load->helper('form');
        //   $this->load->library('form_validation');
        //  $this->load->model('Users_Model');
        //  $this->load->library('email');
        //   $this->_restriccion();
	//	$this->salon();
    }

    function index() {
        $data['main_content'] = 'sistema/inicio';
        $data['title'] = '.:. Restaurant Bonifacio .:.Sistema Restaurant';
        $this->load->view('includes/templatesystem', $data);
    }

    function salon() {
       
        $data['main_content'] = 'sistema/salon';
        $data['mesas'] = $this->sistema_model->ver_mesas();
        $data['contenidoprod'] ='sistema/productos';
        $data['contenido'] = $this->cart_model->retrieve_products(); // Retrieve an array with all products
       $data['contenidopedido'] = $this->sistema_model->hojaenblanco();
       // cuando no se cargaron producto se mostrara esto
       // en caso contrario con un 'if isset' javascript mostrara los pedidos
        $data['select'] = $this->sistema_model->rubro_dinamico();
        $data['title'] = '.:. Restaurant Bonifacio .:.Sistema Restaurant';
        $this->load->view('includes/templatesystem', $data);
    }

    function abrir_mesa($parametros) {  //  en construccion
  //      return $this->Users_Model->email_check($email);
    }



   ///////////////////
// este metodo lo que hace es eliminar el pedido, lo que recibo es el id del producto cargado
    




      function  cuantos_comensal() {

      $mesa=$this->input->get('mesa');


     $cuantos=$this->sistema_model->cuantos_comensal($mesa);

echo $cuantos;

    }












//  paso comensales a otra tabla



      function  paso_comensal() {

      $mesa=$this->input->get('mesa');
 $comensales=$this->input->get('comensales');

       $fecha = $this->sistema_model->busca_fecha($mesa);


     $cuantos=$this->sistema_model->paso_comensal($mesa,$comensales,$fecha);



    }

    //  paso comensales a otra tabla






      function showeli_cargados() {

      $mesa=$this->input->get('mesa');
$borrar=$this->input->get('elimino');


      $this->sistema_model->elimino_prod($borrar);
      $fecha = $this->sistema_model->busca_fecha($mesa);


      $data['contenidopedido'] = $this->sistema_model->busca_pedidos($mesa,$fecha);
            $data['mesaoculta'] = $mesa;
            
        $this->load->view('sistema/cargados', $data);
    }





// este metodo lo que hace es eliminar el pedido, lo que recibo es el id del producto cargado


  function show_cargados() {

      $mesa=$this->input->get('mesa');


      $fecha = $this->sistema_model->busca_fecha($mesa);


      $data['contenidopedido'] = $this->sistema_model->busca_pedidos($mesa,$fecha);
            $data['mesaoculta'] = $mesa;
            
        $this->load->view('sistema/cargados', $data);
    }




  function  hojaenblanco() {

      $data['contenidopedido'] = $this->sistema_model->hojaenblanco();
        $this->load->view('sistema/cargados', $data);
    }



      function  hojaenblanco2() {
$mesa=$this->input->get('mesacerra');
      $data['contenidopedido'] = $this->sistema_model->hojaenblanco2($mesa);
        $this->load->view('sistema/cargados', $data);
    }






      function  cobrar() {
//$data['total'] = $this->input->get('total');
        $this->load->view('sistema/cobrar');
    }

     function cuanto_stock() {
    
    
    $codigo = $this->input->get('codigo'); // Assign posted quantity to $cty


            $cantidad=$this->sistema_model->cantidad_stock($codigo);

        echo  $cantidad;

     }






    function valido_codigo() {

    $validacion=$this->sistema_model->valido_codigo();

    if ($validacion)
    {

        $cantidad=$this->sistema_model->cantidad_stock($validacion);

        echo  $cantidad;


    }else
    {
        echo 'false';
    }

    }




    function carga_pedidos() {  //  en construccion
               if ($this->sistema_model->validate_add_pedido() == TRUE) {
            // Check if user has javascript enabled
            if ($this->input->get('ajax') != '1') {
                redirect('sistema'); // If javascript is not enabled, reload the page with new data
            } else {
                echo 'true'; // If javascript is enabled, return true, so the cart gets updated
            }
        }
        }




    /////////////////////////////////


















    ////  funciona para la apertura del pedido...
//   trae_descripcion

        function trae_descripcion(){
             $codigo_buscar=$this->input->get('codigo');

             $valordevuelto=$this->sistema_model->codigo_buscar($codigo_buscar);
       
            echo $valordevuelto;

             }



                     function actualizo_stock(){
             $codigo=$this->input->get('codigo');
             $nuevo_stock=$this->input->get('stock_n');


             $valordevuelto=$this->sistema_model->actualizo_stock($codigo,$nuevo_stock);

     

             }






          function apertura_ajax(){
      //  echo $this->input->get('numero_mesa');
      if ($this->input->is_ajax_request()){

        //  echo $this->input->get('numero_mesa');

      $mesa=$this->input->get('numero_mesa');




      $valordevuelto=$this->sistema_model->apertura_check($mesa);

      //  con el valor devuelto no importa identifico con el id...
      //por el momento devuelve 1, basico, le paso la fecha

      if($valordevuelto==1)
      {
      echo '1';
      }
       
      }
      else{

      echo "acceso denegado";
      }

      }




    /////  funcion para la apertura del pedido...


//  funcion para saber si la mesa tiene pedidos o no






      
      
         function cierra_compra(){

        $mesa=$this->input->get('mesa');
        $efectivo=$this->input->get('efectivo');
        $total=$this->input->get('total');
        $vuelto=$this->input->get('vuelto');


     $fecha_abre=$this->sistema_model->mesa_fecha($mesa);


 $bandera=$this->sistema_model->cierra_compra($mesa,$fecha_abre,$efectivo,$total,$vuelto);

 if($bandera)
 {
     
     echo 'true';
 }


//  hacer del modelo, 

   }




















    function mesa_comensal(){

        $mesa=$this->input->get('mesa');
        $valor=$this->input->get('valor');


    //  $fecha_abre=$this->sistema_model->mesa_fecha($mesa);


 $contador=$this->sistema_model->actualiza_comensal($mesa,$valor);



   }



   function busca_apertura(){

        $mesa=$this->input->get('mesa');


      $fecha_abre=$this->sistema_model->mesa_fecha($mesa);


      echo $fecha_abre;
   }















      
   function total_pedidos(){

   
      $mesa=$this->input->get('mesa');
      $fecha_abre=$this->sistema_model->mesa_fecha($mesa);
      $contador=$this->sistema_model->contador_pedidos($mesa,$fecha_abre);

      // si la mesa no contiene nada devolovera 1
      // si la mesa contiene productos devolvera 505   con echo


      //  if algo cerrara la mesa realmente.... si no . enviara un alerta que debe cobrar la mesa o
      //  eliminar pedidos antes de cerrar.
      if($contador==1)
      {
          
        echo '1'; // $this->sistema_model->cierra_mesa($mesa);
      /*  tengo que colocar la fecha de cierre en acum_compras....tengo en el metodo modelo, */

      }else if ($contador ==505){

           echo '505';
           
      }

       
   }







// funcion para saber si la mesa tiene pedidos o no





//  si la mesa esta abierta  llama  a este metodo


       function mesa_ajax2(){
      //  echo $this->input->get('numero_mesa');
      if ($this->input->is_ajax_request()){

        //  echo $this->input->get('numero_mesa');

      $mesa=$this->input->get('numero_mesa');

      $valordevuelto=$this->sistema_model->mesa_check($mesa);

      if($valordevuelto==2)
      {
      echo '2';
      }
       if($valordevuelto==3)
      {
      echo '3';
      }

      if($valordevuelto==4)
      {
      echo '4';
      $this->sistema_model->abre_mesa($mesa);
      }

       if($valordevuelto==1)
      {
      echo '1';
      //$this->sistema_model->cierra_mesa($mesa);
      }



      }
      else{

      echo "acceso denegado";
      }

      }


      //  si la mesa esta abierta llama a este metodo,,



      //  mesa_ajax2 trabaja sobre el boton abrir
      // mesa_ajax trabaja sobre el boton cerrar

      function mesa_ajax(){
      //  echo $this->input->get('numero_mesa');
      if ($this->input->is_ajax_request()){

        //  echo $this->input->get('numero_mesa');

      $mesa=$this->input->get('numero_mesa');

      $valordevuelto=$this->sistema_model->mesa_check($mesa);

      if($valordevuelto==2)
      {
      echo '2';
      }
       if($valordevuelto==3)
      {
      echo '3';
      }

      if($valordevuelto==4)
      {
      echo '4';
     // $this->sistema_model->abre_mesa($mesa);
      }

       if($valordevuelto==1)    //  si es 1 es por que la mesa esta abierta, la cierro pero veo si se puede...
      {
     

      $fecha_abre=$this->sistema_model->mesa_fecha($mesa);


 $contador=$this->sistema_model->cuantos_pedidos($mesa,$fecha_abre);

      // si la mesa no contiene nada devolovera 1
      // si la mesa contiene productos devolvera 505   con echo


      //  if algo cerrara la mesa realmente.... si no . enviara un alerta que debe cobrar la mesa o
      //  eliminar pedidos antes de cerrar.
if($contador==1)
{
    
  echo '1'; // $this->sistema_model->cierra_mesa($mesa);
  $this->sistema_model->cierra_mesa($mesa);
//   tengo que colocar la fecha de cierre en acum_compras....
  //   tengo en el metodo modelo, 

}
else if ($contador ==505)
{

     echo '505';
     
}
      //  tengo que cerrar la mesa pero antes comprobar si esta mesa
      //  puedo cerraar la mesa, si la abro y me arrepiento,
      //
      //   tengo que poder eliminar productos, una vez que se cargaron,,,
      //
      //   desde aca tengo que verificar si se realizaron pedidos.
      }



      }
      else{

      echo "acceso denegado";
      }

      }



/////////


      function mesadetecta_ajax(){
      //  echo $this->input->get('numero_mesa');
      if ($this->input->is_ajax_request()){

        //  echo $this->input->get('numero_mesa');

      $mesa=$this->input->get('numero_mesa');

      $valordevuelto=$this->sistema_model->detecta_check($mesa);

      if($valordevuelto==2)
      {
      echo '2';
      }
       if($valordevuelto==3)
      {
      echo '3';
      }

      if($valordevuelto==4)
      {
      echo '4';
      
      }

       if($valordevuelto==1)
      {
      echo '1';
      
      }



      }
      else{

      echo "acceso denegado";
      }

      }



      ///////////////


















       function mesa_mozo_ajax(){
      //  echo $this->input->get('numero_mesa');
      if ($this->input->is_ajax_request()){

        //  echo $this->input->get('numero_mesa');

      $mesa_mozo=$this->input->get('mesa_mozo');

      $valordevuelto=$this->sistema_model->mozo_check($mesa_mozo);

       echo $valordevuelto;

      }
      else{

      echo "acceso denegado";
      }

      }







    
































    /*


      function register() {
      $data['main_content'] = 'users/signup';
      $data['title'] = '.:. Restaurant Bonifacio .:.Registro de usuario';
      $this->load->view('includes/templatesystem', $data);
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





     */
}

?>

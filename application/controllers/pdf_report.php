<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdf_report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('sistema_model');
        $this->load->model('pdf_model');
        //   $this->load->helper('form');
        //   $this->load->library('form_validation');
        //  $this->load->model('Users_Model');
        //  $this->load->library('email');
        //   $this->_restriccion();
        //Cargamos la libreria disponible en application/libraries
        $this->load->library('fpdf');
        //Definimos la constante del directorio de las fuentes a usar por la libreria
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));
    }

    function comanda($mesa) {

//echo "hola carambolas";

//  ********   recibo el nombre por input alguna forma

        /*
        $data['main_content'] = 'sistema/inicio';
        $data['title'] = '.:. Restaurant Bonifacio .:.Sistema Restaurant';
        $this->load->view('includes/templatesystem', $data);
        */
//$mesa=5;
$data['mesa'] = $mesa;
             //   $data['saludo'] = 'mundo';
$data['mozo']=$this->pdf_model->busca_mozo($mesa);


   $fecha = $this->pdf_model->busca_fecha($mesa);
  $data['productos'] = $this->pdf_model->busca_pedidos($mesa,$fecha);

  
                $data['fecha'] = date('Y-m-d');
                $data['hora'] = date('H:i');

        // Load view "pdf_report" untuk menampilkan hasilnya
        $this->load->view('reportes/comanda', $data);


        
    }



    //   esta funcion controlara, la factura del salon .
    //  se ejecuta cuando realizo el cobro de la mesa,



        function ticket_salon($mesa) {



//echo "hola carambolas";

//  ********   recibo el nombre por input alguna forma

        /*
        $data['main_content'] = 'sistema/inicio';
        $data['title'] = '.:. Restaurant Bonifacio .:.Sistema Restaurant';
        $this->load->view('includes/templatesystem', $data);
        */

             $fecha = $this->pdf_model->busca_fecha($mesa);




/*
$data['comensales']=$this->pdf_model->cuantos_comensal($mesa,$fecha);


$data['total']=$this->pdf_model->total($mesa,$fecha);
$data['efectivo']=$this->pdf_model->efectivo($mesa,$fecha);
$data['vuelto']=$this->pdf_model->vuelto($mesa,$fecha);

*/
// esto es de prueba
$todo=$this->pdf_model->trae_todo($mesa,$fecha);
$data['total']=$todo['total_pedido'];
$data['efectivo']=$todo['pago_con'];
$data['vuelto']=$todo['vuelto'];
$data['comensales']=$todo['comensales'];

















$data['mesa'] = $mesa;
                $data['saludo'] = 'mundo';
$data['mozo']=$this->pdf_model->busca_mozo($mesa);


  
   
    $data['id_compra']=$this->pdf_model->compra_id($mesa,$fecha);


  $data['productos'] = $this->pdf_model->busca_pedidos($mesa,$fecha);


                $data['fecha'] = date('Y-m-d');
                $data['hora'] = date('H:i');

        // Load view "pdf_report" untuk menampilkan hasilnya
        $this->load->view('reportes/ticket_salon', $data);



    }


    ///  fin de la factura














}
<?php

class Pdf_model extends CI_Model { // Our Cart_model class extends the Model class

    function __construct() {
        parent::__construct();
    }

//  este me trae el id de la compra de acum cargas 
    
   // compra_id
    
            function compra_id($mesa,$fecha) {
        $this->db->select('id_carga');
        $this->db->from('acum_cargas');
        $this->db->where('num_mesa', $mesa);
        $this->db->where('fecha_apertura', $fecha);
        $query = $this->db->get();
// veo es estado de la mesa, de ahi tomo decisiones
        $idcompra = $query->row_array();
//$estadomesa = trim($estadomesa);

        return $idcompra['id_carga'];
    }






        function efectivo($mesa,$fecha) {

                       $this->db->select('pago_con');
        $this->db->where('num_mesa', $mesa);
          $this->db->where('fecha_apertura', $fecha);
        $query = $this->db->get('acum_cargas');

        $comensales = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $comensales['pago_con'];

    }
    
     
        function vuelto($mesa,$fecha) {

                       $this->db->select('vuelto');
        $this->db->where('num_mesa', $mesa);
          $this->db->where('fecha_apertura', $fecha);
        $query = $this->db->get('acum_cargas');

        $comensales = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $comensales['vuelto'];

    }


        function total($mesa,$fecha) {

                       $this->db->select('total_pedido');
        $this->db->where('num_mesa', $mesa);
          $this->db->where('fecha_apertura', $fecha);
        $query = $this->db->get('acum_cargas');

        $comensales = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $comensales['total_pedido'];

    }





    //  pruebaa

            function trae_todo($mesa,$fecha) {

                       $this->db->select('comensales,total_pedido,pago_con,vuelto');
        $this->db->where('num_mesa', $mesa);
          $this->db->where('fecha_apertura', $fecha);
        $query = $this->db->get('acum_cargas');

        $todo = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $todo;

    }


    //  prueba









        function cuantos_comensal($mesa,$fecha) {

                       $this->db->select('comensales');
        $this->db->where('num_mesa', $mesa);
          $this->db->where('fecha_apertura', $fecha);
        $query = $this->db->get('acum_cargas');

        $comensales = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $comensales['comensales'];

    }






    

    //  este me trae el id de la compra, desde acum cargas.



        function busca_mozo($mesa) {
        $this->db->select('m.id_mesa as mesa, mo.nombre as nombre');
        $this->db->from('mesas m');
        $this->db->join('mozos  mo', 'm.mozo_asig=mo.id_mozo');
        $this->db->where('m.id_mesa', $mesa);
        $query = $this->db->get();
// veo es estado de la mesa, de ahi tomo decisiones
        $nombremozo = $query->row_array();
//$estadomesa = trim($estadomesa);

        return $nombremozo['nombre'];
    }


        function busca_fecha($mesa) {
        $this->db->select('fecha_apertura');
        $this->db->where('id_mesa', $mesa);
        $query = $this->db->get('mesas');
// veo es estado de la mesa, de ahi tomo decisiones
        $fecha = $query->row_array();
//$estadomesa = trim($estadomesa);

        return $fecha['fecha_apertura'];
    }




    

    function busca_pedidos($mesa, $fecha) {

        $this->db->select('c.cantidad cantidad,c.id_carga,p.descripcion descripcion, p.precio precio');
        $this->db->from('carga_temporal c');
        $this->db->join('productos p', 'c.id_producto=p.codigo');
       $this->db->where('c.id_mesa',$mesa);
       $this->db->where('c.fecha_carga >',  $fecha);
        $query = $this->db->get();
        return $query->result_array(); // Return the results in a array.
    }


    











}
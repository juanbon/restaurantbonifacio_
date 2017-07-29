<?php

class Sistema_model extends CI_Model { // Our Cart_model class extends the Model class

    function __construct() {
        parent::__construct();
    }



        function valido_codigo() {

        $codigo = $this->input->get('codigo'); // Assign posted quantity to $cty

        $this->db->where('codigo', $codigo); // Select where id matches the posted id
        $query = $this->db->get('productos', 1); // Select the products where a match is found and limit the query by 1
        // Check if a row has matched our product id
        if ($query->num_rows > 0) {
      return $codigo;
    }
    else{
     return false;
    }
    }



    //   busco la descripion de un producto

        function codigo_buscar($codigo_buscar) {

              $this->db->select('descripcion');
        $this->db->where('codigo',$codigo_buscar);
        $query = $this->db->get('productos');
// veo es estado de la mesa, de ahi tomo decisiones
        $descripcion = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $descripcion['descripcion'];


  
    }
    // busco la descripcion de un producto


    
    
   function cantidad_stock($codigo) {
        $this->db->select('stock');
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('productos');
// veo es estado de la mesa, de ahi tomo decisiones
        $cantidad_stock = $query->row_array();
//$estadomesa = trim($estadomesa);
 
            return $cantidad_stock['stock'];
        
    }



  

    function validate_add_pedido() {
        $id = $this->input->get('product_id'); // Assign posted product_id to $id
        $cty = $this->input->get('quantity'); // Assign posted quantity to $cty
        $mesa = $this->input->get('mesa'); // Assign posted quantity to $cty
        $this->db->where('codigo', $id); // Select where id matches the posted id
        $query = $this->db->get('productos', 1); // Select the products where a match is found and limit the query by 1
        // Check if a row has matched our product id
        if ($query->num_rows > 0) {
            // We have a match!
            // a partir de abajo de aca tira error....
            foreach ($query->result() as $row) {
                // Create an array with product information
                // lo de abajo se va
                /*            $data = array(
                  'id' => $id,
                  'qty' => $cty,
                  'price' => $row->precio,
                  'name' => $row->descripcion,
                  );
                 */                // lo de arriba se va
                // Add the data to the cart using the insert function that is available because we loaded the cart library
                //    $this->cart->insert($data);  esto va al CART; yo tengo que cargarlo a carga_temporal


                $subtotal = $cty * $row->precio;

                $fechacarga = date('Y-m-d H:i:s');


                $data = array(
                    'id_mesa' => $mesa,
                    'id_producto' => $id,
                    'cantidad' => $cty,
                    'subtotal' => $subtotal,
                    'fecha_carga' => $fechacarga,
                );

                $this->db->insert('carga_temporal', $data);
                $query = $this->db->get('carga_temporal');


                

                // a partir de arriba de aca tira error....

                return TRUE; // Finally return TRUE
            }
        } else {
            // Nothing found! Return FALSE!
            return FALSE;
        }
    }





    function actualizo_stock($codigo,$nuevo_stock){

        $datos = array(
            'stock' => $nuevo_stock,
        );

        $this->db->where('codigo', $codigo);
        $this->db->update('productos', $datos);
        $query = $this->db->get('productos'); // Select the table products
        // return $query->result_array(); // Return the results in a array.

    }




    function abre_mesa($mesa) {

        $datos = array(
            'estado' => 1,
        );

        $this->db->where('id_mesa', $mesa);
        $this->db->update('mesas', $datos);
        $query = $this->db->get('mesas'); // Select the table products
        // return $query->result_array(); // Return the results in a array.
    }

    function cierra_mesa($mesa) {

        $datos = array(
            'estado' => 4,
        );

        $this->db->where('id_mesa', $mesa);
        $this->db->update('mesas', $datos);
        $query = $this->db->get('mesas'); // Select the table products
        // return $query->result_array(); // Return the results in a array.
    }

    function rubro_dinamico() {
        //       $this->db->where('rubro', 2); // Select where id matches the posted id
        $query = $this->db->get('rubro_prod'); // Select the table products
        return $query->result_array(); // Return the results in a array.
    }

    /*
      SELECT *
      FROM carga_temporal
      WHERE fecha_carga > '2012-12-05 04:55:17'

     */

//truchismo

    function busca_pedidos($mesa, $fecha) {

        $this->db->select('c.cantidad cantidad,c.id_carga,p.descripcion descripcion, p.precio precio');
        $this->db->from('carga_temporal c');
        $this->db->join('productos p', 'c.id_producto=p.codigo');
       $this->db->where('c.id_mesa',$mesa);
       $this->db->where('c.fecha_carga >',  $fecha);
        $query = $this->db->get();
        return $query->result_array(); // Return the results in a array.
    }


    //  esta funcion lo que hace es recibir una fecha y una mesa...
    //  devuelve el numero de productos, en el caso de que no halla nada, devuelve 1, si contiene productos
    // distinto de cero, devuelve   505.

    //       cuantos_pedidos($mesa,$fecha_abre);

    function cuantos_pedidos($mesa, $fecha) {

               $this->db->select('id_producto');
        $this->db->where('id_mesa', $mesa);
         $this->db->where('fecha_carga >',  $fecha);
        $query = $this->db->get('carga_temporal');


if ($query->num_rows() > 0)
{
return 505;
}
else if ($query->num_rows() == 0){




     $fecha_cerrar_mesa = date('Y-m-d H:i:s');

                $datos = array(
            'fecha_cierre' => $fecha_cerrar_mesa,
        );

        $this->db->where('num_mesa', $mesa);
        $this->db->where('fecha_apertura', $fecha);
        $this->db->update('acum_cargas', $datos);
        $query = $this->db->get('acum_cargas'); // Select the table products
        // return $query->result_array(); // Return the results in a array.


    return 1;
    //  actualizo la tabla acum cargas  la "cierro"
}


    }

    //truchismo


    //  paso lo comensales
    //  paso_comensal($mesa,$comensales);
    
    
    
        function paso_comensal($mesa,$comensales,$fecha) {

        $datos = array(
            'comensales' => $comensales,
        );

        $this->db->where('num_mesa', $mesa);
        $this->db->where('fecha_apertura', $fecha);
        $this->db->update('acum_cargas', $datos);
        $query2 = $this->db->get('acum_cargas'); // Select the table products


     
    }

    
    
    // paso los comensales






//  esta funcion se ejecutara,,,varias veces, rapidas..




    function cuantos_comensal($mesa) {

                       $this->db->select('comensales');
        $this->db->where('id_mesa', $mesa);
        $query = $this->db->get('mesas');

        $comensales = $query->row_array();
//$estadomesa = trim($estadomesa);

            return $comensales['comensales'];
     
    }









    
            function actualiza_comensal($mesa, $valor) {



        $datos = array(
            'comensales' => $valor,
        );

        $this->db->where('id_mesa', $mesa);
        $this->db->update('mesas', $datos);
        $query2 = $this->db->get('mesas'); // Select the table products


    }
    
    
    //  esta funcion se ejecutara varias veces rapidass

















  //  funcion donde solo cuenta los pedidos .

        function contador_pedidos($mesa, $fecha) {

               $this->db->select('id_producto');
        $this->db->where('id_mesa', $mesa);
         $this->db->where('fecha_carga >',  $fecha);
        $query = $this->db->get('carga_temporal');


if ($query->num_rows() > 0)
{
return 505;
}
else if ($query->num_rows() == 0){

    return 1;
    //  actualizo la tabla acum cargas  la "cierro"
}


    }

    //  funcion  donde solo cuenta los pedidos..

















    function ver_mesas() {

        $this->db->select('m.id_mesa, m.estado, m.mozo_asig, e.color, e.descripcion ');
        $this->db->from('mesas m');
        $this->db->join('estado_mesa e', 'm.estado=e.id_estado');
        $this->db->order_by('m.id_mesa', 'asc');
        $query = $this->db->get();

        return $query->result_array(); // Return the results in a array.
    }


















//  consulta sql con inner join,,


    function mozo_check($mesa) {
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

    //  busco fecha apertura inicio x mesa

    // este metodo elimina un producto

        function elimino_prod($borrar){
$this->db->delete('carga_temporal', array('id_carga' => $borrar));
    }


    // este metodo elimina un producto


    function busca_fecha($mesa) {
        $this->db->select('fecha_apertura');
        $this->db->where('id_mesa', $mesa);
        $query = $this->db->get('mesas');
// veo es estado de la mesa, de ahi tomo decisiones
        $fecha = $query->row_array();
//$estadomesa = trim($estadomesa);

        return $fecha['fecha_apertura'];
    }

    //busco fecha apertura,,,// termina




    function detecta_check($mesa) {
        $this->db->select('estado');
        $this->db->where('id_mesa', $mesa);
        $query = $this->db->get('mesas');
// veo es estado de la mesa, de ahi tomo decisiones
        $estadomesa = $query->row_array();
//$estadomesa = trim($estadomesa);

        if ($estadomesa['estado'] == 2) {
            return 2;
        }

        if ($estadomesa['estado'] == 3) {
            return 3;
        }

        if ($estadomesa['estado'] == 4) {
            return 4;
        }


        if ($estadomesa['estado'] == 1) {
            return 1;
        }
    }

//  funcion donde genera la apertura desde la base de datos



    function apertura_check($mesa) {

        //  podria saber cual es la fecha, si elijo la mesa, y donde el campo sea NULL, osea no ha cerrado,
        // asi identifico a los pedidos,,

        $fechacom = date('Y-m-d H:i:s');


        $data = array(
            'num_mesa' => $mesa,
            'fecha_apertura' => $fechacom
        );

        $this->db->insert('acum_cargas', $data);
        $query = $this->db->get('acum_cargas');



        $datos = array(
            'fecha_apertura' => $fechacom,
        );

        $this->db->where('id_mesa', $mesa);
        $this->db->update('mesas', $datos);
        $query2 = $this->db->get('mesas'); // Select the table products






        if ($query2) {
            return 1;
        }
    }





//   funcion donde genera la apertura desde la base de datos ,

   function mesa_fecha($mesa) {
        $this->db->select('fecha_apertura');
        $this->db->where('id_mesa', $mesa);
        $query = $this->db->get('mesas');
// veo es estado de la mesa, de ahi tomo decisiones
        $fecha_abrio = $query->row_array();
//$estadomesa = trim($estadomesa);

       
            return $fecha_abrio['fecha_apertura'];
        

 
    }






//  busco la fecha de apertura de la mesa


    
    // busco la fecha de apertura de determinada mesa,,,,




























    function mesa_check($mesa) {
        $this->db->select('estado');
        $this->db->where('id_mesa', $mesa);
        $query = $this->db->get('mesas');
// veo es estado de la mesa, de ahi tomo decisiones
        $estadomesa = $query->row_array();
//$estadomesa = trim($estadomesa);

        if ($estadomesa['estado'] == 2) {
            return 2;
        }

        if ($estadomesa['estado'] == 3) {
            return 3;
        }

        if ($estadomesa['estado'] == 4) {
            return 4;
        }


        if ($estadomesa['estado'] == 1) {
            return 1;
        }
    }






    function hojaenblanco() {
      //       $this->db->where('rubro', 2); // Select where id matches the posted id
      $query = $this->db->get('tablafalsa'); // Select the table products
      return $query->result_array(); // Return the results in a array.
      }


function cierra_compra($mesa,$fecha_abre,$efectivo,$total,$vuelto){
    
    $fechacierre = date('Y-m-d H:i:s');
    
             $datos = array(
            'fecha_cierre' => $fechacierre,
                 'total_pedido' => $total,
                 'pago_con' => $efectivo,
                 'vuelto' => $vuelto
        );

        $this->db->where('num_mesa', $mesa);
          $this->db->where('fecha_apertura', $fecha_abre);
        $this->db->update('acum_cargas', $datos);
        $query = $this->db->get('acum_cargas'); // Select the table products
        // return $query->result_array(); // Return the results in a array.

return true;
    
}







         function hojaenblanco2($mesa) {
      //       $this->db->where('rubro', 2); // Select where id matches the posted id



             /*
$fechacarga = date('Y-m-d H:i:s');

                     $datos = array(
            'fecha_apertura' => $fechacarga,
        );

        $this->db->where('id_mesa', $mesa);
        $this->db->update('mesas', $datos);
        $query = $this->db->get('mesas'); // Select the table products

            */



             

             $datos = array(
            'estado' => 4,
        );

        $this->db->where('id_mesa', $mesa);
        $this->db->update('mesas', $datos);
        $query = $this->db->get('mesas'); // Select the table products
        // return $query->result_array(); // Return the results in a array.








      $query = $this->db->get('tablafalsa'); // Select the table products
      return $query->result_array(); // Return the results in a array.
      }



    /*

      function retrieve_products() {
      //       $this->db->where('rubro', 2); // Select where id matches the posted id
      $query = $this->db->get('productos'); // Select the table products
      return $query->result_array(); // Return the results in a array.
      }

      function menu_products($tomado) {
      $this->db->where('rubro', $tomado); // Select where id matches the posted id
      $query = $this->db->get('productos'); // Select the table products
      return $query->result_array(); // Return the results in a array.
      }









      function subir() {  //  esta funcion recibira parametros... o del mismo carrito
      $fechacom = date('Y-m-d H:i:s');

      $data = array(
      'id_usuario' => 35, // el usuario sera el que inicie sesion en este ejemplo es 35, inexistente,
      'fecha' => $fechacom
      );
      $this->db->insert('carrito', $data);


      $this->db->where('fecha', $fechacom); // Select where id matches the posted id
      $query2 = $this->db->get('carrito'); // recupero el id del carrito que genere recien, para que los items pertencezca a ese carrito


      $fechan = $query2->row_array();



      /*
      $data = array(
      'id_usuario' => 22, // el usuario sera el que inicie sesion en este ejemplo es 35, inexistente,
      'fecha' => $fechan['fecha']
      );
      $this->db->insert('carrito', $data);

     */

    /*
      foreach ($this->cart->contents() as $item) {
      $data = array(
      'id_carrito' => $fechan['id_carrito'],
      'id_articulo' => $item['id'],
      'precio' => $item['price'],
      'cantidad' => $item['qty']
      );
      $this->db->insert('carrito_items', $data);
      }
      }

















      // Updated the shopping cart
      function validate_update_cart() {

      // Get the total number of items in cart
      $total = $this->cart->total_items();

      // Retrieve the posted information
      $item = $this->input->post('rowid');
      $qty = $this->input->post('qty');

      // Cycle true all items and update them
      for ($i = 0; $i < $total; $i++) {
      // Create an array with the products rowid's and quantities.
      $data = array(
      'rowid' => $item[$i],
      'qty' => $qty[$i]
      );

      // Update the cart with the new information
      $this->cart->update($data);
      }
      }

      function validate_add_cart_item() {
      $id = $this->input->get('product_id'); // Assign posted product_id to $id
      $cty = $this->input->get('quantity'); // Assign posted quantity to $cty
      $this->db->where('codigo', $id); // Select where id matches the posted id
      $query = $this->db->get('productos', 1); // Select the products where a match is found and limit the query by 1
      // Check if a row has matched our product id
      if ($query->num_rows > 0) {
      // We have a match!
      foreach ($query->result() as $row) {
      // Create an array with product information
      $data = array(
      'id' => $id,
      'qty' => $cty,
      'price' => $row->precio,
      'name' => $row->descripcion,
      );
      // Add the data to the cart using the insert function that is available because we loaded the cart library
      $this->cart->insert($data);
      return TRUE; // Finally return TRUE
      }
      } else {
      // Nothing found! Return FALSE!
      return FALSE;
      }
      }



     */
}
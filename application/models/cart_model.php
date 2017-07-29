<?php

class Cart_model extends CI_Model { // Our Cart_model class extends the Model class

    function __construct() {
        parent::__construct();
    }

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








    

}
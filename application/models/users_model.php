<?php

class Users_Model extends CI_Model {

    function username_check($user) {
        $this->db->where('usuario', $user);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    function email_check($email) {
         $this->db->where('email', $email);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        } 
    }


   function insert_user($name,$username,$email,$password,$tel,$date,$sexo,$calle,$direccion,$comentario){
$data=array(
    'nombre' => $name,
    'usuario' => $username,
    'email' => $email,
    'pass' => $password,
    'telefono' => $tel,
    'fechanac' => $date,
    'sexo' => $sexo,
    'calle' => $calle,
    'direccion' => $direccion,
    'comentarios' => $comentario, 
);

return $this->db->insert('usuarios',$data);

       
   }







}

?>

 <?php
class Inicio extends CI_Controller {

       function __construct(){
      parent::__construct();
   }

  

    public function index()    {

        $data['main_content']='cuerpoflash';
         $data['title']='.:. Restaurant Bonifacio .:. ';
      $this->load->view('includes/template',$data);
    }












/*
        public function menu()    {

        $data['main_content']='menu';
         $data['title']='.:. Restaurant Bonifacio .:. ';
      $this->load->view('includes/template',$data);
    }
    */





}
?>
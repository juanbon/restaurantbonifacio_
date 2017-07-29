 <?php
class Hola_mundo extends CI_Controller {

       function __construct(){
      parent::__construct();
   }

    function hola_mundos()    {


       
           $data['color'] = 'pink';

        $data['texto'] = 'hoy a cojerse a la profe';

   $this->load->view('hola_mundo',$data);

    }




    public function index()    {
        echo 'Hola mundo index';
    }



    public function paginas()    {

        $data['main_content']='contenido1';
         $data['title']='videotutorial';
      $this->load->view('includes/template',$data);
    }



}
?> 
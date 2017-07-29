<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title><?php echo $title; ?></title>
      <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/960.css"   />
      <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/reset.css"   />
      <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/text.css"   />
      <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/estilo.css"   />
      <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/anythingslider.css">
      </link>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
      <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/contact.css">
      </link>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/contact.js"></script>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
      <!-- / formulario  cobrar   -->
      <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/jquery_kwicks.css" />
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js" ></script>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery_kwicks.js" ></script>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/funciones.js" ></script>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.anythingslider.js"></script>
      <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.anythingslider.video.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">
      <style type='text/css'>
         .kwicks {
         width: 620px;
         height: 100px;
         }
         .kwicks > li {
         width: 150px;
         height: 100px;
         /* overridden by kwicks but good for when JavaScript is disabled */
         margin-left: 5px;
         float: left;
         }
        @font-face{
        font-family:<"cursivaFont">;
        src: url("font/Nickainley.otf");
        }
      </style>
      <script>
         $(function(){
         
             $('#slider').anythingSlider({
                 resizeContents      : true,
                 addWmodeToObject    : 'transparent',
                 navigationFormatter : function(index, panel){ // Format navigation labels with text
                     return ['Intro', 'Menu-Doble', 'Video-Online', 'Mesa-general', 'Interior'][index - 1];
                 }
             });
         });
         
         var link = "<?php echo base_url(); ?>";
      </script>
   </head>
   <body>
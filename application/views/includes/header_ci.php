<div   class="container_12" id="header">

    <div class="grid_4" style="height:120px;" >
      
        
        <div class="alpha grid_4" style="text-align: center;height:40px;">
            <span class="restaurant" style="font-size:35px;" >Restaurant</span>
        </div>

         <div class="alpha grid_4" style="text-align: center;height:80px;">
          <span class="bonifacio" style="font-size:60px;" >Bonifacio</span>

         </div>


</div>
        <div class="grid_8" style="height:120px;" >



<br>
  <ul class='kwicks kwicks-horizontal'>
            <li id='panel-1'>

                <div style="width:250px;">
                <div class="menu" ><?php echo anchor('inicio','HOME');  ?>  </div>

                 <div id="home" style="width:250px;height:40px;font-size: 11px" class="mensaje" >
                 Desde aqui puede ver la informacion
                 del sitio, accediendo a las funciones del mismo.</div>

                </div>

            </li>


            <li id='panel-2'>
                  <div style="width:250px;">
                <div  class="menu" ><?php echo anchor('cart','MENU');  ?> </div>

                 <div id="menu" style="width:250px;height:40px;font-size: 11px" class="mensaje" >
                 Puede visualizar los productos y <br> cargarlos a su carrito de compras.</div>

                </div>
            </li>
            <li id='panel-3'>
                  <div style="width:250px;">
                <div  class="menu" >RESERVAS </div>

            <div id="reservas" style="width:250px;height:40px;font-size: 11px" class="mensaje" >
                 Usted puede reservar un mesa, para<br> una fecha y horario disponible.</div>



                </div>
            </li>

            <li id='panel-4'>
                  <div style="width:250px;">
                      <div  class="menu" >UBICACI&Oacute;N </div>

                       <div id="ubicacion" style="width:250px;height:40px;font-size: 11px" class="mensaje" >
                 Se escuentra detallada la ubicacion <br>de nuestro restaurant.</div>




                </div>
            </li>
        </ul>
  
        <script src='<?php echo base_url();?>js/jquery_kwicks.js' type='text/javascript'></script>

        <script type='text/javascript'>
            $().ready(function() {
                $('.kwicks').kwicks({
                    size: 150,
                    maxSize : 250,
                    spacing : 6,
                    behavior: 'menu'
                });
            });
        </script>













</div>
    </div>

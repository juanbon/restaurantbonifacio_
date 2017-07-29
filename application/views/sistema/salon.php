<?php     header("Access-Control-Allow-Origin: *"); ?>
<div class="container_12" id="salon" >
   <div class="grid_12" style="height: 10px;" >
   </div>
   <div class="grid_12" style="margin:0px;height: 185px;background-color:#383D39" >
      <div  style="margin:0px;width:960px;height: 140px;background-color:#383D39" >
         <?php
            //   abro el formulario
            $attributes = array('id' => 'mesas');
            
            echo form_open('sistema/abrir_mesa', $attributes);
            ?>
         <?php foreach ($mesas as $p): ?>
         <div title="Mesa <?php echo $p['descripcion']; ?> " onClick="mesaselect(<?php echo $p['id_mesa']; ?>)" class="mesa<?php echo $p['color']; ?>" id="mesa<?php echo $p['id_mesa']; ?>"  ><?php echo $p['id_mesa']; ?></div>
         <?php endforeach; ?>
      </div>
      <div id="mesadata"  >
         <div style="width:960px;height: 20px;"></div>
         <div >
            <!--     contiene los botones  -->
            <div  style="float:left;width:190px;margin-left:50px;">
               <?php
                  $mesa = array(
                      'disabled' => 'disabled',
                      'style' => 'text-align:center;background-color:#E3E0D5;color:red;font-size:13px;font-weight:bold;',
                      'class' => 'cajainput',
                      'size' => '4',
                      'name' => 'mesa',
                      'id' => 'mesa',
                      'value' => set_value('mesa'),
                  );
                  
                  
                  echo 'Mesa:';
                  echo form_input($mesa);
                  ?>
               <div style="float:left;">
                  <?php
                     //   este input hidden alternanra lo valores   width: 30px;
                     // no habra un submit especifico, varios botones donde habra funciones
                     
                     /*
                     
                       $submit = array(
                       'name' => 'submit',
                       'id' => 'submit',
                       'value' => 'Enviar',
                       );
                     
                      */
                     
                     echo "</div><div  style='float:left;width:30px;'></div>";
                     
                     
                     
                     $reg = array(
                         'size' => '3px',
                         'name' => 'botonabrir',
                         'id' => 'botonabrir',
                         'class' => 'botonsistema',
                         'content' => ' Abrir mesa ',
                     );
                     
                     
                     
                     
                     
                     echo form_button($reg, 'Abrir mesa');
                     ?>
               </div>
            </div>
            <div style="float:left;width:300px;">
               <?php
                  $reg = array(
                      'size' => '3px',
                      'name' => 'botoncerrar',
                      'id' => 'botoncerrar',
                      'class' => 'botonsistema',
                      'content' => ' Cerrar mesa ',
                  );
                  
                  
                  
                  
                  
                  echo form_button($reg, 'Cerrar mesa');
                  ?>
            </div>
            <div style="float:left;width:100px">
               <?php
                  $reg = array(
                      'size' => '3px',
                      'name' => 'botonunir',
                      'id' => 'botonunir',
                      'class' => 'botonsistema',
                      'content' => ' Unir ',
                  );
                  
                  
                  
                  
                  echo form_button($reg, 'Ir a login');
                  ?>
            </div>
            <div style="float:left;width:100px;">
               <?php
                  $reg = array(
                      'size' => '3px',
                      'name' => 'botonseparar',
                      'id' => 'botonseparar',
                      'class' => 'botonsistema',
                      'content' => ' Separar ',
                  );
                  
                  
                  
                  
                  
                  echo form_button($reg, 'Separar');
                  ?>
            </div>
            <div style="float:left;">
               <?php
                  $reg = array(
                      'size' => '3px',
                      'name' => 'botontransferir',
                      'id' => 'botontransferir',
                      'class' => 'botonsistema',
                      'content' => ' Transferir ',
                  );
                  
                  
                  
                  
                  
                  echo form_button($reg, 'Ir a login');
                  ?>
            </div>
         </div>
         <!-- contiene los botones   -->
         <?php echo validation_errors(); ?>
         <?php echo form_close(); ?>
      </div>
      <div class="grid_12" id="cajainf">
         <div class="derecha" >
            <span style="line-height: 20px;padding:10px">Listado en grilla</span> 
            <div id="capanm">
               <div id="capanmd">Mesa N&#176;:</div>
               <div id="caja_numero">
                  <input disabled type="text" name="numero_mesa" id="numero_mesa" value="">
               </div>
            </div>
            <div class="derechaint">
               <!--  formulario pedido carga de productos    -->
               <?php echo $this->view($contenidoprod); ?>
            </div>
         </div>
         <div style="height:519px;float:left;width:460px;" >
            <div class="derecha" >
               <span style="padding:10px">Pedidos por mesa</span>
               <div class="derechaint">
                  <div class="formularioinf">
                     <div style="margin:10px;float:left;width:210px;height: 130px;">
                        <div style="height:43.3px;width: 100%;clear:both;">
                           <div style="text-align:left" class="cargatexto">Cliente: </div>
                           <div class="cargainput">
                              <div style="height:10px"></div>
                              <!--  esto es de prueba      -->              <input id="cliente"  class="cajainput" type="text">
                           </div>
                        </div>
                        <div style="height:43.3px;width: 100%;clear:both;">
                           <div  style="text-align:left" class="cargatexto">Mozo: </div>
                           <div id="mozo" class="cargainput">
                              <div style="height:10px"></div>
                              <div id="mozo_mesa" ></div>
                           </div>
                        </div>
                        <div style="height:43.3px;width: 450px;float:left;">
                           <div style="width:150px;"class="cargatexto">Cantidad de comensales: </div>
                           <div  style="width:100px" class="cargainput">
                              <div style="height:10px"></div>
                              <div style="float:left"><input  id="comensales"   disabled style="font-weight: bold;color:red;text-align:center;background-color:#EDEDED" size="2px" class="cajainput"  type="text"></div>
                              <div style="float:left;width:10px;">&nbsp;</div>
                              <div style="float:left"><input class="botonsistema" style="font-size: 16px;width:20px;text-align:center;outline: 0" id="suma_comen" type="button" value="+"></div>
                              <div style="float:left;width:3px;">&nbsp;</div>
                              <div style="float:left"><input class="botonsistema" style="font-size: 16px;width:20px;text-align:center;outline: 0" id="resta_comen" type="button" value=" - "></div>
                           </div>
                           <div style="float:left;height:43.3px;width: 20px"></div>
                           <div style="height:43.3px;width: 160px;float:left;">
                              <div style="line-height: 41px;font-weight: normal;height:43.3px;width: 105px;float:left;" >Servicio de mesa:</div>
                              <div style="line-height: 41px;height:43.3px;width: 55px;float:left;text-align: right;" id="cubiertos"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tablaprod2">
                     <div style="font-weight:normal;height:27px;width:432px;background-color:#BCC5CC;">
                        <div class="lineahtabla2"></div>
                        <div class="primerot2">Cantidad</div>
                        <div class="lineavtablatop2"></div>
                        <div class="segundot2">Producto</div>
                        <div class="lineavtablatop2"></div>
                        <div class="tercerot2">Precio U.</div>
                        <div class="lineavtablatop2"></div>
                        <div class="cuartot2">Precio T.</div>
                        <div class="lineahtabla2"></div>
                     </div>
                     <div id="pedidos_agregados" class="tabla2">
                        <?php echo $this->view('sistema/cargados.php'); ?>
                     </div>
                  </div>
                  <div style="margin-left: 15px;clear:both;width:432px;height:13px;"></div>
                  <!--   aca tendre los valores del producto seleccionado , que puedo eliminarlos  -->
                  <input type="hidden" id="id_prod" >
                  <!--  tomo el valor que tiene mesaoculta   este es el id, ahora cambiaremos de color el div  mesaoculta  -->
                  <!--   aca tendre los valores del producto seleccionado , que puedo eliminarlos  -->
                  <div style="margin-left: 15px;clear:both;width:432px;height:110px;">
                     <div  style="height:25px;width: 432px;font-weight: bold;color:red">
                        *Para quitar un producto de la lista, haga click sobre el mismo
                     </div>
                     <div style="clear:both;width: 432px;height: 60px;">
                        <div style="clear:both;width: 432px;height: 15px;"></div>
                        <div style="height:22.5px;width: 432px;">
                           <div style="float:left;width:150px">
                              <div style="float: left;width:100px;height: 22.5px; " >
                                 Cant. de Items:
                              </div>
                              <div id="cant_items" style="text-align: right;float:left;width:50px;height:22.5px"></div>
                           </div>
                           <div style="height: 22.5px;width:282px;float:left" >
                              <div style="text-align: right;float:left;width:186px;height: 22.5px">Subtotal:</div>
                              <div id="subtotal"  style="float:left;width:96px;height: 22.5px;text-align: right;"></div>
                           </div>
                        </div>
                        <div style="height:22.5px;width: 432px ">
                           <div style="float:left;width:150px">
                              <div style="float: left;width:100px;height: 22.5px; " >
                              </div>
                              <div id="cant_items" style="text-align: right;float:left;width:50px;height:22.5px;"></div>
                           </div>
                           <div style="height: 22.5px;width:282px;float:left;" >
                              <div style="text-align: right;float:left;width:186px;height: 22.5px">Descuento(%):</div>
                              <div style="float:left;width:96px;height: 22.5px;text-align: right;"><input size="6px" disabled type="text" id="descuento" name="descuento" class="cajainput"></div>
                           </div>
                        </div>
                     </div>
                     <div style="float:left;width:250px;height: 24px;">
                        <div style="float:left;width:100px;height:24px;">
                           <input type="button" id="comanda" class="botonsistema" style="display:none;background-color:orange !important"value="Imprimir Ticket">
                        </div>
                        <div style="float:left;width:30px;height:24px;">
                        </div>
                        <div style="float:left;width:60px;height:24px;">
                           <div id='contact-form'>
                              <input type="button" id="pago" class="botonsistema" value="Cobrar">
                           </div>
                        </div>
                     </div>
                     <div style="position:relative;left:40px;width:150px;font-size: 18px;float:left">
                        <div style="float:left" >
                           Total:
                        </div>
                        <div id ="totalfinal" style="width:93px;float:left;text-align: right"></div>
                        <input type="hidden" id="totalfinal_oculto">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
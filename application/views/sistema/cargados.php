
<?php   $total=0;   ?>



                                <?php foreach ($contenidopedido as $p): ?>


                                                    <div   id="producto<?php echo $p['id_carga']; ?>"  onmouseover='this.style.background="#D1D1D1"' onmouseout='this.style.background=""'    onclick="confirmacion('<?php echo $p['id_carga']; ?>',<?php echo @$mesaoculta; ?>);"     style="font-size:12px;" class="contenedort">
                                                        <div class="lineaverti"></div>
                                                        <div  class="primerot2"><?php echo $p['cantidad']; ?></div>
                                                        <div class="lineahori"></div>
                                                        <div class="segundot2"><?php echo $p['descripcion']; ?></div>
                                                        <div class="lineahori"></div>
                                                        <div class="tercerot2"><?php echo $p['precio']; ?></div>
                                                        <div class="lineahori"></div>
                                                         <div style="width:50px;" class="cuartot2"><?php
                                                         
                                                         $subt=$p['cantidad']*$p['precio'];
                                                         echo $subt.".00";

                                                         $total=$total+$subt;

                                                         ?></div>
                                                        <div class="lineaverti"></div>
                                                    </div>

                                <?php endforeach; ?>

<input type="hidden" id="total" name="total" value="<?php echo $total; ?>">

<?php

$cantidad=count($contenidopedido);

?>
<input type="hidden" id="cantidaditem"  value="<?php echo $cantidad; ?>">
<input type="hidden" id="mesaoculta"  value="<?php echo @$mesaoculta; ?>">   <!-- truchisimo -->



<script >
$(document).ready(function(){


 //    var total = $("#total").val();     ESTE VALOR SE LLEVA JQUERY 

      var cantidaditems = $("#cantidaditem").val();

  //  $("#total_oculto").val(valortal);

  //  var valortal='$'+total+'.00';

 //   $("#subtotal").html(valortal);
 //  $("#totalfinal").html(valortal);
 $("#cant_items").html(cantidaditems);
















































var total = $("#total").val();       


 //     setTimeout("  var total = $('#total').val(); ", 3000);  //    retraso de codigo



total=parseInt(total);    //  FAIL

var comensales = $("#comensales").val();

if(!(comensales))
    {
        comensales=0;
    }

comensales=parseInt(comensales);    //

//comensales=parseInt(comensales);    // este es el verdadero

//var valor_cubiertos=comensales*5;    // este es el verdadero

// $("#cubiertos").html('$'+valor_cubiertos+',00');    // este es el verdadero


//  $("#comensales").val(cart);    // este es el verdadero


var nuevo_total=total+(comensales*5);     // FAIL

var subtotal='$'+total+'.00';      // FAIL

 var valortotal='$'+nuevo_total+'.00';     //  FAIL

    $("#subtotal").html(subtotal);      //  FAIL
   $("#totalfinal").html(valortotal);  //    FAIL


$("#totalfinal_oculto").val(nuevo_total);






















});


</script>
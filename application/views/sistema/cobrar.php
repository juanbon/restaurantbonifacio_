
<div style='display:none'>
	<div class='contact-top'><b>Formas de pago</b></div>
	<div class='contact-content'>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		<form action='#' style='display:none'>
<div style="background-color:#E7E5E6;width:450px;height:350px;">


   
<div style="width:450px;height:40px ;line-height: 40px;color:black;font-weight: bold;clear:both">
    <div style="margin-left:85px;float:left;">Total :</div><div id="totalfactura" class="totalfac">
    </div>
    <input type="hidden"  id="totaloculto"   >
    <input type="hidden"  id="mesaoculta2" value=""  >
</div>

<div style="width:450px;height:40px ;line-height: 50px;color:black;font-weight: bold;clear:both">
    <div style="width:200px;margin-left:85px">
        <div class="tipopago">Efectivo $</div>
        <div style="line-height:40px;width:20px;height:40px ;float:left;text-align:center">=</div>
       <div style="float:left;">
        <div style="width:60px;height:12px ;clear:both"></div>
        <div style="clear: both;width:50px;float:left;vertical-align:50px">
            <input style="border:1px solid #717171;" id="efectivo"     type="text" class="cajainput onlynumber"></div>
   </div>
    </div>
</div>

    <div style="clear:both;height: 5px;"></div>

<!-- segundo -->
<div style="width:450px;height:40px ;line-height: 50px;color:black;font-weight: bold;clear:both">
    <div style="width:200px;margin-left:85px">
        <div class="tipopago">Tarjet Debito $</div>
        <div style="line-height:40px;width:20px;height:40px ;float:left;text-align:center">=</div>
       <div style="float:left;">
        <div style="width:60px;height:12px ;clear:both"></div>
        <div style="clear: both;width:50px;float:left;vertical-align:50px">
            <input  style="border:1px solid #717171;" disabled id="tardeb" type="text" class="cajainput"></div>
   </div>
    </div>
</div>

    <div style="clear:both;height: 5px;"></div>

<!--   tercero-->
<div style="width:450px;height:40px ;line-height: 50px;color:black;font-weight: bold;clear:both">
    <div style="width:200px;margin-left:85px">
        <div class="tipopago">Tarjeta Credito $</div>
        <div style="line-height:40px;width:20px;height:40px ;float:left;text-align:center">=</div>
       <div style="float:left;">
        <div style="width:60px;height:12px ;clear:both"></div>
        <div style="clear: both;width:50px;float:left;vertical-align:50px">
            <input style="border:1px solid #717171;" disabled id="tarcred" type="text" class="cajainput"></div>
   </div>
    </div>
</div>

    <div style="clear:both;height: 5px;"></div>

<!-- ultimo -->

<div style="width:450px;height:40px ;line-height: 50px;color:black;font-weight: bold;clear:both">
    <div style="width:200px;margin-left:85px">
        <div class="tipopago">Vales $</div>
        <div style="line-height:40px;width:20px;height:40px ;float:left;text-align:center">=</div>
       <div style="float:left;">
        <div style="width:60px;height:12px ;clear:both"></div>
        <div style="clear: both;width:50px;float:left;vertical-align:50px">
            <input id="vales"  disabled type="text" style="border:1px solid #717171;" class="cajainput"></div>
   </div>
    </div>
</div>

    <div style="clear:both;height: 5px;"></div>


    <div style="width:450px;height:40px ;line-height: 40px;color:black;font-weight: bold;clear:both">
    <div style="width:80px;margin-left:128px;float:left;">Paga con :</div>
    <div style="float:left;width:10px;"></div>


          <div style="float:left;">
        <div style="width:60px;height:12px ;clear:both"></div>
        <div style="clear: both;width:50px;float:left;vertical-align:50px">
            <input id="pagacon" disabled type="text" style="border:1px solid #717171;" class="cajainput"></div>
   </div>


    </div>


<div style="clear: both;width:450px;height: 30px;">





      <div style="line-height: -40px;color:black;font-weight: bold;width:80px;margin-left:150px;float:left;">Vuelto :</div>
    <div style="float:left;width:10px;"></div>


          <div style="float:left;">
        <div style="width:60px;height:12px ;clear:both"></div>
        <div style="clear: both;width:50px;float:left;vertical-align:50px">
            <div id="vuelto" style="font-size:14px;float:left;color:red;font-weight:bold;width:40px;line-height: 0px"></div>
   </div>










	
</div>



     <div style="width:450px;height:30px ;line-height: 40px;color:black;font-weight: bold;clear:both">
         <div style="margin-left:110px">
		<input type='button' id="enviacobro"     onclick="verificarcobro();"    name="enviacobro" class='botonsistema' value="Aceptar" >
	<input type='button' class='contact-cancel contact-button simplemodal-close'  id='botonsistema' value="Cancelar" >
 </div> </div>




</div>

                        
                        
                        
                        

                   </div>
		</form>
	</div>
</div>

<script>
$(document).ready(function(){


       $(".onlynumber").keydown(function (e) {
           // Allow: backspace, delete, tab, escape, enter and .
           if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
               (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                // Allow: home, end, left, right, down, up
               (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
           }
           // Ensure that it is a number and stop the keypress
           if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
               e.preventDefault();
           }
       });



});
</script>

	

<div class="container_12" id="container">

    <br>

    <div class="grid_8" style="height:35px; background-image: url(img/vi.png)" >

        <div class="alpha grid_2" style="height:40px;"><div class="rubro"> <?php echo anchor('cart','PRODUCTOS');  ?></div></div>
        <div class=" alpha grid_2 omega" style="height:30px;"><div class="rubro"><?php echo anchor('cart/categoria/1','PIZZAS GRANDES');  ?></div></div>
        <div class="grid_2" style="height:30px;"><div class="rubro"><?php echo anchor('cart/categoria/5','BEBIDAS S/ ALCOHOL');  ?></div></div>
        <div  class="grid_2 omega" style="height:30px;"><div class="rubro"><?php echo anchor('cart/categoria/7','POSTRES');  ?></div></div>
    </div>

    <div class="grid_4">
        
        
      <input type="text" ></input>Buscar



    </div>

<div class="grid_12" style="height:6px" ></div>



    <div class="grid_8" style="height:35px; background-image: url(img/vi.png)" >
        <div class="alpha grid_2" style="height:40px;"><div class="rubro"><?php echo anchor('cart/categoria/4','MINUTAS');  ?></div></div>
        <div class=" alpha grid_2 omega" style="height:30px;"><div class="rubro"><?php echo anchor('cart/categoria/2','EMPANADAS');  ?></div></div>
        <div class="grid_2" style="height:30px;"><div class="rubro"><?php echo anchor('cart/categoria/6','BEBIDAS C/ ALCOHOL');  ?></div></div>
        <div  class="grid_2 omega" style="height:30px;"><div class="rubro"><?php echo anchor('cart/categoria/3','ENSALADAS');  ?></div></div>
    </div>


 <div class="grid_4">
<?php if($barra_estado){

    echo "Usuario: blabla";
} else{
    // botones
    ?>

     <button type="button" Onclick="login('<?php echo base_url();?>')" id="login" name="" class="button red">Login</button>
     <button type="button" Onclick="register('<?php echo base_url();?>')" id="registrarse" name="" class="button red">Registrarse</button>


   <?php
}
?>
</div>






    <div class="grid_12" style="height:10px" ></div>





    <div class="grid_8"  style="margin-left:0px;">


        <ul class="products">
            <?php foreach ($contenido as $p): ?>
                <li>
                    <h3><?php echo $p['descripcion']; ?></h3>
                <?php echo $p['precio']; ?>$
                <?php echo form_open('cart/add_cart_item'); ?>
                <fieldset>
                    <label>Quantity</label>
                    <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                    <?php echo form_hidden('product_id', $p['codigo']); ?>
                    <?php echo form_submit('add', 'Add'); ?>
                </fieldset>
                <?php echo form_close(); ?>
                </li>
            <?php endforeach; ?>
                </ul>









            </div>

            <div class="grid_4" style="background-color:blue;">


                <div class="cart_list">
                    <h3>Carrito de compras</h3>
                    <div id="cart_content">
                <?php echo $this->view('cart.php'); ?>
            </div>
        </div>





    </div>

    <div class="clear"></div>


</div>


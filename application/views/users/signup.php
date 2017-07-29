

<?php
$attributes = array('id' => 'register_users');
echo form_open('users/create_account', $attributes);

$name = array(
    'name' => 'name',
    'id' => 'name',
    'value' => set_value('name'),
);

$username = array(
    'name' => 'username',
    'id' => 'username',
    'value' => set_value('username'),
);


$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => set_value('email'),
);


$password = array(
    'name' => 'password',
    'id' => 'password',
    'value' => '',
);

$re_password = array(
    'name' => 're_password',
    'id' => 're_password',
    'value' => '',
);

$tel = array(
    'name' => 'tel',
    'id' => 'tel',
    'value' => set_value('tel'),
);





$fecha = array(
    'name' => 'date',
    'id' => 'date',
    'value' => set_value('date'),
);



$options = array(
    '0' => 'Elegir sexo',
    '1' => 'Hombre',
    '2' => 'Mujer',
    '3' => 'Sin especificar',
);

$calle = array(
    'name' => 'calle',
    'id' => 'calle',
   'value' => set_value('calle'),
);


$direccion = array(
    'name' => 'direccion',
    'id' => 'direccion',
   'value' => set_value('direccion'),
);


$comentario = array(
    'name' => 'comentario',
    'id' => 'comentario',
    'value' => set_value('comentario'),
    'cols' => '25',
    'rows' => '5',
);



$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Enviar',
);
?>


<div class="container_12" style="height: 100%">

    <div class="prefix_3 grid_7"  >
        <div class="grid_6" style="background-image:url(../img/ok.png)" id="formulario_registro" style="height:400px" >
            <div id="nombre" class="campo_formulario">

<?php
echo '<div id="label">Nombre:</div>';
echo form_input($name);
?>

                <span class="errors">
<?php form_error('name'); ?>
                </span>

            </div>



            
            <div id="usuario" class="campo_formulario">
<div style="width:280px;float: left">
<?php
echo '<div id="label">usuario:</div>';
echo form_input($username);
?></div>
                <div class="username" style="float:left;width: 40px;height: 30px;"></div>

                <span class="errors">
<?php form_error('username'); ?>
                </span>

            </div>


            
<br><br>
            <div id="email" class="campo_formulario">
<?php
echo '<div id="label">email:</div>';
echo form_input($email);
?>

                <span class="errors">
<?php form_error('email'); ?>
                </span>
            </div>

            <div id="pass" class="campo_formulario">
<?php
echo '<div id="label">password:</div>';
echo form_password($password);
?>

                <span class="errors">
<?php form_error('password'); ?>
                </span>
            </div>


            <div id="pass2" class="campo_formulario">
<?php
echo '<div id="label">Repita password:</div>';
echo form_password($re_password);
?>

                <span class="errors">
<?php form_error('re_password'); ?>
                </span>
            </div>

            <div id="telefono" class="campo_formulario">

<?php
echo '<div id="label">Telefono:</div>';
echo form_input($tel);
?>

                <span class="errors">
<?php form_error('telefono'); ?>
                </span>

            </div>




            <div id="fecha" class="campo_formulario">

<?php
echo '<div id="label">Fecha de nacimiento:
    <br>dd/mm/aaaa</div>';
echo form_input($fecha);
?>

                <span class="errors">
<?php form_error('fecha'); ?>
                </span>

            </div>





            <br><div id="sexo" class="campo_formulario">

<?php
echo '<div id="label">Sexo:</div>';
echo form_dropdown('sexo', $options, '0');
?>

                <span class="errors">
<?php form_error('sexo'); ?>
                </span>

            </div>



            <div id="calle" class="campo_formulario">

<?php
echo '<div id="label">Calle:</div>';
echo form_input($calle);
?>

                <span class="errors">
<?php form_error('calle'); ?>
                </span>

            </div>


            <div id="direccion" class="campo_formulario">

<?php
echo '<div id="label">Direccion:</div>';
echo form_input($direccion);
?>

                <span class="errors">
<?php form_error('direccion'); ?>
                </span>

            </div>


            <div id="comentario" class="campo_formulario">

<?php
echo '<div id="label">Comentarios:</div>';
echo form_textarea($comentario);
?>

                <span class="errors">
<?php form_error('comentario'); ?>
                </span>

            </div>






<br>
            <div id="boton_submit">
<?php
$submit = array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Crear cuenta',
    'class' => 'button red'
);


echo form_submit($submit, 'Enviar');


$reg = array(
    'name' => 'boton',
    'id' => 'boton',
    'class' => 'button red',
    'content' => 'Ir a login',
);


$js = 'onClick="login(\'' . base_url() . '\')"';

echo form_button($reg, 'Ir a login', $js);
?>
            </div>

<?php echo validation_errors(); ?> 

<?php echo form_close(); ?>

        </div>
    </div>
</div>
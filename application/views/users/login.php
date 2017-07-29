


<div class="container_12" style="height: 100%">
    <div class="grid_12">


        <div id="form_login" >


            <div class="grid_12" style="height:90px"></div>




            <div class="prefix_4 grid_6 suffix_2" >


                <?php
                $attributes = array('id' => 'loginform', 'class' => 'formularioclase');

                echo form_open('users/verify_login', $attributes);


                 echo "<div style='padding-left: 80px;'>";

                $username = array(
                    'name' => 'username',
                    'id' => 'username',
                    'value' => set_value('username'),
                );
              echo "Nombre:";
               
                echo form_input($username);
                echo form_error('username');

                echo "</div>";


                echo "<div style='padding-left: 70px;'>";
                $password = array(
                    'name' => 'pass',
                    'id' => 'pass',
                    'value' => '',
                );
                echo '<br>Password:';
                echo form_password($password);
                echo form_error('password');

                echo "</div>";

                $submit = array(
                    'name' => 'submit',
                    'id' => 'submit',
                    'value' => 'Ingresar',
                    'class' => 'button red'
                );

                echo "<br>";
                echo form_submit($submit, 'Ingresar');


                $reg = array(
                    'name' => 'boton',
                    'id' => 'boton',
                    'class' => 'button red',
                    'content' => 'Crear una cuenta nueva',
                );


                $js = 'onClick="register(\'' . base_url() . '\')"';

                echo form_button($reg, 'Crear una cuenta nueva', $js);
                ?>

                <?php echo form_close(); ?>



            </div>
          



        </div>

    </div>
</div>



                    <?php
                        $attributes = array('id' => 'cargap');
                        echo form_open('sistema/carga_pedidos', $attributes);

                        $codigop = array(
                            'class' => 'cajainput',
                            'size' => '7px',
                            'name' => 'codigop',
                            'id' => 'codigop',
                            'value' => set_value('codigop'),
                        );


                        $descripcionp = array(
                            'class' => 'cajainput',
                            'name' => 'descripcionp',
                            'id' => 'descripcionp',
                            'value' => set_value('descripcionp'),
                        );


                        $cantidadp = array(
                            'style' => 'text-align:left',
                            'size' => '2px',
                            'class' => 'cajainput',
                            'name' => 'cantidadp',
                            'id' => 'cantidadp',
                            'value' => set_value('cantidadp'),
                        );


                        $agregarp = array(
                            'name' => 'agregarp',
                            'style' => 'width:60px;text-align:center',
                            'id' => 'agregarp',
                            'class' => 'botonsistema',
                            'content' => 'Agregar',
                        );
                    ?>





                        <div class="formularioinf">

                            <div style="margin:10px;float:left;width:210px;height: 130px;">

                                <div style="height:43.3px;width: 100%;clear:both;">
                                    <div class="cargatexto">C&oacute;digo: </div>
                                    <div class="cargainput"><div style="height:10px"></div>

                                    <?php
                                    echo form_input($codigop);
                                    ?>

                                </div>
                            </div>

                            <div style="height:43.3px;width: 100%;clear:both;">
                                <div class="cargatexto">Descripci&oacute;n: </div>
                                <div class="cargainput"><div style="height:10px"></div>

                                    <?php
                                    echo form_input($descripcionp);
                                    ?>

                                </div>
                            </div>

                            <div style="height:43.3px;width: 100%;clear:both;">
                                <div class="cargatexto">Cantidad: </div>
                                <div class="cargainput"><div style="height:10px"></div>
                                    <div style="float:left">

                                        <?php
                                        echo form_input($cantidadp);
                                        ?>


                                    </div><div style="float:left;width:36px;">&nbsp;</div>
                                    <div style="float:left">

                                        <?php
                                        echo form_button($agregarp, 'Agregar');
                                        ?>



                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>






                        </div>

                        <div style="position:relative;left:-15px;margin:10px;float:left;width:210px;height: 130px;">


<!--   aca recibo el stock de un determinado producto    -->

<input type="hidden" id="cantidad_stock">

<!--  aca recibo el stock de un determinado producto   -->


                            <div style="height:43.3px;width: 100%;clear:both;">
                                <div class="cargatexto">Rubro: </div>
                                <div  class="cargainput"><div style="height:10px"></div>


                                    <SELECT style=" border:1px solid #000000;" NAME="rubrosp" SIZE="1">

                                        <OPTION VALUE="0" selected>Todos</OPTION>
                                        <?php foreach ($select as $p): ?>

                                            <OPTION VALUE="<?php echo $p['id_rubro']; ?>"><?php echo $p['descripcion']; ?></OPTION>


                                        <?php endforeach; ?>

                                        </SELECT>


                                    </div>
                                </div>






<div class="antes_stock"></div><div id="cantidad_stock_sms"></div>




                            </div>


                        </div>





                        <div class="tablaprod">


                            <div style="font-weight:normal;height:27px;width:432px;background-color:#BCC5CC;">
                                <div class="lineahtabla"></div>
                                <div class="primerot">C&oacute;digo</div>
                                <div class="lineavtablatop"></div>
                                <div class="segundot">Descripci&oacute;n</div>
                                <div class="lineavtablatop"></div>
                                <div class="tercerot">Precio</div>
                                <div class="lineahtabla"></div>
                            </div>





                            <div  class="tabla">




                            <?php foreach ($contenido as $p): ?>


                                                <div onmouseover='this.style.background="#D1D1D1"' onmouseout='this.style.background=""' onClick="pre_compra('<?php echo $p['codigo']; ?>','<?php echo $p['descripcion']; ?>');" style="font-size:12px;" 
                                                    <?php
                                                    
                                                    if($p['stock']==0)
                                                    {
                                                    echo  "class='contenedort_stock' title='Producto sin stock' ";
                                                    }
                                                    else
                                                    {
                                                    echo  "class='contenedort'";
                                                    }


                                                     ?>

                                                     >
                                                    <div class="lineaverti"></div>
                                                    <div class="primerot"><?php echo $p['codigo']; ?></div>
                                                    <div class="lineahori"></div>
                                                    <div class="segundot"><?php echo $p['descripcion']; ?></div>
                                                    <div class="lineahori"></div>
                                                    <div class="tercerot"><?php echo $p['precio']; ?></div>
                                                    <div class="lineaverti"></div>
                                                </div>

                            <?php endforeach; ?>









                                            </div>


                                        </div>






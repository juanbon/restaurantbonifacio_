$(document).ready(function () {


    $("#botonseparar").css('background-color','#A0A0A0');
    $("#botonunir").css('background-color','#A0A0A0');
    $("#botontransferir").css('background-color','#A0A0A0');
    // $("#comanda").css('background-color','#E0E0E0');



    var numeroimp = $("#numero_mesa").val();
    // var link = 'http://localhost/restaurantbonifacio/';

    if (numeroimp) {

        $.get(link + "sistema/show_cargados", {
            mesa: numeroimp
        }, function (cart) {
            $("#pedidos_agregados").html(cart);

        });


        $.get(link + "sistema/mesa_mozo_ajax", {
            mesa_mozo: numeroimp
        }, function (cart) {
            $("#mozo_mesa").html(cart);

        });



        $.get(link + "sistema/cuantos_comensal", {
            mesa: numeroimp
        }, function (cart) {


            cart = parseInt(cart); // este es el verdadero
            var valor_cubiertos = cart * 5; // este es el verdadero
            $("#cubiertos").html('$' + valor_cubiertos + ',00'); // este es el verdadero

            $("#comensales").val(cart); // este es el verdadero
        });

    } else {


        $.get(link + "sistema/hojaenblanco", function (cart) {
            $("#pedidos_agregados").html(cart);

        });

    }


    $("#footer_system").live("click", function () {

        var numeroimp = $("#total").val();

        alert(numeroimp);

    });

    $("#suma_comen").live("click", function () {

        var com = $("#comensales").val();

        if (com == '') {
            $("#comensales").val(0);

            $("#cubiertos").html('$00,00');

        } else {
            var asumar = $("#comensales").val();
            asumar++;
            $("#comensales").val(asumar);

            asumar = parseInt(asumar);

            var cubiertos = asumar * 5;

            $("#cubiertos").html('$' + cubiertos + ',00');

            var total_dinamico = $("#total").val();


            $("#subtotal").html('$' + total_dinamico + ',00');


            total_dinamico = parseInt(total_dinamico);
            cubiertos = parseInt(cubiertos);

            var nuevo_nuevo_t = total_dinamico + cubiertos;


            $("#totalfinal").html('$' + nuevo_nuevo_t + ',00');

            $("#totalfinal_oculto").val(nuevo_nuevo_t);

            // Get the product ID and the quantity
            var mesa = $("#numero_mesa").val();

            $.get(link + "sistema/mesa_comensal", {
                mesa: mesa,
                valor: asumar
            }

            );

        }


    });


    $("#resta_comen").live("click", function () {

        var com = $("#comensales").val();

        if (com == 0) {
            return false;
        }


        if (com == '') {
            $("#comensales").val(0);

            $("#cubiertos").html('$00,00');
        } else {

            var arestar = $("#comensales").val();
            arestar--;
            $("#comensales").val(arestar);

            arestar = parseInt(arestar);

            var cubiertos = arestar * 5;

            $("#cubiertos").html('$' + cubiertos + ',00');



            var total_dinamico = $("#total").val();


            $("#subtotal").html('$' + total_dinamico + ',00');


            total_dinamico = parseInt(total_dinamico);
            cubiertos = parseInt(cubiertos);

            var nuevo_nuevo_t = total_dinamico + cubiertos;


            $("#totalfinal").html('$' + nuevo_nuevo_t + ',00');


            $("#totalfinal_oculto").val(nuevo_nuevo_t);

            var mesa = $("#numero_mesa").val();

            $.get(link + "sistema/mesa_comensal", {
                mesa: mesa,
                valor: arestar
            }

            );


        }


    });


    $("#comanda").live("click", function () {

        if ($("#numero_mesa").val().length == 0) {
            alert("Debes abrir una mesa");
            return false;
        }

        // Get the product ID and the quantity
        var mesa = $("#numero_mesa").val();


        $.get(link + "sistema/total_pedidos", {
            mesa: mesa
        },



        function (data) {

            if (data == '1') {

                alert("La mesa no contiene productos cargados");
                return false;
            } else if (data == '505') {



                window.open(link + 'pdf_report/comanda/' + mesa);


            }

        });

    });


    $("#codigop").live("blur", function () {


        $('#codigop').css("background-color", '#FFFFFF'); // filas impares
        $('#descripcionp').css("background-color", '#FFFFFF'); // filas impares
        $('#cantidadp').css("background-color", '#FFFFFF'); // filas impares
        var codigo = $("#codigop").val();

        $.get(link + "sistema/valido_codigo", {
            codigo: codigo
        },



        function (data) {


            if (data == 'false') {

                $('#codigop').val('');
                $('#descripcionp').val('');
                $('#cantidadp').val('');


                alert('el codigo no existe')


            } else {


                if (data == 0) {

                    $("#cantidad_stock_sms").html('PRODUCTO SIN STOCK');


                    $("#cantidad_stock").val(data);


                    $.get(link + "sistema/trae_descripcion", {
                        codigo: codigo
                    },



                    function (data2) {

                        $("#descripcionp").val(data2);
                        $("#cantidadp").val('');

                        $('#codigop').css("background-color", '#FF0000'); // filas impares
                        $('#descripcionp').css("background-color", '#FF0000'); // filas impares
                        $('#cantidadp').css("background-color", '#FF0000'); // filas impares

                        $('#codigop').css("color", '#FFFFFF'); // filas impares
                        $('#descripcionp').css("color", '#FFFFFF'); // filas impares
                        $('#cantidadp').css("color", '#FFFFFF'); // filas impares
                    });


                    return false;

                }


                if (data != 0) {
                    $("#cantidad_stock_sms").html('Stock disponible: ' + data + ' unidades');

                    $("#cantidad_stock").val(data);

                }

                $.get(link + "sistema/trae_descripcion", {
                    codigo: codigo
                },

                function (data2) {

                    $("#descripcionp").val(data2);
                    $("#cantidadp").val('1');

                    $('#codigop').css("background-color", '#F7F500'); // filas impares
                    $('#descripcionp').css("background-color", '#F7F500'); // filas impares
                    $('#cantidadp').css("background-color", '#F7F500'); // filas impares


                    $('#codigop').css("color", '#000000'); // filas impares
                    $('#descripcionp').css("color", '#000000'); // filas impares
                    $('#cantidadp').css("color", '#000000'); // filas impares
                });


            }

        });

    });


    $("#efectivo").live("blur", function () {

        var efectivo = $("#efectivo").val();

        var total = $("#totaloculto").val();

        total = parseInt(total);

        if (isNaN(efectivo)) {
            return false;
        } else {
            efectivo = parseInt(efectivo);

            if ((total < efectivo) || (total == efectivo)) {
                //  alert("cuenta valida");
                var resultado = efectivo - total;
                $("#vuelto").html('$' + resultado);
            } else {
                $("#vuelto").html('');
            }
        }


    });


    $("#agregarp").live("click", function () {

        $('#codigop').css("background-color", '#FFFFFF'); // filas impares
        $('#descripcionp').css("background-color", '#FFFFFF'); // filas impares
        $('#cantidadp').css("background-color", '#FFFFFF'); // filas impares

        if ($("#numero_mesa").val().length == 0) {

            alert("Para cargar un producto debes abrir una mesa");

            return false;
        } else

        {


            if ($("#cantidad_stock").val() == 0) {
                return false;
            }


            if (($("#cantidadp").val().length == 0) || ($("#cantidadp").val() == 0)) {
                alert("Ingrese una cantidad valida del producto");
                return false;
            }

            var requerido = $("#cantidadp").val();

            var stock_disponible = $("#cantidad_stock").val();

            stock_disponible = parseInt(stock_disponible);
            requerido = parseInt(requerido);

            if (requerido > stock_disponible) {
                alert("La cantidad requerida supera el stock disponible");

                $("#cantidadp").val('');
                return false;
            } else

            {


                var codigo_prod = $("#codigop").val();

                var stock = $("#cantidad_stock").val();

                if (stock == 0) {

                    $("#cantidad_stock_sms").html('PRODUCTO SIN STOCK');

                    $('#codigop').css("background-color", '#FF0000'); // filas impares
                    $('#descripcionp').css("background-color", '#FF0000'); // filas impares
                    $('#cantidadp').css("background-color", '#FF0000'); // filas impares

                    $('#codigop').css("color", '#FFFFFF'); // filas impares
                    $('#descripcionp').css("color", '#FFFFFF'); // filas impares
                    $('#cantidadp').css("color", '#FFFFFF'); // filas impares


                    return false;
                } else {

                    var requerido = $("#cantidadp").val();
                    var stock = $("#cantidad_stock").val();

                    var nuevo_stock = stock - requerido;

                    $("#cantidad_stock").val(nuevo_stock);

                    $("#cantidad_stock_sms").html('Stock disponible: ' + nuevo_stock + ' unidades');


                    $.get(link + "sistema/actualizo_stock", {
                        codigo: codigo_prod,
                        stock_n: nuevo_stock
                    });


                }

            }

            var codigo = $("#codigop").val();
            var cantidad = $("#cantidadp").val();
            var valor = $("#numero_mesa").val();

            $.get(link + "sistema/carga_pedidos", {
                product_id: codigo,
                quantity: cantidad,
                mesa: valor,
                ajax: '1'
            },

            function (data) {

                if (data == 'true') {

                    $.get(link + "sistema/show_cargados", {
                        mesa: valor
                    }, function (cart) {
                        $("#pedidos_agregados").html(cart);

                    });


                    var total = $("#total").val();

                    var valortal = '$' + total + '.00';

                    $("#subtotal").html(valortal);

                } else {
                    alert("El producto no existe");
                }

            });

            return true; //  lo que realmente va a realizar
        }

    }); // CIERRE DEL CLICK ORIGINAL

    $('#username').bind('blur', function () {
        var username = $(this).val();

        var datos = {
            nombre_usuario: username
        };


        $.ajax({
            url: link + "users/username_check_ajax",
            type: "get",
            data: datos,
            success: function (msg) {
                msg = msg.trim();
                //alert(msg);
                if (msg == "true") {
                    $(".username").removeClass("username_taken");
                    $(".username").addClass("username_notaken");
                } else if (msg == "false") {
                    $(".username").removeClass("username_notaken");
                    $(".username").addClass("username_taken");
                }


            }
        });

    });


    $('#botonabrir').bind('click', function () {
        var mesa = $('#mesa').val();

        $('#codigop').css("background-color", '#FFFFFF'); // filas impares
        $('#descripcionp').css("background-color", '#FFFFFF'); // filas impares
        $('#cantidadp').css("background-color", '#FFFFFF'); // filas impares

        var datos = {
            numero_mesa: mesa
        };

        $.ajax({
            url: link + "sistema/mesa_ajax2",
            type: "get",
            data: datos,
            success: function (msg) {
                msg = msg.trim();
                //alert(msg);
                if (msg == 2) {



                    alert("La mesa " + mesa + " se encuentra reservada");


                }
                if (msg == 3) {
                    alert("La mesa " + mesa + " se encuentra esperado el cobro");

                }
                if (msg == 4) {


                    var elemento = document.getElementById("mesa" + mesa);
                    elemento.className = "mesaroja";
                    elemento.title = "Mesa abierta";

                    var elemento2 = document.getElementById("numero_mesa");
                    elemento2.value = mesa;


                    var elemento22 = document.getElementById("totalfinal");
                    elemento22.innerHTML = '$00,00';


                    var datos = {
                        mesa_mozo: mesa
                    };

                    $.ajax({
                        url: link + "sistema/mesa_mozo_ajax",
                        type: "get",
                        data: datos,
                        success: function (msg2) {
                            msg2 = msg2.trim();


                            var elemento3 = document.getElementById("mozo_mesa");
                            elemento3.innerHTML = msg2;


                        }
                    });

                    var datos2 = {
                        numero_mesa: mesa
                    };

                    $.ajax({
                        url: link + "sistema/apertura_ajax",
                        type: "get",
                        data: datos2,
                        success: function (msg) {
                            msg = msg.trim();
                            //alert(msg);
                            if (msg == 1) {
                                alert("La mesa " + mesa + " ha sido habilitada\nAhora puede cargar sus pedidos");

                            }

                        }
                    });

                }

            }
        });


    });


    $('#botoncerrar').bind('click', function () {
        var mesa = $('#mesa').val();

        var datos = {
            numero_mesa: mesa
        };

        $.ajax({
            url: link + "sistema/mesa_ajax",
            type: "get",
            data: datos,
            success: function (msg) {
                msg = msg.trim();
                //alert(msg);
                if (msg == 2) {
                    alert("La mesa " + mesa + " se encuentra reservada");

                }
                if (msg == 1) {

                    alert("Al no contener productos cargados, la mesa se cerrara");


                    var elemento = document.getElementById("mesa" + mesa);
                    elemento.className = "mesaverde";
                    elemento.title = "Mesa cerrada";

                    var elemento2 = document.getElementById("numero_mesa");
                    elemento2.value = '';

                    var elemento3 = document.getElementById("mozo_mesa");
                    elemento3.innerHTML = '';

                }



                if (msg == 505) {



                    alert("No puede cerrar esta mesa, debes cobrar el pedido total o eliminar todos sus productos cargado");

                }

            }
        });

    });

    $("ul.products form").submit(function () {
        // Get the product ID and the quantity
        var id = $(this).find('input[name=product_id]').val();
        var qty = $(this).find('input[name=quantity]').val();

        $.get(link + "cart/add_cart_item", {
            product_id: id,
            quantity: qty,
            ajax: '1'
        },



        function (data) {

            if (data == 'true') {

                $.get(link + "cart/show_cart", function (cart) {
                    $("#cart_content").html(cart);
                });

            } else {
                alert("Product does not exist");
            }

        });

        return false;
    });

    $(".empty").live("click", function () {
        $.get(link + "cart/empty_cart", function () {
            $.get(link + "cart/show_cart", function (cart) {
                $("#cart_content").html(cart);
            });
        });

        return false;
    });


    $("#home").hide();

    $("#panel-1").mouseover(function () {
        $("#home").show();
    })


    $("#panel-1").mouseout(function () {
        $("#home").hide();
    });


    $("#menu").hide();

    $("#panel-2").mouseover(function () {
        $("#menu").show();
    })


    $("#panel-2").mouseout(function () {
        $("#menu").hide();
    });


    $("#reservas").hide();

    $("#panel-3").mouseover(function () {
        $("#reservas").show();
    })


    $("#panel-3").mouseout(function () {
        $("#reservas").hide();
    });



    $("#ubicacion").hide();

    $("#panel-4").mouseover(function () {
        $("#ubicacion").show();
    })


    $("#panel-4").mouseout(function () {
        $("#ubicacion").hide();
    });


});

//  var link = 'http://localhost/restaurantbonifacio/';

function login(direccion) {

    location.href = direccion + 'users/login';

}


function register(direccion) {

    location.href = direccion + 'users/register';

}

function verificarcobro() {



    var mesa_cerrar = $("#mesaoculta2").val();



    var total = $("#totaloculto").val();

    var efectivo = $("#efectivo").val();

    efectivo = parseInt(efectivo);
    total = parseInt(total);

    var vuelto = efectivo - total;
    vuelto = parseInt(vuelto);

    if (efectivo < total) {
        alert('Monto incorrecto');
        return false;
    } else {

        alert('El pago se realizo correctamente, se imprimira la factura, y la mesa se cerrara');

        SimularClick();

        var elemento = document.getElementById("mesa" + mesa_cerrar);
        elemento.className = "mesaverde";
        elemento.title = "Mesa cerrada";

        var elemento2 = document.getElementById("numero_mesa");
        elemento2.value = '';

        var elemento3 = document.getElementById("mozo_mesa");
        elemento3.innerHTML = '';


        var elemento35 = document.getElementById("cubiertos");
        elemento35.innerHTML = '';

        var elemento25 = document.getElementById("comensales");
        elemento25.value = '';


        var elemento29 = document.getElementById("totalfinal");
        elemento29.value = '';

        $.get(link + "sistema/hojaenblanco2", {
            mesacerra: mesa_cerrar
        }, function (cart) {
            $("#pedidos_agregados").html(cart);

        });

        $.get(link + "sistema/cierra_compra", {
            mesa: mesa_cerrar,
            efectivo: efectivo,
            total: total,
            vuelto: vuelto

        }, function (cart) {


            if (cart) {
                window.open(link + 'pdf_report/ticket_salon/' + mesa_cerrar);
            }

        });

        var limpiar = '0';

        $.get(link + "sistema/mesa_comensal", {
            mesa: mesa_cerrar,
            valor: limpiar
        }

        );

    }

}


function mesaselect(valor) {

    $("#mesa").val(valor);

    $('#codigop').css("background-color", '#FFFFFF'); // filas impares
    $('#descripcionp').css("background-color", '#FFFFFF'); // filas impares
    $('#cantidadp').css("background-color", '#FFFFFF'); // filas impares
    var datos = {
        numero_mesa: valor
    };

    $.ajax({
        url: link + "sistema/mesadetecta_ajax",
        type: "get",
        data: datos,
        success: function (msg) {
            msg = msg.trim();
            //alert(msg);
            if (msg == 2) {
                alert("La mesa " + valor + " se encuentra reservada");

                $("#cantidad_stock_sms").html('');


                //  colocar en nombre de quien esta reservada
                var elemento2 = document.getElementById("numero_mesa");
                elemento2.value = '';

                var elemento28 = document.getElementById("comensales");
                elemento28.value = '';

                var elemento3 = document.getElementById("mozo_mesa");
                elemento3.innerHTML = '';


                var elemento33 = document.getElementById("cubiertos");
                elemento33.innerHTML = '';

                $.get(link + "sistema/hojaenblanco", function (cart) {
                    $("#pedidos_agregados").html(cart);

                });

            }
            if (msg == 3) {

                $("#cantidad_stock_sms").html('');


                var elemento6 = document.getElementById("descripcionp");
                elemento6.value = '';

                var elemento5 = document.getElementById("codigop");
                elemento5.value = '';


                var elemento7 = document.getElementById("cantidadp");
                elemento7.value = '';


                var elemento34 = document.getElementById("cubiertos");
                elemento34.innerHTML = '';

                var elemento25 = document.getElementById("numero_mesa");
                elemento25.value = valor;



                var datos = {
                    mesa_mozo: valor
                };

                $.ajax({
                    url: link + "sistema/mesa_mozo_ajax",
                    type: "get",
                    data: datos,
                    success: function (msg2) {
                        msg2 = msg2.trim();


                        var elemento3 = document.getElementById("mozo_mesa");
                        elemento3.innerHTML = msg2;


                    }
                });


                $.get(link + "sistema/show_cargados", {
                    mesa: valor
                }, function (cart) {
                    $("#pedidos_agregados").html(cart);

                });

                var total = $("#total").val();

                var valortal = '$' + total + '.00';

                $("#subtotal").html(valortal);

            }
            if (msg == 4) {

                $("#cantidad_stock_sms").html('');


                var elemento6 = document.getElementById("descripcionp");
                elemento6.value = '';

                var elemento5 = document.getElementById("codigop");
                elemento5.value = '';


                var elemento7 = document.getElementById("cantidadp");
                elemento7.value = '';

                $.get(link + "sistema/hojaenblanco", function (cart) {
                    $("#pedidos_agregados").html(cart);

                });

                var elemento2 = document.getElementById("numero_mesa");
                elemento2.value = '';

                var elemento3 = document.getElementById("mozo_mesa");
                elemento3.innerHTML = '';


                var elemento28 = document.getElementById("comensales");
                elemento28.value = '';


                var elemento36 = document.getElementById("cubiertos");
                elemento36.innerHTML = '';

            }


            if (msg == 1) {

                $("#cantidad_stock_sms").html('');

                var elemento6 = document.getElementById("descripcionp");
                elemento6.value = '';

                var elemento5 = document.getElementById("codigop");
                elemento5.value = '';


                var elemento7 = document.getElementById("cantidadp");
                elemento7.value = '';


                var elemento37 = document.getElementById("cubiertos");
                elemento37.innerHTML = '';

                var elemento2 = document.getElementById("numero_mesa");
                elemento2.value = valor;



                var datos = {
                    mesa_mozo: valor
                };

                $.ajax({
                    url: link + "sistema/mesa_mozo_ajax",
                    type: "get",
                    data: datos,
                    success: function (msg2) {
                        msg2 = msg2.trim();


                        var elemento3 = document.getElementById("mozo_mesa");
                        elemento3.innerHTML = msg2;


                        var elemento38 = document.getElementById("comensales");
                        elemento38.value = '';



                    }
                });


                $.get(link + "sistema/show_cargados", {
                    mesa: valor
                }, function (cart) {
                    $("#pedidos_agregados").html(cart);

                    $.get(link + "sistema/cuantos_comensal", {
                        mesa: valor
                    }, function (cart) {


                        var total = $("#total").val();

                        total = parseInt(total);
                        cart = parseInt(cart);

                        var valor_cubiertos = cart * 5;

                        $("#cubiertos").html('$' + valor_cubiertos + ',00');


                        $("#comensales").val(cart);


                        var nuevo_total = total + (cart * 5);

                        var subtotal = '$' + total + '.00';

                        var valortotal = '$' + nuevo_total + '.00';



                        $("#subtotal").html(subtotal);
                        $("#totalfinal").html(valortotal);

                        $("#totalfinal_oculto").val(nuevo_total);

                    });


                });

            }

        }
    });


}



function seleccionar(id_prod) {



    var elemento15 = document.getElementById("id_prod").value;

    if (elemento15) {


        var elemento = document.getElementById("producto" + elemento15);
        elemento.className = "fondonada";

    }

    var elemento = document.getElementById("quitar_producto");
    elemento.className = "botonrojo";


    var elemento11 = document.getElementById("id_prod");
    elemento11.value = id_prod;

    var elemento12 = document.getElementById("mesa");
    elemento12.value = mesa;


}



function confirmacion(id_prod, mesa) {

    var answer = confirm("Desea quitar este producto de la lista?")
    if (answer) {

        $.get(link + "sistema/showeli_cargados", {
            mesa: mesa,
            elimino: id_prod
        }, function (cart) {
            $("#pedidos_agregados").html(cart);

        });

        var total = $("#total").val();

        var valortal = '$' + total + '.00';

        $("#subtotal").html(valortal);

        $("#quitar_producto").addClass("botonsistema");

    } else {
        return false;
    }

}



function destacar() {
    var elemento14 = document.getElementById("id_prod").value;

    if (elemento14) {


        var elemento = document.getElementById("producto" + elemento14);
        elemento.className = "fondorojo";


    }

}


function vaciar() {
    var elemento15 = document.getElementById("id_prod").value;

    if (elemento15) {

        var elemento = document.getElementById("producto" + elemento15);
        elemento.className = "fondonada";

    }


}


function pre_compra(codigo, descripcion) {
    $('#codigop').val(codigo);

    $('#descripcionp').val(descripcion);

    $('#cantidadp').val('1');


    $.get(link + "sistema/valido_codigo", {
        codigo: codigo
    },

    function (data) {


        if (data == 'false') {

            alert('el codigo no existe')


        } else {


            if (data == 0) {

                $("#cantidad_stock_sms").html('PRODUCTO SIN STOCK');


                $("#cantidad_stock").val(data);


                $.get(link + "sistema/trae_descripcion", {
                    codigo: codigo
                },



                function (data2) {

                    $("#descripcionp").val(data2);
                    $("#cantidadp").val('');

                    $('#codigop').css("background-color", '#FF0000'); // filas impares
                    $('#descripcionp').css("background-color", '#FF0000'); // filas impares
                    $('#cantidadp').css("background-color", '#FF0000'); // filas impares

                    $('#codigop').css("color", '#FFFFFF'); // filas impares
                    $('#descripcionp').css("color", '#FFFFFF'); // filas impares
                    $('#cantidadp').css("color", '#FFFFFF'); // filas impares
                    //  aplicar estilos a codigop, cantidad, descripcion

                });


                return false;

            }


            if (data != 0) {
                $("#cantidad_stock_sms").html('Stock disponible: ' + data + ' unidades');
                $("#cantidad_stock").val(data);
            }


            $.get(link + "sistema/trae_descripcion", {
                codigo: codigo
            },



            function (data2) {

                $("#descripcionp").val(data2);
                $("#cantidadp").val('1');

                $('#codigop').css("background-color", '#F7F500'); // filas impares
                $('#descripcionp').css("background-color", '#F7F500'); // filas impares
                $('#cantidadp').css("background-color", '#F7F500'); // filas impares


                $('#codigop').css("color", '#000000'); // filas impares
                $('#descripcionp').css("color", '#000000'); // filas impares
                $('#cantidadp').css("color", '#000000'); // filas impares

                //  aplicar estilos a codigop, cantidad, descripcion

            });


        }

    });


}



function SimularClick() {

    var nouEvent = document.createEvent("MouseEvents");
    nouEvent.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    var objecte = document.getElementById("cerrar");
    var canceled = !objecte.dispatchEvent(nouEvent);
}
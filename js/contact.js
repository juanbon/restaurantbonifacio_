jQuery(function ($) {
	var contact = {
		message: null,
		init: function () {
			$('#contact-form input#pago').click(function (e) {
				e.preventDefault();

// verifico si se abrio una mesa como primer condicion .

  if($("#numero_mesa").val().length == 0) {
                alert("Debes abrir una mesa");
                return false;
            }

// verifico si se abrio una mesa como primer condicion


//  verifico si la mesa contiene pedidos antes de factura

//    var link = 'http://localhost/restaurantbonifacio/'; // Url to your application (including index.php/)


        // Get the product ID and the quantity
        var mesa = $("#numero_mesa").val();

        $.get( "sistema/total_pedidos", {
            mesa:mesa
        },

        function(data){

            if(data == '1'){

            alert ("La mesa no contiene productos cargados");
return false;
            }else if(data == '505'){





//  se debe completar la cantidad de comensales...   el nombre no es obligatorio

var comm = $("#comensales").val();

if((comm=='')||(comm==0))
    {
        alert("Debe ingresar la cantidad de comensales");
        return false;
    }else
        {



var comensales=$("#comensales").val();

            //  copio los comensales a acumcargas

        $.get( "sistema/paso_comensal",{
           comensales:comensales,
           mesa:mesa
        }, function(cart){

        });

           //  copio los comensales a acumcargas

        }


				//  se debe completar la cantidad de comensales...   el nombre no es obligatorio

				// return false
				// alert(totalf);

				// load the contact form using ajax
				$.get( "sistema/cobrar", function(data){
					// create a modal dialog with the data
					$(data).modal({
						closeHTML: "<a href='#' title='Cerrar' id='cerrar' class='modal-close'>X</a>",
						position: ["15%",],
						overlayId: 'contact-overlay',
						containerId: 'contact-container',
						onOpen: contact.open,
						onShow: contact.show,
						onClose: contact.close,

					});
				});














            }

        });




//  verifico si la mesa contiene pedidos antes de factura



			});
		},
		open: function (dialog) {
			// add padding to the buttons in firefox/mozilla
			if ($.browser.mozilla) {
				$('#contact-container .contact-button').css({
					'padding-bottom': '2px'
				});
			}
			// input field font size
			if ($.browser.safari) {
				$('#contact-container .contact-input').css({
					'font-size': '.9em'
				});
			}

			// dynamically determine height
			var h = 350;
			if ($('#contact-subject').length) {
				h += 26;
			}
			if ($('#contact-cc').length) {
				h += 22;
			}

                        var totalfac=$("#totalfinal_oculto").val();
                        var mesaoculta=$("#mesaoculta").val();

			var title = $('#contact-container .contact-title').html();
			$('#contact-container .contact-title').html('');
                        $('#totalfactura').html('$'+totalfac+'.00');
                        $('#totaloculto').val(totalfac);
                        $('#mesaoculta2').val(mesaoculta);
                        
			dialog.overlay.fadeIn(200, function () {
				dialog.container.fadeIn(200, function () {
					dialog.data.fadeIn(200, function () {
						$('#contact-container .contact-content').animate({
							height: h
						}, function () {
							$('#contact-container .contact-title').html(title);
							$('#contact-container form').fadeIn(200, function () {
								$('#contact-container #contact-name').focus();

								$('#contact-container .contact-cc').click(function () {
									var cc = $('#contact-container #contact-cc');
									cc.is(':checked') ? cc.attr('checked', '') : cc.attr('checked', 'checked');
								});

								// fix png's for IE 6
								if ($.browser.msie && $.browser.version < 7) {
									$('#contact-container .contact-button').each(function () {
										if ($(this).css('backgroundImage').match(/^url[("']+(.*\.png)[)"']+$/i)) {
											var src = RegExp.$1;
											$(this).css({
												backgroundImage: 'none',
												filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' +  src + '", sizingMethod="crop")'
											});
										}
									});
								}
							});
						});
					});
				});
			});
		},
	
		
		
		
		close: function (dialog) {
			$('#contact-container .contact-message').fadeOut();
			$('#contact-container .contact-title').html('');
			$('#contact-container form').fadeOut(200);
			$('#contact-container .contact-content').animate({
				height: 40
			}, function () {
				dialog.data.fadeOut(200, function () {
					dialog.container.fadeOut(200, function () {
						dialog.overlay.fadeOut(200, function () {
							$.modal.close();
						});
					});
				});
			});
		}
	

	
	};

	contact.init();

});
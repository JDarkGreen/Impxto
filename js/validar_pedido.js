jQuery(document).ready(function($){
	$('#formulario_pedidos').validationEngine({
		scroll: false,
		promptPosition: "topCenter",
		onValidationComplete: function(form, status)
		{
			if ( jQuery('#formulario_pedidos').validationEngine('validate')==true)
			{
				jQuery.post('enviar-cotizacion.php', jQuery('#formulario_pedidos').serialize(), function(data) {
					jQuery('#estado_pedido').html(data);
					jQuery('#estado_pedido').show();
					jQuery('#razon_social').val('');
					jQuery('#nombres').val('');
					jQuery('#email').val('');	
					jQuery('#telefono').val('');									
					jQuery('#direccion').val('');
					jQuery('#cantidad').val('');
					jQuery('#mensaje').val('');
					
					jQuery('textarea').val('');	
									
				});
			}
		}
	});
});
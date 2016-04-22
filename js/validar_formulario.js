jQuery(document).ready(function($){
	jQuery('#formulario_contactenos').validationEngine({
		scroll: false,
		promptPosition: "topCenter",
		onValidationComplete: function(form, status)
		{
			if ( jQuery('#formulario_contactenos').validationEngine('validate')==true)
			{
				jQuery.post('enviar.php', jQuery('#formulario_contactenos').serialize(), function(data) {
					jQuery('#estado').html(data);
					jQuery('#estado').show();
					jQuery('#nombres').val('');
					jQuery('#email').val('');					
					jQuery('#telefono').val('');
					jQuery('#direccion').val('');					
					jQuery('#mensaje').val('');
					
					jQuery('textarea').val('');	
									
				});
			}
		}
	});
});
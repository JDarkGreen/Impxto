function validar(){
	if(document.getElementById("usuario").value==0){
		jQuery("#error1").fadeIn(1200);
		$("#error1").fadeOut(1500);
		document.getElementById("usuario").focus();
		$("#usuario").animate({ backgroundColor: "#BF0000" }, "fast")
		 .animate({ opacity: "fader" }, "fast")
		 .animate({ opacity: "show" }, "fast")
		 .animate({ backgroundColor: "#FFFFFF" }, "slow")
		return 0;
	}
	if(document.getElementById("clave").value==0){
		jQuery("#error2").fadeIn(1000);
		jQuery("#error2").fadeOut(1500);
		document.getElementById("clave").focus();
		jQuery("#clave").animate({ backgroundColor: "#BF0000" }, "fast")
		 .animate({ opacity: "fader" }, "fast")
		 .animate({ opacity: "show" }, "fast")
		 .animate({ backgroundColor: "#FFFFFF" }, "slow")
		return 0;
	}

	document.form1.action = "validar.php";
	document.form1.submit();
	
}
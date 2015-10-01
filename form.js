$(document).ready(function(){ 
	$('#userForm').submit(function(e){
		removeFeedback();
		var errors=validateForm();
		if(errors==""){
			return true;
		}
		else{
			provideFeedback(errors);
			e.preventDefault();
			return false;
		}
	});	
		var illegalfields=new Array();
		var errorfields=new Array();
		function validateForm(){
			var error=new Array();
			var nameillegal=["!","@","#","$","%","^","&","*","(",")","+","=","/","[","]","?","|","<",">","~","`",];
			var phoneillegal=["!","@","#","$","%","^","&","*","(",")","+","=","/","[","]","?","|","<",">","~","`",];
			if($('#name').val()==""){
				errorfields.push('name');
			}
			if ($('#email').val()=="") {
				errorfields.push('email');
			}
			if ($('#password1').val()=="") {
				errorfields.push('password1');
			}
			if ($('#phone').val()=="") {
				errorfields.push('phone');
			}
			if ($('#password2').val()=="") {
				errorfields.push('password2');
			}

			for (var i = 0; i <nameillegal.length; i++) {
				if ($("#name").val()==nameillegal[i]) {
					illegalfields.push('name');
				}
		    }
		    error.push("illegalfields");
			error.push("errorfields");
			return error;
		}
	function provideFeedback(incomingerrors){
		for (var i = 0; i < incomingerrors.length; i++) {
			if(incomingerrors[i]=="illegalfields"){
				for (var j = 0; j < illegalfields.length; j++) {
					if(illegalfields[j]=="name"){
						$("#name").addClass('errorclass');
						$("#nameerror").html("Enter correct name.");
						$("#nameerror").removeClass("errorfeedback");
					}
				}
			}
			if(incomingerrors[i]=="errorfields"){
				for(var j=0; j<errorfields.length;j++){
					if(errorfields[j]=="name"){
						$("#name").addClass('errorclass');
						$("#nameerror").html("Name is required");
						$("#nameerror").removeClass("errorfeedback");
					}
					if (errorfields[j]=="phone") {
						$("#phone").addClass('errorclass');
				        $("#phoneerror").removeClass("errorfeedback");
					}
					if (errorfields[j]=="email") {
						$("#email").addClass('errorclass');
				        $("#emailerror").removeClass("errorfeedback");
					}
					if (errorfields[j]=="password1") {
						$("#password1").addClass('errorclass');
				        $("#password1error").removeClass("errorfeedback");
					}
					if (errorfields[j]=="password2") {
						$("#password2").addClass('errorclass');
				        $("#password2error").removeClass("errorfeedback");
					}
				}
			}
		}

		//for(var i=0;i<incomingerrors.length;i++){
			//$('#'+incomingerrors[i]).addClass("errorclass");
			//$('#'+incomingerrors[i]+'error').removeClass("errorfeedback");
		//}
		//$("#errordiv").html("errors encountered");
	}
	function removeFeedback(){
		$('#errordiv').html(""); 
		illegalfields=[];
		errorfields=[];
		$("input").each(function(){
			$(this).removeClass("errorclass");
		});
		$(".errorspan").each(function(){
			$(this).addClass("errorfeedback");
	});
   }
});
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
		function validateForm(){
			var errorfields=new Array();
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
			return errorfields;
		}
	function provideFeedback(incomingerrors){
		for(var i=0;i<incomingerrors.length;i++){
			$('#'+incomingerrors[i]).addClass("errorclass");
			$('#'+incomingerrors[i]+'error').removeClass("errorfeedback");
		}
		$("#errordiv").html("errors encountered");
	}
	function removeFeedback(){
		$('#errordiv').html("");
		$("input").each(function(){
			$(this).removeClass("errorclass");
		});
		$(".errorspan").each(function(){
			$(this).addClass("errorfeedback");
	});
   }
});
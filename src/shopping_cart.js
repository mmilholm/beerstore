


//function updateCart (pid) ( 
//	var number = pid

/*
		$(function(){
    		$("#quantity"+num).change(function(){
        		 $("#subTotal"+num).val($(this).val() * $("#price"+num).val());
    		});
		});

*/

function updateSubTotal(num) {

		console.log(num);
		$(function(){
    		$("#quantity"+num).change(function(){
        		 $("#subTotal"+num).val($(this).val() * $("#price"+num).val());
    		});
		});

}

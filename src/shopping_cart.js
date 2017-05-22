function updateSubTotal(num) {

		//console.log(num);
		$(function(){
    		$("#quantity"+num).change(function(){
        		 $("#subTotal"+num).val($(this).val() * $("#price"+num).val());
    		});
		});

}
